<?php
include 'db_connect.php';



$email=$_POST['email'];
$query="SELECT * FROM user WHERE email='".$email."'";
$result = mysqli_query($con,$query);
if (!$result)
  {
  die('Errorvdvfd: ' . mysqli_error());
  }
  else
  {			$array=mysqli_fetch_array($result,MYSQL_NUM);
			// echo $array;
  			if(!$array)
	  		{
	  		
	  		$sql="INSERT INTO user (password,name,email,phone_no,alt_phone)
			VALUES
			('$_POST[password]','$_POST[name]','$_POST[email]','$_POST[phone_no]','$_POST[alt_phone]')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Errorfrefer: ' . mysqli_error());
			  }
			$email=$_POST['email'];
			$query="SELECT * FROM user WHERE email='".$email."'";
			$result = mysqli_query($con,$query);
			if (!$result)
			  {
			  die('Erroraaaaaaaaa: ' . mysqli_error());
			  }
			  $array=mysqli_fetch_array($result,MYSQL_NUM);
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
