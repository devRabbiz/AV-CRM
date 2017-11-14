<!DOCTYPE html>
<html>
<head>
  
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
        <script src="dist/js/jquery.slimscroll.min.js"></script>

        <link rel="stylesheet" href="dist/css/bootstrapPlusPlus.css" />
</head>
<body class="container">

<style type="text/css">
  label{
    font-size: 14px !important;
  }
</style>


<?php 
  require 'db_connect.php';

    if (isset($_SESSION['login_username'])) { 
    $operator=$_GET['operator'];

  if (isset($_POST['update'])) {//update btn clicked
    $updateOp=mysqli_query($con,"UPDATE `operator` SET`username`='".$_POST['username']."',`password`='".$_POST['password']."',`full_name`='".$_POST['full_name']."',`lang`='".$_POST['lang']."' WHERE  username='".$operator."' ");
    header("Location: view_operator_data.php?operator=".$_POST['username']);
  }
    if (isset($_POST['delete'])) {//delete btn clicked
    $deleteOp=mysqli_query($con,"DELETE FROM operator WHERE username='".$operator."' ");
    $deleteJobs=mysqli_query($con,"DELETE FROM jobs WHERE operator='".$operator."' ");
    $removeSendto=mysqli_query($con,"UPDATE user SET sendto='' WHERE sendto='".$operator."' ");
    echo "Deleted";
  }


    $result=mysqli_query($con,"SELECT * FROM operator WHERE  username='".$operator."' ");
?>

<form action="<?php echo $_SERVER['PHP_SELF']."?operator=".$operator; ?>" method="POST" >
  


<?php 
    while($row = $result->fetch_assoc()){ 


    echo '<div class="form-group">
            <label for="alt_phone">Full Name</label>
            <input type="alt_phone" required="" name="full_name" class="form-control" id="alt_phone" placeholder="Enter Full Name " value="'.$row['full_name'].'" >
          </div>';
    echo '<div class="form-group">
            <label for="alt_phone">Username</label>
            <input type="alt_phone" required="" name="username"  class="form-control" id="alt_phone" placeholder="Enter Username " value="'.$row['username'].'" >
          </div>';
    echo '<div class="form-group">
            <label for="alt_phone">Password</label>
            <input type="password" required="" name="password" class="form-control" id="alt_phone" placeholder="Enter Password " value="'.$row['password'].'" >
          </div>';
    echo '<div class="form-group">
            <label for="alt_phone">Language</label>
            <input type="alt_phone" required=""  name="lang"  class="form-control" id="alt_phone" placeholder="Enter Username " value="'.$row['lang'].'" >
          </div>';


?>
<center>
<input type="submit" name="update" class="btn btn-warning" value="Update ">

<div id="delete_operator_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Are you sure ?</h4>
            </div>
            <div class="modal-body">
              <input type="submit" name="delete" class="btn btn-danger" value="Delete">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>

        </div>
    </div>
<button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#delete_operator_modal">Delete</button>
<input type="button" name="" value="Show Leads" class="btn btn-primary" onclick="window.parent.location.href='admin.php?pager=view_operator&by_operator=<?php echo $_GET['operator'] ?>'">
</center>
</form>




<?php
}

}
?>
  

</body>
</html>


