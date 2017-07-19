<?php
include_once 'session.php';
//address of the server where db is installed
$servername = "localhost";

//username to connect to the db
//the default value is root
$username = "root";

//password to connect to the db
//this is the value you would have specified during installation of WAMP stack
$password = "";

//name of the db under which the table is created
$dbName = "reg_db";

//establishing the connection to the db.
$conn = new mysqli($servername, $username, $password, $dbName);

//checking if there were any error during the last connection attempt
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}






if (isset($_POST['id'])) {

$query1 = "UPDATE notifications SET isRead=0 where id='".(int)$_POST['id']."' ";

$result1 = $conn->query($query1);

 

}





//the SQL query to be executed
$query = "SELECT  * FROM notifications where admin='".$_SESSION['operator_username']."' and isRead=1";


//storing the result of the executed query
$result = $conn->query($query);

//initialize the array to store the processed data
$notifA = array();

//check if there is any data returned by the SQL Query

  //Converting the results into an associative array
  while($row = $result->fetch_assoc()) {
      
    $notif = array();
    $notif['id'] = $row['id'];
    $notif['admin'] = $row['admin'];
    $notif['title'] = $row['title'];
    $notif['text'] = $row['text'];
    $notif['isRead'] = $row['isRead'];
    $notif['date'] = $row['date'];
    $notif['color'] = $row['color'];
    //append the above created object into the main array.
    array_push($notifA, $notif);

	}
 



//Closing the connection to DB
$conn->close();

//set the response content type as JSON
header('Content-type: application/json');
//output the return value of json encode using the echo function. 
echo json_encode($notifA);
?>
