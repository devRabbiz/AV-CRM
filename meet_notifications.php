<?php 

	include_once 'session.php';
	include_once 'db_connect.php';
	$conn = $connectionN;
		
	if (isset($_SESSION['operator_username'])) {
		

		//the SQL query to be executed
		$query = "SELECT  * FROM jobs where operator='".$_SESSION['operator_username']."' AND meet  IS NOT  NULL ";


		//storing the result of the executed query
		$result = $conn->query($query);

		//initialize the array to store the processed data
		$notifArray = array();

		//check if there is any data returned by the SQL Query

		  //Converting the results into an associative array
		  while($row = $result->fetch_assoc()) {

		  	$queryName = "SELECT  id,name FROM user where id='".$row['id']."' ";
		  	$resultName = $conn->query($queryName);
		  	$rowName = $resultName->fetch_assoc();

		    $notif = array();
		    $notif['id'] = $row['def'];
		    $notif['operator'] = $row['operator'];
		    $notif['user_id'] = $row['id'];
		    $notif['status'] = $row['status'];
		    $notif['note'] = $row['note'];
		    $notif['last_call'] = $row['last_call'];
		    $notif['meet'] = $row['meet'];
		    $notif['name'] = $rowName['name'];

		    //append the above created object into the main array.
		    array_push($notifArray, $notif);

			}
		 



		//Closing the connection to DB
		$conn->close();

		//set the response content type as JSON
		header('Content-type: application/json');
		//output the return value of json encode using the echo function. 
		echo json_encode($notifArray);
		

	}

 ?>