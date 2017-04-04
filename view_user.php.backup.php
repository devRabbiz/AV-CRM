<?php
  include 'include/header.php';
?>
    <div class="container-fluid">

      <div class="admin-outer jumbotron">

      	<?php
        if(isset($_SESSION['login_username'])){
      	if(isset($_GET['user_id'])){
      		$query = "SELECT * from user where id='".(int)$_GET['user_id']."'";
      		$result = mysqli_query($con,$query);
		if(!$result)
			die('Error: ' . mysqli_error());
		else{
			$array=mysqli_fetch_array($result,MYSQL_NUM);
          if($array){
          	?>

<div class="row">

<div  class="col-md-4">

          	<div class="alerts"></div>

             <style type="text/css">
               #form1{width: 400px !important}
             </style>


    <form role="form" id="form1" >
       <div class="form-group">
        <label for="name">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email"  value="<?php echo $array[3]?>" readonly>
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter Name"  value="<?php echo $array[1]?>" readonly>
      </div>


      <div class="form-group">
        <label for="phone_no">Phone Number</label>
        <input type="phone" class="form-control" id="phone" placeholder="Enter Phone Number" value="<?php echo $array[4]?>" readonly>
      </div>
      <div class="form-group">
        <label for="date">Registered</label>
        <input type="text" class="form-control" id="date" placeholder="Enter Phone Number" value="<?php echo $array[6]?>" readonly>
      </div>

      <style type="text/css">
        #tbuttons td{
          padding: 5px;
        }
      </style>  <center>
      <table id="tbuttons">
        <tr>
        <td>

           <a href="admin.php" class="btn btn-default btn-info">Back</a>

         <a href="admin_user_edit.php?user_id=<?php echo $array[0]?>" value="Edit" class="btn btn-warning">Edit</a>
</form>
          </td>

        </tr>
      </table>
 </center>

          	<?php
          }
		}

      	} }
      	?>

</div>
<div  class="col-md-4">
<center>
<div class="input-group"> 
<form method="POST" action="addnote.php">
<input type="text" class="form-control" name="notetoadd" required="" autocomplete="off"></input>
<input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>"></input>
<input type="hidden" name="admin" value="<?php echo $_SESSION['login_username'] ?>"></input>
 <span class="input-group-btn">
<input class="btn btn-default" style="position: absolute;" type="submit" value="OK">
</span>
</div>
</center>
</form>







</div>
<div class="col-md-4" style="height: 500px; overflow-y: scroll;" id='notes'>

<table width="100%">
<?php

          $query1 = "SELECT * from note  WHERE `id`='".(int)$_GET['user_id']."' AND `admin`='".$_SESSION['login_username']."' ORDER BY `date` DESC";
          $result1 = mysqli_query($con,$query1);
    if(!$result)
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



  </body>
</html>