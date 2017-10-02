<?php
  include 'db_connect.php';
  session_start();

  if(isset($_GET['user_id'])){
    $query = "DELETE from user where id='".(int)$_GET['user_id']."'";
    $result = mysqli_query($con,$query);
    $removeFromOperator=mysqli_query($con,"DELETE  FROM jobs WHERE id='".$_GET['user_id']."' ");
    $removeLastCalls=mysqli_query($con,"DELETE  FROM last_call WHERE def='".$_GET['user_id']."' ");
    $removeMeetings=mysqli_query($con,"DELETE  FROM admin_jobs WHERE def='".$_GET['user_id']."' ");
    $removeNotes=mysqli_query($con,"DELETE  FROM note WHERE id='".$_GET['user_id']."' ");
    $removeCallCount=mysqli_query($con,"DELETE  FROM call_count WHERE id='".$_GET['user_id']."' ");
    if (!$result)
    {
    die('Error deleting user: ' . mysqli_error());
    }
    else
    {
      //header('Location: ' . $_SERVER['HTTP_REFERER']);
      echo '<script>window.history.go(-2);</script>'; exit();
    }
    mysqli_close($con);
  }
?>


