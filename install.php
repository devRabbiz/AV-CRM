<head>
  <link href="dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<div class="panel panel-danger">
  <div class="panel-heading">
<?php 
   
if (isset($_POST['submit'])) {
   

   $dbhost = $_POST['host'];
   $dbuser = $_POST['mysql_username'];
   $dbpass = $_POST['mysql_password'];
   $dbname=$_POST['db_name'];

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  

// Create database
$sql = "CREATE DATABASE ".$dbname;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";

$txt =
'<?php
$con=mysqli_connect("'
.$dbhost.'","'
.$dbuser.'","'
.$dbpass.'","'
.$dbname.'");
$bd=$con;
 if (mysqli_connect_error())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
require_once "functions.php";
?>';

   file_put_contents('dbex.php',$txt);


$conn->select_db($dbname);

$query1 = file_get_contents("reg_db.sql");

/* execute multi query */
if ($conn->multi_query($query1))
     echo "Success";
else 
     echo "Fail";




} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

}


?>
</div>
</div>
<div class="container">
<center class="well">
<div class="input-group col-md-6"> 
<form action="" method="POST">

     <input type="text" class="form-control" placeholder="Host" name="host">
    <input class="form-control" type="text" placeholder="DB name" name="db_name">
    <input type="text" class="form-control" placeholder="DB username" name="mysql_username">
    <input type="text" class="form-control" placeholder="DB password" name="mysql_password">
<br>
	<button type="submit" style="float: right;" class="btn btn-success" name="submit">Install</button>
</form>

</div>
  </center>
  </div>