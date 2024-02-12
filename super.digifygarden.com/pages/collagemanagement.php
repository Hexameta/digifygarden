<?php
session_start();
unset($_SESSION["u_id"]);
if (!isset($_SESSION['admin_id'])) {
  // header('location: ../');
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
      $query = "SELECT * FROM tbl_clg INNER JOIN tbl_clg_address ON tbl_clg.a_id = tbl_clg_address.a_id INNER JOIN tbl_clg_login ON tbl_clg.u_id = tbl_clg_login.u_id;";

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
                <h3 class="box-title">College Management Table</h3>
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
                      <th>Registration date</th>
                      <th>Password</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php
$si=0;
                    if (mysqli_num_rows($clg) > 0) {

                      while ($rowData = mysqli_fetch_array($clg)) {
                        $si++;
                        $i = $rowData['u_id'];
                        $date_string = $rowData['clg_reg_date'];
                        $formatted_date = date("F j, Y", strtotime($date_string));

                        echo " <tr>
    <td>".$si."</td>
    <td><a href='clgdetailsview.php?id=" . ($rowData['u_id']) . "'>  " . ($rowData['c_name']) . "</a></td>
    <td><a href='https://digifygarden.com/uploads/".$rowData['u_id'].".pdf '   data-u-id='" . $rowData['u_id'] . "'>".$rowData['u_id']."</a></td>
    
    <td>" . ($rowData['uni_name']) . "</td>
    <td><i>" . ($rowData['city']) . "</i></td>
   
    <td>" . ($rowData['mobnum']) . "</td>
    <td>" . ($rowData['email']) . "</td>
    <td>" . ($formatted_date) . "</td>
    
    <td><a href='changePass.php?user_id=" . ($rowData['u_id']) . "'>Change</a></td>
    ";
                    ?>
                        <?php
                        if ($rowData['status'] == 1) { ?>
                          <form method="post" action="usermanage.php" name="usermanage">
                            <input type="hidden" <?php echo "value=" . ($rowData['u_id']) . ""; ?> name="uid" hidden>
                            <td><button type="submit" name="block" class="btn btn-primary btn-xs bg-green" data-toggle="modal" data-target="#edit">active</button>
                            
                            </td>
                          </form>

                        <?php } else if ($rowData['status'] == 0) { ?>


                          <form method="post" action="usermanage.php" name="usermanage">
                            <input type="hidden" value="<?php echo $rowData['u_id'] ?>" name="uid">
                            <td><button type="submit" name="approve" class="btn btn-primary btn-xs bg-green" data-toggle="modal" data-target="#edit">APPROVE</button>
                          </form>
                          <button data-target="#popup<?php echo $rowData['u_id']  ?>" data-toggle="modal" class="btn btn-danger btn-xs bg-red">REJECT</button></td>

                          <div class="modal" id="popup<?php echo $rowData['u_id']  ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Reject College</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form method="post" action="usermanage.php" name="usermanage">
                                  <div class="modal-body">

                                    <input type="hidden" <?php echo "value=" . ($rowData['u_id']) . "";  ?> name="uid" hidden>

                                    <input type="text" name="remarks">

                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name="reject" class="btn btn-primary">reject</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                              </div>
                            </div>
                          </div>
              </div>

            <?php } else if ($rowData['status'] == 2) { ?>
              <form method="post" action="usermanage.php" name="usermanage">
                <input type="hidden" <?php echo "value=" . ($rowData['u_id']) . "";  ?> name="uid" hidden>
                <td><button type="submit" name="unblock" class="btn btn-primary btn-xs bg-red" data-toggle="modal" data-target="#edit">block</button>
                </td>
                </td>
              </form>
            <?php } else { ?>
              <form method="post" action="usermanage.php" name="usermanage">
                <input type="hidden" <?php echo "value=" . ($rowData['u_id']) . "";  ?> name="uid" hidden>
                <td><small class='label bg-red'>Rejected</small>
                </td>
              </form>
            <?php } ?>


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
            <th>Registration date</th>
        
            <th>Actions</th>
            <th>Status</th>
          </tr>
        </tfoot>
        </table>
        
        <div class="modal fade" id="viewProof">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">src="../../uploads/proof_u_id.pdf"</h4>
            </div>
            <div class="modal-body">
                <embed src="../../uploads/proof_u_id.pdf" frameborder="0" width="100%" height="600px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




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


<script>
$(document).ready(function() {
    $('#viewProof').on('show.bs.modal', function(e) {
        var u_id = $(e.relatedTarget).data('u-id');
        var href = $(e.currentTarget).find('.modal-body embed').attr('src');
        href = href.replace(/u_id_placeholder/g, u_id);
        $(e.currentTarget).find('.modal-body embed').attr('src', href);
        $(e.currentTarget).find('.modal-title').html('src="../../uploads/'+u_id+'.pdf"');
    });
});
</script>

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
        "scrollX": true,
      });
    });
  </script>
</body>
<?php function evm($data)
{
  echo "<script>alert(" . $data . ")</script>";
} ?>

</html>