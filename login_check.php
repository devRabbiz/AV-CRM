<?php
include 'db_connect.php';
session_start();

if (isset($_POST['admin-username'])) {
      $query="SELECT * FROM admins WHERE username='".mysqli_escape_string($con,$_POST['admin-username'])."' and password='".mysqli_escape_string($con,$_POST['admin-pass'])."'";
      $result = mysqli_query($con,$query);
      if (!$result){
        die('Error: ' . mysqli_error());
      }
      else{
        $array=mysqli_fetch_array($result);

        if($array){
        	$_SESSION['login_username']=$_POST['admin-username'];
          //	header("Location:admin.php?login=true");
                   ?>

              <form action="admin.php" id="loginform" method="POST">
                  <input type="hidden" value="true" name="login">
              </form>
            
              <script type="text/javascript">
                document.getElementById("loginform").submit();
              </script>

      <?php 

        }
        else
        	header("Location:login_admin.php?login=error");
      }
    }

?>
