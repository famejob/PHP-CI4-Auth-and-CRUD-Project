<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Product Detail</title>
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
            <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
        </ol>
    </nav>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="">
                <h1 class=" mb-3">PRODUCT DETAIL</h1>
                <div class="d-flex justify-content-center mb-3">
                    <img src="<?php echo base_url($product_obj['pd_img_url']); ?>" alt="" srcset="" class="img-circle" width="400px" height="300px">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" id=name" placeholder="Input your product name" value="<?php echo $product_obj['pd_name']; ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Product Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Input your product description" class="form-control" readonly><?php echo htmlspecialchars($product_obj['pd_desc']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="text" name="price" id="price" placeholder="Input your product price" class="form-control" value="<?php echo $product_obj['pd_price']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <a class="btn btn-dark" href="/product_list">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>