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
  <title>DigifyGarden</title>
  <link rel="icon" type="image/x-icon" href="../assets/img/brand/primary.png">
</head>

<style>
  body {
    background-image: url("login-bg.jpg");

  }

  input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

  .bg-glass {
    background: rgba(225, 215, 230, 0.4);
    backdrop-filter: saturate(180%) blur(10px);
    border-radius: 15px;
  }

  .center {
    margin: auto;

    border: transperent;


    padding: 10px;
  }

  .link {
    text-decoration: none;
    color: none;
  }
</style>

<body>
  <section style="overflow-x: hidden;">
    <?php if (isset($_GET['error'])) {
      if ($_GET['error'] == 1) {
        echo 'duplicate entry';
      }
    }  ?>
    <div class="container-lg ">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class=" card-registration ">

            <div class="col-xl-6 mt-4 center">
              <div class="card-body p-md-5 p-3  text-black bg-glass">
                <a class='link' href="../index.php">
                  <h1 class="fw-bold ls-tight" style="color: white; text-shadow: 5px 5px 10px black;">
                    Digify Garden <br />

                  </h1>
                </a>
                <h3 class="mb-5 text-uppercase">College registration form</h3>
                <?php if (isset($_GET['regerror'])) {
                  echo "<h5 style='color:red;'>" . $_GET['regerror'] . "</h5>";
                } ?>
                <form action="registration.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="u_id" id="form3Example1m" class="form-control form-control-lg" maxlength="10" required />
                        <label class="form-label" for="form3Example1m">AISCHE Code</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="c_name" id="form3Example1n" class="form-control form-control-lg" maxlength="25" required />
                        <label class="form-label" for="form3Example1n">College Name</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="city" id="form3Example1m1" class="form-control form-control-lg" maxlength="25" required />
                        <label class="form-label" for="form3Example1m1">Place</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="uni_name" id="form3Example1n1" class="form-control form-control-lg" maxlength="30" required />
                        <label class="form-label" for="form3Example1n1">University Name</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="number" name="pincode" id="form3Example1m1" class="form-control form-control-lg"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;"  required />
                        <label class="form-label" for="form3Example1m1">Pincode</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="district" id="form3Example1n1" class="form-control form-control-lg" maxlength="20" required />
                        <label class="form-label" for="form3Example1n1">District</label>
                      </div>
                    </div>
                  </div>

                  <div class="row"> 
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="state" id="form3Example1m1" class="form-control form-control-lg" maxlength="18" required />
                        <label class="form-label" for="form3Example1m1">State</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="number" name="mobnum" id="form3Example1n1" class="form-control form-control-lg"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"  minlength="10"  required />
                        <label class="form-label" for="form3Example1n1">Contact Number</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form3Example8" class="form-control form-control-lg" required />
                    <label class="form-label" for="form3Example8">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="psw" id="form3Example8" class="form-control form-control-lg" required />
                    <label class="form-label" for="form3Example8">Password</label>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example8">Upload Proof of College : </label>
                    <input type="file" name="clg_proof" id="form3Example8" accept="application/pdf" required>
                  </div>


                  <div class="d-flex justify-content-end pt-3 ">
                    <a href="../index.php" class="btn btn-lg">Go Back</a>
                    <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                    <button type="submit" class="btn btn-success btn-lg ms-2">Submit form</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>


</html>