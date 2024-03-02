<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    //show list user page
    public function show_list_user()
    {
        $model = new UserModel();
        $data['users'] = $model->orderBy('us_id', 'DESC')->findAll();
        return view('/admins/user_list', $data);
    }
    //show add user page
    public function show_add_user()
    {
        return view('/admins/add_user');
    }
    //add user
    public function add_user()
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
                'us_role'  => $data['role']
            ]);
            return $this->response->redirect(site_url('/user_list'));
        }
    }
    // show detail user page
    public function show_detail_user($id = null)
    {
        $model = new UserModel();
        $data['user_obj'] = $model->where('us_id', $id)->first();
        return view('/admins/user_detail', $data);
    }
    // show edit user page
    public function show_edit_user($id = null)
    {
        $model = new UserModel();
        $data['user_obj'] = $model->where('us_id', $id)->first();
        return view('/admins/edit_user', $data);
    }
    // check username for update data
    public function check_username_update()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $user_id = $this->request->getPost('id'); // Exclude current user from the uniqueness check
        $isUnique = $model->isUniqueUsername($username, $user_id);
        return ($isUnique) ? 'true' : 'false';
    }
    // check email for update data
    public function check_email_update()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $user_id = $this->request->getPost('id'); // Exclude current user from the uniqueness check
        $isUnique = $model->isUniqueEmail($email, $user_id);
        return ($isUnique) ? 'true' : 'false';
    }
    //update user
    public function update_user()
    {
        if ($this->request->is('post')) {
            $model = new UserModel();
            $id = $this->request->getPost('id');
            $data = $this->request->getPost();
            $data = [
                'us_fname' => $data['fname'],
                'us_lname'  => $data['lname'],
                'us_name'  => $data['username'],
                'us_email'  => $data['email'],
                'us_password'  => password_hash($data['password'], PASSWORD_DEFAULT),
                'us_role'  => $data['role']
            ];
            $model->update($id, $data);
            return $this->response->redirect(site_url('/user_list'));
        }
    }
    // delete user
    public function delete_user($id = null)
    {
        $model = new UserModel();
        $data['user'] = $model->where('us_id', $id)->delete($id);
        return $this->response->redirect(site_url('/user_list'));
    }
}
