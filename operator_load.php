<style type="text/css">@import url('http://getbootstrap.com/dist/css/bootstrap.css');
 .popover {
    max-width: 100%;
    max-height:100%;
}
.iframe{
  width: 500px;
    height:500px;
}
body{
  overflow: hidden;
}
</style>



<script type="text/javascript">
  var originalLeave = $.fn.popover.Constructor.prototype.leave;
$.fn.popover.Constructor.prototype.leave = function(obj){
  var self = obj instanceof this.constructor ?
    obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type)
  var container, timeout;

  originalLeave.call(this, obj);

  if(obj.currentTarget) {
    container = $(obj.currentTarget).siblings('.popover')
    timeout = self.timeout;
    container.one('mouseenter', function(){
      //We entered the actual popover – call off the dogs
      clearTimeout(timeout);
      //Let's monitor popover content instead
      container.one('mouseleave', function(){
        $.fn.popover.Constructor.prototype.leave.call(self, self);
      });
    })
  }
};


$('body').popover({ selector: '[data-popover]', trigger: 'click hover', placement: 'right', delay: {show: 10, hide: 10}});

</script>




<?php
  if (isset($_SESSION['operator_username'])) {
//include_once 'include/header.php';
    if($result = $op1){
        if(mysqli_num_rows($result) > 0){
          
            while($row1 = mysqli_fetch_array($result)){
        
            if (is_null($row1[6]))
              echo "";
            else{

 ?>


<audio id="myAudio">
  <source src="files/notif.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
           <script type="text/javascript">
  var prove<?php echo $row1[2];?>="<?php echo $row1[6]; ?>";
  console.log(prove<?php echo $row1[2];?>);
  console.log("<?php echo $row1[8] ?>");
  // Split timestamp into [ Y, M, D, h, m, s ]
var t<?php echo $row1[2];?> = prove<?php echo $row1[2];?>.split(/[- :]/);

// Apply each element to the Date function
//dl 3->-1
var d<?php echo $row1[2];?> = new Date(Date.UTC(t<?php echo $row1[2];?>[0], t<?php echo $row1[2];?>[1]-1, t<?php echo $row1[2];?>[2], t<?php echo $row1[2];?>[3]-2, t<?php echo $row1[2];?>[4], t<?php echo $row1[2];?>[5]));

var x<?php echo $row1[2];?>=parseInt((d<?php echo $row1[2];?>.getTime()-d<?php echo $row1[2];?>.getMilliseconds())/1000);


document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe<?php echo $row1[2];?>() {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('You have a meeting now', {
      icon: 'images/meet.ico',
      body: "<?php echo $row1[8] ?>",
    });

    notification.onclick = function () {
      window.open("operator.php");
    };

  }

}
function clearmeet<?php echo $row1[2];?>() {


          $.post("clearmeet.php",{id:<?php echo $row1[2]; ?>},function(data){
            window.location.reload();
          });
        };

  var check<?php echo $row1[2];?>=setInterval(function() {
      var a<?php echo $row1[2];?> =new Date();
     var z<?php echo $row1[2];?>=parseInt((a<?php echo $row1[2];?>.getTime()-a<?php echo $row1[2];?>.getMilliseconds())/1000);
     console.log(z<?php echo $row1[2];?>);
     console.log("--------");
     console.log(x<?php echo $row1[2];?>);
    if (z<?php echo $row1[2];?>>x<?php echo $row1[2];?>){
  var notif<?php echo $row1[2];?> = document.getElementById("myAudio"); 
        notif<?php echo $row1[2];?>.play(); 

      notifyMe<?php echo $row1[2];?>();
      if(confirm('<?php echo $row1[8] ?>'))
        window.location='operator_view_user.php?user_id=<?php echo $row1[2] ?>';
      else
        window.location='operator_view_user.php?user_id=<?php echo $row1[2] ?>';
       
      //alert("<?php echo $row1[1] ?>");
      clearmeet<?php echo $row1[2];?>();
    clearInterval(check<?php echo $row1[2];?>);
    }




  }, 1000);
</script>
<?php   }

        
      } }
        } ?>


<?php

