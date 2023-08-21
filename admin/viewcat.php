<?php
include("connect.php");
$error = '';
$success = false;

if(isset($_GET['deleteid'])){
    try {
        $del = $_GET['deleteid'];
        $delete = mysqli_query($connect,"DELETE FROM Categories WHERE Category_Id ='$del'");
        $success = true;
    }
    catch (mysqli_sql_exception $e) {
        // Display your custom error message
        $error= "<p my-1 mx-2 text-danger>Unable to delete category: This category is currently being used by one or more products.</p>";
    }
}

if ($success) {
    header("location:index.php?viewcat");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Category</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
       <script src="jquery.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />

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
      #color{
        color:blue !important;
        background-color: white !important;
      }
    </style>
</head>
<body>
    <a href="index.php?addcat" class="btn btn-light text-success my-2">ADD NEW</a>
    <p><?php echo $error; ?></p>
        <div class="row">
            <div class="col-lg-11 col-md-9 col-xl-10 col-sm-9 grid-margin mx-auto rounded">
                 <table id="example" class=" display table  text-white ">
                 <thead>
                          <tr class="bg-white">
                            <th class="text-danger"> S.No </th>
                            <th class="text-danger"> Category Name </th>
                            <th class="text-danger"> Action </th>
                            
                          </tr>
                        </thead>
                     <?php
                     $i=1;
                         $row = mysqli_query($connect,"select * from categories");
                         while($data = mysqli_fetch_array($row))
                         {
                             
                             echo 
                             '
                             <tr class="border " >
                             <td class="border  fw-bold fs-2" >'.$i++.'</td>
                             <td class="border  fw-bold fs-3 text-uppercase">'.$data[1].'</td>
                             <td class="border " ><a href="editcat.php?editcat='.$data[0].'" class="btn btn-primary" >
                             EDIT
                           </a>
                             <a href="viewcat.php?deleteid='.$data[0].'" class= "btn btn-danger"> delete <a/></td>
                             </tr>
                             
                             ';
                         
                         }
                         if(isset($_GET['editid'])){
                             
                             $ed = $_GET['editid'];
                             if(isset($_POST['editbtn'])){
                                $editname = $_POST['name'];
                                $edit = mysqli_query($connect,"UPDATE categories SET Category_Name = '$editname' WHERE Category_Id = '$ed'");
                                
                                // header("location:index.php?viewcat");
                            }
                        }
                        
                         
                         

                     ?>
                 </table>
               
            </div>
        </div>
</body>

    <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    <script>$('#example').DataTable();</script>

</html>



