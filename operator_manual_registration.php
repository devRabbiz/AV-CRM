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

        <script src="dist/js/bootstrapPlusPlus.js"></script>
        <link rel="stylesheet" href="dist/css/bootstrapPlusPlus.css" />
        <script src="dist/js/bootstrapPlusPlus.js"></script>
        <link rel="stylesheet" href="dist/css/bootstrapPlusPlus.css" />
 

  <link rel="shortcut icon" type="image/png" href="/images/hlogo.png"/>
</head>

<?php

if (isset($_SESSION['operator_username'])) {



?>



    <div class="form-container ">

      <div class="alerts"></div>
    <form role="form">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter Name"  return false;">
      </div>
    
       <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email"  return false;">
      </div>
     
      
    
     
      <div class="form-group">
        <label for="phone_no">Phone Number</label>
        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number"  value="39" return false;">
      </div>

      <div class="form-group">
        <label for="alt_phone">Second Number</label>
        <input type="alt_phone" class="form-control" id="alt_phone" placeholder="Enter Phone Number"  return false;">
      </div>

      <div class="form-group">
        <label for="company">Company</label>
        <input type="company" class="form-control" id="company" placeholder="Enter Company"  return false;">
      </div>


       <center>
        
  
    <input type="hidden" id="reg_by" name="reg_by" value="<?php echo $_SESSION['operator_username']; ?>">
    <input type="button" value="Submit" class="btn btn-primary" onclick="submit_form(); return false;">
   </center>
    </form>

      

  


    <script type="text/javascript">


    function submit_form(){
      
        $.post("operator_manual_process.php",{name:$("#name").val(),email:$("#email").val(),phone_no:$("#phone").val(),alt_phone:$("#alt_phone").val(),company:$("#company").val(),reg_by:$("#reg_by").val()}, function(data){
      console.log(data);
                        var obj = $.parseJSON(data);
               console.log(obj);
              var ss="";
                   if (obj.presence===1)
                          ss="User already present, with  id:  "+obj.id;
                    else
                          ss="Registration successfull, with  id:  "+obj.id;
                  alert(ss);
            $('#form-container').css("visibility","hidden");

        window.top.location.reload();

            });
     

    }
    </script>
  </body>
  <?php
}
  
?>
</html>
