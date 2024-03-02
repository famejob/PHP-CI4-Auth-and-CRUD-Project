<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Product</title>
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
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
        </ol>
    </nav>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="/edit_product" id="editproductForm" method="post" enctype="multipart/form-data">
                <h1 class="mb-3">EDIT PRODUCT</h1>
                <input type="hidden" name="id" id="id" value="<?php echo $product_obj['pd_id']; ?>">
                <div class="d-flex justify-content-center mb-3">
                    <img src="<?php echo base_url($product_obj['pd_img_url']); ?>" alt="" srcset="" class="img-circle" width="300px" height="200px">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" id=name" placeholder="Input your product name" value="<?php echo $product_obj['pd_name']; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Product Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Input your product description" class="form-control"><?php echo htmlspecialchars($product_obj['pd_desc']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="text" name="price" id="price" placeholder="Input your product price" class="form-control" value="<?php echo $product_obj['pd_price']; ?>">
                </div>
                <div class="mb-3">
                    <img id="previewImage" src="#" alt="Preview Image" style="display:none; max-width:300px; max-height:300px;">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" id="submit" value="Update" class="btn btn-success">
                    <a class="btn btn-dark" href="/product_list">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#editproductForm').validate({
                rules: {
                    name: {
                        required: true
                    },
                    desc: {
                        required: true
                    },
                    price: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Please enter product name"
                    },
                    desc: {
                        required: "Please enter product description "
                    },
                    price: {
                        required: "Please enter product price"
                    }
                }
            })
            $('#image').change(function(event) {
                const file = event.target.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                    $('#previewImage').css('display', 'block');
                }

                if (file) {
                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
</body>

</html>