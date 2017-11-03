<?php
include_once 'header.php';
?>


<?php 

if (isset($_POST['login']) && $_POST['login']=='true') { 
   $full_name=mysqli_query($con,"SELECT * FROM admins WHERE username='".$_SESSION['login_username']."'");
      $full_name=$full_name->fetch_assoc();
      $_POST['login']='done';

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
<div id=meet_notification></div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#meet_notification').load('meet_notification.php');

    setInterval(function(){
    $('#meet_notification').html('');
    $('#meet_notification').load('meet_notification.php');

     }, 90000);
  });
</script>

<script type="text/javascript">
        var reload5sec;

        function reload5(){
         reload5sec=setTimeout(function() {
         window.location= window.location.href;
          }, 5000);
       }
       function remove5(){
        clearTimeout(reload5sec);
       }
        
  ////////    refresh on tab close 5 sec
  $(document).ready(function() {
  var hidden, visibilityState, visibilityChange;

  if (typeof document.hidden !== "undefined") {
    hidden = "hidden", visibilityChange = "visibilitychange", visibilityState = "visibilityState";
  } else if (typeof document.msHidden !== "undefined") {
    hidden = "msHidden", visibilityChange = "msvisibilitychange", visibilityState = "msVisibilityState";
  }

  var document_hidden = document[hidden];

  document.addEventListener(visibilityChange, function() {
    if(document_hidden != document[hidden]) {
      if(document[hidden]) {
          if (!$('.modal').is(':visible')) {

                 //close
        console.log('close.modal not visible');

        reload5();

          } else{

              console.log('close.modal  visible');
      }

      } else {
        // open
        console.log('open');

          remove5();

      }

      document_hidden = document[hidden];
    }
  });
});
</script>
<?php   

     if(isset($_SESSION['admin-logout'])){?>
      <div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $_SESSION['admin-logout']?></div>
      <?php unset($_SESSION['admin-logout']);}?>
      <?php if(isset($_SESSION['admin-invalid'])){?>
      <div class='alert alert-danger alert-dissmissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><?php echo $_SESSION['admin-invalid']?></div>
      <?php unset($_SESSION['admin-invalid']);}?>
        <?php
    if (isset($_SESSION['login_username'])) { 
      $lang_check=mysqli_query($con,"SELECT lang FROM admins WHERE username='".$_SESSION['login_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];

if (!isset($_GET['show']) or !is_numeric($_GET['show'])) {
  $show=30;
  $pagination=30;
}else{
      $show = (int)$_GET['show'];
      $pagination = (int)$_GET['show'];
}

if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {

  $startrow = 0;


} else {
  $startrow = (int)$_GET['startrow'];
}
         if (!isset($_GET['pager'])) {
                $pager='home';
        } else{
          $pager=$_GET['pager'];
        }
  $ac1=$ac2=$ac3=$ac4=$ac5=$ac6=$ac7=$ac0=$ac8=$ac9=$ac10=$ac11=$ac12=$ac13="";
        
        switch ($pager) {

          case 'home': 

           $r  =mysqli_query($con,"SELECT * FROM user  WHERE (lang='".$lang."' AND op_status !='Deposit') AND (sendto IS NULL or sendto='') AND (sec='1') AND (web=1 or web is NULL  )   ORDER BY id DESC LIMIT $startrow, $show  ");

           $ac1="active";
            break;

          case 'sec':

          $r =mysqli_query($con,"SELECT * FROM user  WHERE (lang='".$lang."' AND op_status !='Deposit') AND (sec='0')  AND (web=1 or web is NULL)   ORDER BY id DESC LIMIT $startrow, $show  ");

          $ac2="active";
          break;

          case 'ftd':

          $r =mysqli_query($con,"SELECT * FROM user  WHERE (lang='".$lang."') AND ( sec='3' OR op_status='Deposit') ORDER BY id DESC  LIMIT $startrow, $show  ");

          $ac3="active";
          break;

          case 'operator':
            $r = mysqli_query($con,"SELECT * FROM user WHERE  lang='".$lang."'  AND op_status !='Deposit' AND user.reg_by!='admin'  AND user.reg_by!='gabriele' AND user.reg_by!='adi'  AND user.reg_by!='it'  AND user.reg_by!='cristianabate' AND user.reg_by!='list' AND user.reg_by!='mariostein'  ORDER BY date DESC LIMIT $startrow, $show ");
            $ac4="active";
          break;

          case 'op_leads':
             $r = mysqli_query($con,"SELECT * FROM user WHERE  sendto IS NOT NULL  AND op_status !='Deposit'   AND op_status !='Deposit' AND lang='".$lang."'  AND reg_by='".$_SESSION['login_username']."'   ORDER BY date DESC LIMIT $startrow, $show ");
             $ac5="active";
          break;

          case 'callback':

                $r=mysqli_query($con,"SELECT * FROM user  WHERE (lang='".$lang."'  AND op_status !='Deposit') AND ( sec='4') AND (web=1 or web is NULL)   ORDER BY id DESC LIMIT $startrow, $show  ");

                $ac6="active";
          break;
          case 'no_number':

                $r=mysqli_query($con,"SELECT * FROM user  WHERE (lang='".$lang."'  AND op_status !='Deposit') AND ( sec='6') AND (web=1 or web is NULL)   ORDER BY id DESC LIMIT $startrow, $show  ");

                $ac13="active";
          break;

          case 'all':

                $r=mysqli_query($con,"SELECT * FROM user where (lang='".$lang."'  AND op_status !='Deposit') AND  (web=1 or web is NULL) and sec!=3  ORDER BY `id` DESC LIMIT $startrow, $show  ");//all but web and ftd

                $ac8="active";
          break;
          case 'view_list':
          		$r=mysqli_query($con,"SELECT * FROM user WHERE list_name='".$_GET['list_name']."'  AND op_status !='Deposit' ORDER BY id DESC LIMIT $startrow, $show  ");
          		$ac12='active';
          	break;
          case 'view_operator':
            $r=mysqli_query($con,"SELECT * FROM user WHERE sendto='".$_GET['op_name']."'   AND op_status !='Deposit' ORDER BY id DESC LIMIT $startrow, $show  ");
            break;
            
           case 'filtered':
           	if (isset($_GET['by_operator']) && isset($_GET['by_status']) && strlen($_GET['by_operator'])>0 && strlen($_GET['by_status'])>0 ) {
           		$r=mysqli_query($con,"SELECT * FROM user WHERE sendto ='".$_GET['by_operator']."' and op_status='".$_GET['by_status']."'  AND op_status !='Deposit' ORDER BY id DESC  LIMIT $startrow, $show   ");
           	}elseif (isset($_GET['by_operator']) && strlen($_GET['by_operator'])>0) {
           		$r=mysqli_query($con,"SELECT * FROM user WHERE sendto='".$_GET['by_operator']."'   AND op_status !='Deposit' AND lang='".$lang."'  ORDER BY id DESC LIMIT $startrow, $show   ");
           	} elseif (isset($_GET['by_status']) && strlen($_GET['by_status'])>0) {
           		$r=mysqli_query($con,"SELECT * FROM user WHERE op_status='".$_GET['by_status']."'   AND op_status !='Deposit' AND lang='".$lang."'  ORDER BY id DESC  LIMIT $startrow, $show  ");
           	}
           	 
           	break;
          case 'web':
             
                $ac11="active";
                  if (isset($_GET['interval'])) {
                    $interval=$_GET['interval'];
                  } else {
                    $interval='today';
                  }
                switch ($interval) {
                  case 'today':

                    $r=mysqli_query($con,"SELECT * FROM user where lang='".$lang." AND op_status !='Deposit'' AND  web=0 AND DATE(`date`) = CURDATE() ORDER BY id DESC  ");

                    break;
                  case 'yesterday':
                   $r=mysqli_query($con,"SELECT * FROM user where lang='".$lang."' AND op_status !='Deposit' AND op_status !='Deposit' AND  web=0 AND  `date` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND `date` < CURDATE() ORDER BY id DESC ");
                    break;
                  case 'lastweek':
                    $r=mysqli_query($con,"SELECT * FROM user where lang='".$lang."' AND op_status !='Deposit' AND  web=0 AND  `date` >= DATE(NOW()) - INTERVAL 7 DAY ORDER BY id DESC ");
                    break;
                    case 'thismonth':
                     $r=mysqli_query($con,"SELECT * FROM user where lang='".$lang."' AND op_status !='Deposit' AND  web=0 AND  `date` >= DATE_SUB(CURDATE(), INTERVAL DAYOFMONTH(CURDATE())-1 DAY) ORDER BY id DESC ");

                     
                      break;
                      case 'custom':
                      $date_range=urldecode($_GET['date_range']);
                      $date_range=explode('-', $date_range);
                      $dateF = date("Y-m-d", strtotime($date_range[0]));
                      $dateT = date("Y-m-d", strtotime($date_range[1]));

                      $r=mysqli_query($con,"SELECT * FROM user where lang='".$lang." AND op_status !='Deposit'' AND web=0 AND DATE(`date`) >= '".$dateF."' AND DATE(`date`) <= '".$dateT."' ORDER BY id DESC  ");
                        break;
                        case 'lifetime':
                             $r=mysqli_query($con,"SELECT * FROM user where lang='".$lang."' AND op_status !='Deposit' AND web=0  ORDER BY id DESC LIMIT $startrow, $show  ");
                            $r2=mysqli_query($con,"SELECT * FROM user where lang='".$lang."' AND op_status !='Deposit' AND web=0  ORDER BY id DESC  ");

                          break;
                  //ktu
                  default:
                    # code...
                    break;
                }


            break;


          case 'potential':

                $r=mysqli_query($con,"SELECT * FROM user  WHERE lang='".$lang."' AND op_status !='Deposit' AND op_status='Potential'  ORDER BY id DESC LIMIT $startrow, $show  ");
                
          break;
          case 'follow_up':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE lang='".$lang."' AND op_status !='Deposit' AND op_status='Follow Up'  ORDER BY id DESC LIMIT $startrow, $show  ");
                
          break;
          case 'interested':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE lang='".$lang."' AND op_status !='Deposit' AND op_status='Interested'  ORDER BY id DESC LIMIT $startrow, $show  ");
                
          break;
          case 'not_interested':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE (lang='".$lang."' AND op_status !='Deposit') AND  (sec='5' OR op_status='Non Interested')  ORDER BY id DESC LIMIT $startrow, $show  ");
                
          break;
          case 'no_answer':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE lang='".$lang."' AND op_status !='Deposit' AND op_status='Non Answer'  ORDER BY id DESC LIMIT $startrow, $show  ");
                
          break;
          case 'call_failed':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE lang='".$lang."' AND op_status !='Deposit' AND op_status='Call Failed'  ORDER BY id DESC LIMIT $startrow, $show  ");
                
          break;
          case 'secretary':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE lang='".$lang."' AND op_status !='Deposit' AND op_status='Secretary'  ORDER BY id DESC LIMIT $startrow, $show  ");
                
          break;
          case 'no_status':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE lang='".$lang."' AND op_status !='Deposit' AND op_status='No Status'  ORDER BY id DESC LIMIT $startrow, $show  ");

                
          break;


          default:
} ?> 



<style type="text/css">
  
  .content{
        padding-top: 0px;
  }
  #etab1 td{
    padding: 0px !important; 
    
    vertical-align: inherit !important;
  }
  html,body{
    overflow: hidden;
  }
  .main-footer{
  bottom: 0px;
    position: fixed;
    width: 100%;
    }

.doA , #select_all{
  height: 20px;
  width: 20px;
 position: relative;
}

.doA:after, #select_all:after{
  content: '\00D7';
  display: block;
  background: #a4acb6;
  background-image: url('images/basics-21-32.png');
  pointer-events: none;
  font-size: 15px;
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  color: transparent;
  transition: .25s all ease-in-out;
  border-radius: 3px;
  line-height: 15px;
  background-position: 0 15px;
  background-repeat: no-repeat;
  background-size: 15px 15px;
  border-width: 2px;
  border-style: solid;
  border-color: transparent;
}


