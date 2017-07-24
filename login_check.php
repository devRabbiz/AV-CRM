<?php
include 'db_connect.php';
session_start();

if (isset($_POST['admin-username'])) {
      $query="SELECT * FROM admins WHERE username='".$_POST['admin-username']."' and password='".$_POST['admin-pass']."'";
      $result = mysqli_query($con,$query);
      if (!$result){
        die('Error: ' . mysqli_error());
      }
      else{
        $array=mysqli_fetch_array($result);

        if($array){
        	$_SESSION['login_username']=$_POST['admin-username'];
          	header("Location:admin.php");

        }
        else
          $_SESSION['admin-invalid'] = "Invalid Username or password for Admin";
        	header("Location:admin.php?login=true");
      }
    }

?>
