<?php
	
	include('db_connect.php');
	session_start();
	
	if(isset($_SESSION['login_username']))
	{
	$check=$_SESSION['login_username'];
	$session=mysqli_query($con,"SELECT * FROM admins  WHERE username='$check' ");
	$row=mysqli_fetch_array($session,MYSQL_NUM);
	$login_session=$row[1];
	}
?>
