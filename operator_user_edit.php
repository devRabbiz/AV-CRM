<?php
  require_once 'db_connect.php';
require_once 'session.php';
include_once 'functions.php'
?>
 
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="manifest" href="/manifest.json">

  <script type="text/javascript" src="/dist/js/jquery-3.1.1.min.js"></script>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
  <link rel="stylesheet" href="dist/css/bootstrap-datetimepicker.min.css" />


<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

 
  <script src="dist/js/moment.js"></script>
  <script src="dist/js/clipboard.min.js"></script>
  <script type="text/javascript" src="dist/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="dist/js/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <div class="container-fluid">
      <div class="row admin-outer jumbotron" style="padding-top: 0px !important;
    padding-bottom: 0px !important;">
      	<?php
        if(isset($_SESSION['operator_username'])){
      	if(isset($_GET['user_id'])){
      		$query = "SELECT * from user where id='".(int)$_GET['user_id']."' AND reg_by='".$_SESSION['operator_username']."'";
      		$result = mysqli_query($con,$query);
		if(!$result)
			die('Error: ' . mysqli_error());
		else{
			$array=mysqli_fetch_array($result);
          if($array){
          	?>
          	<div class="alerts"></div>
              <center>
             <style type="text/css">
               #form1{width: 400px !important}
             </style>
            
    <form role="form" id="form1">

     <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter Name"  return false;" value="<?php echo $array[1]?>">
      </div>

       <div class="form-group">
        <label for="name">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email"  return false;" value="<?php echo $array[3]?>">
      </div>

      <div class="form-group">
        <label for="phone_no">Phone Number</label>
        <input type="phone" class="form-control" id="phone" placeholder="Enter Phone Number" return false;" value="<?php echo $array[4]?>">
      </div>

      <div class="form-group">
        <label for="alt_phone">Second Number</label>
        <input type="alt_phone" class="form-control" id="alt_phone" placeholder="Enter Phone Number" return false;" value="<?php echo $array[12]?>">
      </div>
      <div class="form-group">
        <label for="job">Job</label>
        <input type="job" class="form-control" id="job" placeholder="Enter Job" return false;" value="<?php echo $array[13]?>">
      </div>
      <div class="form-group">
        <label for="company">Company</label>
        <input type="company" class="form-control" id="company" placeholder="Enter Company" return false;" value="<?php echo $array[14]?>">
      </div>

       <style type="text/css">
        #tbuttons td{
          padding: 5px;
        }
      </style>
    <table id="tbuttons">
    <tr><td>
           <a class="btn btn-default btn-info" onclick="window.history.back(); return false;">Back</a>
        </td>

  <td>
      <input type="button" value="Update" class="btn btn-default btn-warning" onclick="submit_form(); return false;">
    </td>

    </form>

          <td>
           

          </td>
        </tr>
      </table>

          </center>
          	<?php
          } else echo "<center>This user is not created by you!</center>";
		}

      	} } 
      	?>
      </div>

  </div>


    <script type="text/javascript">
 


    function submit_form(){
     
        $.post("operator_update.php",{name:$("#name").val(),email:$("#email").val(),phone_no:$("#phone").val(),alt_phone:$("#alt_phone").val(),id:<?php echo $_GET['user_id'];?>,job:$('#job').val(),company:$("#company").val()}, function(data){
      console.log(data);
             alert("User Updated");
            window.history.back();

            });
      }
    

 

  </script>

  </body>
</html>
