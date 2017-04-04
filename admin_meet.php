<?php
include 'include/header.php';
?>

<div>
    <div class="container-fluid" id="home">
      <div class="row admin-outer">
 
        <?php if(isset($_SESSION['admin-logout'])){?>
      <div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $_SESSION['admin-logout']?></div>
      <?php unset($_SESSION['admin-logout']);}?>
      <?php if(isset($_SESSION['admin-invalid'])){?>
      <div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $_SESSION['admin-invalid']?></div>
      <?php unset($_SESSION['admin-invalid']);}?>
        <?php
    if (isset($_SESSION['login_username'])) { ?>





<?php


if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {

  $startrow = 0;

} else {
  $startrow = (int)$_GET['startrow'];
}
  



   $q = "SELECT * FROM admin_jobs WHERE admin='".$_SESSION['login_username']."' ORDER BY meet ASC  LIMIT $startrow, 30 ";
   $r = mysqli_query($con,$q);
 ?> 


<ul class="nav nav-tabs nav-justified" style=" width: 1px;">
  <li role="presentation"  ><a style="color: #05147e;font-weight: bold;float: left;"  href="admin.php?pager=home">Trader</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=sec">Finish</a></li>
    <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=ftd">FTD</a></li>
    <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=op_leads">Op.Leads</a></li>
  <li role="presentation" class="active"><a style="color: #05147e;font-weight: bold;float: left" href="admin_meet.php">Meeting</a></li>
    <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="admin.php?pager=operator">Reg.Operators</a></li>
  <li role="presentation"><a style="color: #05147e;font-weight: bold;float: left;" href="list_operator.php">Operators</a></li>
  <li role="presentation" ><a style="color: #05147e;font-weight: bold;float: left;" href="lists.php">Lists</a></li>
</ul>


        <div style="margin-right: 12px;">


          <table  style="background:url('/images/2.png');  margin-bottom: 0px !important;  background-repeat: round;" id="etab1" class="table  table-condensed " cellspacing="0" width="100%">
          <tr >
          <th ><center>
 <div class=" badge" data-count=
<?php

if (isset($_SESSION['login_username'])) {
 $result=mysqli_query($con,"SELECT count(*) as total from user");
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
            </td>

            <td  ><center>
              <div class="btn-group">

    <ul class="pager">
    <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'#home"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
    else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
    <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+30).'#home">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

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
            <th><strong>Name</strong></th>
   
            <th><strong>Meeting</strong></th>


          </tr>
</thead>

<tbody >

          <?php

          for($i=0;$i<$num;$i++)
        {


        while($row = $r->fetch_assoc()){



                       ?>

          <tr >
         

           <td><a href="view_user.php?user_id=<?php echo $row['def'] ?>"><?php echo $row['name'] ?></a></td>

           

           <td style="text-align: justify;"><center>

<?php


                    $date_arr= explode(" ", $row['meet']);
                    $date= $date_arr[0];
                    $time= $date_arr[1];
                    $tomorrow = date('Y-m-d', strtotime('tomorrow')); 
            ?>
            <?php  if (date('Y-m-d') == date('Y-m-d', strtotime($row['meet']))) { ?>
             <span  style="font-size: 16px" class="label label-danger"><?php echo  substr($time, 0, -3); ?></span>
             <?php } else if ($tomorrow == date('Y-m-d', strtotime($row['meet']))) { ?>
            <span style="font-size: 14px"  class="label label-warning"><?php echo  substr($time, 0, -3); ?></span>
              <?php } else { ?>
          <span style="font-size: 12px"  class="label label-success"><?php echo  substr($time, 0, -3); ?></span>
          <?php } ?>
            <span class="label label-primary"><?php echo $date ?></span>
            <?php } ?>
          </center>
          </td>
           </tr>
           </div>
          <?php
        }
        ?>
</tbody>

        <tfoot>
<tr >


</tr>
</tfoot>
         </table>

</div>


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
    $query="SELECT username FROM operator";
$results=mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($results)){?>


  <option value="<?php echo $row['username'] ?>"><?php echo $row['username'] ?></option>



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

<?php
  include 'include/footer.php';
?>


</html>
