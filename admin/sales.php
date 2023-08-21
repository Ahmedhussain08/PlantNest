<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>
<div class="row text-center ">
           
           <div class="col-md-8 col-sm-4 grid-margin mx-auto">
             <div class="card mx-auto">
               <div class="card-body">
                 <h2 class="text-danger my-2 text-center">TOTAL SALE </h2>
                 <div class="row">
                   <div class="col-8 col-sm-12 col-xl-8 my-auto ">
                     <div class="d-flex d-sm-block d-md-flex align-items-center justify-content-center p-3">
                       <?php 
                       $sql = mysqli_query($connect,"select sum(Total_Amount) from orders ");
                       $sales = mysqli_fetch_array($sql);
                         ?>
                   <?php  echo  '<h2 class="mb-1 mt-2 text-success text-center">&#x20B9 ' .$sales[0]. ' <span class="text-success"> PKR </span>  </h2>' ?>
                     </div>
                     <h6 class="text-muted font-weight-normal"> Since Start From Now</h6>
                   </div>
                  
                 </div>
               </div>
             </div>
           </div>
            
         </div>
<div class="row text-center ">
           
           <div class="col-md-8 col-sm-4 grid-margin mx-auto">
             <div class="card mx-auto">
               <div class="card-body">
                 <h2 class="text-danger my-2 text-center">TOTAL PRODUCTS SOLD </h2>
                 <div class="row">
                   <div class="col-8 col-sm-12 col-xl-8 my-auto ">
                     <div class="d-flex d-sm-block d-md-flex align-items-center justify-content-center p-3">
                       <?php 
                       $count = mysqli_query($connect,"SELECT COUNT(*)  FROM orders ");
                       $countsold = mysqli_fetch_array($count);
                         ?>
                   <?php  echo  '<h2 class="mb-1 mt-2 text-success text-center">' .$countsold[0]. ' <span class="text-success"> Products Sold </span>  </h2>' ?>
                     </div>
                   </div>
                  
                 </div>
               </div>
             </div>
           </div>
            
         </div>
</body>
</html>

