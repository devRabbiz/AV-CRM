<?php
	
	include 'db_connect.php';
	$id=$_POST['id'];
	$status=$_POST['status'];

		$query = "UPDATE jobs SET status='".$status."' WHERE def='".(int)$id."' ";
		$setToUserTable=mysqli_query($con,"UPDATE user SET op_status='".$status."' WHERE id='".(int)$id."' ");
		$result = mysqli_query($con,$query);
		if(!$result)
			die('Error: ' . mysqli_error());
		else
			echo "success";
		

mysqli_close($con);
?>