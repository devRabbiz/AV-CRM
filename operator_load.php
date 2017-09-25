<?php if (isset($_GET['login'])) { 
	 $full_name=mysqli_query($con,"SELECT * FROM operator WHERE username='".$_SESSION['operator_username']."'");
      $full_name=$full_name->fetch_assoc();

 ?>
<div class="back">
<h1>Welcome <strong><?php echo $full_name['full_name'] ?></strong></h1>
<audio src="dist/welcome_message.mp3" autoplay=""></audio>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(hid,6000);
		setTimeout(playname,1500);
	});

function playname(){
	var audion = new Audio("dist/audio_name/<?php echo $full_name['username'];?>.mp3");
		audion.play();
}
function hid(){
	$('.back').remove();
}
</script>
<style type="text/css">

@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700|Dosis:200,400,600);

  .back {
    background-color:rgba(60, 141, 188, 0.82);
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
}
h1 {
  font-family: Dosis;
  font-weight: 200;
  position: absolute;
  text-align: center;
  display: block;
  color: #fff;
  top: 50%;
  width: 100%;
  margin-top: -55px;
  text-transform: uppercase;
  letter-spacing: 1px;
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transform: translate3d(0,0,0);
  -moz-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
  opacity: 0;
  -webkit-animation: anim 3.2s ease-out forwards 1s;
  animation: anim 3.2s ease-out forwards 1s;
}
strong {
  display: block;
  font-weight: 400;
}


@-webkit-keyframes anim {
  0% {
    text-shadow: 0 0 50px #fff;
    letter-spacing: 80px;
    opacity: 0;
    -webkit-transform: rotateY(-90deg);
  }
  50% {
    text-shadow: 0 0 1px #fff;
    opacity: 0.8;
    -webkit-transform: rotateY(0deg);
  }
  75% {
    text-shadow: 0 0 1px #fff;
    opacity: 0.8;
    -webkit-transform: rotateY(0deg) translateZ(60px);
  }
  100% {
    text-shadow: 0 0 1px #fff;
    opacity: 0.8;
    letter-spacing: 8px;
    -webkit-transform: rotateY(0deg) translateZ(100px);
  }

}
@keyframes anim {
  0% {
    text-shadow: 0 0 50px #fff;
    letter-spacing: 80px;
    opacity: 0;
    -moz-transform: rotateY(-90deg);
  }
  50% {
    text-shadow: 0 0 1px #fff;
    opacity: 0.8;
    -moz-transform: rotateY(0deg);
  }
  75% {
    text-shadow: 0 0 1px #fff;
    opacity: 0.8;
    -moz-transform: rotateY(0deg) translateZ(60px);
  }
  100% {
    text-shadow: 0 0 1px #fff;
    opacity: 0.8;
    letter-spacing: 8px;
    -moz-transform: rotateY(0deg) translateZ(100px);

  }

}
</style>



<?php } ?>
<script type="text/javascript">

$( document ).ready(function() {
    setInterval(function() {getNotifications()},3000);
});
  

   function getNotifications() {

$.ajax({
  type: 'GET',
  url: 'notifications.php',
  dataType: 'json',
  success: function(data) {

   $('.container1').html("");
var data = JSON.parse(JSON.stringify(data));

       for (var i in data) 
            {
              if (i==0) {
     $('.container1').append("<section onclick='removeNotificationAll()' class='notif'>  <a class='aa'>Dismiss All</a></section><section onclick='removeNotification("+data[i].id+")' class='notif notif-notice'> <h6 class='notif-title'>"+data[i].title+"</h6>  <p>"+data[i].text+"</p>  <a class='aa'>Click to dismiss</a></section> "); 
   }  else {

     $('.container1').append("<section onclick='removeNotification("+data[i].id+")' class='notif notif-notice'> <h6 class='notif-title'>"+data[i].title+"</h6>  <p>"+data[i].text+"</p>  <a class='aa'>Click to dismiss</a></section> ");
   }


           }
  },
  error: function() {
    
  }
});
}

      function removeNotificationAll() {

$.ajax({
  type: 'GET',
  url: 'notifications.php',
  dataType: 'json',
  success: function(data) {

   $('.container1').html("");
var data = JSON.parse(JSON.stringify(data));
       for (var i in data) 
            {
                

  $.post("notifications.php",{id:data[i].id},function(data){
            
          });



           }
  },
  error: function() {
    
  }
});






  getNotifications();
}


function removeNotification(id) {
  $.post("notifications.php",{id:id},function(data){
            
          });

  getNotifications();
}


</script>
<div class="container1">
  

</div>
<style type="text/css">

