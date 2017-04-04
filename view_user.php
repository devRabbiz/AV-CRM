<?php
  include 'include/header.php';
?>
    <div class="container-fluid">

      <div class="admin-outer jumbotron">

        <?php
        if(isset($_SESSION['login_username'])){
        if(isset($_GET['user_id'])){
          $query = "SELECT * FROM user WHERE id ='".mysqli_real_escape_string($con,$_GET['user_id'])."'";
          $result = mysqli_query($con,$query);
    if(!$result)
      die('Error: ' . mysqli_error());
    else{
      $array=mysqli_fetch_array($result,MYSQL_NUM);
          if($array){
            ?>

<div class="row">

<div  class="col-md-4" style="width: 600px;">

          

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
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/images/user-icon.img" class="img-circle img-responsive"> </div>
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
                             <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-default btn-info">Back</a>
                             <span class="pull-right">
                            <a href="admin_user_edit.php?user_id=<?php echo $array[0]?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            </span>

                    </div>

          </div>
  


</div>

<div  class="col-md-4">



</div>

<div class="col-md-4" >
<?php 
 $query1 = "SELECT * FROM admin_jobs WHERE admin='".$_SESSION['login_username']."' AND def='".mysql_real_escape_string($_GET['user_id'])."' LIMIT 1 ";
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

  <span class="alert alert-info"><?php echo $time; ?></span>
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
<form method="POST" action="meet_admin_backup.php">

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