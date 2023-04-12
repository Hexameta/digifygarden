<?php
session_start();

if (isset($_SESSION['u_id'])) {

  echo '<script>
                window.location.href = " ../College/" ;
                </script>
                ';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <title>Digify Garden</title>
  <link rel="icon" type="image/x-icon" href="../assets/img/brand/primary.png">
</head>

<body>


  <?php
  include '../util/connection.php';
  $error = '';
  if (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM tbl_clg_login WHERE `u_id` = '$c_id' AND `password` = '$password'";

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['status'] == 1) {
          $_SESSION['u_id'] = $c_id;
          $query = "SELECT c_name FROM tbl_clg WHERE `u_id` = '$c_id'";
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $_SESSION['clg_name'] = $row['c_name'];
            }
          }
          header("Location: ../College/");
        } else if ($row['status'] == 0) {
          $error =  "Admin Not Approved, We will verify it asap";
        } else if ($row['status'] == 2) {
          $error =  "Your is College Blocked By Admin, Try contact Admin";
        } else {
          $error =  $row['remarks'];
        }
      }
    } else {
      $query = "SELECT * FROM tbl_clg_login WHERE `u_id` = '$c_id'";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        $error =  "Wrong Password. try contact admin for changing password";
      } else {
        $error = "College is not registered. try <a href='../registration/register.php'>register </a>";
      }
    }
  }


  ?>
  <!-- Section: Design Block -->
  <section class="background-radial-gradient overflow-hidden ">
    <style>
      body {
        background-image: url("login-bg.jpg");
        /* background-color: #cccccc; */
      }


      .bg-glass {
        background: rgba(225, 215, 230, 0.4);
        backdrop-filter: saturate(180%) blur(10px);

      }

      .heading {
        color: white;
      }

      .error {
        color: red;
      }

      .link {
        text-decoration: none;
        color: none;
      }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <a class='link' href="../index.php">
            <h1 class="my-5 display-5 fw-bold ls-tight" style="color: white; text-shadow: 5px 5px 10px black;">
              Digify Garden <br />
              <span style="color: hsl(218, 81%, 75%)">for your nature</span>
            </h1>
          </a>

        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass pt-5">
            <center>
              <h1 class="heading"><strong>LOGIN</strong></h1>
            </center>
            <div class="card-body px-4 py-5 px-md-5">
              <p class="error"><?php
                                if ($error) {
                                  echo $error;
                                } ?></p>
              <form action="" method="POST">
                <!-- 2 column grid layout with text inputs for the first and last names -->


                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" name="c_id" id="form3Example3" class="form-control" required />
                  <label class="form-label" for="form3Example3">College ID</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example4" class="form-control" required/>
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- Checkbox -->


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                  Log In
                </button>


              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>