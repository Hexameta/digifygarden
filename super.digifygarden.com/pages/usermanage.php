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

//0 for waiting
//1 for active
//2 for block
//else for deleted

if (isset($_POST['approve'])) {

    $u_id = $_POST['uid'];

    echo "<script type='text/javascript'>
alert(" . $u_id . ");
console.log(" . $_POST['uid'] . ");
</script>";
    echo $_POST['uid'];
    $q = "update tbl_clg_login set status = '1' where u_id = '" . $u_id . "'";

    $result = mysqli_query($conn, $q);
    if ($result) {


        echo '<script type="text/javascript">
            window.location.href = "./collagemanagement.php" ;
            </script>';
    } else {
        $error =  "Invalid Credentials";
    }
} elseif (isset($_POST['block'])) {


    $u_id = $_POST['uid'];
    $q = "update tbl_clg_login set status = '2' where u_id = '" . $u_id . "'";
    $result = mysqli_query($conn, $q);
    if ($result) {


        echo '<script type="text/javascript">
            window.location.href = "collagemanagement.php" ;
            </script>';
    } else {
        $error =  "Invalid Credentials";
    }
} elseif (isset($_POST['reject'])) {


    $u_id = $_POST['uid'];
    $remarks = $_POST['remarks'];
    $q = "update tbl_clg_login set status = '3', remarks='$remarks' where u_id = '$u_id'";

    $result = mysqli_query($conn, $q);
    if ($result) {


        echo '<script type="text/javascript">
           window.location.href = "collagemanagement.php" ;
           </script>';
    } else {
        $error =  "Invalid Credentials";
    }
} elseif (isset($_POST['unblock'])) {
  

    $u_id = $_POST['uid'];
    $q = "update tbl_clg_login set status = '1' where u_id = '" . $u_id . "'";
    $result = mysqli_query($conn, $q);
    if ($result) {

        echo '<script type="text/javascript">
           window.location.href = "collagemanagement.php" ;
           </script>';
    } else {
        $error =  "Invalid Credentials";
    }
} elseif (isset($_POST['delete'])) {


    $u_id = $_POST['uid'];
    $q = "DELETE FROM tbl_clg WHERE u_id ='" . $u_id . "'";
    $result = mysqli_query($conn, $q);
    if ($result) {



        echo '<script type="text/javascript">
           window.location.href = "collagemanagement.php" ;
           </script>';
    } else {
        $error =  "Invalid Credentials";
    }
} else {
    echo "uid not get";
}


?>