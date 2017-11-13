<?php
require_once 'db_connect.php';
require_once 'session.php';
include_once 'functions.php'
?>
 <?php
        
    if(isset($_SESSION['login_username'])){ 

      if (isset($_POST['type']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['name']) ) {
        $username=mysqli_escape_string($con,$_POST['username']);
        $password=mysqli_escape_string($con,$_POST['password']);
        $name=mysqli_escape_string($con,$_POST['name']);
        $lang=mysqli_escape_string($con,$_POST['lang']);
          if ($_POST['type']=='admin') {//if admin type
            $checkIfExist=mysqli_query($con,"SELECT * FROM admins WHERE username='".$username."'");
            $array=mysqli_fetch_array($checkIfExist);
            if (!$array) {//if not exist
              $createUser=mysqli_query($con,"INSERT INTO admins (username,password,full_name,lang) VALUES('".$username."','".$password."','".$name."','".$lang."')");
              $sucess='display:block';
            } else $error='display:block';//if exist
          }//admin type end
          if ($_POST['type']=='operator') {//if type operator
            $checkIfExist=mysqli_query($con,"SELECT * FROM operator WHERE username='".$username."'");
            $array=mysqli_fetch_array($checkIfExist);
            if (!$array) {//if not exist
              $createUser=mysqli_query($con,"INSERT INTO operator (username,password,full_name,lang) VALUES('".$username."','".$password."','".$name."','".$lang."')");
              $success='display:block';
            } else $error='display:block';//if exist
          }//operator type end
        }
      }
          

   ?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin| L`Avenir</title>

  <script type="text/javascript" src="dist/js/jquery-3.1.1.min.js"></script>

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



<center >
<div class="wrapper">
    
  <label class="">Create User</label>
  <center><div style="width: 300px;display:none; <?php echo $sucess ?>" class="alert alert-success"  role="alert">User Created!</div></center>
  <center><div style="width: 300px;display: none;<?php echo $error ?>" class="alert alert-danger "  role="alert">User Exist!</div></center>
<form action="" method="POST" class="form-group" style="width: 300px">

  <select name="type" class="form-control" required="">
    <option  selected disabled value=""">Select Type..</option>
    <option value="admin">Administrator</option>
    <option value="operator">Operator</option>
  </select>
  <input type="text" required="" name="name" placeholder="Full Name" class="form-control">
  <input type="text" required="" name="password" placeholder="Password" class="form-control">
  <input type="text"  required="" name="username" placeholder="Username" class="form-control">
  <select required="" name="lang" class=" form-control">
    <option selected="" disabled="" value="">Language</option>
    <option value="it">IT</option>
    <option value="en">EN</option>
  </select>
  <button type="submit" class="form-control btn btn btn-info">Create User</button>

</form>
</div>
</center>




</html>
 