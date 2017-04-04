<?php 

include_once 'include/header.php';

    if (isset($_SESSION['login_username'])) { 
    	if (isset($_GET['op_name']) && isset($_GET['user_id'])) {  	
    $result=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no,user.date FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_GET['op_name']."' AND jobs.id='".$_GET['user_id']."'");
    if(!$result)
			die('Error: ' . mysqli_error());
		else{
			$array=mysqli_fetch_array($result,MYSQL_NUM);
          if($array){
          	?>
     <div class="container-fluid" id="home">
      <div class="row admin-outer">
<ul class="nav nav-tabs nav-justified" style=" width: 1px;">
  <li role="presentation"  ><a style="color: #05147e;font-weight: bold;float: left;"  href="admin.php?pager=home">Trader</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=sec">Finish</a></li>
    <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=ftd">FTD</a></li>
    <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=op_leads">Op.Leads</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left" href="admin_meet.php">Meeting</a></li>
      <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=operator">Reg.Operators</a></li>
  <li role="presentation" class="active"><a style="color: #05147e;font-weight: bold;float: left;" href="list_operator.php">Operators</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="lists.php">Lists</a></li>
</ul>
<div class="row">
<div  class="col-md-4" style="width: 600px;">

          

          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" style="color: black"><?php echo $array[8]?> </h3>

            </div>
            <div class="panel-body">
              <div class="row">

             
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/images/user-icon.img" class="img-circle img-responsive"> </div>
               

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
                        <a style="color:black;text-decoration: none;cursor: pointer;" onclick="window.location.href='sip:<?php echo $array[10] ?>'" > <?php echo $array[10] ?>

                        </a>
                        </td>
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
                             <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-default btn-info">Back</a>
                            

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
<center>
<div class="panel panel-danger">
  <div class="panel-heading">Meeting: </div>
  No meeting
</div>
</div>
</center>
 <?php  } } } } ?>




<div style="overflow-y: scroll;height: 400px;">

<table width="100%">
<?php

          
          $result1 =op_user_notes($con,(int)$_GET['user_id'],$_GET['op_name']);
    if(!$result1)
      die('Error: ' . mysqli_error());
    else{
      $num=mysqli_num_rows($result1);
      
         while($row = $result1->fetch_assoc()){
            ?>

<tr><td>
            <div class="panel panel-info">
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





      </div>


          </div>


</div></div>





     <?php } } } }  ?>