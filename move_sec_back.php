<?php
	
	include 'db_connect.php';
	$arr = json_decode($_POST['arr']);
	foreach ($arr as $key => $value) {
		$query = "UPDATE user SET sec='1' WHERE id='".(int)$value."'";
		$result = mysqli_query($con,$query);
		if(!$result)
			die('Error: ' . mysqli_error());
		else
			echo "success";
		
	}
mysqli_close($con);
?>