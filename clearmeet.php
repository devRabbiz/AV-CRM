<?php
include 'db_connect.php';


$id=$_POST['id'];

$q="INSERT INTO last_call(def,lcall,admin) SELECT id,meet,operator FROM jobs WHERE jobs.id='".$id."' ";
             $r = mysqli_query($con,$q);
$query = "UPDATE jobs SET meet=NULL WHERE id='".$id."'";
		$result = mysqli_query($con,$query);
		if(!$result)
			die('Error: ' . mysqli_error());
		else
			
			header('Location: ' . $_SERVER['HTTP_REFERER']);




mysqli_close($con);


?>