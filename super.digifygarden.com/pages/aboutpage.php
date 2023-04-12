<?php

session_start();

unset($_SESSION["u_id"]);
if (!isset($_SESSION['admin_id'])) {
    echo '<script type="text/javascript">
    window.location.href = "../" ;
    </script>';
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Digify Garden admin panel</title>
  <link rel="icon" type="image/x-icon" href="../../assets/img/brand/primary.png">

 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.4 -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
  <link href="../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
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
      <?php sidebar('imanage', $_SESSION['admin_name']); ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header ">
        <h1 class="" style="margin-left: 35%; margin-top: 5px;"> About Page </h1>
      </section>
      <div class="container pt-5">


        <?php
        include '../../util/connection.php';
        $q = "select * from tbl_page";
        $abt = mysqli_query($conn, $q);
        if (mysqli_num_rows($abt) > 0) {
          while ($row = mysqli_fetch_array($abt)) {
            $about = $row['about'];
            echo '<div class="row">
        <form  method="post">

           <textarea name="updabt" cols="150" style=" margin-top: 25px;"
     
             rows="20"  type="text" name="" id="">' . $about . '</textarea>
          <div>
          <button type="submit">Submit</button>
          </div>
          
     
     </form>
     </div>';
          }
        } else {
          echo '<div class="row ">
    <form   method="post">
 
       <textarea name="abt" cols="150" style=" margin-top: 25px;"
 
         rows="20"  type="text" name="" id=""></textarea>
      <div>
      <button type="submit">Submit</button>
      </div>
      
 
 </form>
 </div>';
        }

        ?>





      </div><!-- /.content-wrapper -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->


    <?php
    include '../../util/connection.php';
    $error = '';
    if (isset($_POST['abt'])) {
      $q = 'insert into tbl_page(about) values("' . $_POST['abt'] . '")';
      $res = mysqli_query($conn, $q);
      echo '<script type="text/javascript">
        window.location.href = "./aboutpage.php" ;
        </script>';
    }
    if (isset($_POST['updabt'])) {
      $q = 'update tbl_page set about="' . $_POST['updabt'] . '"';
      $res = mysqli_query($conn, $q);
      echo '<script type="text/javascript">
            window.location.href = "./aboutpage.php" ;
            </script>';
    }

    ?>

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function() {
        $("#example1").DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "deferRender": false,
          "info": true,
          "autoWidth": true,
          "responsive": true,
        });
      });
    </script>
</body>
<?php function evm($data)
{
  echo "<script>alert(" . $data . ")</script>";
} ?>

</html>