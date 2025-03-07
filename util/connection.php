<?php
//live host
$servername = "localhost";
$username = "digifyadmin";
$password = "Digify@alameen2023";
$dbname = "egarden";

// local
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "egarden";

// live server
// $servername = "68.178.145.241";
// $username = "digifyadmin";
// $password = "Digify@alameen2023";
// $dbname = "egarden";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
