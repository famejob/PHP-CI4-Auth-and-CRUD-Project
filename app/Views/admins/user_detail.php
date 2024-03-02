<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit User</title>
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
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </nav>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="">
                <h1 class="mb-3">USER DETAIL</h1>
                <input type="hidden" name="id" id="id" value="<?php echo $user_obj['us_id']; ?>">
                <div class="mb-3">
                    <label for="fname" class="form-label">Firstname</label>
                    <input type="text" name="fname" id=fname" placeholder="Input your Firstname" class="form-control" value="<?php echo $user_obj['us_fname']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Lastname</label>
                    <input type="text" name="lname" id="lname" placeholder="Input your Lastname" class="form-control" value="<?php echo $user_obj['us_lname']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" placeholder="Input your Username" class="form-control" value="<?php echo $user_obj['us_name']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Input your Email" class="form-control" value="<?php echo $user_obj['us_email']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">User Role</label>
                    <select disabled name="role" id="role" class="form-select" aria-label="Default select example">
                        <option><?php echo $user_obj['us_role']; ?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <a class="btn btn-dark" href="/user_list">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>