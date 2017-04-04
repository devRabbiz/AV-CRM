<?php
session_start();
if(isset($_SESSION['login_student_username'])){
	unset($_SESSION['login_student_username']);
	$_SESSION['student-logout'] = "User logged out";
	header('Location:student.php');
	
}


?>