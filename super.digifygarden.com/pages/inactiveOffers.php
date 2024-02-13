<?php
include '../../util/connection.php';
$query = "UPDATE tbl_offers set status = 0";
mysqli_query($conn, $query);
header("location:offerList.php");