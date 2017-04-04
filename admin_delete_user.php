<?php
  include 'db_connect.php';
  session_start();

  if(isset($_GET['user_id'])){
    $query = "DELETE from user where id='".(int)$_GET['user_id']."'";
    $result = mysqli_query($con,$query);
    $wes=mysqli_query($con,"DELETE  FROM jobs WHERE id='".$_GET['user_id']."' ");
    $wetree=mysqli_query($con,"DELETE  FROM last_call WHERE def='".$_GET['user_id']."' ");
    $wee=mysqli_query($con,"DELETE  FROM admin_jobs WHERE def='".$_GET['user_id']."' ");
  $wette=mysqli_query($con,"DELETE  FROM note WHERE id='".$_GET['user_id']."' ");
    if (!$result)
    {
    die('Errorvdvfd: ' . mysqli_error());
    }
    else
    {
      header('Location: admin.php' );
    }
    mysqli_close($con);
  }
?>


