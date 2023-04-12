<?php
$servername = "localhost";
$username = "digifyadmin";
$password = "Digify@alameen2023";
$dbname = "egarden";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
