<?php 
require_once '../../db_connect.php';
$id=mysqli_real_escape_string($con,$_POST['fbid']);
$name=mysqli_real_escape_string($con,$_POST['fbname']);
$email=mysqli_real_escape_string($con,$_POST['fbemail']);
$phone=mysqli_real_escape_string($con,$_POST['phone']);

	//check if exist
	$check=mysqli_query($con,"SELECT * FROM fb_reg where fbid='".$_POST['fbid']."'");
	if (mysqli_num_rows($check) < 1) {


		$query="INSERT INTO fb_reg (`fbid`,`fbname`,`fbemail`,`phone`) VALUES ('".$id."','".$name."','".$email."','".$phone."')";
	$in=mysqli_query($con,$query);

	if ($in) {
		echo "success";
	} else {
		print_r($con);
	}

		
	} else {
		echo "exist";
	}
			

	


?>