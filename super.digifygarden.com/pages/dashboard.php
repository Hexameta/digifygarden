<?php
session_start();
unset($_SESSION["u_id"]);
if (!isset($_SESSION['admin_id'])) {
  echo '<script type="text/javascript">
  window.location.href = "../" ;
  </script>';
}
include '../../util/connection.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Digify Garden admin panel</title>
  <link rel="icon" type="image/x-icon" href="../../assets/img/brand/primary.png">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.4 -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="../plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="../plugins/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- Date Picker -->
  <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7496626222666537"
     crossorigin="anonymous"></script>

</head>

<body class="skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include '../components/navigation.php';
    navigationBar($_SESSION['admin_name']);
    ?>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <?php sidebar('dashboard', $_SESSION['admin_name']); ?>
    </aside>

    <?php

    $tnum = 0;
    $tclg = 0;
    $pclg = 0;
    $query1 = "SELECT * FROM tbl_tree;";

    $res = mysqli_query($conn, $query1);
    if (mysqli_num_rows($res) > 0) {
      $tnum = mysqli_num_rows($res);
    }

    $query2 = "SELECT * FROM tbl_clg_login WHERE status=1";

    $res = mysqli_query($conn, $query2);
    if (mysqli_num_rows($res) > 0) {
      $tclg = mysqli_num_rows($res);
    }
    $q = "SELECT * FROM tbl_clg_login WHERE status=0";
    $res = mysqli_query($conn, $q);
    if (mysqli_num_rows($res) > 0) {
      $pclg = mysqli_num_rows($res);
    }



    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Admin Dashboard
        </h1>
        <ol class="breadcrumb">
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $tclg; ?></h3>
                <p>Total Colleges</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>
              <a href="./collagemanagement.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $tnum; ?></h3>
                <p>Total Trees</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="./clgtreeview.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->
          <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $pclg; ?></h3>
                <p>Pending Request</p>
              </div>
              <div class="icon">
                <i class=" fa-message"></i>
              </div>
              <a href="./collagemanagement.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div><!-- ./col -->

        </div><!-- /.row -->
        <!-- Main row -->
        <div class="row">


        </div><!-- /.row (main row) -->

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">

      </div>
      <strong>Copyright &copy; 2022-2023 <a href="">DigifyGarden</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="../plugins/morris/morris.min.js" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- jvectormap -->
  <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
  <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js" type="text/javascript"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js" type="text/javascript"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js" type="text/javascript"></script>
</body>

</html>