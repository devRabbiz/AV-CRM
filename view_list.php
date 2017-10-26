<?php
    if (isset($_SESSION['login_username'])) { 
      $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];


if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {

  $startrow = 0;

} else {
  $startrow = (int)$_GET['startrow'];
}            

 if (isset($_GET['list_name'])) {


         $r=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$_GET['list_name']."' ORDER BY id DESC LIMIT $startrow, 30  ");
}
 ?> 




        <div style="margin-right: 12px;">


          <table  style="background:url('/images/2.png');  margin-bottom: 0px !important;  background-repeat: round;" id="etab1" class="table  table-condensed " cellspacing="0" width="100%">
          <tr >
          <th ><center>
 <div class=" badge" data-count=
<?php

if (isset($_SESSION['login_username'])) {
 $result=$get_total;
$data=mysqli_fetch_assoc($result);
?> > <?php echo $data['total'];}?>
</div>


 </div>
 </center>

<td >


<script type="text/javascript">
$(document).ready(function(){

        
       
    
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        resultDropdown = $(this).siblings(".result");
        if(term.length){

            $.get("fetch.php", {query: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
        // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});

</script>


    <div class="search-box ">
        <input type="text" autocomplete="off" id="sf" class="btnf"  onblur="setTimeout(function() { if (typeof resultDropdown !== 'undefined') {
    // the variable is defined
resultDropdown.empty();} }, 110);; " placeholder="Search client.." />
        <div class="result"></div>
    </div>


            <a href="export.php?export=all" class='btn btn-default btnf'>Download all</a>

            <a href="export.php?export=new" class='btn btn-default btnf'>Download Newest</a>

             <a href="manual_registration.php" class="btn btn-default btnf">Create New</a>
             <button type="button" class="btn btn-default btnf" data-toggle="modal" data-target="#uploadmodal">List</button>
            </td>

            <td  ><center>
            <div id="uploadmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Upload List</h4>
                </div>
                <div class="modal-body">
                  
          <?php if (isset($_GET['success'])) { ?>

          <script type="text/javascript">
             $('.modal-body').append("<div class='alert alert-success' role='alert' ><center >Your list has been imported</center></div>");
            </script>

           <?php  } ?> 
          <?php if (isset($_GET['fail'])){ ?>
          <script type="text/javascript">
             $('.modal-body').append("<div class='alert alert-danger' role='alert' ><center >Select a list to upload</center></div>");
            </script>

          <?php } ?>
          <form action="uploadData/upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
            Choose your CSV file: <br /> 
            <label class="btn btn-default btn-file">
            <input name="csv" type="file" id="csv" hidden required="" /> 
           </label>

            <input type="text" style="width: 298px !important" class="form-control" name="list_name" placeholder="List Name" required="">

            <br>
            <input type="submit" class="btn btn-primary" name="Submit" value="Submit" /> 
          </form> 


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

  </div>
</div>

              <div class="btn-group">

    <ul class="pager">
    <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?list_name='.$_GET['list_name'].'&startrow='.$prev.'#home"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
    else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
    <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?list_name='.$_GET['list_name'].'&startrow='.($startrow+30).'#home">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

    </ul>

    </div>


    </center>

            </td>


          </th>

          </tr>
</table>
<?php  

      
  $num=mysqli_num_rows($r);
      if (mysqli_num_rows($r)==0){

        echo "<div class='well col-md-12'><p class='text-center'>No more records</p><ul class='pager'><li>";
        echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow=0">Go to start</a></li></ul></div>';

      }

      else{

        ?>

<div id="scrolltable">
<table id="etab1" class="table  table-condensed table-hover table-bordered pi" cellspacing="0" width="100%">
  <thead class="st">
          <tr >
            <th><center><strong>ID</strong></center></th>
            <th><strong>Name</strong></th>
            <th><strong>Email</strong></th>
            <th><strong>Phone</strong></th>
            <th><strong>Meeting</strong></th>
            <th><center><strong>Action</strong></center></th>
            <th style="background: #5cb85c;width: 1px;color: white"><center><strong>Send_to</strong><input style="vertical-align: middle;    margin: 0 0 0 2px !important;" type="checkbox" id="select_all" /></center></th>
            <th style="background: #5bc0de;width: 1px;color: white"><center><strong>Verification</strong></center></th>
            <th style="background: #f0ad4e;width: 1px;color: white"><center><strong>Move</strong></center></th>
            <th style="width: 1px;color: black"><center><strong>Status</strong></center></th>
            <?php if ($pager=='operator') { ?>
            <th>Reg.By</th>
            <?php } ?>

          </tr>
</thead>

<tbody >

          <?php

          for($i=0;$i<$num;$i++)
        {


        while($row = $r->fetch_assoc()){



                       ?>

          <tr >
           <td ><center><?php echo $row['id'] ?></center></td>

           <td><a href="view_user.php?user_id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
           <td style="color:#d9534f;">
              <div  id="foo1<?php echo $row['id'] ?>" class="b1<?php echo $row['id'] ?>" data-clipboard-target="#foo1<?php echo $row['id'] ?>" value="https://github.com/zenorocha/clipboard.js.git">
          <?php echo $row['email'] ?>
          </div>

            <script type="text/javascript">
            new Clipboard('.b1<?php echo $row['id'] ?>');
            </script>

           </td>
           <td  class="text-center" style="font-family: cursive; font-style: italic;font-weight: bold;">
          <a style="color:black;text-decoration: none;cursor: pointer;" onclick="window.location.href='sip:<?php echo $row['phone_no'] ?>'" > <?php echo $row['phone_no'] ?></a>
           </td>


           <td style="text-align: justify;width: 150px;"><center>

<?php

    if($result123 = admin_jobs($con,$row['id'],$_SESSION['login_username'])){
       
            while($row123 = mysqli_fetch_array($result123)){

                    $date_arr= explode(" ", $row123['meet']);
                    $date= $date_arr[0];
                    $time= $date_arr[1];
                    $tomorrow = date('Y-m-d', strtotime('tomorrow')); 
            ?>
            <?php  if (date('Y-m-d') == date('Y-m-d', strtotime($row123['meet']))) { ?>
             <span  style="font-size: 16px" class="label label-danger"><?php echo  substr($time, 0, -3); ?></span>
             <?php } else if ($tomorrow == date('Y-m-d', strtotime($row123['meet']))) { ?>
            <span style="font-size: 14px"  class="label label-warning"><?php echo  substr($time, 0, -3); ?></span>
              <?php } else { ?>
          <span style="font-size: 12px"  class="label label-success"><?php echo  substr($time, 0, -3); ?></span>
          <?php } ?>
            <span class="label label-primary"><?php echo $date ?></span>
            <?php } ?>
          </center>
          </td>
          <?php }  ?>

           <td><center>
            <form method = "post" action="admin_user_edit.php?user_id=<?php echo $row['id'];?>"><input type="submit" value="Edit" class="btn btn-warning">
            </form>
           <!--
           <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#myModal1">Delete</button>
           </form></center>
 <div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Caution</h4>
      </div>
      <div class="modal-body">
        <p>Ju do te fshini te gjitha te dhenat e klientit me kete veprim.</p>
        <p>Deshironi te vazhdoni?</p>
      </div>
      <div class="modal-footer">
     <form method = "post" action="admin_delete_user.php?user_id=<?php //echo $row['id']?>"><input type="submit" value="Delete" class="btn btn-danger"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></form>

      </div>
    </div>
 -->
  </div>
</div>
           </td>
           <td>
            <?php if(is_null($row['sendto'] )){?>
            <center>
           <input  class="send-to" type='checkbox' name='send-to' id='<?php echo $row['id']?>'></center>
           </center>
            <?php } else{ echo $row['sendto']; ?> 

            <form action="unsend.php" method="POST" style="float: right;">
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
              <input type="hidden" name="op_name" value="<?php echo $row['sendto'] ?>">
              <input type="submit" title="Unsend" class=" btn-danger" value="X">
            </form>

          <?php }  ?>
          </td>
          <td>

           <?php if($row['checked_by_admin']==1){ ?>
            <center>
           <input class="admin-check" type='checkbox' name='admin-check' id='<?php echo $row['id']?>'>
           </center>
           </td>
           <?php } ?>
           <td>
            <center>
           <input class="move_sec" type='checkbox' name='move_sec' id='<?php echo $row['id']?>'></center>
           </center>
           </td>
           <td><?php echo $row['op_status'] ?></td>
            <?php if ($pager=='operator') { ?>
            <td><?php echo $row['reg_by']; ?></td>
            <?php } ?>

           </tr>
           </div>
          <?php
        } }
        ?>
</tbody>

        <tfoot>
<tr >


</tr>
</tfoot>
         </table>

</div>

   <script type="text/javascript">
$("#select_all").click(function(){
    $('.send-to').not(this).prop('checked', this.checked);
});
   </script>
<script type="text/javascript">

  $(document).ready(function() {

        $('.pi').show().find('tr').each(function (i,item){
          var $row = $(item);
             $row.hide()

           $row.delay(i*50).fadeIn(100);

    })

});


</script>



 <table  class="table  table-condensed table-hover table-bordered" cellspacing="0" width="100%">
         <tr>
            <td  ><center>
<button type="button" class="btn  btn-primary btn-success" data-toggle="modal" data-target="#dropmodal">Send To</button>
  <div class="btn-group">
 <input class="btn  btn-info" type='button' value='Verify' onclick='admin_checked_data(); return false;'>
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><center><button type="button" class="btn  btn-primary btn-info" data-toggle="modal" data-target="#verifyall">Verify All</button></center></li>

  </ul>
</div>
  
  <button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#moveto">Move To</button>
 </center>
 </td>
 </tr>
         </table>
          </div>


      <?php
    }}
    else{
      ?><center>
         <div class='col-md-4 admin jumbotron' style="float: none;
     margin-left: auto;
     margin-right: auto;">
           <h3>ADMIN LOGIN</h3>
           <form role='form' action='login_check.php' method='post'>
             <div class='form-group'>
               <label id="lbl" for='name'>Username</label>
               <input type='name' class='form-control' name='admin-username' id='admin-username' placeholder='Enter Username' autofocus>
             </div>
             <div class='form-group'>
               <label id="lbl" for='password'>Password</label>
               <input type='password' name='admin-pass' class='form-control' id='admin-pass' placeholder='Password'>
             </div>
             <input type='submit' value='Submit' class='btn btn-default'>
           </form>
         </div>
         </center>
       </div>
     </div>
     <?php
    }

    ?>

      </div>
   </div>

    <script src="jquery-1.11.0.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>


<style type="text/css">

  .container-fluid {
  min-height: 100%;
  /* equal to footer height
  margin-bottom: -142px; */
}
.container-fluid:after {
  content: "";
  display: block;
}
.site-footer, .container-fluid:after {
  /* .push must be the same height as footer
  height: 142px; */
}
.site-footer {
  background:#343841;
  color:white;

}
</style>


<div id="verifyall" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Caution</h4>
      </div>
      <div class="modal-body">
        <p>Ju do ti verifikoni te gjithe klientet me kete veprim.</p>
        <p>Deshironi te vazhdoni?</p>
      </div>
      <div class="modal-footer">
      <a class="btn btn-primary btn-success " href="action.php?verify=all">Verify All</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="dropmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Caution</h4>
      </div>
      <div class="modal-body">
     <select id="operator" name="operator">
    <?php
    
$results=mysqli_query($con,"SELECT * FROM operator WHERE lang='".$lang."'");

    while($row=mysqli_fetch_assoc($results)){?>


  <option value="<?php echo $row['username'] ?>"><?php echo $row['full_name'] ?></option>



<?php } mysqli_close($con);?>
</select>
      </div>
      <div class="modal-footer">
      <input class="btn  btn-info" type='button' value='Send' onclick='sendto(); return false;'>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="moveto" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Caution</h4>
      </div>
      <div class="modal-body">
     <select id="movein" name="movein">
   


  <option value="1">Trader </option>
  <option value="0">Finish</option>
   <option value="3">FTD</option>


</select>
      </div>
      <div class="modal-footer">
      <input class="btn  btn-warning" type='button' value='Move' onclick='move_sec(); return false;'>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
      function admin_checked_data () {
        var arr = [];
        $('.admin-check').each(function () {
          if($(this).is(':checked'))
            arr.push($(this).attr('id'));
        });
        if(arr){
          arr = JSON.stringify(arr);
          $.post("admin_check.php",{arr:arr},function(data){
            window.location.reload();
          });
        }

      }


function sendto () {
        var snd = [];
          var operator=$('#operator option:selected').attr('value');
        $('.send-to').each(function () {
          if($(this).is(':checked'))
            snd.push($(this).attr('id'));
        });
        if(snd){
          snd = JSON.stringify(snd);
          $.post("sendto.php",{snd:snd,operator:operator},function(data){
            window.location.reload();
          });
        }

      }

      function move_sec () {
        var mv = [];
         var movein=$('#movein option:selected').attr('value');
        $('.move_sec').each(function () {
          if($(this).is(':checked'))
            mv.push($(this).attr('id'));
        });
        if(mv){
          mv = JSON.stringify(mv);
          $.post("move_sec.php",{mv:mv,movein:movein},function(data){
            window.location.reload();
          });
        }

      }

    </script>


  </body>
<?php if (isset($_GET['fail'])){ ?>
<script type="text/javascript">
    $(window).load(function(){
        $('#uploadmodal').modal('show');
    });
</script>

<?php }

if (isset($_GET['success'])){ ?>

<script type="text/javascript">
    $(window).load(function(){
        $('#uploadmodal').modal('show');
    });
</script>

<?php 
} 


?>


</html>
