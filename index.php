<?php
session_start();
include './util/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>DigifyGarden</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />


  <link rel="icon" type="image/x-icon" href="assets/img/brand/primary.png">
  <link rel="manifest" href="assets/img/favicon/site.webmanifest" />
  <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.html" color="#ffffff" />
  <meta name="msapplication-TileColor" content="#ffffff" />
  <meta name="theme-color" content="#ffffff" />
  <meta name="description" content="Discover how Digital Garden helps colleges showcase their gardens digitally, promoting nature, and contributing to carbon emission control. Join us in planting more trees for a sustainable future.">
  <meta name="robots" content="index, follow">
  <meta name="keywords" content="digital garden, college garden, nature initiative, carbon emission control, sustainability platform, eco-friendly initiatives, environmental awareness, tree planting campaigns, student engagement, sustainable living, campus greening, biodiversity conservation, green living, climate action, urban forestry, technology for eco-awareness, community gardening, climate change solutions, green community engagement, smart environmental initiatives">
  <link type="text/css" href="node_modules/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link type="text/css" href="node_modules/prismjs/themes/prism.css" rel="stylesheet" />
  <link type="text/css" href="node_modules/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <link type="text/css" href="css/leaf.css" rel="stylesheet" />
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7496626222666537"
    crossorigin="anonymous"></script>

</head>

