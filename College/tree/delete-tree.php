
<?php
include '../../util/connection.php';

if (isset($_GET['id'])) {


    $tid = $_GET['id'];
    $q = "DELETE FROM tbl_tree WHERE t_id='$tid'";

    $result = mysqli_query($conn, $q);

    if ($result) {
        $target_dir = "./tree_images/";
        $target_file = $target_dir . $tid . ".jpg";
        unlink($target_file);
        echo '<script type="text/javascript">
        window.location.href = "../tree_list.php" ;
        </script>';
    }
}

?>

