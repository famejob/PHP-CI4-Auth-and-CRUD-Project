<?php

namespace App\Controllers;

use App\Libraries\PHPMailerLib;
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;


class Auth extends BaseController
{
    public function show_register_page()
    {
        return view('auth/register');
    }
    public function show_login_page()
    {
        return view('auth/login');
    }
    public function show_forgot_password_page()
    {
        return view('auth/forgot_password');
    }
    //check username unique
    public function check_username_unique()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getVar('username');
            $model = new UserModel(); // Assuming UserModel is your model for accessing users table

            $username = $model->where('us_name', $data)->first();

            if ($username) {
                echo json_encode(false); // Username exists
            } else {
                echo json_encode(true); // Username is unique
            }
        }
    }
    //check email unique
    public function check_email_unique()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getVar('email');
            $model = new UserModel(); // Assuming UserModel is your model for accessing users table

            $email = $model->where('us_email', $data)->first();

            if ($email) {
                echo json_encode(false); // Email exists
            } else {
                echo json_encode(true); // Email is unique
            }
        }
    }
    //register user
    public function register_user()
    {
        if ($this->request->is('post')) {
            $data = $this->request->getPost();
            $model = new UserModel();
            $model->save([
                'us_fname' => $data['fname'],
                'us_lname'  => $data['lname'],
                'us_name'  => $data['username'],
                'us_email'  => $data['email'],
                'us_password'  => password_hash($data['password'], PASSWORD_DEFAULT),
                'us_role'  => "User",
            ]);
            echo '<link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
                  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: "Success!",
                            text: "You have successfully registered.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            // Redirect to another page after user clicks OK
                            window.location.href = " / ";
                        });
                    });
                  </script>';
        }
    }
    //login user
    public function login_user()
    {
        $session = session();
        $model = new UserModel();
        $data_login = $this->request->getPost();
        $data = $model->where('us_email', $data_login['email'])->first();
        if ($data) {
            //Admin role
            if ($data['us_role'] == 'Admin') {
                $pass = $data['us_password'];
                $authenticatePassword = password_verify($data_login['password'], $pass);
                if ($authenticatePassword) {
                    // echo "Pass is correct";
                    $ses_data = [
                        'id' => $data['us_id'],
                        'fname' => $data['us_fname'],
                        'lname' => $data['us_lname'],
                        'name' => $data['us_name'],
                        'email' => $data['us_email'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/product_list');
                } else {
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    return redirect()->to('/login');
                }
            } else {
                // User role
                $pass = $data['us_password'];
                $authenticatePassword = password_verify($data_login['password'], $pass);
                if ($authenticatePassword) {
                    $ses_data = [
                        'id' => $data['us_id'],
                        'fname' => $data['us_fname'],
                        'lname' => $data['us_lname'],
                        'name' => $data['us_name'],
                        'email' => $data['us_email'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    // return redirect()->to('/user_page');
                    return redirect()->to('/user_page');
                } else {
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    return redirect()->to('/login');
                }
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }
    //logout
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    // send email
    public function send_Email()
    {
        $email = $this->request->getPost('email');
        $model = new UserModel();

        // Check if the email exists in the database
        $user = $model->where('us_email', $email)->first();

        if (!$user) {
            return redirect()->to('/forgot_password')->with('error', 'Email not found in system.');
        }

        // Generate a unique token for password reset
        $token = bin2hex(random_bytes(16));

        // Save the token in the database along with the user's email
        $model->update($user['us_id'], ['us_reset_token' => $token]);

        // Send email for reset password
        $to = $email;
        $subject = 'Password Reset Instructions';
        $message = 'Click on the following link to reset your password: ' . site_url('/reset_password/' . $token);
        $phpmailer = new PHPMailerLib();
        if ($phpmailer->sendEmail($to, $subject, $message)) {
            echo '<link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
                      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: "Success!",
                                text: "Password reset instructions have been sent to your email.",
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                // Redirect to another page after user clicks OK
                                window.location.href = "/login";
                            });
                        });
                      </script>';
        }
        // return redirect()->to('/login')->with('success', 'Password reset instructions have been sent to your email.');
    }
    public function show_reset_password_page($token)
    {
        // Load the user model
        $model = new UserModel();

        // Find user by reset token
        $user = $model->where('us_reset_token', $token)->first();

        // Check if the token is valid
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Invalid reset token.');
        }
        return view('auth/reset_password', ['token' => $token]);
    }
    //update password
    public function updatePassword()
    {
        // Retrieve token and new password from form submission
        $token = $this->request->getPost('token');
        $password = $this->request->getVar('password');

        // Load the user model
        $model = new UserModel();

        // Find user by reset token
        $user = $model->where('us_reset_token', $token)->first();

        // Check if the token is valid
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Invalid reset token.');
        }

        // Update user's password and remove reset token
        $model->update($user['us_id'], ['us_password' => password_hash($password, PASSWORD_DEFAULT), 'us_reset_token' => null]);

        echo '<link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
                  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
                  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: "Success!",
                            text: "Password has been successfully updated.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            // Redirect to another page after user clicks OK
                            window.location.href = "/login";
                        });
                    });
                  </script>';
        // return redirect()->to('/login')->with('success', 'Password has been successfully updated.');
    }
}
