<?php
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
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
    
</head>
<body>
  <h1 class="text-center text-success ">USER FEEDBACK</h1>
    <div class="row text-center mt">
              <div class="col-lg-12 col-md-10 col-xl-10 col-sm-6 grid-margin mx-auto rounded ">
            
                      <table class="table text-white my-2">
                        <thead >
                          <tr class="bg-white">
                            <th class="text-center text-danger">  User Name </th>
                            <th class="text-center text-danger"> Feeedback </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                     
                         $row = mysqli_query($connect,"SELECT * FROM feedback");
                         while($data = mysqli_fetch_array($row))
                         {
                             
                             echo 
                             '
                             <tr class="border" >
                             <td class="border fw-bold fs-3 text-uppercase">'.$data[2].'</td>
                             <td class="border"> '.$data[3].'</td>
                            
                             </tr>
                             
                             ';
                         
                         }  
                         

                     ?>

                        </tbody>
                      </table>
                    </div>
               
    </div>
     
</body>
</html>