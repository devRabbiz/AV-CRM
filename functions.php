<?php  
require_once 'db_connect.php';
require_once 'session.php';

//operator functions
//op1
function opnotif($con,$operator_username){

 return $a=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$operator_username."'");
}


//op2
function op_user_table_all($con,$operator_username){

	return $a=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$operator_username."' ORDER BY jobs.meet DESC");
}

//op3
function op_status($con,$row,$operator_username){

	return $a=mysqli_query($con,"SELECT * from note  WHERE `id`='".$row."' AND `admin`='".$operator_username."' ORDER BY `date` DESC LIMIT 1");
}
//op4
function op_last_call($con,$row,$operator_username){

	return $a=mysqli_query($con,"SELECT * from last_call  WHERE `def`='".$row."' AND `admin`='".$operator_username."' ORDER BY `lcall` DESC LIMIT 1");
}
//operator view_user functions
function op_view_user($con,$user_id,$operator_username){

	return $a=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no,user.date FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$operator_username."' AND jobs.id='".$user_id."'");
}
//user jobs
function op_user_jobs($con,$user_id){

	return $a=mysqli_query($con,"SELECT * from jobs  WHERE `id`='".$user_id."'");
}

 if (isset($_SESSION['operator_username'])) {
	$op1=opnotif($con,$_SESSION['operator_username']);
    $op2=op_user_table_all($con,$_SESSION['operator_username']);
}
///////////////


//admin functions

function admin_notifications($con,$login_username){

	return $a=mysqli_query($con,"SELECT * FROM admin_jobs WHERE admin='".$login_username."'");
}




//get total 
function get_total($con){
	return $a=mysqli_query($con,"SELECT count(*) as total from user");
}

//admin jobs
function admin_jobs($con,$id,$login_username){

	return $a=mysqli_query($con,"SELECT meet FROM admin_jobs WHERE admin='".$login_username."' AND def='".$id."'");
}
//select operator_modal
function select_op_modal($con){

	return $a=mysqli_query($con,"SELECT * FROM operator where lang='".$lang."'");
}



if (isset($_SESSION['login_username'])) {

	$admin1=admin_notifications($con,$_SESSION['login_username']);
	$select_op_modal=select_op_modal($con);
	$get_total=get_total($con);
}



?>
