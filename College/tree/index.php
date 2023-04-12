<?php
session_start();

if (!isset($_SESSION['u_id'])) {
    echo '<script type="text/javascript">
window.location.href = "../../" ;
</script>';
}
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

    <?php
    include '../../util/connection.php';
    $error = '';

    if (isset($_POST['submit'])) {
        $t_name = $_POST['name'];
        $family = $_POST['family'];
        $synonym = $_POST['synonym'];
        $com_name = $_POST['comname'];
        $f_period = $_POST['period'];
        $origin = $_POST['origin'];
        $habitat = $_POST['habitat'];
        $uses = $_POST['uses'];
        $key_char = $_POST['char'];
        $u_id = $_SESSION['u_id'];
        $randomid = rand(10000, 99999);
        $t_id = substr($u_id, 0, 2) . date("dmY") . $randomid;
        $query = "INSERT INTO tbl_tree(t_id,u_id,t_name,family,synonym,com_name,f_period,origin,habitat,uses,key_char) VALUES ('$t_id','$u_id','$t_name', ' $family', '$synonym','$com_name','$f_period','$origin','$habitat','$uses','$key_char')";
        $result = mysqli_query($conn, $query);




        $target_dir = "./tree_images/";
        $target_file = $target_dir . $t_id . ".jpg";
        $uploadOk = 1;
        if ($_FILES["image"]["size"] > 500000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }


        if ($result) {

            if ($uploadOk == 0) {
                $error = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                    echo '<script>
        window.location.href = " ../tree_list.php" ;
        </script>';
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $error =  "Tree Not Added";
        }
    }


    ?>

    <div class="wrapper wrapper--w680">

        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Tree Registration</h2>
                <?php echo $error  ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="NAME" name="name" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="FAMILY" name="family" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="SYNONYM" name="synonym" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="COMMON NAME" name="comname" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="PERIOD" name="period" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="ORIGIN" name="origin" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="HABITAT" name="habitat" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="USES" name="uses" required>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" name="char" id="" cols="30" rows="10" placeholder="charecter" required>
                    </div>
                    <div class="input-group">
                        <label>Tree Image</label>
                        <input class="input--style-10"  accept="image/*" type="file" name="image" id="" required>
                    </div>

                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" name="submit" type="submit">Submit</button>

                        <a class="btn btn--radius btn--red" href="../">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


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