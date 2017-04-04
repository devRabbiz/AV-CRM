<?php
 $con=mysqli_connect("127.0.0.1","root","","reg_db");
 //global $conn=mysqli_connect("127.0.0.1","root","","reg_db");
$bd=$con;
 
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
require_once 'functions.php';
 ?>