<?php
require_once 'db_connect.php';

    $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];
    

$phone_no=$_POST['phone_no'];
$query="SELECT * FROM user WHERE phone_no='".$phone_no."'";
$result = mysqli_query($con,$query);
if (!$result)
  {
  die('Errorvdvfd: ' . mysqli_error());
  }
  else
  {			$array=mysqli_fetch_array($result);
			// echo $array;
  			if(!$array)
	  		{
	  		
	  		$sql="INSERT INTO user (name,email,phone_no,alt_phone,company,reg_by,lang,web)
			VALUES
			('".$_POST['name']."','".$_POST['email']."','".$_POST['phone_no']."','".$_POST['alt_phone']."','".$_POST['company']."','".$_POST['reg_by']."','".$lang."','".$_POST['web']."')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Errorfrefer: ' . mysqli_error());
			  }
			$phone_no=$_POST['phone_no'];
			$query="SELECT * FROM user WHERE phone_no='".$phone_no."'";
			$result = mysqli_query($con,$query);
			if (!$result)
			  {
			  die('Erroraaaaaaaaa: ' . mysqli_error());
			  }
			  $array=mysqli_fetch_array($result);
			  if($array)
				  {
				  	$post_data = array('id' => $array[1],'presence'=>0);
		  			 echo json_encode($post_data);

				  }
				  else
				  	die("error".mysqli_error());
			}
	  		else
	  		{

	  			$post_data = array('id' => $array[1],'presence' => 1);
	  			 echo json_encode($post_data);
	  		}

  	}
mysqli_close($con);
?>
