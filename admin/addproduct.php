<?php
include ('connect.php');
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $imagename = $_FILES['filename']['name'];
    $imagelocation = $_FILES['filename']['tmp_name'];
    $catid  = $_POST['catid'];
    $stock = $_POST['stock'];
    move_uploaded_file($imagelocation,'productimages/'.$imagename);
    $sql = mysqli_query($connect,"INSERT INTO plants ( Plant_Name, Description, Price, image, Category_Id,stock) VALUES ( '$name', '$desc', '$price', '$imagename', '$catid','$stock')");
    if ($sql) {
        // Display success message using HTML
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy Success</strong> New Product Added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        
        echo '<script>
            setTimeout(function() {
                window.location.href = "index.php?addproduct";
            }, 1000); 
        </script>';
        
        exit;
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy Error!</strong> data not save.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add product</title>
   <!-- plugins:css -->
   <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        ::placeholder{
            color: rgb(183, 186, 201) !important;

        }
    </style>
</head>
<body>
<h1 class="text-center text-success">INSERT NEW PRODUCT</h1>
<form method="POST" class="mt-3 p-3" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-md-6 my-4  text-white">
            <label for="name">Enter PRODUCT Name</label>
            <input name="name" type="text" class="form-control text-white" id="name" placeholder="Enter name" required>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="desc">Enter PRODUCT DESCRIPTIONS</label>
            <input name="desc" type="text" class="form-control text-white" id="desc" placeholder="Enter description" required>
        </div>

        <div class="col-md-6 my-4  text-white">
            <label for="price">Enter PRODUCT PRICE</label>
            <input name="price" type="number" class="form-control text-white" id="price" placeholder="Enter price" required>
        </div>
    

        <div class="col-md-6 my-4  text-white">
            <label for="filename">SELECT IMAGE</label>
            <input name="filename" type="file" class="form-control-file" required >
        </div>
        
        <div class="col-md-6 my-4  text-white">
            <label for="catid">SELECT CATEGORY</label>
            <select class="form-control text-white" name="catid" id="catid" required>
                <option selected  value="">SELECT CATEGORY</option>
                <?php
                    $c = mysqli_query($connect,"select * from categories");
                    while($row = mysqli_fetch_array($c))
                    {
                        echo '<option value="'.$row[0].'">' .$row[1].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="stock">INSERT STOCK</label>
            <input name="stock" type="text" class="form-control text-white" required >
        </div>

    </div>
    <button name="btn" type="submit" class="btn btn-light text-success fw-bolder mt-1 text-center col-md-12 p-3 mx-auto">ADD PRODUCT</button>
</form>


    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     <script>
        window.onbeforeunload = null;
     </script>
</body>
</html>

