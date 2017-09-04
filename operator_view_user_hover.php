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
 
 

  <link rel="shortcut icon" type="image/png" href="/images/hlogo.png"/>
</head>



<script type="text/javascript">
$(document).ready(function(){

 $("#datetimepicker1").hide();

})
  
</script>
    
      	<?php
        if(isset($_SESSION['operator_username'])){
      	if(isset($_GET['user_id'])){
      		
      		$result = op_view_user($con,$_GET['user_id'],$_SESSION['operator_username']);
		if(!$result)
			die('Error: ' . mysqli_error());
		else{
			$array=mysqli_fetch_array($result);
          if($array){
          	?>

<div class="row">
<div  class="col-md-4" ">

          

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" style="color: black"><?php echo $array[8]?> </h3>

            </div>
            <div class="panel-body">
              <div class="row">


               

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name:</td>
                        <td><?php echo $array[8]?></td>

                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $array[9]?></td>
                      </tr>
                      <tr>
                        <td>Registered:</td>
                        <td><?php echo $array[11]?></td>
                      </tr>

                         <tr>
                        <tr>
                        <td>Phone Number:</td>
                        <td>
                       <!-- <a  id="callbtn" style="color:black;text-decoration: none;cursor: pointer;" onclick="top.callb(<?php echo $array[10]; ?>)" > <img src="/images/phone.png" height="30px">
                        </a>-->
                        <a  id="callbtn" style="color:black;text-decoration: none;cursor: pointer;" onclick="window.location.href='sip:<?php echo $array[10]; ?>'" > <img src="/images/phone.png" height="30px">
                        </a>
                        </td>
                      </tr>
                     
                  

                    </tbody>
                  </table>


                </div>
              </div>
            </div>
              

          </div>
  


</div>
         


<div  class="col-md-4">


<?php

        
          $result1 = op_user_jobs($con,(int)$_GET['user_id']);
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
  <div class="panel-heading">Meeting: <span style="float: right;color: black"> <?php echo $row['status'] ?></span> </div>
  <div class="panel-body">
    <center>
  <div>

  <span class="alert alert-info"><?php echo $time; ?></span>
            <span class="alert alert-success"><?php echo $date ?></span>

 

</div>
</center>
  </div>
</div>



<?php } else{ ?>
<div class="panel panel-danger">
  <div class="panel-heading">Meeting: </div>
  <div class="panel-body">
<center>
<form method="POST" action="meet.php" >
<select id="status" name="status" required="" style="height: 34px;width: 298px;border: 1px solid #ccc;border-radius: 4px;color:#555">
<option  disabled="disabled" selected="selected" value="" >Select Status</option>
<option value="Potential">Potential</option>
<option value="Follow Up">Follow Up</option>
<option value="Interested">Interested</option>
<option value="Non Interested">Non Interested</option>

<option value="Non Answer">Non Answer</option>
 <option value="Call Failed">Call Failed</option>
<option value="Secretary">Secretary</option>
 <option value="Deposit">Deposit</option>

</select>
<script type="text/javascript">
$(function () {
  $("#status").change(function() {
    var val = $(this).val();
    if(val === "Potential" || val==="Follow Up" || val==="Interested") {
       
      
            $('#s111').html("<input type='text' name='dt' id='dat<?php echo $_GET['user_id']; ?>' class='form-control' placeholder='Time & Date' required  />")
            $('#dat<?php echo $_GET['user_id']; ?>').datetimepicker();
 $("#datetimepicker1").show();
    }
    else{
      $('#s111').html('');
      $("#datetimepicker1").hide();
    }
    
  });
});
</script>
  
               <div class='input-group date' id='datetimepicker1'>

                <div id="s111">  </div>
               <input type='hidden' name='id'  value='<?php echo $_GET['user_id']; ?>'/> 
        
</div>
                  <input class="btn btn-default" style="width: 100px" type="submit" value="OK">
                

                </form>


        <script type="text/javascript">
            
        </script>
       </center>
</div>
</div>

 <?php  } } } } ?>
<div class="panel panel-warning">
  <div class="panel-heading">Notes: </div>
  <div class="panel-body">
Leave a note:
<div class="input-group" style="width: 90%"> 
<form method="POST" action="addnote.php">
<input type="text" class="form-control" name="notetoadd" required="" autocomplete="off"></input>
<input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>"></input>
<input type="hidden" name="admin" value="<?php echo $_SESSION['operator_username'] ?>"></input>
 <span class="input-group-btn">
<input class="btn btn-default" style="position: absolute;" type="submit" value="OK">
</span>


</form>

</div>


<div >
</br>
<ul class="timeline">
<?php

           $query1 = "SELECT * from note  WHERE id='".(int)$_GET['user_id']."'  ORDER BY `date` DESC";
          $result1 = mysqli_query($con,$query1);
    if(!$result1)
      die('Error: ' . mysqli_error());
    else{
      $num=mysqli_num_rows($result1);
      
         while($row = $result1->fetch_assoc()){
            ?>

           <li>
              <i class="fa fa-comments bg-yellow"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row['date'] ;?><?php echo" ".$row['admin'] ?></span>

                <div class="timeline-body">
                   <?php echo $row['note'] ;?>
                </div>
                
              </div>
            </li>



<?php }  } ?>
</ul>
</div>
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
<script type="text/javascript">
  $('#callbtn').click(function(){
    $.ajax({
        url : 'operator_count_calls.php', 
        type : 'post',
        data:{
          id:"<?php echo (int)$_GET['user_id'] ?>",
          admin:"<?php echo $_SESSION['operator_username'] ?>"
          
             },  
        success : function(data){
          console.log(data);
        }
    });
});
</script>
       
        </html>