if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {

  $startrow = 0;

} else {
  $startrow = (int)$_GET['startrow'];
}


   

       $lang_check=mysqli_query($con,"SELECT lang FROM operator WHERE username='".$_SESSION['operator_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];
       $operator=$_SESSION['operator_username'];
     if (!isset($_GET['pager'])) {
                $pager='home';
        } else{
          $pager=$_GET['pager'];
        }

          $ac1=$ac2=$ac3=$ac4=$ac5=$ac6=$ac7=$ac0=$ac8=$ac9=$ac10="";
        switch ($pager) {
                case 'potential':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Potential' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac1="active";
                  break;
                   case 'followup':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Follow Up' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac2="active";
                  break;
                   case 'interested':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Interested' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac3="active";
                  break;
                   case 'noninterested':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Non Interested' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac4="active";
                  break;
                   case 'nonanswer':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Non Answer' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac5="active";
                  break;
                   case 'callfailed':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Call Failed' ORDER BY jobs.id DESC LIMIT $startrow, 30");
                 $ac6="active";
                  break;
                   case 'secretary':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Secretary' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac7="active";
                  break;
                  case 'new':
                  $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='new' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac8="active";
                  break;
                  case 'latest':
                   $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' ORDER BY jobs.id DESC LIMIT $startrow, 30");
                    $ac9="active";
                    break;
                  case 'home':
                    $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' 
                    ORDER BY ISNULL(jobs.meet) ASC ,jobs.meet ASC  LIMIT $startrow, 30");
                 // $r=$op2;
                    $ac0="active";
                    break;

                    case 'statistics':
                      $ac10="active";
                      break;


                default:

                 $r=$op2;
                 $ac0="class='active";
                  break;

}

?>
<head>
	


</head>



<div class="container-fluid" id="home">





 <div class="row admin-outer">
    <div class="col-md-12" style="float: none !important">
      <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
       </div>
            
     


    </div>
<div class="container" style="width: auto !important ;">
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#manual-reg">Create New</button>

<!-- Modal -->
<div id="manual-reg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Lead</h4>
      </div>
      <div class="modal-body">
        <iframe   style="width:100%!important;height: 500px!important;" frameborder='0' src="operator_manual_registration.php"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

     <ul class="pager" style="float: right;">
        <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'&pager='.$pager.'#home"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
        else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
        <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+30).'&pager='.$pager.'#home">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

     </ul>

<script src="dist/js/jquery.tablescroll.js"></script>

 <table id="etab1" class="table table-striped table-hover"  width="100%">
 <tr>
            <th><strong>ID</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Status</strong></th>
            <th><center><strong>Note</strong></center></th>
            <th><center><strong>Last Call</strong></center></th>
            <th><center><strong>Meeting</strong></center></th>
            

 </tr>

<?php

  while($row = $r->fetch_assoc()){
 

           ?>

<tr>
            <td><?php echo $row['id'] ?></td>
           <td><a href="operator_view_user.php?user_id=<?php echo $row['id'] ?>"  data-popover="true"  data-html=true data-content="<iframe class='iframe' scrolling='yes' frameborder='0' marginwidth='0' marginheight='0' src='operator_view_user_hover.php?user_id=<?php echo $row['id'] ?>' />"><?php echo $row['name'] ?></a></td>
          <td><?php echo $row['status'] ?></td>
           <td width="30%"><?php

          $result1 = op_status($con,(int) $row['id'],$_SESSION['operator_username']);

    if(!$result1)
      die('Error: ' . mysqli_error());
    else{
     
      
         while($row1 = $result1->fetch_assoc()){
          ?>
           <?php echo substr($row1['note'],0,30);?></td>
          <?php }  } ?>
         <td><center>
          <?php
         
          $result11 = op_last_call($con,(int) $row['id'],$_SESSION['operator_username']);
    if(!$result1)
      die('Error: ' . mysqli_error());
    else{
     
      
         while($row11 = $result11->fetch_assoc()){
          ?>
           
           
           <?php  if (isset($row11['lcall'])) {
            
                $date_arr= explode(" ", $row11['lcall']);
                    $date= $date_arr[0];
                    $time= $date_arr[1];
                    
            ?>
            <span  style="font-size: 12px" class="label label-default"><?php echo  substr($time, 0, -3); ?></span>
            <span class="label label-primary"><?php echo $date ?></span>
            </center>
            </td>
            <?php } }  } ?>

           <td>  
            <center>
            <?php  
            if (isset($row['meet'])) {
              
            
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
            <?php }  ?>
            </center> 
            </td>
            <!--
            <td><form action="op_user_remove.php" method="POST" s>
              <input type="hidden" name="id" value="<?php //echo $row['id'] ?>">
              <input type="hidden" name="op_name" value="<?php //echo $_SESSION['operator_username'] ?>">
              <input type="submit" data-placement="bottom" data-toggle="tooltip" title="Unsend" class=" btn-danger" value="X">
            </form></td>
            -->


</tr>
  <?php }   ?>
</table>

</div>




<script type="text/javascript">
  jQuery(document).ready(function($)
{


$('#etab1').tableScroll({containerClass:'tablescroll'});
});
</script>

<script type="text/javascript">
      function done1 () {
        var arr = [];
        $('.done1').each(function () {
          if($(this).is(':checked'))
            arr.push($(this).attr('id'));
        });
        if(arr){
          arr = JSON.stringify(arr);
          $.post("done1.php",{arr:arr},function(data){
            window.location.reload();
          });
        }

      }
         function notdone1 () {
        var arr = [];
        $('.notdone1').each(function () {
          if($(this).is(':checked'))
            arr.push($(this).attr('id'));
        });
        if(arr){
          arr = JSON.stringify(arr);
          $.post("notdone1.php",{arr:arr},function(data){
            window.location.reload();
          });
        }

      }
          function nointeres1() {
        var arr = [];
        $('.nointeres1').each(function () {
          if($(this).is(':checked'))
            arr.push($(this).attr('id'));
        });
        if(arr){
          arr = JSON.stringify(arr);
          $.post("nointeres1.php",{arr:arr},function(data){
            window.location.reload();
          });
        }

      }
      </script>



</div>
</div>
</div>









<?php } else  header("Location:login_operator.php");?>