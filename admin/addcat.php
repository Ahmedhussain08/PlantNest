<?php
include('connect.php');
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $sql = mysqli_query($connect, "INSERT INTO categories (Category_Name) VALUES ('$name')");
    if ($sql) {
        // Display success message using HTML
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Holy Success</strong> New Category Added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        
        echo '<script>
            setTimeout(function() {
                window.location.href = "index.php?addcat";
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
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />

    <title>Add Category</title>

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
      <h1 class="text-center text-success">INSERT NEW CATEGORY</h1>
      <div class="row">
      <div class="col-lg-11 col-md-9 col-xl-10 col-sm-6 grid-margin stretch-card mx-auto rounded">


              <form method="POST" class="mt-3 p-3 col-lg-11 col-md-9 col-xl-10 col-sm-6">
              
                  <div class="form-group mt-4">
                      <label for="exampleInputEmail1 mb-1">Enter Category Name</label>
                      <input required name="name" type="text" class="form-control mt-2 text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                  <div class="form-group mt-4">
                      <button name="btn" type="submit" class="btn btn-light text-success  mt-2 p-3 text-center  w-100 fw-bold">ADD CATEGORY</button>
                    </div>
                  
                </form>
            </div>
</div>
    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>


