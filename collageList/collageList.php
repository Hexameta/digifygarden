<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>DigifyGarden</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />



  <link rel="manifest" href="assets/img/favicon/site.webmanifest" />
  <link rel="icon" type="image/x-icon" href="../assets/img/brand/primary.png">
  <meta name="msapplication-TileColor" content="#ffffff" />
  <meta name="theme-color" content="#ffffff" />
  <link type="text/css" href="../node_modules/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link type="text/css" href="../node_modules/prismjs/themes/prism.css" rel="stylesheet" />
  <link type="text/css" href="../node_modules/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link type="text/css" href="../css/leaf.css" rel="stylesheet" />
  <link rel="stylesheet" href="collageList.css">

  <link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
  <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7496626222666537" crossorigin="anonymous"></script>
  <meta name="google-adsense-account" content="ca-pub-8430383438150416">
</head>

<body>



  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light navbar-theme-primary headroom py-lg-2 px-lg-6">
      <div class="container">
        <a class="navbar-brand" href="../index.php"><img class="navbar-brand-dark" src="../assets/img/brand/light.svg" alt="Logo light" />
          <img class="navbar-brand-light" src="../assets/img/brand/primary.svg" alt="Logo dark" /></a>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="index.html"><img src="../assets/img/brand/primary.svg" alt="menuimage" /></a>
              </div>
              <div class="col-6 collapse-close">
                <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"></a>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover m-auto">
            <li class="nav-item">
              <a href="../index.php" class="nav-link"><span class="nav-link-inner-text">Home</span></a>
            </li>
            <li class="nav-item">
              <a href="../about.php" class="nav-link"><span class="nav-link-inner-text">About</span></a>
            </li>

            <li class="nav-item">
              <a href="collageList.php" class="nav-link"><span class="nav-link-inner-text">Colleges</span></a>
            </li>


          </ul>
        </div>



        <?php
        session_start();

        if (isset($_SESSION['u_id'])) {
          echo '  <div class="d-none d-lg-block">
<a
  href="../College"
  role="button"
  class="btn btn-sm btn-success animate-up-2 register-btn"
  ><i class="fas fa-donate mr-2"></i>College Dashboard </a
><a
  href="../login/logout.php"
  role="button"
  class="btn btn-sm btn-outline-success login-btn animate-up-2 ml-3"
  ><i class="fas fa-sign-in-alt mr-2"></i>Sign out</a
>

</div>
<div class="d-flex d-lg-none align-items-center">
<a
  href="../College"
  role="button"
  class="btn btn-sm btn-success animate-up-2 register-btn"
  ><i class="fas fa-donate mr-2"></i>College Dashboard </a>
<a
  href="../login/logout.php"
  role="button"
  class="btn btn-sm btn-secondary animate-up-2 ml-2"
  ><i class="fas fa-sign-in-alt mr-1"></i>Sign out </a>
<button
  class="navbar-toggler"
  type="button"
  data-toggle="collapse"
  data-target="#navbar_global"
  aria-controls="navbar_global"
  aria-expanded="false"
  aria-label="Toggle navigation"
>
  <span class="navbar-toggler-icon"></span>
</button>
</div>';
        } else {
          echo '  <div class="d-none d-lg-block">
            <a
              href="../registration/register.php"
              role="button"
              class="btn btn-sm btn-success animate-up-2 register-btn"
              ><i class="fas fa-donate mr-2"></i>Register </a
            ><a
              href="../login/login.php"
              role="button"
              class="btn btn-sm btn-outline-success login-btn animate-up-2 ml-3"
              ><i class="fas fa-sign-in-alt mr-2"></i>Sign In</a
            >
          </div>
          <div class="d-flex d-lg-none align-items-center">
          <a
              href="../registration/register.php"
              role="button"
              class="btn btn-sm btn-success animate-up-2 register-btn"
              ><i class="fas fa-donate mr-2"></i>Register </a>
          <a
              href="../login/login.php"
              role="button"
              class="btn btn-sm btn-secondary animate-up-2 ml-2"
              ><i class="fas fa-sign-in-alt mr-1"></i>Sign In </a>
          <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbar_global"
              aria-controls="navbar_global"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>';
        }

        ?>



      </div>
    </nav>
  </header>


  <section>



    <div class="container1 mt-5">

      <table id="myTable" class="display" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>College </th>
            <th>District</th>
            <th>University</th>
            <th>total tree</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../util/connection.php';
          $query = "SELECT * FROM tbl_clg INNER JOIN tbl_clg_address ON tbl_clg.a_id = tbl_clg_address.a_id INNER JOIN tbl_clg_login ON tbl_clg.u_id = tbl_clg_login.u_id where tbl_clg_login.status = '1'";
          $clgs = mysqli_query($conn, $query);
          if (!$clgs) {
            echo "failed";
          } else {
            if (mysqli_num_rows($clgs) > 0) {
              while ($rowData = mysqli_fetch_array($clgs)) {

                $query1 = "SELECT * FROM tbl_tree where u_id = '" . $rowData['u_id'] . "'";

                $res = mysqli_query($conn, $query1);
                $tnum = 0;
                if (mysqli_num_rows($res) > 0) {
                  $tnum = mysqli_num_rows($res);
                }

                echo "
                
                <tr class='pt-5'>
                <td>" . ($rowData['c_name']) . "</td>
                <td>" . ($rowData['district']) . "</td>
                <td>" . ($rowData['uni_name']) . "</td>
                <td>" . $tnum . "</td>
                
            </tr>
            <hr>";
              }
            }
          }

          ?>


        </tbody>
      </table>


    </div>
  </section>

  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/headroom.js/dist/headroom.min.js"></script>
  <script src="../node_modules/onscreen/dist/on-screen.umd.min.js"></script>
  <script src="../node_modules/nouislider/distribute/nouislider.min.js"></script>
  <script src="../node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="../node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="../node_modules/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/jarallax/dist/jarallax.min.js"></script>
  <script src="../node_modules/jquery.counterup/jquery.counterup.min.js"></script>
  <script src="../node_modules/jquery-countdown/dist/jquery.countdown.min.js"></script>
  <script src="../node_modules/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="../node_modules/chartist/dist/chartist.js"></script>
  <script src="../node_modules/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
  <script src="../node_modules/prismjs/prism.js"></script>
  <script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../assets/js/leaf.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('table.display').DataTable();
    });
  </script>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8430383438150416" crossorigin="anonymous"></script>
</body>

</html>