<?php 


	require_once('../db_connect.php');
	////use vicidial server as origin
header("Access-Control-Allow-Origin: http://192.168.1.80");

$phone_check=mysqli_escape_string($con,$_POST['phone_no']);
$phone_no='39'.mysqli_escape_string($con,$_POST['phone_no']);
$name=mysqli_escape_string($con,$_POST['name']);
$email=mysqli_escape_string($con,$_POST['email']);
$alt_phone='39'.mysqli_escape_string($con,$_POST['alt_phone']);
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


<!--
	agc/vicidial.php changes

	line 4260

			    function send_to_lavenir(){
			      
			        $.post("http://192.168.1.80:444/extra/vicidial_to_av-crm.php",{
			        	name:document.vicidial_form.first_name.value+' '+document.vicidial_form.middle_initial.value+' '+document.vicidial_form.last_name.value,
			        	email:document.vicidial_form.email.value,
			        	phone_no:document.vicidial_form.phone_number.value,
			        	alt_phone:document.vicidial_form.email.value,
			        	company:'vicidial',
			        	reg_by:VU_custom_one
			        }, function(data){

			      console.log(data);
			                        var obj = $.parseJSON(data);
			               console.log(obj);

			              var ss="";
			                   if (obj.presence===1)
			                          ss="User already present, with  id:  "+obj.id;
			                    else
			                          ss="Registration successfull, with  id:  "+obj.id;
			                  //alert(ss);
			            $('#form-container').css("visibility","hidden");

			        //window.top.location.reload();

			            });

			                        DispoSelectContent_create('A','ADD','YES');
			     					DispoSelect_submit('','','YES');
			    }


	line 3570

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	line 11026

							var dispo_HTML = "<style>#lavenirlink:hover{border: 1px red solid;padding: 5px;}</style><table cellpadding=\"5\" cellspacing=\"5\" width=\"500px\"><tr><td ><b> <?php             //echo _QXZ("CALL DISPOSITION"); ?></b></td><td><a id='lavenirlink' onClick='send_to_lavenir()' style='cursor:pointer;color:red'>Move to Lavenir</a></td</tr><tr><td bgcolor=\"#99FF99\" height=\"300px\" width=\"240px\" valign=\"top\"><font class=\"log_text\"><span id=\"DispoSelectA\">";

 -->
