<?php
session_start();
include("connect.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="bootstrap.css">
    
    <!-- Title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>PlantNest </title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <style>
        /* Default styles for larger screens */
.card {
  height: 80%;
}

.card-body {
  max-height: 80%;
}

.card-img-top {
  height: 200px;
  object-fit: cover !important;
  object-position: center !important;
}

.card-footer {
  padding: 10px 0;
}

/* Media query for smaller screens */
@media (max-width: 768px) {
  .card {
    height: auto; /* Allow the card to expand based on content */
  }

  .card-body {
    max-height: none; /* Reset max-height for small screens */
  }

  .card-img-top {
    height: auto; /* Let the image size adjust */
  }
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
                    <li class="text-success"><button type="button" class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
Change Password</button>



</li>
                    <li class="text-success"><a class="fs-6 dropdown-item text-success" href="logout.php">Logout</a></li>
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
										<li><a href="category.php?catdetail=<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </a></li>



									<?php } ?>
                                                </ul>
                                            </li>
                                            
                                            <li><a href="shop.php">Products</a>
                                               
                                            </li>
                                               
                                            <li><a href="#feedback">Feedback</a></li>
                                    </li>
                                    <li><a href="contact.php">Contact</a></li> 
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
    <!-- ##### Header Area End ##### -->

    <!-- model  for change passwoed  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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



    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
    <div class="hero-post-slides owl-carousel">

        <!-- Single Hero Post 1 -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/1.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Bringing Nature Home: Explore Ecommerce Nursery Delights!</h2>
                            <p class="fs-2 py-2 firstpar fw-bolder" id="firstpara"></p>
                            <div class="welcome-btn-group">
                                <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                <a href="#" class="btn alazea-btn active">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post 2 -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/secondheaderbg.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Bringing Nature Home: Explore Ecommerce Nursery Delights!</h2>
                            <p class="fs-2 py-2 fw-bolder  secondpar" id="secondpara"></p>

                            <div class="welcome-btn-group">
                                <a href="#" class="btn alazea-btn mr-30">GET STARTED</a>
                                <a href="#" class="btn alazea-btn active">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>



<section class="bg-gray section-padding-100-0;">
  <div class="container py-3">
    <div class="row mt-3">
    <div class="section-heading text-center">
                        <h2>New Arrivals</h2>
                        <p>We provide the perfect products for you.</p>
                    </div>
    <?php
				$product = mysqli_query($connect, "select * from plants limit 3 ");
				while ($row = mysqli_fetch_array($product)) {
				?>
      <div class="col-md-6 col-lg-4 mb-3 mb-lg-0 my-2">
        <div  class="card">
          <img style="" src="admin/productimages/<?php echo $row[4]; ?>"
            class="card-img-top img-fluid" alt="p" />
          <div class="card-body">
            <div class="d-flex justify-content-between">
                <?php
                $category = mysqli_query($connect,"SELECT * FROM categories WHERE Category_Id='$row[5]'");
                $catname = mysqli_fetch_array($category);
                ?>
              <p class="small"><a href="#!" class="text-muted"><?php echo $catname[1] ?></a></p>
            </div>

            <div class="d-flex justify-content-between mb-2">
              <h5 class="mb-0"><?php echo $row[1]; ?></h5>
              <h5 class="text-dark mb-0">RS. <?php echo $row[3] ?></h5>
            </div>

            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted mb-0 text-success"> Stock <span class="fw-bold"> <?php echo $row[6] ?></span></p>
              <div class="ms-auto text-warning">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-center align-items-center">
      <a href="product-detail.php?productid=<?php echo $row[0]; ?>&categoryid=<?php echo $catname[0] ;?>" class="btn alazea-btn w-100">See details</a>
    </div>
        </div>
      </div>
     
       <?php } ?>
    </div>
  </div>
</section>

    <!-- ##### Hero Area End ##### -->

    <!-- ##### Service Area Start ##### -->
    <section class="our-services-area bg-gray section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>OUR SERVICES</h2>
                        <p>We provide the perfect service for you.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <div class="alazea-service-area mb-100">

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="img/core-img/s1.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Plants Care</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="img/core-img/s2.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Pressure Washing</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                            <!-- Icon -->
                            <div class="service-icon mr-30">
                                <img src="img/core-img/s3.png" alt="">
                            </div>
                            <!-- Content -->
                            <div class="service-content">
                                <h5>Tree Service &amp; Trimming</h5>
                                <p>In Aenean purus, pretium sito amet sapien denim moste consectet sedoni urna placerat sodales.service its.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-video-area bg-overlay mb-100">
                        <img src="img/bg-img/23.jpg" alt="">
                        <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Service Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>ABOUT US</h2>
                        <p>We are leading in the plants service fields.</p>
                    </div>
                    <p>Quisque orci quam, vulputate non commodo finibus, molestie ac ante. Duis in sceleri quesem. Nulla sit amet varius nunc. Maecenas dui, tempeu ullam corper in.</p>

                    <!-- Progress Bar Content Area -->
                    <div class="alazea-progress-bar mb-50">
                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Office plants</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="80"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Indoor Plants</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="70"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Outdoor Plants</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="85"></span>
                            </div>
                        </div>

                        <!-- Single Progress Bar -->
                        <div class="single_progress_bar">
                            <p>Garden Care</p>
                            <div id="bar4" class="barfiller">
                                <div class="tipWrap">
                                    <span class="tip"></span>
                                </div>
                                <span class="fill" data-percentage="65"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="alazea-benefits-area">
                        <div class="row">
                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="img/core-img/b1.png" alt="">
                                    <h5>Quality Products</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="img/core-img/b2.png" alt="">
                                    <h5>Perfect Service</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="img/core-img/b3.png" alt="">
                                    <h5>100% Natural</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>

                            <!-- Single Benefits Area -->
                            <div class="col-12 col-sm-6">
                                <div class="single-benefits-area">
                                    <img src="img/core-img/b4.png" alt="">
                                    <h5>Environmentally friendly</h5>
                                    <p>Intiam eu sagittis est, at commodo lacini libero. Praesent dignissim sed odio vel aliquam manta lagorn.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="img/bg-img/13.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about Alazea</p>
                                        </div>
                                        <p>“Alazea is a pleasure to work with. Their ideas are creative, they came up with imaginative solutions to some tricky issues, their landscaping and planting contacts are equally excellent we have a beautiful but also manageable garden as a result. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Nick Jonas</h6>
                                            <p>CEO of NAVATECH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="img/bg-img/14.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about Alazea</p>
                                        </div>
                                        <p>“Alazea is a pleasure to work with. Their ideas are creative, they came up with imaginative solutions to some tricky issues, their landscaping and planting contacts are equally excellent we have a beautiful but also manageable garden as a result. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Nazrul Islam</h6>
                                            <p>CEO of NAVATECH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-thumb">
                                        <img src="img/bg-img/15.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="testimonial-content">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <h2>TESTIMONIAL</h2>
                                            <p>Some kind words from clients about Alazea</p>
                                        </div>
                                        <p>“Alazea is a pleasure to work with. Their ideas are creative, they came up with imaginative solutions to some tricky issues, their landscaping and planting contacts are equally excellent we have a beautiful but also manageable garden as a result. Thank you!”</p>
                                        <div class="testimonial-author-info">
                                            <h6>Mr. Jonas Nick</h6>
                                            <p>CEO of NAVATECH</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->

    <!-- ##### Product Area Start ##### -->
 
    <!-- ##### Product Area End ##### -->

   
    <section class="contact-area section-padding-100-0">
        <div class="container mb-50">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    
                    <!-- Contact Form Area -->
                    <div  id="feedback" class="contact-form-area mb-100">
                    <div class="section-heading ">
                        <h2>GIVE YOUR FEEDBACK</h2>
                        <p>Send us a feedback, we will love to have it</p>
                    </div>
                        <form action="#" method="POST">
                            <div class="row">
                               
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea required class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter Feedback"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button name="feedback" type="submit" class="btn alazea-btn mt-15">Send Feedback</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
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


<?php 
 if(isset($_POST['feedback'])){
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {

    $selectuser = mysqli_query($connect,"SELECT * FROM users where username = '{$_SESSION["username"]}'");
    $userdata  = mysqli_fetch_array($selectuser);
    $userid = $userdata[0];
    $username = $userdata[1];
    $useremail = $userdata[2];
    $feedback = $_POST['message'];
    $feedbackquery= mysqli_query($connect,"INSERT INTO feedback (User_Id,Username,user_Email,userfeedback) VALUES ('$userid','$username','$useremail','$feedback') ");
   
    if($feedbackquery){
        echo '<script>
        swal("Good job!", "Message sent successfully!", "success").then(function() {
            window.location.href = "index.php"; 
        });
    </script>';    
     }
     }
     else{
       echo '<script> window.location.href = "login.php"; </script>';
     }
     
 }

 
 if (isset($_POST['changepass'])) {
     $currentpass = $_POST['currentpassword'];
     $newpass = $_POST['newpass'];
     $cnewpass = $_POST['cnewpass'];
 
 
     if ($newpass !== $cnewpass) {
        echo '<script>
        swal("error!", "enter same password!", "error").then(function() {
            window.location.href = "index.php"; 
        });
    </script>';
     } else {
         $passQuery = mysqli_query($connect, "SELECT * FROM users WHERE username = '{$_SESSION["username"]}' ");
         $num = mysqli_num_rows($passQuery);
 
         if ($num == 1) {
             $row = mysqli_fetch_assoc($passQuery);
             if (password_verify($currentpass, $row['Password'])) {
                 $hashpassword = password_hash($newpass, PASSWORD_DEFAULT);
                 $updateQuery = mysqli_query($connect, "UPDATE users SET Password = '$hashpassword' WHERE username = '{$_SESSION["username"]}'");
 
                 if ($updateQuery) {
                     // Password updated successfully, redirect with a success message
                     echo '<script>
                     swal("Success!", "PAssword  updated Successfully!", "success").then(function() {
                         window.location.href = "index.php"; 
                     });
                 </script>';
                 } else {
                    echo '<script>
                    swal("error!", "PAssword not updated!", "error").then(function() {
                        window.location.href = "index.php"; 
                    });
                </script>';
                 }
             } else {
                echo '<script>
                swal("error!", "PAssword not matched!", "error").then(function() {
                    window.location.href = "index.php"; 
                });
            </script>';

             }
         } else {
            echo '<script>
            swal("error!", "User Bot Found!", "error").then(function() {
                window.location.href = "index.php"; 
            });
        </script>';
         }
     }
 }
 
?>