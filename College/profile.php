<?php
session_start();

if (!isset($_SESSION['u_id'])) {

  echo '<script type="text/javascript">
  window.location.href = "../" ;
  </script>';
}
?>





<?php
include '../util/connection.php';
$error = '';
if (isset($_POST['submit'])) {

  $u_id = $_POST['u_id'];

  $c_name = $_POST['c_name'];
  $uni_name = $_POST['uni_name'];
  $email = $_POST['email'];
  // $password = $_POST['psw'];
  $city = $_POST['city'];

  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  $district = $_POST['district'];
  $mobnum = $_POST['mobnum'];
  $q = "SELECT a_id FROM tbl_clg WHERE u_id = '$u_id'";
  $result1 = mysqli_query($conn, $q);
  if ($row = mysqli_fetch_array($result1)) {
    $id = $row['a_id'];
  }
  $sql = "UPDATE  tbl_clg_address SET city='$city', pincode='$pincode', district='$district', state='$state'  WHERE a_id = '$id'";
  $result = mysqli_query($conn, $sql);
  if ($result) {

    $query = "UPDATE tbl_clg SET  c_name='$c_name', uni_name='$uni_name', mobnum='$mobnum',email='$email' WHERE u_id = '$u_id'";
    $result1 = mysqli_query($conn, $query);
    echo '<script type="text/javascript">
window.location.href = "./index.php" ;
</script>';
  } else {
    $error = "Error in updating address";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digify Garden</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">



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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">



  <style>
    body {
      margin: 0;


      color: #2e323c;
      background: #ffffff;
      position: relative;
      height: 100%;

    }

    .account-settings .user-profile {
      margin: 0 0 1rem 0;
      padding-bottom: 1rem;
      text-align: center;
    }

    .account-settings .user-profile .user-avatar {
      margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
      width: 90px;
      height: 90px;
      -webkit-border-radius: 100px;
      -moz-border-radius: 100px;
      border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
      margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
      margin: 0;
      font-size: 0.8rem;
      font-weight: 400;
      color: #9fa8b9;
    }

    .account-settings .about {
      margin: 2rem 0 0 0;
      text-align: center;
    }

    .account-settings .about h5 {
      margin: 0 0 15px 0;
      color: #007ae1;
    }

    .account-settings .about p {
      font-size: 0.825rem;
    }

    .form-control {
      border: 1px solid #cfd1d8;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
      font-size: .825rem;
      background: #ffffff;
      color: #2e323c;
    }

    .card {
      background: #ffffff;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      border: 0;
      margin-bottom: 1rem;
    }

    .card .card-body {
      padding: 1.5rem;
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
          <li><a class="nav-link scrollto" href="tree_list.php">Trees</a></li>

          <li class="dropdown "><a href="#"><span class="active">Profile</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="profile.php" class="active">View Profile</a></li>
              <li><a href="../login/logout.php">Signout</a></li>

            </ul>
          </li>

          <li><a class="getstarted scrollto" href="./tree/index.php">Add New Tree</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <div class="container">
    <div class="row gutters">

      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
          <div class="card-body">
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h6 class="mb-2 text-primary">Collage Details</h6>
              </div>


              <?php

              $id = $_SESSION['u_id'];

              $query = "SELECT * FROM tbl_clg INNER JOIN tbl_clg_address ON tbl_clg.a_id = tbl_clg_address.a_id INNER JOIN tbl_clg_login ON tbl_clg.u_id = tbl_clg_login.u_id WHERE tbl_clg.u_id = '".$id."' ;";

              $clg = mysqli_query($conn, $query);
              if (!$clg) {
                echo "failed";
              } else {
                while ($row = mysqli_fetch_assoc($clg)) {


                  echo '	
	<form action="" method="post">

	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="fullName">Collage Name</label>
		<input type="text" class="form-control" id="fullName" name="c_name" value="' . $row['c_name'] . '" placeholder="Enter Collage Name">
	</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="uname">university Name</label>
		<input type="text" class="form-control" id="uname" name="uni_name" value="' . $row['uni_name'] . '" placeholder="Enter University Name">
	</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="phone">Phone</label>
		<input type="text" class="form-control" id="phone" name="mobnum" value="' . $row['mobnum'] . '" placeholder="Enter phone number">
	</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="website">Email ID</label>
		<input type="email" class="form-control" id="website" name="email" value="' . $row['email'] . '" placeholder="Enter email ID">
	</div>
</div>
</div>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<h6 class="mt-3 mb-2 text-primary">Address</h6>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="City">city</label>
		<input type="name" class="form-control" id="City" name="city" value="' . $row['city'] . '" placeholder="Enter City">
	</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="District">District</label>
		<input type="name" class="form-control" id="District" name="district" value="' . $row['district'] . '" placeholder="Enter District">
	</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="sTate">State</label>
		<input type="text" class="form-control" id="sTate" name="state" value="' . $row['state'] . '" placeholder="Enter State">
	</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
	<div class="form-group">
		<label for="zIp">Zip Code</label>
		<input type="text" class="form-control" id="zIp" name="pincode" value="' . $row['pincode'] . '" placeholder="Zip Code">
	</div>
	<input type="text" class="form-control" id="zIp" name="u_id" value="' . $id . '" hidden>
</div>
</div>
<br>
<div class="row gutters">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="text-right">
		<button type="submit" id="submit" name="submit" class="btn btn-primary">Update</button>
	</div>
</div>
</div>

</form>
';
                }
              }


              ?>





              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>