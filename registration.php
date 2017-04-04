<?php
include 'include/header.php';


?>





    <div class="container jumbotron" id="form-container">
      <div class="alerts"></div>
    <form role="form">
       <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" onblur="validate(id); return false;">
      </div>
      <div class="form-group">
        <label for="name">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" onblur="validate(id); return false;">
      </div>
      <div class="form-group">
        <label for="name">Confirm Password</label>
        <input type="password" class="form-control" id="confirm-password" placeholder="Enter password Again" onblur="validate(id); return false;">
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" placeholder="Enter Name" onblur="validate(id); return false;">
      </div>

      <div class="form-group">
        <label for="phone_no">Phone Number</label>
        <input type="phone" class="form-control" id="phone" placeholder="Enter Phone Number" onblur="validate(id); return false;">
      </div>

      <div class="form-group">
        <label for="alt_phone">Phone Number</label>
        <input type="alt_phone" class="form-control" id="alt_phone" placeholder="Enter Phone Number" onblur="validate(id); return false;">
      </div>


       <center>
    <input type="button" value="Submit" class="btn btn-primary" onclick="submit_form(); return false;">
   </center>
    </form>


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="jquery-1.11.0.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    var flag = 1;
    function validate (id) {
      // if (id==="username") {
      //   flag=0;
      //   $('#username').parent().children(".alerts").remove();
      //   if ($('#username').val()==="") {
      //     flag=1;
      //     $('#username').parent().append("<div class='alerts' ><br/> <div class='alert alert-danger'>Username cannot be blank </div></div>")
      //   };
      // };

      if (id==="password") {
        flag=0;
        $('#password').parent().children(".alerts").remove();
        if ($('#password').val()==="") {
          flag=1;
          $('#password').parent().append("<div class='alerts' ><br/> <div class='alert alert-danger'>Password cannot be blank </div></div>")
        };
      };

      if(id==="confirm-password"){
        flag=0;
        $('#confirm-password').parent().children(".alerts").remove();
        if($("#confirm-password").val()!==$("#password").val()){
          flag = 1;
          $("#confirm-password").parent().append('<div class="alerts" ><br/> <div class="alert alert-danger">Password does not match</div></div>');
        }
      };
      if (id==="name") {
        flag=0;
        $('#name').parent().children(".alerts").remove();
        if($("#name").val()===""){
          $("#name").parent().append("<div class='alerts' ><br/> <div class='alert alert-danger'>Name cannot be blank </div></div>");
          flag = 1;
        }
          
       
      };
     



      if (id==="email") {
        flag=0;
        $('#email').parent().children(".alerts").remove();
        if ($('#email').val()==="") {
          flag = 1;
          $('#email').parent().append("<div class='alerts'><br/> <div class='alert alert-danger'>Email cannot be blank</div></div>");
        };
        if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($('#email').val())) {
          $('#email').parent().append("<div class='alerts'><br/> <div class='alert alert-danger'> Email cannot be illegal </div></div>")
        };
      };

      if (id === "phone") {
        flag=0;
        $('#phone').parent().children(".alerts").remove();
        if ($('#phone').val()==="") {
          flag = 1;
          $('#phone').parent().append("<div class='alerts'><br/> <div class='alert alert-danger'>Phone cannot be blank</div></div>")
        };

         if(!/^[0-9]*$/.test($("#phone").val())){
          $("#phone").parent().append("<div class='alerts'><br/> <div class='alert alert-danger'>Phone contains illegl charaters </div></div>");
          flag = 1;
        }
      };

    }

    function submit_form(){
      if (flag===0){
        $.post("process.php",{password:$("#password").val(),name:$("#name").val(),email:$("#email").val(),phone_no:$("#phone").val(),alt_phone:$("#alt_phone").val()}, function(data){
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
      else{
        $('.alerts').append("<div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Some of the fields are Blank</div>");
      }

    }
    </script>
  </body>
  <?php
  include 'include/footer.php';
?>
</html>
