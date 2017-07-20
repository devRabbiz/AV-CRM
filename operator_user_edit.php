<?php
  include 'header.php';
?>
    <div class="container-fluid">
      <div class="row admin-outer jumbotron">
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
            

<div class="col-md-6">
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
           
            </div>
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
