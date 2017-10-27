<?php
include 'db_connect.php';

$query = "UPDATE user SET name='".$_POST['name']."',email='".$_POST['email']."',phone_no='".$_POST['phone_no']."',alt_phone='".$_POST['alt_phone']."',work='".$_POST['job']."',company='".$_POST['company']."',country='".$_POST['country']."' WHERE id='".$_POST['id']."' AND reg_by='".$_SESSION['operator_username']."' ";
$result = mysqli_query($con,$query);

if (!$result)
  {
  die('Errorvdvfd: ' . mysqli_error());
  }
  else
  {
  	echo "updated";
  }
mysqli_close($con);


?>