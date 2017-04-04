<?php
include 'db_connect.php';


$time=$_POST['dt'];
$id=$_POST['id'];
$admin=$_POST['admin'];
$name=$_POST['name'];

			$query1="DELETE  FROM admin_jobs WHERE def='".$id."' AND admin='".$admin."'";
			$result1 = mysqli_query($con,$query1);

//$query = "UPDATE user SET meet='".$time."' WHERE id='".$id."'";
//$result = mysqli_query($con,$query);
	//if(!$result)
		//	die('Error: ' . mysqli_error());
		//else
			header('Location: ' . $_SERVER['HTTP_REFERER']);




mysqli_close($con);


?>
<script type="text/javascript">
	console.log(<?php echo $admin.'<'; ?>)
</script>