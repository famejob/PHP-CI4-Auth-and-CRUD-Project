<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php

    use function PHPSTORM_META\type;

    $session  = session() ?>
    <nav class="navbar navbar-inverse navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-between">
            <div class="navbar-header">
                <a class="navbar-brand text-light" href="#">USER WEBSITE</a>
                <a href="/" class="btn btn-secondary">Home</a>
                <a href="/register" class="btn btn-secondary">Register</a>
                <a href="/login" class="btn btn-secondary">Login</a>
                <a href="/user_page" class="btn btn-secondary">Product</a>
            </div>
            <?php if ($session->get('isLoggedIn')) : ?>
                <div class="d-flex justify-content-end align-items-center">
                    <i class="bi bi-person text-light me-3 fs-3"></i>
                    <div>
                        <span class="text-light me-3 fs-4"><?php echo $session->get('fname') . " " . $session->get('lname'); ?>
                        </span>
                    </div>
                    <a class="btn btn-danger" href="/logout">Logout</a>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center">
            <h1 class="text text-center">PHP CI4 CRUD+AUTH SYSTEM</h1>
            <form action="/search" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="search" placeholder="ค้นหาสินค้า" class="form-control">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
            <?php if (!empty($products_search)) : ?>
                <?php foreach ($products_search as $product) : ?>
                    <div class="card mt-3 mb-3" style="width: 18rem;">
                        <img src="<?php echo base_url($product['pd_img_url']); ?>" class="card-img-top" width="300px" height="300px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $product['pd_name'] ?></h5>
                            <h5 class="card-title text-center"><?= $product['pd_price'] . " " . "บาท" ?></h5>
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-warning me-2">Buy</a>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <?php $totalPages =  ceil($totalRows / $perPage); ?>
                        <?php if ($currentPage > 1) : ?>
                            <li class="page-item"><a href="?page=<?= $currentPage - 1 ?>&search=<?= $searchTerm ?>" class="page-link">Previous</a></li>
                        <?php endif; ?>
                        <?php if ($currentPage > 3) : ?>
                            <li class="page-item"><a href="?page=1&search=<?= $searchTerm ?>" class="page-link">1</a></li>
                        <?php endif; ?>
                        <?php if ($currentPage > 4) : ?>
                            <li class="page-item"> <span class="page-link">...</span></li>
                        <?php endif; ?>
                        <?php for ($i = max(1, $currentPage - 2); $i <= min($currentPage + 2, $totalPages); $i++) : ?>
                            <li class="page-item <?= $currentPage == $i ? 'active' : '' ?>"><a href="?page=<?= $i ?>&search=<?= $searchTerm ?>" class="page-link"><?php echo $i ?></a></li>
                        <?php endfor; ?>
                        <?php if ($currentPage < $totalPages - 2) : ?>
                            <li class="page-item"><span class="page-link">...</span></li>
                        <?php endif; ?>
                        <?php if ($currentPage <= $totalPages - 3) : ?>
                            <li class="page-item"><a href="?page=<?= $totalPages ?>&search=<?= $searchTerm ?>" class="page-link"><?= $totalPages ?></a></li>
                        <?php endif; ?>
                        <?php if ($totalPages > $currentPage * $perPage) : ?>
                            <li class="page-item"><a href="?page=<?= $currentPage + 1 ?>&search=<?= $searchTerm ?>" class="page-link">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php else : ?>
                <h1 class="text text-center">No products found.</h1>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">© 2024 Company, Inc</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>