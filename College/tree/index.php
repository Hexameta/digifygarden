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
    <meta name="google-adsense-account" content="ca-pub-8430383438150416">
    <!-- Title Page-->
    <title>Digital Garden</title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/brand/primary.png">
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8430383438150416"
        crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include '../../util/connection.php';
    $error = '';

    if (isset($_POST['submit'])) {
        $t_name = mysqli_escape_string($conn, $_POST['name']);
        $family = mysqli_escape_string($conn, $_POST['family']);
        $synonym = mysqli_escape_string($conn, $_POST['synonym']);
        $com_name = mysqli_escape_string($conn, $_POST['comname']);
        $f_period = mysqli_escape_string($conn, $_POST['period']);
        $origin = mysqli_escape_string($conn, $_POST['origin']);
        $habitat = mysqli_escape_string($conn, $_POST['habitat']);
        $uses = mysqli_escape_string($conn, $_POST['uses']);
        $key_char = mysqli_escape_string($conn, $_POST['char']);
        $u_id = $_SESSION['u_id'];
        $randomid = rand(10000, 99999);
        $t_id = substr($u_id, 0, 2) . date("dmY") . $randomid;

        $query = "INSERT INTO tbl_tree(t_id,u_id,t_name,family,synonym,com_name,f_period,origin,habitat,uses,key_char) VALUES ('$t_id','$u_id','$t_name', ' $family', '$synonym','$com_name','$f_period','$origin','$habitat','$uses','$key_char')";




        $target_dir = "./tree_images/";
        $target_file = $target_dir . $t_id . ".jpg";
        $uploadOk = 1;
        if ($_FILES["image"]["size"] > 5000000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if (isset($_FILES['audio'])) {
            $fileName = $_FILES['audio']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $target_dir = "./tree_audios/";
            if($fileExtension == 'mp3'){
                $audio_target_file = $target_dir . $t_id . ".mp3";
                move_uploaded_file($_FILES["audio"]["tmp_name"], $audio_target_file);
            }else{
                $error = "Audio file must be in mp3 format";
                $uploadOk = 0;
            }
        }


        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                if($result = mysqli_query($conn, $query)){
                    echo '<script>
                    window.location.href = " ../tree_list.php" ;
                    </script>';
                }
                else {
                    unlink($target_file);
                    $error = "Tree Not Added";
                }
            } else {
                $error = "Sorry, there was an error uploading your file.";
            }
        }
    }


    ?>

    <div class="wrapper wrapper--w680">

        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Tree Registration</h2>
                <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php } ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Name*" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Family*" name="family" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Synonym*" name="synonym"
                                    required>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Common Name*" name="comname"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Period*" name="period" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Origin*" name="origin" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Habitat*" name="habitat"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Uses*" name="uses" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea class="form-control" name="char" placeholder="Character*" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tree Image*</label>
                                <input accept="image/*" type="file" class="form-control" name="image" id="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Audio</label>
                                <input accept="audio/mp3" type="file" class="form-control" name="audio" id="">
                            </div>
                        </div>
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