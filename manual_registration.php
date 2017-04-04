<?php
include 'include/header.php';

if (isset($_SESSION['login_username'])) {
 
?>





    <div class="container jumbotron" id="form-container">

      <div class="alerts"></div>
    <form role="form">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter Name"  return false;">
      </div>
    
       <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email"  return false;">
      </div>
     
      
    
     
      <div class="form-group">
        <label for="phone_no">Phone Number</label>
        <input type="phone" class="form-control" id="phone" placeholder="Enter Phone Number"  return false;">
      </div>

      <div class="form-group">
        <label for="alt_phone">Second Number</label>
        <input type="alt_phone" class="form-control" id="alt_phone" placeholder="Enter Phone Number"  return false;">
      </div>

      <div class="form-group">
        <label for="company">Company</label>
        <input type="company" class="form-control" id="company" placeholder="Enter Company"  return false;">
      </div>


       <center>
         <a class="btn btn-default btn-info" onclick="window.history.back(); return false;">Back</a>
    <input type="button" value="Submit" class="btn btn-primary" onclick="submit_form(); return false;">
    <input type="hidden" id="reg_by" name="reg_by" value="<?php echo $_SESSION['login_username']; ?>">
   </center>
    </form>

      

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster
     <script src="jquery-1.11.0.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script> -->
    <script type="text/javascript">


    function submit_form(){
      
        $.post("manual_process.php",{name:$("#name").val(),email:$("#email").val(),phone_no:$("#phone").val(),alt_phone:$("#alt_phone").val(),company:$("#company").val(),reg_by:$("#reg_by").val()}, function(data){
      console.log(data);
                        var obj = $.parseJSON(data);
               console.log(obj);
              var ss="";
                   if (obj.presence===1)
                          ss="User already present, with  id:  "+obj.id;
                    else
                          ss="Registration successfull, with  id:  "+obj.id;
                  alert(ss);
            $('#form-container').css("visibility","hidden");

        location.reload();

            });
     

    }
    </script>
  </body>
  <?php
}
  include 'include/footer.php';
?>
</html>
