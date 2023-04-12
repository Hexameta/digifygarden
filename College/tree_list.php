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

  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="../assets/img/brand/primary.png">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7496626222666537"
     crossorigin="anonymous"></script>
<style>
.zoom {
  transition: transform .2s; /* Animation */
}

.zoom:hover {
  transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">Digify Garden</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto " href="./index.php">Dashboard</a></li>
          <li><a class="nav-link scrollto active" href="tree_list.php">Trees</a></li>

          <li class="dropdown"><a href="./profile.php"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="./profile.php">View Profile</a></li>
              <li><a href="../login/logout.php">Signout</a></li>
            </ul>
          </li>

          <li><a class="getstarted scrollto" href="tree/index.php">Add New Tree</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <?php
    $id = $_SESSION['u_id'];
    include '../util/connection.php';
    $query = "SELECT * FROM tbl_tree WHERE u_id = '" . $id . "' ";

    $t_id = mysqli_query($conn, $query);
    if (!$t_id) {
      echo "failed";
    }


    ?>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Trees List</h2>
          <ol>
            <li><a href="index.php">Dashboard</a></li>
            <li>Trees List</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container" style="display:flex; flex-direction:row;  flex-wrap: wrap;">






        <?php

        if (mysqli_num_rows($t_id) > 0) {

          while ($rowData = mysqli_fetch_array($t_id)) {
            echo '
            <div class="card" style="width: 18rem; margin-left:20px">
            
            <a href="tree-details.php?id=' . ($rowData['t_id']) . '"><img class="card-img-top zoom" style="height: 200px;object-fit:cover;" src="tree/tree_images/' . ($rowData['t_id']) . '.jpg" alt="Card image cap"></a>
            <div class="card-body">
            
            <a style="color:black" href="./tree/edit-tree.php?id=' . ($rowData['t_id']) . '"> <i class="fa-solid fa-pen-to-square"></i> </a>
            <a style="color:black; padding-left:5px"  href="./tree/delete-tree.php?id=' . ($rowData['t_id']) . '" onclick="return confirm(\'Are you sure you want to delete this tree?\')"> <i class="fa-solid fa-trash"></i></a>
            
            <h5 class="card-title">' . ($rowData['t_name']) . '</h5> 
            <a href="tree-details.php?id=' . ($rowData['t_id']) . '" class="btn-secondary">View Details</a>
            
            </div>
            </div>
            ';
            
          }
        }

        ?>









      </div>

    </section>



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