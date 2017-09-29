<?php 


	require_once('../db_connect.php');
	////use vicidial server as origin
header("Access-Control-Allow-Origin: http://192.168.1.80");


$phone_no=mysqli_escape_string($con,$_POST['phone_no']);
$name=mysqli_escape_string($con,$_POST['name']);
$email=mysqli_escape_string($con,$_POST['email']);
$alt_phone=mysqli_escape_string($con,$_POST['alt_phone']);
$company=mysqli_escape_string($con,$_POST['company']);
$reg_by=mysqli_escape_string($con,$_POST['reg_by']);

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
	  		
	  		$sql="INSERT INTO user (name,email,phone_no,alt_phone,company,reg_by,sendto,lang)
	  		VALUES
			('".$name."','".$email."','".$phone_no."','".$alt_phone."','".$company."','".$reg_by."','".$reg_by."','it')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Errorfrefer: ' . mysqli_error());
			  }

			
			$phone_no=mysqli_escape_string($con,$_POST['phone_no']);
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
		  			 $sql="INSERT INTO jobs (id,operator)
			VALUES
			('$array[0]','$reg_by')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Errorfrefer: ' . mysqli_error());
			  }

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
