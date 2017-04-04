<?php include 'include/header.php'; ?>
<center>
         <div class='col-md-4 admin jumbotron' style="float: none;
     margin-left: auto;
     margin-right: auto;">
<?php

 if(isset($_SESSION['operator-invalid'])){ echo $_SESSION['operator-invalid'];?>
      <div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $_SESSION['operator-invalid']?></div>
      <?php unset($_SESSION['operator-invalid']);} ?>

        

           <h3>Operator Login</h3>
           <form role='form' action='operator_check.php' method='post'>
             <div class='form-group'>
               <label for='name'>Username</label>
               <input type='name' class='form-control' name='operator-username' id='operator-username' placeholder='Enter Username' autofocus>
             </div>
             <div class='form-group'>
               <label for='password'>Password</label>
               <input type='password' name='operator-pass' class='form-control' id='operator-pass' placeholder='Password'>
             </div>
             <input type='submit' value='Submit' class='btn btn-default'>
           </form>
         </div>
         </center> 

 
