<?php
  include 'header.php';
?>
    <div class="container-fluid">
      <div class="row admin-outer jumbotron">
      	<?php
        if(isset($_SESSION['login_username'])){
      	if(isset($_GET['user_id'])){
      		$query = "SELECT * from user where id='".(int)$_GET['user_id']."'";
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
             <script type="text/javascript">

$(document).ready(function (e) {
  $("#form11").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
          url: "ajaxupload.php",
      type: "POST",
      data:  new FormData(this),
      name:$('#idi').val(),
      contentType: false,
          cache: false,
      processData:false,
      beforeSend : function()
      {
        //$("#preview").fadeOut();
        $("#err").fadeOut();
      },
      success: function(data)
        {
        if(data=='invalid')
        {
          // invalid file format.
          $("#err").html("Invalid File !").fadeIn();
        }
        else
        {
          // view uploaded file.
          $("#preview").html(data).fadeIn();
          $("#form11")[0].reset();  
        }
        },
        error: function(e) 
        {
        $("#err").html(e).fadeIn();
        }           
     });
  }));
});


             </script>
<div class="col-md-6">

<div class="container">

  <hr>
    <?php
      if (file_exists('uploads/'.$_GET['user_id'])) { ?>

<div id="preview"><img src="<?php echo 'uploads/'.$_GET['user_id'] ?>" /></div>
              <?php   } else { ?>
              <div id="preview"><img src="no-image.jpg" /></div>

                <?php }  ?>



  <form id="form11" action="ajaxupload.php" method="post" enctype="multipart/form-data">
    <input id="uploadImage" type="file" accept="image/*" name="image" />
    <input type="hidden" id="idi" name="idi" value="<?php echo $array[0]?>">
    <input id="upbut" type="submit" value="Upload">
  </form>
    <div id="err"></div>
  <hr>
 
</div>
</div>
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
        <label for="name">Country</label>
        <input type="country" class="form-control" id="country" placeholder="Enter country"  return false;" value="<?php echo $array[21]?>">
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
            <form method = "post" action="admin_delete_user.php?user_id=<?php echo $array[0]?>"><input type="submit" value="Delete" class="btn btn-danger"></form>
            </div>
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

  </div>


    <script type="text/javascript">
 


    function submit_form(){
     
        $.post("update.php",{name:$("#name").val(),email:$("#email").val(),phone_no:$("#phone").val(),alt_phone:$("#alt_phone").val(),id:<?php echo $_GET['user_id'];?>,job:$('#job').val(),company:$("#company").val(),country:$("#country").val()}, function(data){
      console.log(data);
             alert("User Updated");
            window.history.back();

            });
      }
    

 

  </script>

  </body>
</html>
