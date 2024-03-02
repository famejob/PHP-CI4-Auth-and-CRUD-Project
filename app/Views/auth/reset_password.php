<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Password Reset</title>
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
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1>Password Reset</h1>
            <form action="/update_password" id="resetpasswordForm" method="post">
                <input type="hidden" name="token" value="<?= $token ?>">
                <div class="mb-3">
                    <input type="password" name="password" id="password" placeholder="Enter your new password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="password" name="cfpassword" id="password" placeholder="Confirm your new password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Reset Password" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#resetpasswordForm').validate({
                rules: {
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