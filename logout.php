<?php
	include('db_connect.php');
	session_start();
	
	if(isset($_SESSION['login_username']))
	{
		$_SESSION['admin-logout']="Admin logged out";
		unset($_SESSION['login_username']);
		
session_start();
session_destroy();
header('Location:admin.php');
}

		if(isset($_SESSION['operator_username']))
	{
		$_SESSION['operator_logout']="Admin logged out";
		unset($_SESSION['operator_username']);
		

session_start();
session_destroy();
header('Location:login_operator.php');


	
}