.aa{
  position: absolute;
    right: 20px;
    color: #3c8dbc;
    z-index: 99999999;
    text-decoration: none;
    cursor: pointer;
}
.aa:hover{
    
      color: #5bc0de;
}
.container1 {
    
    width: 380px;
    position: absolute;
    top: 50px;
    right: 10px;
    word-wrap: break-word;
}
.notif:hover{ background: rgba(1, 1, 1, 0.82)}
.notif:hover > .aa { color: #5bc0de; }

.container1 .notif {
  margin: 10px 0;
}

.notif {
  position: relative;
  padding: 25px 30px 25px 30px;
  min-height: 50px;
  line-height: 22px;
  background: rgba(1, 1, 1, 0.77);
  border-radius: 2px;
  cursor: pointer;
}


.notif p {
  font-size: 11px;
  color: white;
}

.notif-title {
      margin: 0 0 5px;
    font-size: 22px;
    font-weight: bold;
    color: #3c8dbc;
}



.notif-notice .notif-title:before, .notif-notice .notif-title:after {
  top: 44px;
  left: 55px;
  width: 4px;
  height: 12px;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}

.notif-notice .notif-title:after {
  top: 50px;
  left: 48px;
  width: 8px;
  height: 4px;
}

.notif-alert:before {
  background: #e34f4f;
  border-color: #c14343;
}

.notif-alert .notif-title:before, .notif-alert .notif-title:after {
  top: 43px;
  left: 53px;
  width: 4px;
  height: 14px;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}

.notif-alert .notif-title:after {
  top: 48px;
  left: 48px;
  width: 14px;
  height: 4px;
}

.notif-warn:before {
  background: #f1e472;
  border-color: #cec260;
}

.notif-warn .notif-title:before, .notif-warn .notif-title:after {
  top: 42px;
  left: 53px;
  width: 4px;
  height: 11px;
  background: #5c562b;
}

.notif-warn .notif-title:after {
  top: 54px;
  height: 4px;
}





</style>




<style type="text/css">

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
     //console.log(z<?php echo $row1[2];?>);
     //console.log("--------");
     //console.log(x<?php echo $row1[2];?>);
    if (z<?php echo $row1[2];?>>x<?php echo $row1[2];?>){
  var notif<?php echo $row1[2];?> = document.getElementById("myAudio"); 
        notif<?php echo $row1[2];?>.play(); 

      notifyMe<?php echo $row1[2];?>();
      if(confirm('<?php echo $row1[8] ?>'))
         show_profile(<?php echo $row1[2] ?>);
      else
        show_profile(<?php echo $row1[2] ?>);
       
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

          $ac1=$ac2=$ac3=$ac4=$ac5=$ac6=$ac7=$ac0=$ac8=$ac9=$ac10=$ac11="";
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

                  case 'web':
                   $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no,user.web FROM jobs,user WHERE user.id=jobs.id AND user.web=0 AND jobs.operator='".$_SESSION['operator_username']."' ORDER BY jobs.id DESC LIMIT $startrow, 30");
                    $ac11="active";
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
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#manual-reg">Create New</button>
<button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#monitor_calls">Monitor</button>
<button type="button" class="btn  btn-primary" onclick="main_chart()" >Trading Chart</button>

<div id="monitor_calls" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Monitor</h4>
      </div>
      <div class="modal-body">
       <div id="monitor_callsid"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
function  refreshmonitor() {
       $('#monitor_callsid').load("extra/monitor_calls.php");
    }
$( "#monitor_calls" ).on('shown.bs.modal', function(){
  refreshmonitor();
    refreshm=setInterval(refreshmonitor, 2000);
 
});
$('#monitor_calls').on('hidden.bs.modal', function () {
  clearInterval(refreshm);
});
</script>

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


<div id="trading_chart" class="modal fade" role="dialog">
  <div style="width:96%;height: 610px"   class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background: grey !important">
      <div class="modal-header">
                <button style="float: right;" type="button" class="btn  btn-info" onclick="overview_chart()" ">Market Overview</button>
     
        <h4 class="modal-title" style="color: white">L`Avenir</h4>
      </div>
      <div class="modal-body" style="padding:0px !important;height: 610px !important">

        <iframe scrolling="no" id="trading_chart_frame" width="100%" height="100%" src=""></iframe>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="trading_chart2" class="modal fade" role="dialog">
  <div style="height: 610px" class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Market Overview</h4>

      </div>
      <div class="modal-body" style="padding:0px !important;height:610px !important">

     <iframe  scrolling="no" id="trading_chart_frame2" width="100%"  height="100%" src=""></iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">



function main_chart(){

      //charts functions
        var linku="trade/main_chart.html";
      $("#trading_chart_frame").attr("src",linku);

        $('#trading_chart').modal('toggle');
      }

      function overview_chart(){
        var linku="trade/overview_chart.html";
      $("#trading_chart_frame2").attr("src",linku);

        $('#trading_chart2').modal('toggle');
      }
      $('#trading_chart').on('hidden.bs.modal', function () {
         $("#trading_chart_frame").attr("src","");
      });
      $('#trading_chart2').on('hidden.bs.modal', function () {
         $("#trading_chart_frame2").attr("src","");
      });
</script>


     <ul class="pagination pagination-md no-margin pull-right" style="float: right;">
        <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'&pager='.$pager.'#home"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
        else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
        <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+30).'&pager='.$pager.'#home">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

     </ul>

<script src="dist/js/jquery.tablescroll.js"></script>

 <table id="etab1" class="table table-striped table-hover table-bordered "  width="100%">
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
           <td> <a style="cursor: pointer;" id="atitle" onclick='show_profile(<?php echo $row['id'] ?>)'><?php echo $row['name'] ?></a></td>
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

<div id="showprofile" class="modal fade" role="dialog" >
  <div style="width:90%;" class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <iframe style="width: 100%;height: 500px;" scrolling="yes" frameborder='0' id='shprofile' src="view_user_modal.php?user_id="></iframe>
        
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">
  jQuery(document).ready(function($)
{


$('#etab1').tableScroll({containerClass:'tablescroll'});
});


        function show_profile(id){
        var linku="operator_view_user_modal.php?user_id="+id;
      $("#shprofile").attr("src",linku);

        $('#showprofile').modal('toggle');
      }



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



<style type="text/css">
  .main-footer{
    bottom: 0px;
    position: fixed;
    width: 100%;
  }
  .main-sidebar{
    position: fixed;
  }
</style>





<?php } else  header("Location:login_operator.php");?>
