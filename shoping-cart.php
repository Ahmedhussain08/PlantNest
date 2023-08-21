<?php
session_start();
include("connect.php");

if (isset($_GET['remove'])) {
    $remove = $_GET['remove'];
    foreach ($_SESSION['cart'] as $k => $item) {
        if ($remove == $item['proid']) {
            unset($_SESSION['cart'][$k]);
        }
    }
}
if (isset($_POST['empty-cart'])) {
    unset($_SESSION['cart']);
}
if (isset($_POST['checkout'])) {
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        header("location:checkout.php");
    } else {
        header("location:login.php");
    }
}

$grandtotal = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product detail</title>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="https://kit.fontawesome.com/f4372cbdf3.js" crossorigin="anonymous"></script>
    
    <!-- Title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <style>
        header {
            background-image: url(img/bg-img/secondheaderbg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 1;
        }
        #shopingcartdiv {
            filter: drop-shadow(5px 5px 5px green);

        }
        #shopingcartimg img{
            filter: drop-shadow(4px 5px 4px green);
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
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
                                    <li><a href="contact.html">Contact</a></li> -->
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
                            <input required type="search" name="search" id="search" placeholder="Search Products Name">
                            <button type="submit" class="d-none"></button>
                        </form>
                        <!-- Close Icon -->
                        <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="h-100 mt-5 p-2" style="background-color: #eee;">
    <form action="" method="POST">
    <?php if (isset($_SESSION['cart'])) : ?>
            <div class="container h-100 py-5 mt-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                        </div>

                        <?php if (!empty($_SESSION['cart'])) : ?>
                            <div id="shopingcartdiv" class="card rounded-3 mb-4">
                                <div class="card-body p-2">
                                    <?php foreach ($_SESSION['cart'] as $key => $value) : ?>
                                        <div class=" p-2 mb-3 rounded">
                                            <div class="row d-flex justify-content-between align-items-center">
                                               
                                            <div id="shopingcartimg" class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="admin/productimages/<?php echo $value['image']; ?>"
                                                        class="img-fluid rounded-3" alt="Product Image">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h5 class=" fw-bold mb-2"><?php echo $value['name']; ?></h5>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <h4 style="color: #70c745 ;" class="">Quantity : <?php echo $value['qty']; ?></h4>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h5 class="mb-0">RS. <?php echo $value['qty'] * $value['price']; 
                                               $totalPrice = $value['qty'] * $value['price'];
                                               $grandtotal+=$totalPrice;
                                                    
                                                    ?></h5>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="shoping-cart.php?remove=<?php echo $value['proid'] ?>"
                                                        class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                                </div>
                                            </div>
            <input value="<?php echo $value['proid'] ?>" type="hidden" name="">

                                        </div>

                                    <?php endforeach; ?>
                                </div>
                                
                            </div>
                          

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="fw-bold text-success">Cart Total</h3>
                                    <p class="fw-bold">Grand total :  <?php echo $grandtotal; ?></p>
                                    <button name="checkout" type="submit" class="btn alazea-btn btn-block btn-lg">Proceed to Pay</button>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="row my-5 text-center mx-auto d-flex">
                                <div class="col-md-11 d-flex text-center mx-auto">
                                    <h1 class="text-center col-md-11 fw-bold">You have no products in your cart</h1>
                                </div>
                                    <div class="col-md-3 mx-auto"><a class=" btn alazea-btn"
                                        href="index.php">Add Product</a></div>
                                    
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </form>
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