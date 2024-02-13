<?php
session_start();
unset($_SESSION["u_id"]);
if (!isset($_SESSION['admin_id'])) {
    echo '<script type="text/javascript">
 window.location.href = "../" ;
 </script>';
}
?>
<?php
include '../../util/connection.php';
$error = '';
if (isset($_POST['submit'])) {
    $t_id = $_POST['t_id'];
    $date = $_POST['offerdate'];
    $coupon_code = $_POST['coupon_code'];
    echo "$t_id,$date,$coupon_code";
    $query = "insert into tbl_offers (tree_id,coupon_code,date,status) values ('$t_id', '$coupon_code','$date',1)";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<script type="text/javascript">
    window.location.href = "../pages/offerList.php" ;
    </script>';
    } else {
        echo '<script type="text/javascript">
    alert("errro");
    </script>';
        $error = "Error Inserting";
    }
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
            <section class="content-header">
                <h1>
                    Add Offers
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <form class="form-horizontal" method="post">
                                                <?php
                                                include '../../util/connection.php';
                                                $query = "SELECT tbl_clg.u_id,tbl_clg.c_name FROM tbl_clg INNER JOIN tbl_clg_login ON tbl_clg_login.u_id = tbl_clg.u_id where tbl_clg_login.status = 1";
                                                $clg = mysqli_query($conn, $query);
                                                if (!$clg) {
                                                    echo "failed";
                                                }
                                                ?>
                                                <div id="div_id_username" class="form-group required">
                                                    <label for="id_username" class="control-label col-md-4 requiredField"> Colleges<span class="asteriskField">*</span> </label>
                                                    <div class="controls col-md-8 ">
                                                        <select class="input-md textinput textInput form-control" id="id_college" maxlength="30" name="c_id" placeholder="Choose college" style="margin-bottom: 10px" onchange="collegeOnchange(this)">
                                                            <option value="">
                                                                Select Option
                                                            </option>
                                                            <?php while ($rowData = mysqli_fetch_array($clg)) { ?>
                                                                <option value="<?php echo $rowData["u_id"] ?>">
                                                                    <?php echo $rowData["c_name"] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="div_id_username" class="form-group required">
                                                    <label for="id_tree" class="control-label col-md-4 requiredField">tree<span class="asteriskField">*</span> </label>
                                                    <div class="controls col-md-8 ">
                                                        <select class="input-md textinput textInput form-control" id="id_tree" maxlength="30" name="t_id" placeholder="Choose your tree" style="margin-bottom: 10px">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="div_id_email" class="form-group required">
                                                    <label for="id_email" class="control-label col-md-4 requiredField">
                                                        Coupon code<span class="asteriskField">*</span> </label>
                                                    <div class="controls col-md-8 ">
                                                        <input class="input-md form-control" id="id_email" name="coupon_code" placeholder="Enter Coupon Code" style="margin-bottom: 10px" type="text" />
                                                    </div>
                                                </div>
                                                <div id="div_id_password1" class="form-group required">
                                                    <label for="id_password1" class="control-label col-md-4 requiredField">Date<span class="asteriskField">*</span> </label>
                                                    <div class="controls col-md-8 ">
                                                        <input class="input-md textinput textInput form-control" id="id_password1" name="offerdate" placeholder="Input Date" style="margin-bottom: 10px" type="date" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="aab controls col-md-4 "></div>
                                                    <div class="controls col-md-8 ">
                                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                                                    </div>

                                                </div>
                                            </form>
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
        const collegeOnchange = (e) => {
            loadDoc(e.value)
        }

        function loadDoc(u_id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                const data = JSON.parse(this.response)
                const selectTag = document.getElementById("id_tree")
                selectTag.innerHTML = '';
                data.map((dt) => {
                    // create option using DOM
                    const newOption = document.createElement('option');
                    const optionText = document.createTextNode(dt.t_name + ' ' + dt.t_id);
                    // set option text
                    newOption.appendChild(optionText);
                    // and option value
                    newOption.setAttribute('value', dt.t_id);
                    selectTag.appendChild(newOption);
                })
            };
            xhttp.open("GET", "../api/getTreebyClgID.php?u_id=" + u_id, true);
            xhttp.send();
        }
    </script>
</body>
<?php function evm($data)
{
    echo "<script>alert(" . $data . ")</script>";
} ?>

</html>