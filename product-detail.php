<?php
session_start();
include("connect.php");

if (isset($_POST['add_to_cart'])) {
    $_SESSION['cart'][] = array(
        "image" => $_POST['image'],
        "proid" => $_POST["id"],
        "name" => $_POST["hiddenname"],
        "price" => $_POST["hiddenprice"],
        "qty" => $_POST["qty"]
    );
    header("location: shoping-cart.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product detail</title>
    <link rel="stylesheet" href="bootstrap.css">
    
    <!-- Title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <style>
        header{
            background-image: url(img/bg-img/secondheaderbg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 1;
        }
    </style>
</head>
<body>
     <!-- Preloader -->
     <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
<h2 class="text-white">PlantNest</h2>        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

<!-- ***** Top Header Area ***** -->
<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-header-content d-flex align-items-center justify-content-between">
                    <!-- Top Header Content -->
                    <div class="top-header-meta">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: infodeercreative@gmail.com</span></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +1 234 122 122</span></a>
                    </div>

                    <!-- Top Header Content -->
                    <div class="top-header-meta d-flex">
                        <!-- Admin Login -->
                        <div class="login">
                            <a style="font-size: 20px;" href="./admin/login.php"><i class="fa fa-user-circle fs-2" aria-hidden="true"></i> <span>admin</span></a>
                        </div>
                        <!-- Login -->
                        <?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
$sql = mysqli_query($connect, "SELECT * FROM users WHERE username = '{$_SESSION["username"]}'");
if ($sql) {
$row = mysqli_fetch_array($sql);
if ($row) {
?>
    <div class="login ml-auto">
        <a style="font-size: 20px;" href="#">
            <i class="fa fa-user fs-2" aria-hidden="true"></i> <span> <?php echo $row[1]; ?> </span>
        </a>
    </div>
    <div class="dropdown">
        <a class="fs-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
        <ul class="dropdown-menu">
            <li class="text-success"><a class="dropdown-item text-success" href="logout.php">Logout</a></li>
        </ul>
    </div>
<?php
} else {
    echo '<div class="login ml-auto">
        <a href="login.php" style="font-size: 20px;">
            <i class="fa fa-user fs-2" aria-hidden="true"></i> Login
        </a>
    </div>';
}
} else {
echo "Database query error: " . mysqli_error($connect);
}
} else {
echo '<div class="login ml-auto">
<a href="login.php" style="font-size: 20px;">
    <i class="fa fa-user fs-2" aria-hidden="true"></i> Login
</a>
</div>';
}
?>

                        <!-- <div class="login">
                            <a href="login.php" style="font-size: 20px;" href="#"><i class="fa fa-user fs-2" aria-hidden="true"></i> <span>Login</span></a>
                        </div> -->
                        <!-- Cart -->
                        <div class="cart">
                            <a style="font-size: 20px;" href="shoping-cart.php"><i class="fa fa-shopping-cart mt-2" aria-hidden="true"></i> <span>Cart <span class="cart-quantity fw-bold"><?php if (isset($_SESSION['cart'])) {
                                                                                                            echo count($_SESSION['cart']);
                                                                                                        } else {
                                                                                                            echo 0;
                                                                                                        } ?></span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ***** Navbar Area ***** -->
<div class="alazea-main-menu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="alazeaNav">

                <!-- Nav Brand -->
                <a href="index.php" class="nav-brand text-white">PlantNest</a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Navbar Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="#">Categories</a>
                                <ul class="dropdown">
                                <?php $cat = mysqli_query($connect, "select * from categories");
                            while ($row = mysqli_fetch_array($cat)) {
                            ?>
                                <li><a href="category.php?catdetail=<?php echo $row[0] ?>"> <?php echo $row[1] ?> </a></li>



                            <?php } ?>
                                        </ul>
                                    </li>
                                    
                                    <li><a href="blog.php">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.php">Blog</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </li>
                            <!-- <li><a href="shop.html">Shop</a></li>
                            <li><a href="contact.php">Contact</a></li> -->
                        </ul>

                        <!-- Search Icon -->
                        <div id="searchIcon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>

                    </div>
                    <!-- Navbar End -->
                </div>
            </nav>

            <!-- Search Form -->
            <div class="search-form">
                <form action="search.php" method="get">
                    <input required type="search" name="search" id="search" placeholder="Search Product Name or Category">
                    <button type="submit" class="d-none"></button>
                </form>
                <!-- Close Icon -->
                <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
        </div>
    </div>
</div>
</header>
  



     

    <section class="mt-5 p-4 ">
  <div class="container mt-5">
    <form action="product-detail.php" method="post" >
      <div class="row my-2 p-2">
        <?php  
        if(isset($_GET['productid'])) {
          $proid = $_GET['productid'];
          $p = mysqli_query($connect, "select * from plants where Plant_Id = '$proid'");
          while ($row = mysqli_fetch_array($p)) {
        ?>
        <div class="col-md-6 col-lg-7 p-2 mt-4">
          <img name="image" src="admin/productimages/<?php echo $row[4] ?>" class="img-fluid h-100" alt="...">
        </div>
        <div class="col-md-6 col-lg-5 d-flex flex-column justify-content-center p-2">
          <h4 class="text-success"><?php echo $row[1] ?></h4>
          <span class="text-muted  pt-3"> <?php echo $row[2] ?></span>
          <p class="text-success fw-bold my-2">RS : <?php echo $row[3] ?></p>
          <div class="input-group mb-3">
            <span class="input-group-text">Enter Quantity</span>
            <input value="1" class="form-control" type="number" name="qty" id="">
          </div>
          <button type="submit" name="add_to_cart" class="btn alazea-btn mt-3 fw-bold">Add To Cart</button>
          <input value="<?php echo $row[4] ?>" type="hidden" name="image">
          <input type="hidden" name="hiddenname" value="<?php echo $row[1] ?>">
          <input type="hidden" name="hiddenprice" value="<?php echo $row[3] ?>">
          <input type="hidden" name="id" value="<?php echo $row[0] ?>">
        </div>
        <?php 
          }
        }
        ?>
      </div>
    </form>
  </div>
</section>

 
    

<footer class="footer-area bg-img" style="background-image: url(img/bg-img/3.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                          <div class="widget-title">
                                <h5>PlantNest</h5>
                            </div>
                            <p>Lorem ipsum dolor sit samet, consectetur adipiscing elit. India situs atione mantor</p>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>QUICK LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <li><a href="#">Purchase</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Payment</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Return</a></li>
                                    <li><a href="#">Advertise</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Policities</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>BEST SELLER</h5>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <img src="img/bg-img/4.jpg" alt="">
                                </div>
                                <div class="product-info">
                                    <a href="#">Cactus Flower</a>
                                    <p>$10.99</p>
                                </div>
                            </div>

                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center">
                                <div class="product-thumbnail">
                                    <img src="img/bg-img/5.jpg" alt="">
                                </div>
                                <div class="product-info">
                                    <a href="#">Tulip Flower</a>
                                    <p>$11.99</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> 505 Silk Rd, New York</p>
                                <p><span>Phone:</span> +1 234 122 122</p>
                                <p><span>Email:</span> info.deercreative@gmail.com</p>
                                <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                                <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="index.php" >PlantNest</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
   <script> var firsttyped = new Typed('#firstpara', {
  strings: ['<i>"Nurturing Dreams, Just a Click Away:"</i> ', ' Your Digital Eden of Possibilities!.'],
  typeSpeed: 100,
  startDelay:1000,
  loop:true
});
var secondtyped = new Typed('#secondpara', {
  strings: ['Nurturing Dreams, Just a Click Away: ', ' Your Digital Eden of Possibilities!.'],
  typeSpeed: 100,
  startDelay:1500,
  loop:true,
});</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <!-- <script src="js/bootstrap/popper.min.js"></script> -->
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>