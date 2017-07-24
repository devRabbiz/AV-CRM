<?php
include 'db_connect.php';

if (isset($_GET['remove'])) {
	
	$remove=mysqli_query($con,"DELETE FROM note WHERE def='".$_POST['def']."'");
	mysqli_close($con);
	
} else{


$notetoadd=mysqli_escape_string($con,$_POST['notetoadd']);
$admin= mysqli_escape_string($con,$_POST['admin']);
$user_id=mysqli_escape_string($con,$_POST['user_id']);

$query = " INSERT INTO note ( id, admin, note) VALUES ('".$user_id."', '".$admin."', '".$notetoadd."')";
		$result = mysqli_query($con,$query) or die('Error: ' . mysqli_error($con));
header('Location: ' . $_SERVER['HTTP_REFERER']);

mysqli_close($con);
}

?> 
