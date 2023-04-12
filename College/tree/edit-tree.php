<?php
session_start();

if (!isset($_SESSION['u_id'])) {

    echo '<script type="text/javascript">
window.location.href = "../../" ;
</script>';
}

if (!isset($_GET['id'])) {
    echo "<script>
    history.back();
    </script>
    ";
}


include '../../util/connection.php';
$error = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Digital Garden</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/brand/primary.png">
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>




    <div class="wrapper wrapper--w680">

        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Tree Registration</h2>
                <?php
                if (isset($_GET['regerror'])) {
                    echo "<h5 style='color:red;'>" . $_GET['regerror'] . "</h5>";
                }



                ?>
                <form action="edit-treedetails.php" method="POST" enctype="multipart/form-data">

                    <?php

                    $t_id = $_GET['id'];

                    $query = "SELECT * FROM tbl_tree WHERE `t_id` = '" . $t_id . "' ";

                    $tdetails = mysqli_query($conn, $query);
                    if (!$tdetails) {
                        echo "failed";
                    } else {
                        if (mysqli_num_rows($tdetails) > 0) {
                            while ($rowData = mysqli_fetch_array($tdetails)) {

                                $t_name = $rowData["t_name"];
                                $family = $rowData["family"];
                                $synonym = $rowData["synonym"];
                                $com_name = $rowData["com_name"];
                                $origin = $rowData["origin"];
                                $habitat = $rowData["habitat"];
                                $fperiod = $rowData["f_period"];
                                $uses = $rowData["uses"];
                                $key_char = $rowData["key_char"];
                            }
                        }
                    }

                    ?>

                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="NAME" value="<?php echo $t_name ?>" name="name">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="FAMILY" value="<?php echo $family ?>" name="family">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="SYNONYM" value="<?php echo $synonym ?> " name="synonym">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="COMMON NAME" value="<?php echo $com_name ?> " name="comname">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="PERIOD" value="<?php echo $fperiod ?> " name="period">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="ORIGIN" value="<?php echo $origin ?> " name="origin">
                    </div>


                    <input class="input--style-1" hidden placeholder="ORIGIN" value="<?php echo $t_id ?>" name="tid">




                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="HABITAT" value="<?php echo $habitat ?> " name="habitat">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="USES" value="<?php echo $uses ?> " name="uses">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" name="char" id="" cols="30" value="<?php echo $key_char ?> " rows="10" placeholder="charecter">
                    </div>
                    <div class="input-group">
                        <?php
                        echo '<img src="./tree_images/' . $t_id . '.jpg" alt="not found"  style="width: 100px; height:auto" id="imgView1">';
                        ?>

                        <input class="input--style-1" type="file" name="image" id="" onchange="viewImage1(event)">
                    </div>


                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" name="submit" type="submit">Submit</button>

                        <a class="btn btn--radius btn--red" href="../tree_list.php">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function viewImage1(event) {
            document.getElementById('imgView1').src = URL.createObjectURL(event.target.files[0])
        }
    </script>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>