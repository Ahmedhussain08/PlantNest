<?php 
session_start();
include("connect.php");
if(!isset($_SESSION['adminloggedin'] ) || $_SESSION['adminloggedin']!==true ){
  header("location:login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>PlantNest Admin</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://kit.fontawesome.com/d5e39b568f.js" crossorigin="anonymous"></script>
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                  <span>Admin</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
             
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items my-2 ">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="fa fa-list-alt"></i>
              </span>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow text-primary"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php?viewcat">View Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?addcat">Add Category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items my-2">
            <a class="nav-link" data-toggle="collapse" href="#basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
              <i class="fa-brands fa-product-hunt"></i>
              </span>
              <span class="menu-title">Products</span>
              <i class="menu-arrow text-primary"></i>
            </a>
            <div class="collapse" id="basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php?addproduct">Add Products </a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?viewproduct">View Products </a></li>
              </ul>
            </div>
          </li>
      
          <li class="nav-item menu-items my-2">
            <a class="nav-link" data-toggle="collapse" href="#ui-" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
              <i class="fa-solid fa-user"></i>
              </span>
              <span class="menu-title">USERS</span>
              <i class="menu-arrow text-primary"></i>
            </a>
            <div class="collapse" id="ui-">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="index.php?userdetail">USER DETAILS </a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?userfeedback">USER FEEDBACK </a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?usercontact">USER Contact </a></li>
              </ul>
            </div>
          </li>
         
     
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
            
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
              
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
               
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['admin']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                
                  <a href="logout.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <i class="mdi mdi-logout text-danger">logout</i>
                    </div>
                  </a>
                
                  <button type="button" class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
Change Password</button>
                  
                 
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           
          <?php 
          if(isset($_GET['viewcat'])){
            include("viewcat.php");
          }
          elseif(isset($_GET['addcat'])){
            include("addcat.php");
          }
          elseif(isset($_GET['addproduct'])){
            include("addproduct.php");
        }
          elseif(isset($_GET['viewproduct'])){
            include("viewproduct.php");
        }
       
          elseif(isset($_GET['userdetail'])){
            include("userdetail.php");
        }
          elseif(isset($_GET['userfeedback'])){
            include("userfeedback.php");
        }
          elseif(isset($_GET['usercontact'])){
            include("usercontact.php");
        }
          else{
            include("sales.php");
          }
        
          ?>
           
            
         
        
              </div>
       
            </div>
            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="current-password" class="col-form-label">Enter Current Password</label>
                        <input name="currentpassword" type="password" class="form-control" id="current-password">
                    </div>
                    <div class="mb-3">
                        <label for="new-password" class="col-form-label">Enter New Password</label>
                        <input name="newpass" type="password" class="form-control" id="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-new-password" class="col-form-label">Confirm New Password</label>
                        <input name="cnewpass" type="password" class="form-control" id="confirm-new-password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button name="changepass" type="submit" class="btn btn-success">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    
    <!-- End custom js for this page -->
  </body>
</html>

<?php 
if (isset($_POST['changepass'])) {
    $currentpass = $_POST['currentpassword'];
    $newpass = $_POST['newpass'];
    $cnewpass = $_POST['cnewpass'];

    if ($newpass !== $cnewpass) {
        echo '<script>
            swal("Error!", "Enter the same password!", "error").then(function() {
                window.location.href = "index.php"; 
            });
        </script>';
    } else {
        $passQuery = mysqli_query($connect, "SELECT * FROM admin WHERE admin_name = '{$_SESSION["admin"]}' ");
        $num = mysqli_num_rows($passQuery);

        if ($num == 1) {
            $row = mysqli_fetch_assoc($passQuery);
            
            // Compare plain text passwords
            if ($currentpass == $row['admin_password']) {
                $updatedpassword = $cnewpass;
                $updateQuery = mysqli_query($connect, "UPDATE admin SET admin_password = '$updatedpassword' WHERE admin_name = '{$_SESSION["admin"]}'");

                if ($updateQuery) {
                    echo '<script>
                        swal("Success!", "Password updated Successfully!", "success").then(function() {
                            window.location.href = "index.php"; 
                        });
                    </script>';
                } else {
                    echo '<script>
                        swal("Error!", "Password not updated!", "error").then(function() {
                            window.location.href = "index.php"; 
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal("Error!", "Password not matched!", "error").then(function() {
                        window.location.href = "index.php"; 
                    });
                </script>';
            }
        } else {
            echo '<script>
                swal("Error!", "User not Found!", "error").then(function() {
                    window.location.href = "index.php"; 
                });
            </script>';
        }
    }
}
?>
