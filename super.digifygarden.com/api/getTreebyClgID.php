<?php
include '../../util/connection.php';
$u_id = $_GET["u_id"];
$query = "SELECT * from tbl_tree where u_id='$u_id'";

$clg = mysqli_query($conn, $query);

$res = array();
while ($row = mysqli_fetch_assoc($clg)) {
    $res[] = $row;
}
echo json_encode($res);