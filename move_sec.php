<?php
	
	include 'db_connect.php';
	$mv = json_decode($_POST['mv']);

	foreach ($mv as $key => $value) {
		$query = "UPDATE user SET sec='".(int)$_POST['movein']."' WHERE id='".(int)$value."' ";
		$result = mysqli_query($con,$query);
		if(!$result)
			die('Error: ' . mysqli_error());
		else
			echo "success";
		
	}
mysqli_close($con);
?>