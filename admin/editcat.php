<?php 
include ("connect.php");
if(isset($_GET['editcat'])){
        $editcat = $_GET['editcat'];
        $sql = mysqli_query($connect,"select * from categories where Category_Id = '$editcat'");
        $result = mysqli_fetch_array($sql);

}
if(isset($_POST['btn'])){
    $editname = $_POST['editname'];
    $sql = mysqli_query($connect, "UPDATE categories SET Category_Name = '$editname' WHERE Category_Id = '$editcat'");

    if($sql){    
      header("location:index.php?viewcat");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
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
<div class="container p-2">
<h1 class="text-center text-success mt-4">Update CATEGORY</h1>

      <div class="row ">
      <div class="col-lg-11 col-md-9 col-xl-10 col-sm-6 grid-margin stretch-card mx-auto rounded">


              <form method="POST" class="mt-3 p-3 col-lg-11 col-md-9 col-xl-10 col-sm-6">
              
                  <div class="form-group mt-4">
                      <label for="exampleInputEmail1 mb-1 mt-2">Edit Category Name</label>
                      <input required value="<?php echo $result[1]  ?>" name="editname" type="name" class="form-control mt-2 bg-dark text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                  <div class="form-group mt-4">
                      <button name="btn" type="submit" class="btn btn-light text-success mt-2 p-2 text-center w-100 ">Edit CATEGORY</button>
                    </div>
                  
                </form>
            </div>
</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>