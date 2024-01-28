<?php
session_start();

if (!isset($_SESSION['u_id'])) {

  echo '<script type="text/javascript">
   window.location.href = "../" ;
   </script>';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Digify Garden</title>

  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="google-adsense-account" content="ca-pub-8430383438150416">
  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../assets/img/brand/primary.png">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8430383438150416"
     crossorigin="anonymous"></script>
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Digify Garden</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="#">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="tree_list.php">Trees</a></li>

          <li class="dropdown"><a href="./profile.php"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="./profile.php">View Profile</a></li>

              <li><a href="../login/logout.php">Signout</a></li>

            </ul>
          </li>

          <li><a class="getstarted scrollto" href="./tree/index.php">Add New Tree</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/Img1.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Digify Garden</span></h2>
              <h3 class="animate__animated animate__fadeInUp" style="color:white">of <?php echo $_SESSION['clg_name']; ?></h3>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/Img6.png)">
          <div class="carousel-container">
            <div class="container">
              <?php
              echo '<h2 class="animate__animated animate__fadeInDown">This is ' . $_SESSION['clg_name'] . ' College Dashboard</h2>';
              ?>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/Img3.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Make your campus green </h2>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services section-bg">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-tree-fill"></i></div>
              <h4 class="title"><a href="tree_list.php">Trees</a></h4>
              <p class="description">Add new trees using the Add New Tree button and Edit or Delete existing Trees</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-person-circle"></i></div>
              <h4 class="title"><a href="profile.php">Profile</a></h4>
              <p class="description">College profile management allows students and staff to access and update their digital garden</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-arrow-down-circle-fill"></i></div>
              <h4 class="title"><a href="tree_list.php">QR Codes</a></h4>
              <p class="description">Download QR code corresponding to trees in the college campus</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Services Section -->







  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Digify Garden</h3>
      <p>Digital Garden is a platform through which colleges can easily make your garden digital and share it with students.</p>
      <div class="copyright">
        &copy; Copyright <strong><span>DigifyGarden</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


 
</body>

</html>