<body>

  <?php include 'navbar.php'; ?>



  <main>
    <section class="section-header bg-soft text-dark">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 d-md-none">
            <h1 class="display-2 font-weight-bold mb-0">
              We<span class="font-weight-bold"> make </span>your
              garden digital.
            </h1>
          </div>
          <div class="col-8 col-md-7 col-lg-6 order-lg-1">
            <h1 class="display-2 font-weight-bold d-none d-md-inline">
              We <span class="font-weight-bold"> make </span> your
              garden digital.
            </h1>
            <p class="lead text-muted mt-4">
              We convert your ordinary garden into <br class="d-none d-lg-inline" />a Digital garden in an easy way .
            </p>
            <div class="mt-4 mt-lg-5 mb-5 mb-lg-0">
              <a href="collageList/collageList.php" class="btn btn-md btn-primary animate-up-2 mr-3"><span
                  class="btn-inner-text"><i class="fas fa-book-reader mr-2"></i>Colleges</span> </a>
              <?php
              if (isset($_SESSION['u_id'])) {
                echo '<a href="./College" class="btn btn-md btn-white mr-3"><span class="btn-inner-text"><i class="fas fa-user mr-2"></i>College Dashboard</span></a>';
              } else {
                echo '<a href="login/login.php" class="btn btn-md btn-white mr-3"><span class="btn-inner-text"><i class="fas fa-user mr-2"></i>Sign In</span></a>';
              }
              ?>
            </div>
          </div>
          <div class="col-4 col-md-5 col-lg-6 order-lg-2">
            <img src="assets/img/forest.svg" class="img-fluid mb-lg-6 mb-0" alt="Forest Illustration" />
          </div>
        </div>
      </div>
    </section>


    <?php

    $tnum = 0;
    $tclg = 0;
    $query1 = "SELECT * FROM tbl_tree;";

    $res = mysqli_query($conn, $query1);
    if (mysqli_num_rows($res) > 0) {
      $tnum = mysqli_num_rows($res);
    }
    $query2 = "Select COUNT(*) as cnt FROM tbl_clg_login where status = '1';";

    $res = mysqli_query($conn, $query2);
    $data = mysqli_fetch_assoc($res);
    $tclg = $data['cnt'];



    ?>
    <section class="section section-lg py-0">
      <div class="container mt-n5 mt-md-n6">
        <div class="row">
          <div class="col-12">
            <div class="card-group">
              <div class="card border-left-md border-soft">
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-2">Total Colleges</h6>
                  <h2 class="text-gray mb-0">
                    <span class="icon-danger mr-2"><i class="fas fa-long-arrow-alt-up"></i></span><span
                      class="counter display-3 mr-2">
                      <?php echo $tclg; ?>
                    </span>
                  </h2>

                </div>
              </div>
              <div class="card border-left-md border-soft">
                <div class="card-body text-center">
                  <h6 class="font-weight-bold mb-2">Total Trees</h6>
                  <h2 class="text-gray mb-0">
                    <span class="icon-danger mr-2"><i class="fas fa-long-arrow-alt-up"></i></span><span
                      class="counter display-3 mr-2">
                      <?php echo $tnum; ?>
                    </span>
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="mt-4">
      <div class="container">
        <div class="row mb-2 mb-lg-4 justify-content-center">
          <div class="d-flex col-md-4 mt-2 justify-content-center">
            <img src="./assets/img/qrboard/acrylic1.jpeg" style="border-radius:5px;object-fit:cover" height='300px' width='300px'/>
          </div>
          <div class="d-flex col-md-4 mt-2 justify-content-center">
            <img src="./assets/img/qrboard/acrylic2.jpeg" style="border-radius:5px;object-fit:cover" height='300px' width='300px' />
          </div>
          <div class="d-flex col-md-4 mt-2 justify-content-center">
            <img src="./assets/img/qrboard/acrylic3.jpeg" style="border-radius:5px;object-fit:cover" height='300px' width='300px'/>
          </div>
        </div>
        <div class="row mb-4 mb-lg-6">

          <div class="col-lg-6 pr-lg-5">
            <p class="h5 font-weight-bold lh-180">

              <?php
              include './util/connection.php';
              $q = "select * from tbl_page";
              $abt = mysqli_query($conn, $q);
              if (mysqli_num_rows($abt) > 0) {
                while ($row = mysqli_fetch_array($abt)) {
                  $about = $row['about'];
                  echo "$about";
                }
              }
              ?>

            </p>
          </div>




          <div class="col-lg-6">
            <p class="lead lh-180">
              Digital Garden will assist students in learning more about the flora.
              They can also take part in planting more trees and become more involved
              in the process. This site is mainly oriented towards students of any
              particular college.
            </p>
            <p class="lead lh-180">
              Digital Garden was created by a group of students from
              <a href="https://www.alameencollege.org/">Al-Ameen College</a> as a part of their
              mini project. This website acts as form of database for the collection of trees.
            </p>
          </div>
        </div>
        <div class="col text-center">
          <a href="about.php" class="btn btn-md btn-primary animate-up-2 mr-3"><span class="btn-inner-text"><i
                class="fas fa-book-open mr-2"></i>Learn more about
              DigifyGarden</span></a>
        </div>
      </div>
    </div>


    <section class="section py-0">
      <div class="container">
        <div class="row position-relative align-items-center no-gutters z-2">
          <div class="col">
            <div class="card-group">
              <div class="card border-left-md border-soft py-2 px-3 py-lg-4 px-lg-5">
                <div class="card-body">
                  <h4>Follow us</h4>
                  <p class="lead mt-1 mb-1">
                    Our Team involved:
                  </p>
                  <div class="template-demo">
                    <h5 class="lead mt-3 mb-1">
                      <a href="https://www.hexameta.in">Hexameta Technologies</a>
                    </h5>
                    <a href="mail:hexametatech@gmail.com"><button type="button"
                        class="btn btn-social-icon btn-twitter btn-circle btn-md"><i
                          class="fas fa-envelope fa-2x"></i></button></a>
                    <a href="https://www.linkedin.com/company/hexameta-technologies/"><button type="button"
                        class="btn btn-social-icon btn-linkedin btn-circle  btn-md"><i
                          class="fab fa-linkedin fa-2x"></i></button></a>
                    <a href="https://www.instagram.com/hexameta.in/"><button type="button"
                        class="btn btn-social-icon btn-instagram btn-circle btn-md"><i
                          class="fab fa-instagram fa-2x"></i></button></a>
                    <!-- <h5 class="lead mt-3 mb-1">
                      <a href="https://jinojohn.me">Jino Manoj John</a>
                    </h5>
                    <a href="https://github.com/jinomanojjohn"><button type="button" class="btn btn-social-icon btn-github btn-circle btn-md"><i class="fab fa-github"></i></button></a>
                    <a href="https://www.behance.net/jinojohn6"><button type="button" class="btn btn-social-icon btn-behance btn-circle btn-md"><i class="fab fa-behance"></i></button></a>
                    <a href="https://www.linkedin.com/in/thejinojohn"><button type="button" class="btn btn-social-icon btn-linkedin btn-circle btn-md"><i class="fab fa-linkedin"></i></button></a>
                    <a href="http://www.instagram.com/the.jino"><button type="button" class="btn btn-social-icon btn-instagram btn-circle btn-md"><i class="fab fa-instagram"></i></button></a> -->
                  </div>

                </div>
              </div>
              <div class="card border-left-md border-soft py-2 px-3 py-lg-4 px-lg-5">
                <div class="card-body">
                  <h4>Want to support us?</h4>
                  <p class="lead mt-3 mb-4">
                    We are hard working people and we need every little bit of
                    help that we can get.
                  </p>
                  <a href="https://www.buymeacoffee.com/hexameta" class="btn btn-md btn-primary animate-up-2 mr-3"><i
                      class="fas fa-donate mr-1"></i> Donate</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer class="footer pt-10 pt-lg-10 pb-4 bg-soft text-dark mt-n9">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <a class="footer-brand" href="index.php"><img src="assets/img/brand/primary.svg" alt="brand" /></a>
          <h6 class="text-primary pt-4 pb-5">
            DigifyGarden - Non Profit digital garden
          </h6>
        </div>
      </div>
      <hr class="mb-5" />
      <div class="row">
        <div class="col mb-md-0">
          <div class="d-flex text-center justify-content-center align-items-center">
            <p class="small text-gray mb-0">
              ©
              <a href="https://www.hexameta.in" target="_blank">HexaMeta Technologies</a>
              <span class="current-year"></span>. All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
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
  <script>
    (function () {
      var js =
        "window['__CF$cv$params']={r:'759f143fcc604565',m:'lI6ZmiB37SfUK8GLi3T0IpR0eYjTnhWFLPQ2t.kPTDA-1665737550-0-AcgkQ1f8fYR3nHEkm9sx1SWAgDose8KZPoiIcAummCPMYbS/tNVk6Agj8x+V7Hw84L/eojrODq+AYUpv4y2eMVq0F4gbDQCg+byvaBBEU8IHDgR+atRVUhex8vCBU/Jd5Q==',s:[0x699cb87d30,0x8fdfafc44b],u:'/cdn-cgi/challenge-platform/h/g'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../cdn-cgi/challenge-platform/h/g/scripts/alpha/invisible5615.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";
      var _0xh = document.createElement("iframe");
      _0xh.height = 1;
      _0xh.width = 1;
      _0xh.style.position = "absolute";
      _0xh.style.top = 0;
      _0xh.style.left = 0;
      _0xh.style.border = "none";
      _0xh.style.visibility = "hidden";
      document.body.appendChild(_0xh);

      function handler() {
        var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
        if (_0xi) {
          var _0xj = _0xi.createElement("script");
          _0xj.nonce = "";
          _0xj.innerHTML = js;
          _0xi.getElementsByTagName("head")[0].appendChild(_0xj);
        }
      }
      if (document.readyState !== "loading") {
        handler();
      } else if (window.addEventListener) {
        document.addEventListener("DOMContentLoaded", handler);
      } else {
        var prev = document.onreadystatechange || function () { };
        document.onreadystatechange = function (e) {
          prev(e);
          if (document.readyState !== "loading") {
            document.onreadystatechange = prev;
            handler();
          }
        };
      }
    })();
  </script>

</body>

</html>