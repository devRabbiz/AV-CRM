<?php
include 'db_connect.php';
session_start();

      $query="SELECT * FROM operator WHERE username='".$_POST['operator-username']."' and password='".$_POST['operator-pass']."'";
      $result = mysqli_query($con,$query);
      if (!$result){
        die('Error: ' . mysqli_error());
      }
      else{
        $array=mysqli_fetch_array($result);

        if($array){
        	$_SESSION['operator_username']=$_POST['operator-username']; 
          	//header("Location:operator.php?login=true");
          ?>

              <form action="operator.php" id="loginform" method="POST">
                  <input type="hidden" value="true" name="login">
              </form>
            
              <script type="text/javascript">
                document.getElementById("loginform").submit();
              </script>

    <?php 

        }
        else{
          $_SESSION['operator_invalid']="Invalid Username or Password for Operator";
          header("Location:login_operator.php");
      }
    }
    

?>
