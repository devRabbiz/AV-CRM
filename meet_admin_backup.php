<?php
include 'db_connect.php';


$time=$_POST['dt'];
$id=$_POST['id'];
$admin=$_POST['admin'];
$name=$_POST['name'];

			$query1="INSERT INTO admin_jobs (admin, def,meet,name) VALUES ('".$admin."','".(int)$id."' ,'".$time."','".$name."')";
			$result1 = mysqli_query($con,$query1);

//$query = "UPDATE user SET meet='".$time."' WHERE id='".$id."'";
//$result = mysqli_query($con,$query);
	//if(!$result)
		//	die('Error: ' . mysqli_error());
		//else
			header('Location: ' . $_SERVER['HTTP_REFERER']);




mysqli_close($con);


?>