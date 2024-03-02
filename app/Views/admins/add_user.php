<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add User</title>
</head>
<style>
    .error {
        display: block;
        padding-top: 5px;
        font-size: 15px;
        color: red;
    }
</style>

<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/product_list">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
    </nav>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="/add_user" id="adduserForm" method="post">
                <h1 class="mb-3">ADD USER</h1>
                <div class="mb-3">
                    <label for="fname" class="form-label">Firstname</label>
                    <input type="text" name="fname" id=fname" placeholder="Input your Firstname" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Lastname</label>
                    <input type="text" name="lname" id="lname" placeholder="Input your Lastname" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" placeholder="Input your Username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Input your Email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">User Role</label>
                    <select name="role" id="role" class="form-select" aria-label="Default select example">
                        <option value="">Select User Role</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" placeholder="Input your Password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cfpassword" class="form-label">Confirm Password</label>
                    <input type="password" name="cfpassword" id="cfpassword" placeholder="Confirm your Password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" id="submit" value="Add" class="btn btn-success">
                    <a class="btn btn-dark" href="/user_list">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#adduserForm').validate({
                rules: {
                    fname: {
                        required: true
                    },
                    lname: {
                        required: true
                    },
                    username: {
                        required: true,
                        minlength: 5,
                        remote: {
                            url: "<?php echo base_url('/check_username_unique'); ?>",
                            type: "post"
                        }
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "<?php echo base_url('/check_email_unique'); ?>",
                            type: "post"
                        }
                    },
                    role: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    cfpassword: {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {
                    fname: {
                        required: "Please enter first name"
                    },
                    lname: {
                        required: "Please enter last name"
                    },
                    username: {
                        required: "Please enter username",
                        minlength: "Your username must be at least 5 characters long.",
                        remote: "Username already in use"
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter a valid email address.",
                        remote: "Email already in use"
                    },
                    role: {
                        required: "Please select user role",
                    },
                    password: {
                        required: "Please enter password",
                        minlength: "Your password must be at least 8 characters long."
                    },
                    cfpassword: {
                        required: "Please confirm password",
                        equalTo: "Please enter the password to match."
                    },
                }
            })
        })
    </script>
</body>

</html>