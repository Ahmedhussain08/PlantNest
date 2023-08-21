<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Userdetail</title>
       <!-- plugins:css -->
       <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
       <script src="jquery.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  
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
    
</head>
<body>
  <h1 class="text-center text-success ">USER DETAILS</h1>
    <div class="row text-center mt">
              <div class="col-lg-11 col-md-10 col-xl-10 col-sm-6 grid-margin mx-auto rounded ">
            
                      <table id="example" class=" display table text-white my-2">
                        <thead >
                          <tr class="bg-white">
                          <th class="text-center text-danger"> ID </th>
                            <th class="text-center text-danger"> Username </th>
                            <th class="text-center text-danger"> Email </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                     $i=1;
                         $row = mysqli_query($connect,"SELECT * FROM users");
                         while($data = mysqli_fetch_array($row))
                         {
                             
                             echo 
                             '
                             <tr class="border" >
                             <td class="border text-success fw-bold fs-2" >'.$i++.'</td>
                             <td class="border fw-bold fs-3 text-uppercase">'.$data[1].'</td>
                             <td class="border"> '.$data[2].'</td>
                             </tr>
                             
                             ';
                         
                         }  
                         

                     ?>

                        </tbody>
                      </table>
                    </div>
               
    </div>

    <script>$('#example').DataTable();</script>

     
</body>
</html>