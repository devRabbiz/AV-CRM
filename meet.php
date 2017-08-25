<?php
include 'db_connect.php';



$id=$_POST['id'];
$status=$_POST['status'];

if (isset($_POST['dt'])) {
   

$query = "UPDATE jobs SET meet='".$_POST['dt']."',status='".$status."' WHERE id='".$id."'AND operator='".$_SESSION['operator_username']."'";
		$result = mysqli_query($con,$query);
			
} else{
	$query = "UPDATE jobs SET status='".$status."' WHERE id='".$id."'AND operator='".$_SESSION['operator_username']."'";
		$cls=mysqli_query($con,"UPDATE jobs SET meet=NULL WHERE id='".$id."' AND operator='".$_SESSION['operator_username']."'");
		$result = mysqli_query($con,$query);
}

	$set_status_admin=mysqli_query($con,"UPDATE user SET op_status='".$_POST['status']."' WHERE id='".$id."'");	
	
$q2="SELECT * FROM jobs WHERE status='Deposit' AND id='".$id."' AND operator='".$_SESSION['operator_username']."'";
$r2=mysqli_query($con,$q2);
if ($res=$r2->num_rows ==0) {

}else{

		
	$set_deposit_name=mysqli_query($con,"UPDATE user SET deposit_by='".$_SESSION['operator_username']."' WHERE id='".$id."' ");
	$remove_sendto=mysqli_query($con,"UPDATE user SET sendto=NULL WHERE id='".$id."' ");//NOT CONFIRMED YET
	$delete_from_op=mysqli_query($con,"DELETE FROM jobs WHERE id='".$id."'  AND operator='".$_SESSION['operator_username']."'");
	$del_call_log=mysqli_query($con,"DELETE FROM last_call WHERE def='".$id."' AND admin='".$_SESSION['operator_username']."' ");
    //$del_notes=mysqli_query($con,"DELETE FROM note WHERE id='".$id."' AND admin='".$_SESSION['operator_username']."' ");

     


}

$q22="SELECT * FROM jobs WHERE status='Non Interested' AND id='".$id."' AND operator='".$_SESSION['operator_username']."'";
$r22=mysqli_query($con,$q2);
if ($res=$r22->num_rows ==0) {

}else{

		
	$set_op_status=mysqli_query($con,"UPDATE user SET op_status='Non Interested' WHERE id='".$id."' ");
	$delete_from_op=mysqli_query($con,"DELETE FROM jobs WHERE id='".$id."'  AND operator='".$_SESSION['operator_username']."'");
	$del_call_log=mysqli_query($con,"DELETE FROM last_call WHERE def='".$id."' AND admin='".$_SESSION['operator_username']."' ");
    //$del_notes=mysqli_query($con,"DELETE FROM note WHERE id='".$id."' AND admin='".$_SESSION['operator_username']."' ");

     


}
header('Location: operator_view_user.php?user_id='.$id );
mysqli_close($con);


?>