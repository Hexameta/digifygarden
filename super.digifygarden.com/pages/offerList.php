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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7496626222666537" crossorigin="anonymous"></script>

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
            <section class="d-flex flex-row content-header ">
                <h1>
                    Offers
                </h1>


            </section>

            <?php

            include '../../util/connection.php';
            $query = "SELECT tbl_offers.*,tbl_tree.t_name,tbl_clg.c_name,tbl_clg_address.district,tbl_clg_address.city FROM tbl_offers INNER JOIN tbl_tree ON tbl_tree.t_id = tbl_offers.tree_id INNER JOIN tbl_clg ON tbl_clg.u_id = tbl_tree.u_id inner join tbl_clg_address on tbl_clg_address.a_id = tbl_clg.a_id order by tbl_offers.date DESC ";

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
                            <div style="display:flex; flex-direction:row; justify-content:space-between; align-items:center; padding:10px">
                                <h3>Tree Management Table</h3>
                                <a href="./addOffer.php"><button style="height:40px">Add Offer</button></a>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr>
                                            <th width="5%">Sl No.</th>
                                            <th>College Name</th>
                                            <th>Tree ID</th>
                                            <th>Tree</th>
                                            <th>City</th>
                                            <th>District</th>
                                            <th>Date</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $i = 0;

                                        if (mysqli_num_rows($clg) > 0) {

                                            while ($rowData = mysqli_fetch_array($clg)) {
                                                $i++;
                                                $date = new DateTime($rowData["date"]);
                                                $sts = "";
                                                if ($rowData["status"] == 1) {
                                                    $sts = "<Button style='background-color:#090;color:#fff;border:none'>Active</Button>";
                                                } else if($rowData["status"] == 3) {
                                                    $sts = "<a href='inactiveOffers.php'><Button style='background-color:#990;color:#fff;border:none'>Completed</Button></a>";
                                                }else{
                                                    $sts = "<Button style='background-color:#900;color:#fff;border:none'>Inactive</Button>";
                                                }
                                                echo " <tr>
    <td>" . $i . "</td>
    <td>" . ($rowData['c_name']) . "</td>
    <td>" . ($rowData['tree_id']) . "</td>
    <td>" . ($rowData['t_name']) . "</td>
    
    <td>" . ($rowData['city']) . "</td>
    <td>" . ($rowData['district']) . "</td>
   
    <td>" . $date->format('d-m-Y') . "</td>
    <td>" . $sts . "</td>";
                                        ?>

                                                </tr>

                                        <?php

                                            }
                                        } else {
                                            echo "error";
                                        }
                                        ?>



                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>College Name</th>
                                            <th>Tree ID</th>
                                            <th>Tree</th>
                                            <th>City</th>
                                            <th>District</th>
                                            <th>Date</th>
                                            <th>Status</th>


                                        </tr>
                                    </tfoot>
                                </table>
                                <?php $i = 0;
                                while ($i < 25) {
                                    $i = $i + 1 ?>
                                    <div class="modal fade" <?php echo "id=" . "'edit" . $i . "'" ?>>
                                        <div class="modal-dialog">
                                            <H1>
                                                <?php echo $i ?>
                                            </H1>
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
            $error = "Invalid Credentials";
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
                // "autoWidth": true,
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