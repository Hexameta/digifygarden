<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>DigifyGarden</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />


  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png" />

  <link rel="manifest" href="assets/img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.html" color="#ffffff" />
  <meta name="msapplication-TileColor" content="#ffffff" />
  <meta name="theme-color" content="#ffffff" />
  <link type="text/css" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link type="text/css" href="node_modules/prismjs/themes/prism.css" rel="stylesheet" />
  <link type="text/css" href="node_modules/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <link type="text/css" href="css/leaf.css" rel="stylesheet" />

</head>

<body>



  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light navbar-theme-primary headroom py-lg-2 px-lg-6">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img class="navbar-brand-dark" src="assets/img/brand/light.svg" alt="Logo light" />
          <img class="navbar-brand-light" src="assets/img/brand/primary.svg" alt="Logo dark" /></a>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="index.html"><img src="assets/img/brand/primary.svg" alt="menuimage" /></a>
              </div>
              <div class="col-6 collapse-close">
                <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"></a>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover m-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link"><span class="nav-link-inner-text">Home</span></a>
            </li>
            <li class="nav-item">
              <a href="about.php" class="nav-link"><span class="nav-link-inner-text">About</span></a>
            </li>

            <li class="nav-item">
              <a href="collageList/collageList.php" class="nav-link"><span class="nav-link-inner-text">Colleges</span></a>
            </li>



          </ul>
        </div>

        <?php
        if (isset($_SESSION['u_id'])) {
          echo '  <div class="d-none d-lg-block">
<a
  href="./College"
  role="button"
  class="btn btn-sm btn-success animate-up-2 register-btn"
  ><i class="fas fa-donate mr-2"></i>College Dashboard </a
><a
  href="login/logout.php"
  role="button"
  class="btn btn-sm btn-outline-success login-btn animate-up-2 ml-3"
  ><i class="fas fa-sign-in-alt mr-2"></i>Sign out</a
>

</div>
<div class="d-flex d-lg-none align-items-center">
<a
  href="./College"
  role="button"
  class="btn btn-sm btn-success animate-up-2 register-btn"
  ><i class="fas fa-donate mr-2"></i>College Dashboard </a>
<a
  href="login/logout.php"
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
              href="registration/register.php"
              role="button"
              class="btn btn-sm btn-success animate-up-2 register-btn"
              ><i class="fas fa-donate mr-2"></i>Register </a
            ><a
              href="login/login.php"
              role="button"
              class="btn btn-sm btn-outline-success login-btn animate-up-2 ml-3"
              ><i class="fas fa-sign-in-alt mr-2"></i>Sign In</a
            >
          </div>
          <div class="d-flex d-lg-none align-items-center">
          <a
              href="registration/register.php"
              role="button"
              class="btn btn-sm btn-success animate-up-2 register-btn"
              ><i class="fas fa-donate mr-2"></i>Register </a>
          <a
              href="login/login.php"
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

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/headroom.js/dist/headroom.min.js"></script>
  <script src="node_modules/onscreen/dist/on-screen.umd.min.js"></script>
  <script src="node_modules/nouislider/distribute/nouislider.min.js"></script>
  <script src="node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="node_modules/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="node_modules/jarallax/dist/jarallax.min.js"></script>
  <script src="node_modules/jquery.counterup/jquery.counterup.min.js"></script>
  <script src="node_modules/jquery-countdown/dist/jquery.countdown.min.js"></script>
  <script src="node_modules/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="node_modules/chartist/dist/chartist.js"></script>
  <script src="node_modules/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
  <script src="node_modules/prismjs/prism.js"></script>
  <script src="node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/js/leaf.js"></script>


</body>

</html>