.doA:checked:after{
  background-color: #3c8dbc;
  background-position: 0 0;
}
.doA:hover:after{
  border-color: #1a4964;
}
#select_all:checked:after{
  background-color: #3c8dbc;
  background-position: 0 0;
}
#select_all:hover:after{
  border-color: white;
}


</style>



<div >

<div class="box" style="background-color: #ffffff !important; margin-bottom: 0px">
            <div class="inner">
            
 
  <table  style="  margin-bottom: 0px !important; " id="etab3" class="table  table-condensed " cellspacing="0" width="100%">
       <tr >

        <th >
       <span class="label label-primary ">
      <?php 

      if ($interval=='lifetime') {
        $numa=mysqli_num_rows($r2);
        print_r($numa);
      } else {

         $numa=mysqli_num_rows($r);
            print_r($numa);
      
      }
       ?>
      </span>

      <td >  
              <select style="margin-top: 2px;margin-bottom:2px; padding:4px 12px;float: left; margin-right: 3px"  type="text" class="_show btn btn-default" name="show">
                <option <?php if ($_GET['show']==30){ echo 'selected=""';}; ?> value="30">30</option>
                <option <?php if ($_GET['show']==50){ echo 'selected=""';}; ?> value="50">50</option>
                <option <?php if ($_GET['show']==100){ echo 'selected=""';}; ?> value="100">100</option>
                <option <?php if ($_GET['show']==500){ echo 'selected=""';}; ?> value="500">500</option>
              </select>
        <?php 
   function unset_uri_var($variable, $uri) {   
    $parseUri = parse_url($uri);
    $arrayUri = array();
    parse_str($parseUri['query'], $arrayUri);
    unset($arrayUri[$variable]);
    $newUri = http_build_query($arrayUri);
    $newUri = $parseUri['path'].'?'.$newUri;
    return $newUri;
}
  if (isset($_GET['show'])) {
    $url = unset_uri_var('show', basename($_SERVER['REQUEST_URI']));
  }else{
    $url=$_SERVER["REQUEST_URI"];
  }
         if (strlen($_SERVER["REQUEST_URI"]) ==10){ ?>
             <script type="text/javascript">
               $('._show').on('change',function(){
                  window.location.href='<?php echo $url ?>?show='+$('._show').val();
               })
             </script>
             <?php } else{ ?>
             <script type="text/javascript">
               $('._show').on('change',function(){
                  window.location.href='<?php echo $url ?>&show='+$('._show').val();
               })
             </script>


             <?php } ?>

             <button style='float: left; margin-right: 3px' type="button" class="btn btn-warning btnf" data-toggle="modal" data-target="#manual-reg">Create Lead</button>


             <button  style='float: left; margin-right: 3px' type="button" class="btn btn-warning btnf" data-toggle="modal" data-target="#uploadmodal">List</button>
             <button style='float: left; margin-right: 3px' type="button" class="btn  btn-warning" data-toggle="modal" data-target="#createUser">Create User</button>
             <button style='float: left; margin-right: 3px' type="button" class="btn  btn-info" data-toggle="modal" data-target="#monitor_calls">Monitor</button>
             <button style='float: left; margin-right: 3px' type="button" class="btn  btn-info" onclick="main_chart()">Trading Chart</button>
             
         	<form style='float: left; margin-right: 3px; background: #00acd6;padding-left:2px;padding-right:2px;border-radius: 2px ' action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
         		     <select  name="by_operator" class="btn btn-default">
         		     	<?php if (!isset($_GET['by_operator']) || strlen($_GET['by_operator'])<1){ ?>
         		     	<option selected="" disabled="">Filter by Operator..</option>
         		     	<?php } else { ?>
         		     	<option class="btn-warning" selected=""  value="<?php echo $_GET['by_operator'] ?>"><?php echo $_GET['by_operator'] ?></option>
                  <option class="btn-danger" value="">Remove Filter</option>

					    <?php
					     }
						$results=mysqli_query($con,"SELECT * FROM operator WHERE lang='".$lang."'");

					    while($row=mysqli_fetch_assoc($results)){?>

					  <option value="<?php echo $row['username'] ?>"><?php echo $row['full_name'] ?></option>

					<?php } ?>
					</select>

             	<select name="by_status" class="btn btn-default">
             		<?php if (!isset($_GET['by_status']) || strlen($_GET['by_status'])<1){ ?>
         		     	<option selected="" disabled="">Filter by Status..</option>
         		    <?php } else { ?>
         		     	<option class="btn-warning" selected=""  value="<?php echo $_GET['by_status'] ?>" ><?php echo $_GET['by_status'] ?></option>
                   <option class="btn-danger" value="">Remove Filter</option>


					<?php } ?>
             		<option value="Potential">Potential</option>
             		<option value="Follow Up">Follow Up</option>
             		<option value="Interested">Interested</option>
                <option value="Non Interested">Not Interested</option>
             		<option value="Non Answer">No Answer</option>
             		<option value="Call Failed">Call Failed</option>
             		<option value="Secretary">Secretary</option>
             		<option value="No Status">No Status</option>
             	</select>
             	<input type="hidden" name="pager" value="filtered">
             	<input type="submit" class="btn btn-default" style="margin-top: 2px;margin-bottom:2px; padding:4px 12px" value="GO">
             </form>      


            </td>
              <td>&nbsp;</td>     <td>&nbsp;</td>
            <td >

            

    <ul class="pagination pagination-md no-margin pull-right">

    <?php 
                  $s11=$s22=$s33=$s44=$s55=$s66="";
              if ($pager=='web'){ 
                  if (isset($interval) and $interval!='lifetime')  { ?>

                    <script type="text/javascript">
                    $( document ).ready(function() {
                       $('#prev1,#next1').html("");
                    });
                     
                    </script>

                  <?php 
                    switch ($interval) {
                      case 'today':
                        $s22='selected';
                        break;
                        case 'yesterday':
                          $s33='selected';
                          break;
                        case 'lastweek':
                        $s44='selected';
                        break;
                        case 'thismonth':
                          $s55='selected';
                          break;
                          case 'custom':
                          $s66='selected';
                            break;
                          case 'lifetime':
                          $s11='selected';
                              break;
                      default:
                        # code...
                        break;
                    }
                  } else  ?> 
                <div  <?php if ($interval=='custom'){ echo "onclick=window.location.href='".$_SERVER['HTTP_REFERER']."'"; } ?> >
              <select id="interval_select" class="btn btn-default">
              <option <?php echo $s11 ?> >Lifetime</option>
              <option <?php echo $s22 ?> >Today</option>
              <option <?php echo $s33 ?> >Yesterday</option>
              <option <?php echo $s44 ?> >Last Week</option>
              <option <?php echo $s55 ?> >This Month</option>
              <?php if ($interval=='custom'){ ?>
               <option <?php echo $s66 ?> id='custom_range'  ><?php echo $dateF.' - '.$dateT ?></option> 
              <?php }  else { ?>
              <option <?php echo $s66 ?> id='custom_range' >Custom</option>
              <?php } ?>
              </select>
              <div id="c_hidden" style="float: right;" class="form-group">

              </div>
              </div>

                    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
                    <script type="text/javascript" src="plugins/daterangepicker/daterangepicker.js"></script>

                   

              <script type="text/javascript">
                    
                $('#interval_select').on('change', function() {
                 switch(this.value){
                  case "Lifetime":
                  window.location.href="<?php echo $_SERVER['PHP_SELF']."?pager=".$pager."&interval=lifetime";  ?>";
                  break;
                  case "Today":
                  window.location.href="<?php echo $_SERVER['PHP_SELF']."?pager=".$pager."&interval=today"; ?>";
                  break;
                  case "Yesterday":
                  window.location.href="<?php echo $_SERVER['PHP_SELF']."?pager=".$pager."&interval=yesterday"; ?>";
                  break;
                  case "Last Week":
                  window.location.href="<?php echo $_SERVER['PHP_SELF']."?pager=".$pager."&interval=lastweek"; ?>";
                  break;
                  case "This Month":
                  window.location.href="<?php echo $_SERVER['PHP_SELF']."?pager=".$pager."&interval=thismonth"; ?>";
                  break;
                  case "Custom":
                   $('#prev1,#next1').html("");

                   

                  $('#c_hidden').append("<div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><form id='form_interval' method='GET' action='admin.php?pager=web&interval=custom'><input type='text' class='form-control pull-right' id='daterange'></form></div>");
                 
                  $('#daterange').daterangepicker().on('change', function(){
                    window.location.href='<?php echo $_SERVER['PHP_SELF']."?pager=".$pager."&interval=custom&date_range="?>'+$('#daterange').val();
                  //$('#form_interval').submit();
                  });

                  //$(".applyBtn").click(function() {
                     //window.location.href='<?php //echo $_SERVER['PHP_SELF']."?pager=".$pager."&interval=custom&date_range=" //?>'+encodeURI($('#daterange').val());
                  // });
                  break;
                 }
                });
              </script>

            <?php } ?>

    <li id="prev1">
    	<?php $prev = $startrow - $pagination; if ($prev >= 0) { 

    	if (isset($_GET['pager']) && $_GET['pager']=='view_list') {
    		$href='<a  href="'.$_SERVER['PHP_SELF'].'?list_name='.$_GET['list_name'].'&startrow='.$prev.'&pager='.$pager.'"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>';
    		echo $href;
    		}elseif (isset($_GET['pager']) && $_GET['pager']=='view_operator') {
		        $href='<a  href="'.$_SERVER['PHP_SELF'].'?op_name='.$_GET['op_name'].'&startrow='.$prev.'&pager='.$pager.'"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>';
		        echo $href;
        }elseif (isset($_GET['pager']) && $_GET['pager']=='filtered') {
        $href='<a  href="'.$_SERVER['PHP_SELF'].'?by_operator='.$_GET['by_operator'].'&by_status='.$_GET['by_status'].'&startrow='.$prev.'&pager='.$pager.'"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>';
        	echo $href;
        } else{
              $href='<a  href="'.$_SERVER['PHP_SELF'].'?interval='.$interval.'&startrow='.$prev.'&pager='.$pager.'"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>';
              echo $href;
        }

    		
    	} else{ 

    	echo '<a href="#"class="previous disabled btnf">Previous</a>';
    }

    	?> </li>
    <li id="next1"><?php 
    	if (isset($_GET['pager']) && $_GET['pager']=='view_list') {

    	   	$href2='<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?list_name='.$_GET['list_name'].'&startrow='.($startrow+$pagination).'&pager='.$pager.'">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';  
    	   	echo $href2;
    	   } elseif (isset($_GET['pager']) && $_GET['pager']=='view_operator') {
          $href2='<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?op_name='.$_GET['op_name'].'&startrow='.($startrow+$pagination).'&pager='.$pager.'">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';
         echo $href2;  
         }elseif (isset($_GET['pager']) && $_GET['pager']=='filtered') {
          $href2='<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?by_operator='.$_GET['by_operator'].'&by_status='.$_GET['by_status'].'&startrow='.($startrow+$pagination).'&pager='.$pager.'">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';  
          echo $href2;  
         }  else{

              $href2='<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?interval='.$interval.'&startrow='.($startrow+$pagination).'&pager='.$pager.'">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';  
        	echo $href2;
         }


    	 

    ?></li>

    </ul>

    

    


    </center>

            </td>


          </th>

          </tr>
