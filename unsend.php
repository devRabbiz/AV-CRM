<?php
include 'db_connect.php';
$id=$_POST['id'];
$op_name=$_POST['op_name'];
$sql="DELETE  FROM jobs WHERE id='".$id."'  AND operator='".$op_name."' ";
$set_null_admin=mysqli_query($con,"UPDATE user SET sendto=NULL WHERE id='".$id."'");
$set_op_status=mysqli_query($con,"UPDATE user SET op_status='all'  WHERE id='".$id."'");
$del_call_log=mysqli_query($con,"DELETE FROM last_call WHERE def='".$id."' AND admin='".$op_name."' ");
//$del_notes=mysqli_query($con,"DELETE FROM note WHERE id='".$id."' AND admin='".$op_name."' ");

$delete_from_op=mysqli_query($con,$sql);
	if (!$delete_from_op) {
		echo 'sql error';
	}
		
	

mysqli_close($con);
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>
