<?php 


	require_once('../db_connect.php');
	////use vicidial server as origin
header("Access-Control-Allow-Origin: http://192.168.1.80");

$phone_check=mysqli_escape_string($con,$_POST['phone_no']);
$phone_no=mysqli_escape_string($con,$_POST['phone_no']);
$name=mysqli_escape_string($con,$_POST['name']);
if (strlen(trim($name)) == 0){
 	$name='No Name';
 }
$email=mysqli_escape_string($con,$_POST['email']);
$alt_phone=mysqli_escape_string($con,$_POST['alt_phone']);
$company=mysqli_escape_string($con,$_POST['company']);
$reg_by=mysqli_escape_string($con,$_POST['reg_by']);

      $lang_check=mysqli_query($con,"SELECT lang FROM operator WHERE username='".$reg_by."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];

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
			('".$name."','".$email."','".$phone_no."','".$alt_phone."','".$company."','".$reg_by."','".$reg_by."','".$lang."')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Errorfrefer: ' . mysqli_error());
			  }


			
			$query="SELECT * FROM user WHERE phone_no='".$phone_no."'";
			$result = mysqli_query($con,$query);
			if (!$result)
			  {
			  die('Erroraaaaaaaaa: ' . mysqli_error());
			  }
			  $array=mysqli_fetch_array($result);
			  if($array)
				  {

							//send notificatiion
							$sendNotification=mysqli_query($con,"INSERT INTO notifications (`title`,`text`,`admin`) VALUES ('".$company."','".$name."','".$reg_by."')") or die(mysqli_error());




				  	$post_data = array('id' => $array[1],'presence'=>0);
		  			 echo json_encode($post_data);
		  			 $sql="INSERT INTO jobs (id,operator)
			VALUES
			('$array[0]','$reg_by')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Errorfrefer: ' . mysqli_error());
			  }


			  $delete_from_vicidial=mysqli_query($dbconfig,"DELETE FROM vicidial_list WHERE phone_number='".$phone_check."'");

				  }
				  else
				  	die("error".mysqli_error());
			}
	  		else
	  			///////////if exist
	  		{

	  			$post_data = array('id' => $array[1],'presence' => 1);
	  			 echo json_encode($post_data);
	  		}

  	}
mysqli_close($con);
?>
