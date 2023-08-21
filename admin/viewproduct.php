<?php
include("connect.php");
$error = '';
$success = false;
if(isset($_GET['deletepro'])){

    try {
        $deletepro = $_GET['deletepro'];
        $sql = mysqli_query($connect,"delete from plants where Plant_Id = '$deletepro'");
        $success = true;
    }
    catch (mysqli_sql_exception $e) {
        // Display your custom error message
        $error= "<p class='text-danger mx-2 my-1'>Unable to delete product: This product is currently in orders</p>";
    }
}
if ($success) {
    header("location:index.php?viewproduct");
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
       <script src="jquery.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

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
        #card .card-title,
		.card-text {
			display: -webkit-box !important;
			-webkit-line-clamp: 1 !important;
			-webkit-box-orient: vertical !important;
			overflow: hidden;
		}

		#card {
			transition: 0.1s ease-in-out;
		}

		#card:hover {
			transform: scale(1.040);
			border: 2px solid black !important;
			box-shadow: 2px 2px solid black;
		}
    </style>
</head>
<body>
    <a href="index.php?addcat" class="btn btn-light text-success my-2">ADD NEW</a>
    <p><?php echo $error; ?></p>
        <div class="row">
            <div class="col-lg-11 col-md-9 col-xl-11 col-sm-9 grid-margin mx-auto rounded">
                 <table id="example" class=" display table  text-white ">
                 <thead >
                          <tr class="bg-white">
                            <th class="text-danger"> S.No </th>
                            <th class="text-danger"> Product Name </th>
                            <th class="text-danger"> Price </th>
                            <th class="text-danger"> image </th>
                            <th class="text-danger"> Stock </th>
                            <th class="text-danger"> Action </th>
                            
                          </tr>
                        </thead>
                     <?php
                     $i=1;
                         $product = mysqli_query($connect,"select * from plants");
                         while($data = mysqli_fetch_array($product))
                         {
                             
                             echo 
                             '
                             <tr class="border " >
                             <td class="border  fw-bold fs-2" >'.$i++.'</td>
                             <td class="border  fw-bold fs-3 text-uppercase">'.$data[1].'</td>
                            
                             <td class="border  fw-bold fs-3 text-uppercase">'.$data[3].'</td>
                             <td class="border  fw-bold fs-3 text-uppercase"> <img src="./productimages/'.$data[4].'" alt="'.$data[1].'" width="500" height="600">
                             </td>
                             <td class="border  fw-bold fs-3 text-uppercase">'.$data[6].'
                             </td>
                             <td class="border " >    <a href="edit-product.php?editpro='. $data[0].'" class="btn btn-secondary">Edit</a>
                             <a href="viewproduct.php?deletepro='. $data[0].'" class="btn btn-danger">Delete</a></td>
                             </tr>
                             
                             ';
                         
                         }
                        ?>
                 </table>
               
            </div>
        </div>
        
</body>
<script>$('#example').DataTable();</script>

</html>