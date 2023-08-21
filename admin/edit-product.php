<?php 
include ("connect.php");
if(isset($_GET['editpro'])){
        $editpro = $_GET['editpro'];
        $sql = mysqli_query($connect,"select * from plants where Plant_Id = '$editpro'");
        $result = mysqli_fetch_array($sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
    <h1 class="text-center text-success mt-4">Update Product</h1>
<div class="col-11 mx-auto">
<form method="POST" class="mt-3 p-3" enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-md-6 my-4  text-white">
            <label for="name">Enter PRODUCT Name</label>
            <input value="<?php echo $result[1] ?>" name="name" type="text" class="form-control text-white" id="name" placeholder="Enter name" required>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="price">Enter PRODUCT PRICE</label>
            <input value="<?php echo $result[3] ?>" name="price" type="number" class="form-control text-white" id="price" placeholder="Enter price" required>
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="desc">Enter PRODUCT DESCRIPTIONS</label>
            <input value="<?php echo $result[2] ?>" name="desc" type="text" class="form-control text-white" id="desc" placeholder="Enter description" required>
        </div>

        <div class="col-md-6 my-4  text-white">
            <label for="filename">SELECT IMAGE</label>
            <input value="<?php echo $result[5] ?>" name="filename" type="file" class="form-control-file" required >
        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="catid">SELECT CATEGORY</label>
            <select class="form-control text-white" name="catid" id="catid" required>
    <option value="">SELECT CATEGORY</option>
    <?php
        $c = mysqli_query($connect,"select * from categories");
        while($row = mysqli_fetch_array($c))
        {
            if ($row[0] == $result[5]) {
                echo '<option value="'.$row[0].'" selected>' .$row[1].'</option>';
            } else {
                echo '<option value="'.$row[0].'">' .$row[1].'</option>';
            }
        }
    ?>
</select>

        </div>
        <div class="col-md-6 my-4  text-white">
            <label for="stock">INSERT STOCK</label>
            <input value="<?php echo $result[6] ?>" name="stock" type="text" class="form-control text-white" required >
        </div>
       
    </div>
    <button name="btn" type="submit" class="btn btn-light text-success mt-1 text-center col-md-12 p-3 mx-auto">ADD PRODUCt</button>
</form>
</div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>

<?php
if(isset($_POST['btn'])){
    $editname = $_POST['name'];
    $editdesc = $_POST['desc'];
    $editprice = $_POST['price'];
    $editcatid = $_POST['catid'];
    $imagename = $_FILES['filename']['name'];
    $imagelocation = $_FILES['filename']['tmp_name'];

    // Move uploaded image to the uploads folder
    move_uploaded_file($imagelocation,'productimages/'.$imagename);
    $stock = $_POST['stock'];
  

    $editsql = mysqli_query($connect, "UPDATE plants SET Plant_Name = '$editname',  Description = '$editdesc',price = '$editprice', Category_Id = '$editcatid', image = '$imagename',stock = '$stock' WHERE Plant_Id = '$editpro'");

    if($editsql){
      header("location:index.php?viewproduct");
    }
}
?>