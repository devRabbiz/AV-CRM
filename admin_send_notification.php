<?php
require_once 'db_connect.php';
require_once 'session.php';
include_once 'functions.php';
if (!isset($sendNotification)) {
	
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
<body style="background: #5f9ea0">

      <!-- general form elements disabled -->
          <div class="box box-warning" style="width: 300px !important;float: right;position: fixed;margin:20px">
            <div class="box-header with-border">
              <h3 class="box-title">Send notification</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
              
             
                <!-- textarea -->
                <div class="form-group">
                  <label>Text</label>
                  <textarea class="form-control text"   rows="3" placeholder="Enter ..."></textarea>
                </div>

                	
                <div class="form-group">
                  <label>Select</label>
                  <select id="operator" class="form-control">
                  <option value="*" >All</option>
                  <?php

    			$results=mysqli_query($con,"SELECT * FROM operator WHERE lang='it'");

   			     while($row=mysqli_fetch_assoc($results)){ ?>

 				 <option value="<?php echo $row['username'] ?>"><?php echo $row['full_name'] ?></option>

				<?php } ?>

                  </select>
                </div>
               
              
                <a onclick="sendNotification()" class="btn btn-primary">Submit</a>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

<?php 

    			$results=mysqli_query($con,"SELECT * FROM notifications ORDER BY `date` DESC");

   			     while($row=mysqli_fetch_assoc($results)){

   			        $date_arr= explode(" ", $row['date']);
                    $date= $date_arr[0];
                    $time= $date_arr[1];
                     
   			      ?>


  <ul class="timeline" style="width: 500px;margin-left: 350px">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            <?php echo $date ?>
        </span>
    </li>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <?php if ($row['isRead']==1): ?>
        	 <i class="fa fa-forward bg-yellow"></i>
        <?php endif ?>

        <?php if ($row['isRead']==0): ?>
        	 <i class="fa fa-check bg-blue"></i>
        <?php endif ?>
  			

        

        
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $time ?></span>

            <h3 class="timeline-header"><a href="#"><?php echo $row['title'] ?></a></h3>

            <div class="timeline-body">
                <?php echo $row['text'] ?>
            </div>

            <div class="timeline-footer">
                <a href="view_operator.php?op_name=<?php echo $row['admin'] ?>" target='top' class="btn btn-primary btn-xs"><?php echo $row['admin'] ?></a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->

   

</ul>
<?php } ?>



</body>




<script type="text/javascript">
	
	function sendNotification () {
        
        var title="";
        console.log(title);
        var text=$('.text').val();
        console.log(text);
        var operator=$('#operator option:selected').attr('value');
        console.log(operator);
        if (text.length!=0) {
    
          $.post("admin_send_notification.php?sendNotification=true",{title:title,text:text,operator:operator},function(data){
          	//alert("Sent "+text+" to "+operator+" with "+title+" as title!");
          	console.log(data);
            window.location.reload();
        
          });
}
       

      }
</script>
<?php
}

 if (isset($_GET['sendNotification'])) {
	$sendNotification=mysqli_query($con,"INSERT INTO notifications (`title`,`text`,`admin`) VALUES ('".$_POST['title']."','".$_POST['text']."','".$_POST['operator']."')") or die(mysqli_error());

} ?>
