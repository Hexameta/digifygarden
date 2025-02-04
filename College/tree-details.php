<?php
function get_client_ip()
{
  $ipaddress = '';
  if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if (isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if (isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

session_start();



if (!isset($_GET['id'])) {
  echo "<script>
  history.back();
  </script>
  ";
}
include '../util/connection.php';

$t_id = $_GET['id'];
$winner = false;
$isClgoffer = false;
$isCompleteClgoffer = false;
$couponID = '';
$o_id = '';
$query = "select o_id,status,coupon_code from tbl_offers where tree_id = '$t_id' and status = 1";
$offerResult = mysqli_query($conn, $query);
if ($offerResult) {
  if (mysqli_num_rows($offerResult) > 0) {
    $row = mysqli_fetch_assoc($offerResult);
    $o_id = $row["o_id"];
    $couponID = $row["coupon_code"];
    $winner = true;
    $quary = "update tbl_offers set status = 3 where o_id = $o_id";
    mysqli_query($conn, $quary);
  } else {
    $clgIdQuery = "select u_id from tbl_tree where t_id = '$t_id'";
    $clgIDResult = mysqli_query($conn, $clgIdQuery);
    if ($clgIDResult) {
      if (mysqli_num_rows($clgIDResult) > 0) {
        $row = mysqli_fetch_assoc($clgIDResult);
        $clg_id = $row["u_id"];
        $q = "select * from tbl_offers inner join tbl_tree on tbl_offers.tree_id = tbl_tree.t_id where tbl_tree.u_id = '$clg_id' and status = 1";
        $clgOfferStatus = mysqli_query($conn, $q);

        if (mysqli_num_rows($clgOfferStatus) > 0) {
          $isClgoffer = true;
        } else {
          $q = "select * from tbl_offers inner join tbl_tree on tbl_offers.tree_id = tbl_tree.t_id where tbl_tree.u_id = '$clg_id' and status = 3";
          $clgOfferCompleteStatus = mysqli_query($conn, $q);
          if (mysqli_num_rows($clgOfferCompleteStatus) > 0) {
            $isCompleteClgoffer = true;
          }
        }
      }
    }
  }
  
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DigifyGarden</title>
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
  <link type="text/css" href="../node_modules/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="assets/css/audio.css" rel="stylesheet">


  <link href="assets/css/style.css" rel="stylesheet">
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8430383438150416" crossorigin="anonymous"></script>

  <!-- <script async="async" data-cfasync="false" src="//pl22448550.profitablegatecpm.com/2145f25aba6ecec6ee3dc5152b0886ed/invoke.js"></script> -->


  <?php if ($winner) { ?>
    <link rel="stylesheet" type="text/css" href="offerStyle.css">
  <?php } else if ($isClgoffer) { ?>

    <link rel="stylesheet" type="text/css" href="offerStyle.css">
    <!-- <script type='text/javascript' src='//pl22448897.profitablegatecpm.com/41/c1/ae/41c1ae51c39f28162c4aeadb4c657c5d.js'></script> -->
  <?php } else if ($isCompleteClgoffer) { ?>
    <link rel="stylesheet" type="text/css" href="offerStyle.css">
    <!-- <script type='text/javascript' src='//pl22448897.profitablegatecpm.com/41/c1/ae/41c1ae51c39f28162c4aeadb4c657c5d.js'></script> -->
  <?php } else { ?>
    <!-- <script type='text/javascript' src='//pl22448897.profitablegatecpm.com/41/c1/ae/41c1ae51c39f28162c4aeadb4c657c5d.js'></script> -->
  <?php } ?>

</head>

<body>
  <?php if ($winner) {?>
    <div class="OfferBg">
      <h1 style="text-align: center;">Take screenshot</h1>
      <h3 style="text-align: center;color:white">Coupon Code : <?php echo $couponID ?></h3>
      <div class="Offercontainer">
        <div class="image">
          <p class="wintext">Congratulations Winner</p>
          <div class="pyro">
            <div class="before"></div>
            <div class="after"></div>
          </div>
        </div>
        <button onclick="GiveDetailButtonClick()">Give Your Details</button>
      </div>
    </div>
    <div class="winnerForm">
      <div class="container formBox">
        <form method="post" action="offerWinner.php">
          <input type="hidden" value="<?php echo $o_id ?>" name="oid">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="winnerName" placeholder="Enter Name" required>
            <small class="form-text text-muted">Please enter full name</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Mobile</label>
            <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number" required>
            <small class="form-text text-muted">Please enter whatsapp number</small>
          </div>
          <div class="d-grid justify-content-center mt-2">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  <?php } ?>


  <?php if ($isClgoffer) { ?>

    <div class="OfferBg">

      <div class="Offercontainer">
        <div class="loserimage">

          <p class="losertext hurryUpText">Ooops!! <br> Not This.<br>
            Try Another tree</p>
          <!-- <p class="hurryUpText">Hurry up! Time is running out.</p> -->

        </div>
      </div>
    </div>

  <?php } ?>


  <?php if ($isCompleteClgoffer) { ?>

    <div class="OfferBg">
      <div class="Offercontainer">
        <div class="image">
          <p class="huntedtext">Ooops!! <br> Gift Already Claimed.</p>
          <p class="huntedcaption">More Surprises Soon.</p>
          <!-- <div class="pyro">
            <div class="before"></div>
            <div class="after"></div>
          </div> -->
        </div>
      </div>
    </div>

  <?php } ?>

  <?php

  if (isset($_SESSION['u_id'])) {
    echo ' <header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.php">Digify Garden</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
      <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
      <li><a class="nav-link scrollto " href="./index.php">Dashboard</a></li>
        <li><a class="nav-link scrollto" href="./tree_list.php">Trees</a></li>
        
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
</header>';
  }
  ?>

  <script src='offerView.js'></script>

  <?php

  $currentPageUrl = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];



  if (!isset($_SESSION['u_id'])) {
    $curDate = date('Y-m-d H:i:s');
    mysqli_query($conn, "insert into tbl_scan_log(tree_id,ip_address,time) values('$t_id','" . get_client_ip() . "','$curDate')");
  }


  $query = "SELECT * FROM tbl_tree WHERE `t_id` = '" . $t_id . "' ";

  $tdetails = mysqli_query($conn, $query);
  if (!$tdetails) {
    echo "failed";
  } else {
    if (mysqli_num_rows($tdetails) > 0) {
      while ($rowData = mysqli_fetch_array($tdetails)) {
        $t_name = $rowData["t_name"];
        $family = $rowData["family"];
        $synonym = $rowData["synonym"];
        $com_name = $rowData["com_name"];
        $origin = $rowData["origin"];
        $habitat = $rowData["habitat"];
        $fperiod = $rowData["f_period"];
        $key_char = $rowData["key_char"];
        $uses = $rowData["uses"];
      }
    }
  }
  ?>
  <main id="main">
    <?php
    if (isset($_SESSION['u_id'])) {
      echo '
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Tree Details</h2>
        <ol>
          <li><a href="index.php">Dashboard</a></li>
          <li>Tree Details</li>
        </ol>
      </div>

    </div>
  </section>';
    } elseif (isset($_SESSION['admin_id'])) {
      echo '
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
  
        <div class="d-flex justify-content-between align-items-center">
          <h2>Tree Details</h2>
          <ol>
            <li><a href="../admin/pages/collagemanagement.php">Back</a></li>
            <li>Tree Details</li>
          </ol>
        </div>
  
      </div>
    </section>';
    }

    ?>



    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="" style="  margin-left: auto; margin-right: auto;">
                  <?php
                  echo '<img src="tree/tree_images/' . $t_id . '.jpg" alt="not found">';
                  ?>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
            <?php 
            if (file_exists("tree/tree_audios/" . $t_id . ".mp3")) {
              $image = 'tree/tree_images/' . $t_id . '.jpg';
              $name = $t_name;
              $audio = 'tree/tree_audios/' . $t_id . '.mp3';
              include "audio_player.php"; 
            }
            ?>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Tree information</h3>
              <h4>
                <?php echo $t_name ?>
              </h4>
              <ul>
                <li><strong>Common Name</strong>:
                  <?php echo $com_name ?>
                </li>
                <li><strong>Family</strong>:
                  <?php echo $family ?>
                </li>
                <li><strong>Synonym</strong>:
                  <?php echo $synonym ?>
                </li>
                <li><strong>Flowering Period</strong>:
                  <?php echo $fperiod ?>
                </li>
                <li><strong>Habitat</strong>:
                  <?php echo $habitat ?>
                </li>
                <li><strong>Orgin</strong>:
                  <?php echo $origin ?>
                </li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Key Characters</h2>
              <p>
                <?php echo $key_char ?>
              </p>
            </div>
            <div class="portfolio-description">
              <h2>Uses</h2>
              <p>
                <?php echo $uses ?>
              </p>
            </div>

            <?php if (isset($_SESSION['u_id'])) { ?>
              <div class="text-center">

                <img src="https://quickchart.io/qr?text=<?php echo $currentPageUrl ?>" class="qr-code img-thumbnail img-responsive" />


              </div>
              <div class="text-center">

                <a class="btn btn-light" href="./qrprint.php?pid=<?php echo $t_id; ?>">View QR Page</a>
              </div>
            <?php } ?>
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Digify Garden</h3>
      <p>Digital Garden is a platform through which colleges can easily make your garden digital and share it with
        students.</p>
      <div class="copyright">
        &copy; Copyright <strong><span>DigifyGarden</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="container-2145f25aba6ecec6ee3dc5152b0886ed"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/audio.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    function GiveDetailButtonClick() {
      // console.log("clicked");
      document.getElementsByClassName("winnerForm")[0].style.display = "flex";
      console.log(document.getElementsByClassName("winnerForm")[0].style.display);
    }
  </script>

</body>

</html>