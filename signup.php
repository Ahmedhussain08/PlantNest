<?php
session_start();
include ("connect.php");
?>
<?php
$passerror = $usererror = $emailerror = false;
if(isset($_POST['btn'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $existusername  = mysqli_query($connect,"select * from users where username = '$username' ");
    $existemail = mysqli_query($connect,"select * from users where user_email = '$email' ");
    $existuser = mysqli_num_rows($existusername);
    $existmail = mysqli_num_rows($existemail);
    if($password!==$cpassword){
        $passerror=true;
    }
    if($existuser){
        $usererror =true;

        // header("location:signup.php");
    }
    
    if($existmail){
        $emailerror =true;
        // echo "email already exist";
    }
    if(!$emailerror&&!$usererror && !$passerror){        
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                $query = mysqli_query($connect,"INSERT INTO users (username,user_email,Password) values ('$username','$email','$hashpassword') ");
                // $num = mysqli_num_rows($query);
                if($query){
                    $_SESSION['username']=$username;
                    header("location:login.php");
                }
            
        }
        
        
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantnest - signup</title>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="https://kit.fontawesome.com/d5e39b568f.js" crossorigin="anonymous"></script>
   <script src="./js/bootstrap/bootstrap.min.js"></script>
    <!-- Optional theme -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
      body{
            background-color: whitesmoke !important;
        }
.alert{
    background-color: red !important;
}
 #signup{
            background-color:#198754 !important;
            color: whitesmoke !important;
        }
        #signup:hover{
            background-color: rgb(112, 199, 69) !important;
            color: whitesmoke  !important;
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
        <h1 class="text-center  mt-3 fw-bold fs-1">SIGNUP TO CONTINUE</h1>
        <!-- <a href="read.php" class="btn btn-danger">View Category</a> -->
        <div id="row" class="row text-center mx-auto d-flex justify-content-center mx-auto text-center bg-drk">
            <div id="col" class="col-md-10 mx-auto text-center rounded">

      <form class="mx-auto rounded-5 dark d-flex flex-column justify-content-center mt-4 col-md-8" action="" method="POST" enctype="multipart/form-data">
      <div class="parentdiv mt-4 mx-auto col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center " >  <i class="fa-solid fa-user-plus text-success"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input id="name" name="name" class=" input form-control form-control-lg " type="text" placeholder="ENTER USERNAME" required>  </div>
      </div>
      <?php if($usererror==true){
         echo'<span class="text-danger fs-3 text-center col-md-10 fw-bold">Username Already Exists</span>';
        }
          ?>
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-at text-success"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="email" class=" input form-control form-control-lg " type="email" placeholder="ENTER EMAIL" required>  </div>
      </div>
      <?php if($emailerror==true){
         echo'<span class="text-danger fs-3 text-center col-md-10 fw-bold">Email Already Exists</span>';
        }
          ?>

     
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-lock text-success"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input name="pass" class=" input form-control form-control-lg " type="password" placeholder=" PASSWORD" required>  </div>
      </div>
      <div class="parentdiv mx-auto d-flex flex-row col-md-10 rounded mb-3" >
        <div class=" icon col-md-1 d-flex justify-content-center" >  <i class="fa-solid fa-key text-success"></i> </div>
        <div class="me-2 input-div col-md-10 p-2">  <input class=" input  form-control form-control-lg " type="password" name="cpass" placeholder="RE-TYPE PASSWORD" required>  </div>
        </div>
      <?php if($passerror==true){
         echo'<span class="text-danger fs-3 text-center col-md-10 fw-bold">Password do not match</span>';
        }
          ?>
      <div class=" mx-auto d-flex flex-row col-md-11  rounded " >
        <button id="signup" class=" mx-1 btn  p-2 text-bold fs-3 fw-bold" name="btn" type="submit">SIGN UP</button>
</div>
    <div id="buttons" class="  mt-5 mx-auto col-md-8 fs-2 fw-bold">
        <a style="text-decoration: none;" class="fs-4 text-muted mx-3">Already a User </a>
        <a class=" col-md-" href="login.php">Login Here</a>
    </div>

</form>
</div>
</div>
</div>
</body>
</html>
