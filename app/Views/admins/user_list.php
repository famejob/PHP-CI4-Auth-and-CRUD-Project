<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user List</title>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php $session  = session() ?>
    <nav class="navbar navbar-inverse navbar-dark bg-info-subtle">
        <div class="container-fluid d-flex justify-content-between">
            <div class="navbar-header">
                <a class="navbar-brand text-dark" href="#">ADMIN WEBSITE</a>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <i class="bi bi-person-fill me-3 fs-3"></i>
                <div>
                    <span class="text-light me-3 fs-4"><?php echo $session->get('fname') . " " . $session->get('lname'); ?>
                    </span>
                </div>
                <a class="btn btn-danger" href="/logout">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="d-flex justify-content-end">
            <a class="btn btn-dark me-3" href="/product_list">Manage product</a>
            <a class="btn btn-success me-3" href="/add_user_form">Add User</a>
        </div>
        <div class="mt-3">
            <table class="table table-bordered" id="user_list">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Firstname</th>
                        <th>User Lastname</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users) : ?>
                        <?php
                        $count = 1;
                        foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $user['us_fname']; ?></td>
                                <td><?php echo $user['us_lname']; ?></td>
                                <td><?php echo $user['us_name']; ?></td>
                                <td><?php echo $user['us_email']; ?></td>
                                <td><?php echo $user['us_role']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('/view_user_detail/' . $user['us_id']); ?>" class="btn btn-info">View Detail</a>
                                    <a href="<?php echo base_url('/edit_user_form/' . $user['us_id']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url('/delete_user/' . $user['us_id']); ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(() => {
            $('#user_list').DataTable();
        })
    </script>
</body>

</html>