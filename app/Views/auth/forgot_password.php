<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
    <title>Forgot Password</title>
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
            <form action="/send_Email" id="forgotpasswordForm" method="post">
                <h1 class="mb-3">Forgot Password</h1>
                <div class="mb-3">
                    <input type="email" name="email" id="email" placeholder="Input your Email" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" id="submit" value="Send" class="btn btn-success">
                    <a class="btn btn-dark" href="/login">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (session()->has('error')) : ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: "<?= session('error') ?>",
                    text: "You try entering your email again.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            });
        </script>
    <?php endif; ?>
    <script>
        $(document).ready(function() {
            $('#forgotpasswordForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter email",
                        email: "Please enter a valid email address."
                    }
                }
            });
        })
    </script>
</body>

</html>