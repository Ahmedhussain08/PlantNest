<?php
session_start();
include("connect.php");
$error = false;

if (isset($_POST['login'])) {
    $name = $_POST['username'];
    $password = $_POST['pass'];
    $query = mysqli_query($connect, "SELECT * FROM admin WHERE admin_name = '$name' AND admin_password = $password");
    
    if ($query && mysqli_num_rows($query) > 0) {
        $_SESSION["adminloggedin"] = true;
        $_SESSION["admin"] = $name;
        header("location: index.php");
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/d5e39b568f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body{
            background-color: whitesmoke !important;
        }
.alert{
    background-color: red !important;
}
        button{
            background-color:#198754!important;
            color: whitesmoke !important;
        }
        button:hover{
            background-color: whitesmoke !important;
            color: #198754 !important;
        }
        h1,a{
            color: #198754 !important;
        }
       
        .parentdiv{
            border: 1px solid rgb(112, 199, 69) !important;
            display: flex !important;
            justify-content:center !important;
            align-items: center !important;
             padding: 3px 15px; 
        }  
        ::placeholder{
            color: rgb(112, 199, 69) !important;
        }
        
        #col{
            display: flex !important;
            justify-content: center !important;
        }
       #row{
        display: flex !important;
        justify-content: center !important;
       }
    
       input[type=text],[type=email],[type=password]
       {
         border: none ;
         outline: none !important;
         color:rgb(112, 199, 69) !important;
      /* border-bottom: 2px solid white; */
         border-radius: 0;
         background: transparent !important;
         transition: 0.1s ease;
    }
       .input:focus{
         border: none ;
         outline: none !important;
         color:rgb(112, 199, 69) !important;
         border-bottom: 2px solid rgb(112, 199, 69) !important;
         background: transparent !important;
    }
    .form-control:focus {
  border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
}

        .input-div{
        
            margin-right: 1px;
        }
        .input-div input{
            width: 100%;
        }
        .icon{
            display: inline-block;
        }
        .icon i{
            font-size: 2rem;
        }
         #buttons{
            display:flex !important;
            justify-content:end !important;
            align-items: center !important;
        }
        .btn{
            width:100%;
        }
        #or{
            display:inline-block !important;
            margin-right:15px;
            margin-left:15px;
            margin-top:5px;
        }
    </style>
</head>
<body>
    
<div class="container mt-5 p-3">
        <h1 class="text-center  mt-3 fw-bold fs-1">LOG IN TO CONTINUE</h1>
        <!-- <a href="read.php" class="btn btn-danger">View Category</a> -->
        <div id="row" class="row text-center mx-auto d-flex justify-content-center mx-auto text-center bg-drk">
            <div id="col" class="col-md-10 mx-auto text-center ">

      <form class="mx-auto dark d-flex flex-column justify-content-center mt-4 col-md-8" action="" method="POST">
      
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-at text-success"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="username" class=" input form-control form-control-lg " type="text" placeholder="ENTER USERNAME">  </div>
      </div>

      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-lock text-success"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="pass" class=" input form-control form-control-lg " type="password" placeholder=" PASSWORD">  </div>
      </div>
      <?php
  
  if($error==true){
   echo '<div class="alert col-md-10 mx-auto text-center text-white alert-dismissible fade show" role="alert">
   <strong class="text-white">Error</strong> <small> Invalid Email or Password. Check database.</small>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<script>
   setTimeout(function() {
      window.location.href = "login.php";
   }, 3000); // Adjust the delay as needed
</script>';
  }?>
      <div class=" mx-auto d-flex flex-row col-md-11  rounded " >
        <button class=" mx-3 btn  p-2 text-bold fs-3 fw-bold" name="login" type="submit">LOG IN</button>
      </div>
      
 
</form>
</div>
</div>
</div>

</body>
</html>
