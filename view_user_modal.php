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



    <div class="container-fluid">

        <div class="admin-outer jumbotron">

        <?php
        if(isset($_SESSION['login_username'])){
      $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];

        if(isset($_GET['user_id'])){
          $query = "SELECT * FROM user WHERE id ='".mysqli_real_escape_string($con,$_GET['user_id'])."'";
          $result = mysqli_query($con,$query);
    if(!$result)
      die('Error: ' . mysqli_error());
    else{
      $array=mysqli_fetch_array($result);
          if($array){
            ?>

<div class="row">

<div  class="col-md-4" style="width: 600px;">

    

        <div id="dropmodal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Caution</h4>
      </div>
      <div class="modal-body">
        <center>
     <select id="operator" name="operator" class="btn btn-default">
    <?php
    
$results3=mysqli_query($con,"SELECT * FROM operator WHERE lang='".$lang."'");

    while($row3=mysqli_fetch_assoc($results3)){?>


  <option value="<?php echo $row3['username'] ?>"><?php echo $row3['full_name'] ?></option>



<?php } ?>
</select>
</center>
      </div>
      <div class="modal-footer">
      <input class="btn  btn-info" type='button' value='Send' onclick='sendto(); return false;'>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="moveto" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Caution</h4>
      </div>
      <div class="modal-body">
        <center>
     <select id="movein" name="movein" class="btn btn-default">
   <option value="1">Trader </option>
   <option value="0">Finish</option>
   <option value="3">FTD</option>
   <option value="4">Callback</option>
   <option value="5">Not Interested</option>
</select>
</center>
     </div>
      <div class="modal-footer">
        <center>
        <input class="btn  btn-warning" type='button' value='Move' onclick='move_sec(); return false;'>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </center>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">

function sendto () {
        var snd = [];
          var operator=$('#operator option:selected').attr('value');
        
         
            snd.push('<?php echo $_GET['user_id']; ?>');

        if(snd){
          snd = JSON.stringify(snd);
          $.post("sendto.php",{snd:snd,operator:operator},function(data){
            window.location.reload();
          });
        }

      }

      function move_sec () {
        var mv = [];
         var movein=$('#movein option:selected').attr('value');
        
          
            mv.push('<?php echo $_GET['user_id']; ?>');
        
        if(mv){
          mv = JSON.stringify(mv);
          $.post("move_sec.php",{mv:mv,movein:movein},function(data){
            window.location.reload();
          });
        }

      }

    </script>

       
      
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" style="color: black"><?php echo $array[1]?> <span style="float: right;"><?php echo $array[14]?></span></h3>

            </div>
            <div class="panel-body">
              <div class="row">

              <?php

                  if (file_exists('uploads/'.$_GET['user_id'])) { ?>
                  <div id='pp' class="col-md-3 col-lg-3 " align="center"> <img  alt="User Pic" src="<?php echo 'uploads/'.$_GET['user_id'] ?>" style="max-width: 100px" class="img-circle img-responsive"></div>

              <?php   } else { ?>
               
                <?php }  ?>

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name:</td>
                        <td><?php echo $array[1]?></td>

                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $array[3]?></td>
                      </tr>
                      <tr>
                        <td>Registered:</td>
                        <td><?php echo $array[6]?></td>
                      </tr>

                         <tr>
                        <tr>
                        <td>Phone Number:</td>
                        <td>
                        <a style="color:black;text-decoration: none;cursor: pointer;" onclick="window.location.href='sip:<?php echo $array[4] ?>'" > <?php echo $array[4] ?>

                        </a>
                        </td>
                      </tr>
                      <tr>

                        <td>Second Number:</td>
                        <td>
                        <a style="color:black;text-decoration: none;cursor: pointer;" onclick="window.location.href='sip:<?php echo $array[12] ?>'" > <?php echo $array[12] ?>

                        </a>
                        </td>

                      </tr>
                      <tr>

                        <td>Job:</td>
                        <td><?php echo $array[13]?></td>

                      </tr>
                      <tr><td>
                        <td></td>
                      </td></tr>

                    </tbody>
                  </table>


                </div>
              </div>
            </div>
                 <div class="panel-footer">
                            
                 
                            

          <table>
       <tr>

       <td>
            <?php if(is_null($array[8] )){?>

              <button type="button" class="btn  btn-primary btn-success" data-toggle="modal" data-target="#dropmodal">Send To</button>
           

            <?php } else{ echo "<a class='sta'>".$array[8]."</a>"; ?> 

            <form action="unsend.php" method="POST" style="float: right;">
              <input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>">
              <input type="hidden" name="op_name" value="<?php echo  $array[8]; ?>">
              <input type="submit" title="Unsend" class=" btn-danger" value="X">
            </form>

          <?php }  ?>
          
     </td>
      <td>
       <button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#moveto">Move To</button>
      </td>
      <td>
       
     

                            <a style="right: 25px;position: absolute;bottom: 31px;" href="admin_user_edit.php?user_id=<?php echo $array[0]?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
    </td>                      
 </tr>
 </table>
                    </div>

          </div>
  


</div>

<div  class="col-md-4">



</div>

<div class="col-md-4" >
<?php 
 $query1 = "SELECT * FROM admin_jobs WHERE admin='".$_SESSION['login_username']."' AND def='".$_GET['user_id']."' LIMIT 1 ";
        $result1 = mysqli_query($con,$query1);
    if(!$result1)
      die('Error: ' . mysqli_error());
    else{
      
      if(mysqli_num_rows($result1) > 0){
       while($row = $result1->fetch_assoc()){
          

if (isset($row['meet'])){ 
 
 $date_arr= explode(" ", $row['meet']);
                    $date= $date_arr[0];
                   $time= $date_arr[1];
   ?>

   <div class="panel panel-danger">
  <div class="panel-heading">Meeting: </div>
  <div class="panel-body">
    <center>
  <div>

  <span class="alert alert-info"><?php echo $time ?></span>
            <span class="alert alert-success"><?php echo $date ?></span>

</div>
</center>
  </div>
</div>
  <?php } } } else { ?>

<div class="panel panel-danger">
  <div class="panel-heading">Meeting: </div>
  <div class="panel-body">
<center>
<form method="POST" action="meet_admin.php">

             <div class='input-group date' id='datetimepicker1'>
        <input type='text' name="dt" id="dat<?php echo $_GET['user_id']; ?>" class="form-control" placeholder="Cakto" required />
        <input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>"/>
        <input type="hidden" name="admin" value="<?php echo $_SESSION['login_username']; ?>"/>
         <input type="hidden" name="name" value="<?php echo $array[1]; ?>"/>
                  <input class="btn btn-default" style="position: absolute;" type="submit" value="OK">
                </div>

                </form>


        <script type="text/javascript">
            $(function () {

                $('#dat<?php echo $_GET['user_id']; ?>').datetimepicker();


            });
        </script>
        </center>
</div>
</div>




   <?php  } } ?>





Leave a note:
<div class="input-group" style="width: 90%">
<form method="POST" action="addnote.php">
<input type="text" class="form-control" name="notetoadd" style="text-align: left !important;" required="" autocomplete="off"></input>
<input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>"></input>
<input type="hidden" name="admin" value="<?php echo $_SESSION['login_username'] ?>"></input>
 <span class="input-group-btn">
<input class="btn btn-default" style="position: absolute;" type="submit" value="OK">
</span>


</form>
</div>

<div style="overflow-y: scroll;height: 400px;">

<table width="100%">
<?php

          $query1 = "SELECT * from note  WHERE id='".(int)$_GET['user_id']."'  ORDER BY `date` DESC";
          $result1 = mysqli_query($con,$query1);
    if(!$result)
      die('Error: ' . mysqli_error());
    else{
      $num=mysqli_num_rows($result1);
      
         while($row = $result1->fetch_assoc()){
            ?>

<tr><td>
   <div class="panel panel-info">
   <div style="float: right;"><?php echo $row['admin'] ?></div>
  <div class="panel-heading"><?php echo $row['date'] ;?></div>
  <div class="panel-body">
     <?php echo $row['note'] ;?>
  </div>
</div>
</td>

</td>
</tr>


<?php }  } ?>
</table>

</div>

</div>

      </div>


          </div>



  </body>
        <?php
          }
    }

        } }
        ?>



</html>
 