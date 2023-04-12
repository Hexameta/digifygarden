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

  <!-- Tell the browser to be responsive to screen width -->
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
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
      <section class="content-header">
        <h1>
          College Management
          <small></small>
        </h1>

      </section>

      <?php

      include '../../util/connection.php';
      $query = "SELECT * FROM tbl_clg INNER JOIN tbl_clg_address ON tbl_clg.a_id = tbl_clg_address.a_id INNER JOIN tbl_clg_login ON tbl_clg.u_id = tbl_clg_login.u_id where tbl_clg_login.status = '1';";

      $clg = mysqli_query($conn, $query);
      if (!$clg) {
        echo "failed";
      }


      ?>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tree Management Table</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%">Sl No.</th>
                      <th>College Name</th>
                      <th>AISCHE Code</th>
                      <th>University</th>
                      <th>Place</th>
                     
                      <th>Mobile Number</th>
                      <th>Email</th>

                    </tr>
                  </thead>
                  <tbody>


                    <?php
$i=0;
                    if (mysqli_num_rows($clg) > 0) {

                      while ($rowData = mysqli_fetch_array($clg)) {
$i++;
                        echo " <tr>
    <td>".$i."</td>
    <td><a href='treemanagement.php?id=" . ($rowData['u_id']) . "'>  " . ($rowData['c_name']) . "</a></td>
    <td><i >" . ($rowData['u_id']) . "</i></td>
    
    <td>" . ($rowData['uni_name']) . "</td>
    <td><i >" . ($rowData['city']) . "</i></td>
   
    <td>" . ($rowData['mobnum']) . "</td>
    <td>" . ($rowData['email']) . "</td>";
                    ?>


                        </tr>

                    <?php

                      }
                    }
                    ?>



                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Sl No.</th>
                      <th>College Name</th>
                      <th>AISCHE Code</th>
                      <th>University</th>
                      <th>Place</th>
                    
                      <th>Mobile Number</th>
                      <th>Email</th>


                    </tr>
                  </tfoot>
                </table>
                <?php $i = 0;
                while ($i < 25) {
                  $i = $i + 1 ?>
                  <div class="modal fade" <?php echo "id=" . "'edit" . $i . "'" ?>>
                    <div class="modal-dialog">
                      <H1><?php echo $i ?></H1>
                      <img src="https://images.sampletemplates.com/wp-content/uploads/2016/12/21102637/Technical-Business-Document.jpg">
                    </div><!-- /.modal-dialog -->
                  </div>
                <?php } ?>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->


  <?php
  include '../../util/connection.php';
  $error = '';
  if (isset($_POST['submit'])) {
    $c_id = $_POST['c_id'];
    $password = $_POST['password'];
    $query = "SELECT u_id FROM tbl_clg_login WHERE `u_id` = '$c_id' AND `password` = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      $_SESSION['u_id'] = $c_id;
      // header("Location: ../College/");
      echo '<script type="text/javascript">
        window.location.href = "../College/" ;
        </script>';
    } else {
      $error =  "Invalid Credentials";
    }
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