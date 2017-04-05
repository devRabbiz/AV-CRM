<?php
$con=mysqli_connect("127.0.0.1","root","","qq");
$bd=$con;
 if (mysqli_connect_error())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
require_once "functions.php";
?>