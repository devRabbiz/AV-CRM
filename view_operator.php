<?php 

include_once 'include/header.php';

    if (isset($_SESSION['login_username'])) { 
    	if (isset($_GET['op_name'])) {  

if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {

  $startrow = 0;

} else {
  $startrow = (int)$_GET['startrow'];
}




    $result=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_GET['op_name']."' ORDER BY jobs.id DESC LIMIT $startrow, 30  ");



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

</ul>
<ul class="pager" style="float: right;">
    <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?op_name='.$_GET['op_name'].'&startrow='.$prev.'"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
    else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
    <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?op_name='.$_GET['op_name'].'&startrow='.($startrow+30).' ">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

    </ul>
<table class="table table-condensed table-hover table-bordered" >
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Status</th>
			<th>Note</th>
			<th><center>Meeting</center></th>
			<th><center>Last Call</center></th>
		</tr>
	</thead>
	<tbody>
	<?php  
	while($row = $result->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $row['id'] ?></td>
			<td><a href="operator_jobs_user.php?op_name=<?php echo $_GET['op_name']?>&user_id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
			<td><?php echo $row['status'] ?></td>
			  <td width="30%"><?php

          $result1 = op_status($con,(int) $row['id'],$_GET['op_name']);

    if(!$result1)
      die('Error: ' . mysqli_error());
    else{
     
      
         while($row1 = $result1->fetch_assoc()){
          
           echo $row1['note'] ;
           }  } ?></td>
          
			 <td > 
         <center>
            <?php  
            if (isset($row['meet'])) {
              
            
                $date_arr= explode(" ", $row['meet']);
                    $date= $date_arr[0];
                    $time= $date_arr[1];
                    $tomorrow = date('Y-m-d', strtotime('tomorrow')); 
            ?>
            <?php  if (date('Y-m-d') == date('Y-m-d', strtotime($row['meet']))) { ?>
             <span  style="font-size: 16px" class="label label-danger"><?php echo  substr($time, 0, -3); ?></span>
             <?php } else if ($tomorrow == date('Y-m-d', strtotime($row['meet']))) { ?>
            <span style="font-size: 14px"  class="label label-warning"><?php echo  substr($time, 0, -3); ?></span>
              <?php } else { ?>
          <span style="font-size: 12px"  class="label label-success"><?php echo  substr($time, 0, -3); ?></span>
          <?php } ?>
            <span class="label label-primary"><?php echo $date ?></span>
            <?php } ?>
            </center> 
            </td>

			<td> 
      <?php
         
          $result11 = op_last_call($con,(int) $row['id'],$_GET['op_name']);
    if($result1){
   while($row11 = $result11->fetch_assoc()){
          ?>
           
           <center>
           <?php  if (isset($row11['lcall'])) {
        
           
                $date_arr= explode(" ", $row11['lcall']);
                    $date= $date_arr[0];
                    $time= $date_arr[1];
                    
            ?>
            <span  style="font-size: 12px" class="label label-default"><?php echo  substr($time, 0, -3); ?></span>
            <span class="label label-primary"><?php echo $date ?></span>
            </center>
           
            <?php } }  } else echo "string"; ?>
 </td>
		</tr>
    <?php } ?>
	</tbody>
</table>






</div>
</div>







<?php } } ?>