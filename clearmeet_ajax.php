<?php
include 'db_connect.php';

$id=$_POST['id'];


			$query1="DELETE  FROM admin_jobs WHERE id='".$id."' ";
			$result1 = mysqli_query($con,$query1);

//$query = "UPDATE user SET meet='".$time."' WHERE id='".$id."'";
//$result = mysqli_query($con,$query);
	//if(!$result)
		//	die('Error: ' . mysqli_error());
		//else
			//header('Location: ' . $_SERVER['HTTP_REFERER']);







?>
<