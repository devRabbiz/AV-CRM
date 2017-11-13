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

if ($_POST['asterisk']=='on') {
    $txt =
        '<?php
         $con=mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
         //$conn= new mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
        $connectionN = new mysqli("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
        $bd=$con;
        $host = "'.$dbhost.'";
        $username = "'.$dbuser.'";
        $password = "'.$dbpass.'";
        $database = "asterisk";
        $dbconfig = mysqli_connect($host,$username,$password,$database);
         
        // Check connection
        if (mysqli_connect_error())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
        require_once "functions.php";

         ?>';
} else {
    $txt =
          '<?php
           $con=mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
           //$conn= new mysqli_connect("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
          $connectionN = new mysqli("'.$dbhost.'","'.$dbuser.'","'.$dbpass.'","reg_db");
          $bd=$con;
          $host = "'.$dbhost.'";
          $username = "'.$dbuser.'";
          $password = "'.$dbpass.'";
          $database = "asterisk";
          #$dbconfig = mysqli_connect($host,$username,$password,$database);
           
          // Check connection
          if (mysqli_connect_error())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
          require_once "functions.php";

           ?>';

}

$file_db = fopen("db_connect.php", "w") or die("Unable to db file!");
fwrite($file_db, $txt);
fclose($file_db);



// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
if ($_POST['create_db']=='on') {
 // Create database
$sql = "CREATE DATABASE `reg_db` ";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";


$query1 = file_get_contents("reg_db(structure).sql");

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
}



?>
</div>
</div>
<div class="container">
<center class="well">
<div class="input-group col-md-6"> 
<form action="" method="POST">

    <input type="text" class="form-control" placeholder="Host" name="host">
    <input type="text" class="form-control" placeholder="DB username" name="mysql_username">
    <input type="text" class="form-control" placeholder="DB password" name="mysql_password">
    <label>
    <input type="checkbox" class="btn-default btn form-control" name="asterisk">Asterisk
    </label>
    <label>
          <input type="checkbox" name="create_db" class="form-control btn btn-default">Create DB
    </label>

<br>
  <button type="submit" style="float: right;" class="btn btn-success" name="submit">Install</button>
</form>

</div>
  </center>
  </div>