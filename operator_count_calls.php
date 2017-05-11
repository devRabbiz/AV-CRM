<?php
	require_once('db_connect.php');
	if (isset($_POST['id']) && isset($_POST['admin'])) {

		//$check=mysqli_query($con,"SELECT * FROM call_count WHERE id='".$_POST['id']."'") or die('error'.mysqli_error($con));


		//$r=mysqli_num_rows($check);

		//if ($r<1) {

		$go=mysqli_query($con,"INSERT INTO call_count(id,admin,calls) VALUES('".$_POST['id']."','".$_POST['admin']."',1) ") or die('error'.mysqli_error($con));
		
		//}else{
			//$go=mysqli_query($con,"UPDATE call_count SET calls=calls+1 WHERE id='".$_POST['id']."'") or die('error'.mysqli_error($con));

		//}


	}


?>