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


<!-- 
<meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="../../dikst/css/stsdyle.css" rel="stylesheet"/>
  <link href="style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="dist/css/bootstrap-datetimepicker.min.css" />
-->
 <style type="text/css">
   a{
    text-decoration: none !important;
   }
   .pager{
    margin: 0px !important;
   }
   #etab1{
     margin-top: 10px;
   }
  
 </style>
 

  <link rel="shortcut icon" type="image/png" href="/images/hlogo.png"/>
</head>

<?php

    if (isset($_SESSION['login_username'])){
        $user=$_SESSION['login_username'];
        $role="Administrator";
      }
    
    elseif (isset($_SESSION['operator_username'])) {
      $user=$_SESSION['operator_username'];
      $role="Operator";
    }
    else{
      $user="";
      $role="demo";
     }

     $date = date("j F Y");
?>



<body class="hold-transition skin-blue-light sidebar-mini <?php if (!isset($_SESSION['login_username'])): ?>
  sidebar-collapse
<?php endif ?>">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a

     <?php if (isset($_SESSION['login_username'])): ?>
      href="admin.php"
    <?php endif ?>

    <?php if (!isset($_SESSION['login_username'])): ?>
      href="operator.php"
    <?php endif ?>

     class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L`</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>L`</b>Avenir</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          





	<?php if(isset($_SESSION['operator_username']) || isset($_SESSION['login_username'])){ ?>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/admin.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user; ?></span>
            </a>
           
          </li>

	

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
  
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
       <div style="color:white;text-align: center;">
       <?php if (isset($_SESSION['login_username'])): ?>
       <a class="btn btn-primary" data-toggle="modal" data-target="#sendNotification">Send Notification</a>
       <?php endif ?>
       <a class="btn btn-default"  href="logout.php">Logout</a>

       </div>
        
        <!-- /.control-sidebar-menu -->

<?php } ?>
      </div>
    
    </div>

  </aside>
  <!-- /.control-sidebar -->

<div id="sendNotification" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 900px !important">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notifications</h4>
      </div>
      <div class="modal-body">
        <iframe src="admin_send_notification.php" width="880px" height="500px"></iframe>
      </div>
      <div class="modal-footer">
    
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
