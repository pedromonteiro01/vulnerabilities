<?php
$servername = "sio-vulnerabilities-db";
$username = "user";
$password = "password";
$dbname = "sio-vulnerabilities";

// Create connection
$conn= mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>