<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
    <title>Login</title>
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
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol>
    </nav>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="/login_user" method="post" id="loginForm">
                <h1 class="mb-3">LOGIN</h1>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Input your Email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Input your Password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" value="Login" class="btn btn-success">
                </div>
                <div class="mb-3">
                    <p>Forgot Password?<a class="fw-bold text-dark" href="/forgot_password">Click here</a></p>
                </div>
                <div class="mb-3">
                    <p>Don't have an account?<a class="fw-bold text-success" href="/register">SIGN UP NOW</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (session()->getFlashdata('msg')) : ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: "<?= session()->getFlashdata('msg') ?>",
                    text: "<?= session()->getFlashdata('msg') ?>",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            });
        </script>
    <?php endif; ?>
    <script>
        $(document).ready(function() {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter email"
                    },
                    password: {
                        required: "Please enter password"
                    }
                }
            })
        })
    </script>
</body>

</html>