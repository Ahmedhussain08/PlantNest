<?php 
session_start();
include("connect.php");
?>
<?php
if (isset($_POST['login'])) {
   
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $logindata = mysqli_query($connect, "SELECT * FROM users WHERE username  = '$username' ");
    $num = mysqli_num_rows($logindata);
    if($num==1){
        $row = mysqli_fetch_assoc($logindata);
            if(password_verify($pass, $row['Password'])){
                $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row['username'];
        header("location:index.php");
        exit;
            }
            else{
        $_SESSION['loginerror'] =true;
                
            }
    
        
    }

    else{
        $_SESSION['loginerror'] =true;
        // header("location:login.php");
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlantNest - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/d5e39b568f.js" crossorigin="anonymous"></script>
<script src="./js/bootstrap/bootstrap.min.js"></script>    <!-- Optional theme -->
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body{
            background-color: whitesmoke !important;
        }
.alert{
    background-color: red !important;
}
       button{
            background-color:#198754 !important;
            color: whitesmoke !important;
        }
        button:hover{
            background-color: rgb(112, 199, 69) !important;
            color: whitesmoke !important;
        }
        h1,a{
            color: #198754 !important;
        }
        #signup:hover{
            color: rgb(112, 199, 69) !important;
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
       .parentdiv .icon i{
            font-size: 2rem;
            color: #198754 !important;
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
<body class="dark">
    
<div class="container mt-5 p-3">
        <h1 class="text-center  mt-3 fw-bold fs-1">LOG IN TO CONTINUE</h1>
        <div id="row" class="row text-center mx-auto d-flex justify-content-center mx-auto text-center bg-drk">
            <div id="col" class="col-md-10 mx-auto text-center ">

      <form class="mx-auto dark d-flex flex-column justify-content-center mt-4 col-md-8" action="" method="POST" enctype="multipart/form-data">
      
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-at "></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="username" class=" input form-control form-control-lg " type="text" placeholder="ENTER EMAIL OR USERNAME">  </div>
      </div>

      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-lock text-success"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="pass" class=" input form-control form-control-lg " type="password" placeholder=" PASSWORD">  </div>
      </div>
      <?php
  
  if(isset($_SESSION['loginerror'])){
   echo '<div class="alert  col-md-10 mx-auto text-center text-white  alert-dismissible fade show" role="alert">
   <strong class="text-white">Error</strong> <small> Invalid Email or Password</small>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
  }?>
      <div id="logindiv" class=" mx-auto d-flex flex-row col-md-11  rounded " >
        <button  class=" mx-3 btn  p-2 text-bold fs-3 fw-bold" name="login" type="submit">LOG IN</button>
</div>
    <div id="buttons" class="  mt-5 mx-auto col-md-10 fs-2 fw-bold">
        <a style="text-decoration: none;" class="fs-2 col-md-8 text-muted mx-4">Not have account </a>
        <a id="signup" style="text-decoration: none;" class=" col-md-4" href="signup.php">SIGN UP </a>
    </div>
 
</form>
</div>
</div>
</div>

<script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
</body>
</html>