</table>

</div>
</div>

<?php  

      
  $num=mysqli_num_rows($r);
      if (mysqli_num_rows($r)==0){

        echo "<div class='well col-md-12'><p class='text-center'>No more records</p><ul class='pager'><li>";
        echo '<a href="'.$_SERVER['PHP_SELF'].'?pager='.$pager.'&startrow=0">Go to start</a></li></ul></div>';

      }

      else{

        ?>


<script src="dist/js/jquery.tablescroll.js"></script>

 <table id="etab1" class="table table-striped table-hover"  width="100%">

          <tr >
            <th><center><input  style="vertical-align: middle; margin: 0 0 0 2px !important;" type="checkbox" id="select_all" /></center></th>
            <th ><strong>Name</strong></th>
            <th><strong>Email</strong></th>
            <th><strong>Phone</strong></th>
            <th><strong>Meeting</strong></th>
            <th><center><strong>Action</strong></center></th>
            <th ><center><strong>Operator</strong></center></th>

            <th style="width: 1px;color: black"><center><strong>Status</strong></center></th>
            <?php if ($pager=='operator') { ?>
            <th>Reg.By</th>
            <?php } ?>

          </tr>


<tbody >

          <?php

          for($i=0;$i<$num;$i++)
        {


        while($row = $r->fetch_assoc()){



                       ?>

          <tr >
           <td >


           <center><input  class="doA" onclick="show_buttons()" type='checkbox' name='doA' id='<?php echo $row['id']?>'></center></td>

           <td >

              <a id="atitle" onclick='show_profile(<?php echo $row['id'] ?>)'><?php echo $row['name'] ?></a>

           </td>
           <td style="color:#d9534f;">
              <div  id="foo1<?php echo $row['id'] ?>" class="b1<?php echo $row['id'] ?>" data-clipboard-target="#foo1<?php echo $row['id'] ?>" value="https://github.com/zenorocha/clipboard.js.git">
          <?php echo $row['email'] ?>
          </div>

            <script type="text/javascript">
            new Clipboard('.b1<?php echo $row['id'] ?>');
            </script>

           </td>
           <td  class="text-center" style="font-family: cursive; font-style: italic;font-weight: bold;float: left;">
          <a style="color:black;text-decoration: none;cursor: pointer;" onclick="window.location.href='sip:<?php echo $row['phone_no'] ?>'" > <?php echo $row['phone_no'] ?></a>
           </td>


           <td style="text-align: justify;"><center>

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
            <form method = "post" action="admin_user_edit.php?user_id=<?php echo $row['id'];?>"><input type="submit" value="Edit" style="background: #a4acb6 !important;border-color: #ecf0f5 !important;" class="btn btn-warning">
            </form>
      
 

           </td>
           <td>
            <?php if(is_null($row['sendto'] ) or $row['sendto']=='' ){?>
          
            <?php } else{  ?> 
            

            <form  action="unsend.php" method="POST" style="float: right;">
              <font > <?php echo $row['sendto']; ?> </font>
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
              <input type="hidden" name="op_name" value="<?php echo $row['sendto'] ?>">
              <input type="submit" title="Unsend" class=" btn-danger" value="X">
            </form>

          <?php }  ?>
          </td>
          
          
        
           <td style="font-stretch: condensed; "><?php echo $row['op_status'] ?></td>
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
<style type="text/css">
  .h_buttons{
      display: none;
  }
  #atitle:hover{
    cursor: pointer;
  }
</style>

 <tr class="h_buttons">


                  <td  ><center>
      <button type="button" class="btn  btn-primary " data-toggle="modal" data-target="#send_tooo">Send To</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#moveto">Move To</button>
       </center>
       </td>

       </tr>




</tfoot>

         </table>

<script type="text/javascript">
  jQuery(document).ready(function($)
{


$('#etab1').tableScroll({containerClass:'tablescroll'});
});
</script>


   <script type="text/javascript">
$("#select_all").click(function(){

    $('.doA').not(this).prop('checked', this.checked);
     show_buttons();
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
<script type="text/javascript">
  //check show hide buttons
  function show_buttons() {
  
  var st_checked = $('.doA:checked').length + $('.doA:checked').length;
  if (st_checked > 0) {
    $('.h_buttons').fadeIn('slow');
  }
  else {
    $('.h_buttons').fadeOut('slow');
  }
  
  }
</script>




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



<div id="send_tooo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send to</h4>
      </div>
      <div class="modal-body">
        <center>
     <select id="operator" name="operator" class="btn btn-default">
    <?php
    
$results=mysqli_query($con,"SELECT * FROM operator WHERE lang='".$lang."'");

    while($row=mysqli_fetch_assoc($results)){?>


  <option value="<?php echo $row['username'] ?>"><?php echo $row['full_name'] ?></option>




<?php } mysqli_close($con);?>
<option value="UnSend">UnSend</option>
</select>
</center>
      </div>
      <div class="modal-footer">
        <center>
        <input class="btn  btn-info" type='button' value='Send' onclick='sendto(); return false;'>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </center>
      </div>
    </div>

  </div>
</div>

<div id="moveto" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Move to</h4>
      </div>
      <div class="modal-body">
        <center>
     <select id="movein" name="movein" class="btn btn-default">

  <option value="1">Trader </option>
  <option value="0">Finish</option>
   <option value="3">FTD</option>
   <option value="4">Callback</option>
   <option value="5">Not Interested</option>
	<option value="6">No Number</option>
   </center>

</select>
     </div>
      <div class="modal-footer">
        <center>
        <input class="btn  btn-warning" type='button' value='Move' onclick='move_sec(); return false;'>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>

  </div>
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
<div id="createUser" class="modal fade" role="dialog" >
  <div  class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <iframe  frameborder='0' style="width: 100%;height: 290px;"   src="create_users.php"></iframe>
        
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<center>


            <div id="uploadmodal" class="modal fade" role="dialog">
             <div class="modal-dialog">

    <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Upload List</h4>
                </div>
                <div class="modal-body">
                  
          <?php if (isset($_GET['file_upload']) AND $_GET['file_upload']=='success') { ?>

          <script type="text/javascript">
             $('.modal-body').append("<div class='alert alert-success' role='alert' ><center >Your list has been uploaded</center></div>");
            </script>

           <?php  } ?> 
        <?php if (isset($_GET['file_upload']) AND $_GET['file_upload']=='fail') { ?>
          <script type="text/javascript">
             $('.modal-body').append("<div class='alert alert-danger' role='alert' ><center >Select a list to upload</center></div>");
            </script>

          <?php } ?>
          <style type="text/css">
            label {
   cursor: pointer;
   /* Style as you please, it will become the visible UI component. */
}

#csv {
   opacity: 0;
   position: absolute;
   z-index: -1;
}
          </style>

          <form action="uploadData/upload.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
            Choose your CSV file: <br /> 
            <table border="1">
              <tr>
                <td>Full name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Alt. Phone</td>
                <td>Country</td>
              </tr>
            </table>
            <label for="csv" class="btn btn-default selected_file">Browse...
            <input name="csv" type="file" accept=".csv" id="csv" class="file_sel" hidden required="" /> 
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
</center>

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
        <iframe   style="width:100%!important;height: 500px!important;" frameborder='0' src="manual_registration.php"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="monitor_calls" class="modal fade" role="dialog">
  <div  class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Monitor</h4>
      </div>
      <div class="modal-body" width="300px" >
        <div id="monitor_callsid"></div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="trading_chart" class="modal fade" role="dialog">
  <div style="  
    width: 100%;
    /* height: 610px; */
    height: 100%;
    position: absolute;
    left: 0px;
    top: 0px;
    padding: 0;
    margin: 0;"   class="modal-dialog">

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

  $(window).scroll(function() {

    if ($(this).scrollTop()>0)
     {
        $('#select_all').fadeOut();
     }
    else
     {
      $('#select_all').fadeIn();
     }
 });


        $(document).on('show.bs.modal', '.modal', function (event) {
            var zIndex = 1040 + (10 * $('.modal:visible').length);
            $(this).css('z-index', zIndex);
            setTimeout(function() {
                $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
            }, 0);
        });


function main_chart(){

      //charts functions
        var linku1="trade/main_chart.html";
      $("#trading_chart_frame").attr("src",linku1);

        $('#trading_chart').modal('toggle');
      }

      function overview_chart(){
        var linku1="trade/overview_chart.html";
      $("#trading_chart_frame2").attr("src",linku1);

        $('#trading_chart2').modal('toggle');
      }
      $('#trading_chart').on('hidden.bs.modal', function () {
         $("#trading_chart_frame").attr("src","");
      });
      $('#trading_chart2').on('hidden.bs.modal', function () {
         $("#trading_chart_frame2").attr("src","");
      });

///////////////////////////////////////////////
function  refreshmonitor() {
      $('#monitor_callsid').load("extra/monitor_calls.php");
    }
$( "#monitor_calls" ).on('shown.bs.modal', function(){
    refreshmonitor() ;
    refreshm=setInterval(refreshmonitor, 2000);
 
});
$('#monitor_calls').on('hidden.bs.modal', function () {
  clearInterval(refreshm);
});

      function show_profile(id){
        var linku="view_user_modal.php?user_id="+id;
      $("#shprofile").attr("src",linku);

        $('#showprofile').modal('toggle');
      }

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
          console.log(operator);
        $('.doA').each(function () {
          if($(this).is(':checked'))
            snd.push($(this).attr('id'));
        });
        if(snd){
          snd = JSON.stringify(snd);
          $.post("sendto.php",{snd:snd,operator:operator},function(data){
            console.log(data);
            window.location.reload();
          });
        }

      }

      function move_sec () {
        var mv = [];
         var movein=$('#movein option:selected').attr('value');
        $('.doA').each(function () {
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


 
<?php if (isset($_GET['file_upload'])){ ?>
<script type="text/javascript">
      $(window).on('load', function(){
        $('#uploadmodal').modal('show');    
    });
</script>
<?php }  ?>


<?php 
if (isset($_GET['upload'])){ ?>

<script type="text/javascript">

      $(window).on('load', function(){
        $('#uploadmodal').modal('show');    
    });
</script>




<style type="text/css">
  .main-footer{
    margin-left: 0px !important;
  }
</style>

<?php 
} 

  
?>
</div></div>
<?php  include_once('footer.php') 

?>
