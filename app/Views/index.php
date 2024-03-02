<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <!-- Content -->
        <div class="container-fluid">
            <!-- Brand -->
            <a href="#" class="navbar-brand">CI4 SYSTEM</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarToggle">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="/register" class="btn btn-secondary">Register</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="/login" class="btn btn-secondary">Login</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="/user_page" class="btn btn-secondary">Product</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <h1 class="text text-center">PHP CI4 CRUD+AUTH SYSTEM</h1>
        </div>
        <div class="row mt-5">
            <div class="col-lg-8 m-auto">
                <!-- การสร้าง Carousel -->
                <div class="carousel slide" id="slider1" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <button data-bs-target="#slider1" data-bs-slide-to="0"></button>
                        <button data-bs-target="#slider1" data-bs-slide-to="1"></button>
                        <button class="active" data-bs-target="#slider1" data-bs-slide-to="2"></button>
                        <button data-bs-target="#slider1" data-bs-slide-to="3"></button>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img src="https://cdn.pixabay.com/photo/2021/02/08/15/02/mountains-5995081__340.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Lorem ipsum dolor sit.</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi, nobis.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.pixabay.com/photo/2020/06/15/01/06/sunset-5299957__340.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Lorem ipsum dolor sit.</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi, nobis.</p>
                            </div>
                        </div>
                        <div class="carousel-item active">
                            <img src="https://cdn.pixabay.com/photo/2021/01/18/17/46/sunset-5928907__340.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Lorem ipsum dolor sit.</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi, nobis.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn.pixabay.com/photo/2021/01/21/14/10/egret-5937499__340.jpg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Lorem ipsum dolor sit.</h3>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi, nobis.</p>
                            </div>
                        </div>
                    </div>
                    <!-- ควบคุมการ Slide ผ่านปุ่ม -->
                    <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#slider1">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#slider1">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
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