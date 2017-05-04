<?php
include_once 'include/header.php';

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

	if (isset($_SESSION['operator_username'])) {
   

       $lang_check=mysqli_query($con,"SELECT lang FROM operator WHERE username='".$_SESSION['operator_username']."'");
      $lang=$lang_check->fetch_assoc();
      $lang=$lang['lang'];
       $operator=$_SESSION['operator_username'];
     if (!isset($_GET['pager'])) {
                $pager='home';
        } else{
          $pager=$_GET['pager'];
        }

          $ac1=$ac2=$ac3=$ac4=$ac5=$ac6=$ac7=$ac0=$ac8="";
        switch ($pager) {
                case 'potential':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Potential' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac1="class='active'";
                  break;
                   case 'followup':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Follow Up' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac2="class='active'";
                  break;
                   case 'interested':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Interested' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac3="class='active'";
                  break;
                   case 'noninterested':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Non Interested' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac4="class='active'";
                  break;
                   case 'nonanswer':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Non Answer' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac5="class='active'";
                  break;
                   case 'callfailed':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Call Failed' ORDER BY jobs.id DESC LIMIT $startrow, 30");
                 $ac6="class='active'";
                  break;
                   case 'secretary':
                 $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='Secretary' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac7="class='active'";
                  break;
                  case 'new':
                  $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' and jobs.status='new' ORDER BY jobs.id DESC  LIMIT $startrow, 30");
                 $ac8="class='active'";
                  break;
                  case 'home':
                    $r=mysqli_query($con,"SELECT jobs.*,user.id,user.name,user.email,user.phone_no FROM jobs,user WHERE user.id=jobs.id AND jobs.operator='".$_SESSION['operator_username']."' 
                    ORDER BY ISNULL(jobs.meet) ASC ,jobs.meet ASC  LIMIT $startrow, 30");
                 // $r=$op2;
                    $ac0="class='active'";
                    break;


                default:

                 $r=$op2;
                 $ac0="class='active'";
                  break;

}

?>
<head>
	
  <link rel="stylesheet" href="dist/css/bootstrap.min.css" />


</head>



<div class="container-fluid" id="home">





 <div class="row admin-outer">
    <div class="col-md-12" style="float: none !important">
      <div class="navbar-header">
          <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
       </div>
              <div class="navbar navbar-default side-collapse in">
                <nav role="navigation" class="navbar-collapse">
                  <ul class="nav navbar-nav">
                      <li role="presentation" <?php echo " ".$ac0." "; ?> ><a style="color: #05147e;font-weight: bold; width:120px;"  href="<?php echo $_SERVER['PHP_SELF'].'?pager=home'?>">All 
                      <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                      <li role="presentation" <?php echo " ".$ac1." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=potential'?>">Potential 
                      <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Potential' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                       <li role="presentation" <?php echo " ".$ac2." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=followup'?>">Follow Up
                       <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Follow Up' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                      <li role="presentation" <?php echo " ".$ac3." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=interested'?>">Interested
                      <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Interested' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                      <li role="presentation" <?php echo " ".$ac4." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=noninterested'?>">No Interes
                      <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Non Interested' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                      <li role="presentation" <?php echo " ".$ac5." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=nonanswer'?>">Non Answer
                      <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Non Answer' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo htmlentities($ptotal);?>
                      </span></a></li>
                     <li role="presentation" <?php echo " ".$ac6." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=callfailed'?>">Call Failed
                     <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Call Failed' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                       <li role="presentation" <?php echo " ".$ac7." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=secretary'?>">Secretary
                       <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='Secretary' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                        <li role="presentation" <?php echo " ".$ac8." "; ?> ><a style="color: #05147e;font-weight: bold;width:120px;" href="<?php echo $_SERVER['PHP_SELF'].'?pager=new'?>">New
                        <span class="badge" style="right:5px;position: absolute;top: 2px">                        <?php $stat=mysqli_query($con,"SELECT * FROM jobs WHERE operator='".$operator."' AND status='New' ");
                         $ptotal=mysqli_num_rows($stat);
                         echo $ptotal;?>
                      </span></a></li>
                  </ul>
                </nav>
              </div>
     


    </div>
<div class="container" style="margin-top: 20px">
<a href="operator_manual_registration.php" class="btn btn-default btnf">Create New</a>
<script type="text/javascript">
$(document).ready(function(){

        
       
    
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        resultDropdown = $(this).siblings(".result");
        if(term.length){

            $.get("fetch_operator.php", {query: term}).done(function(data){
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
 <ul class="pager" style="float: right;">
    <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'&pager='.$pager.'#home"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
    else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
    <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+30).'&pager='.$pager.'#home">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

    </ul>
 <table id="etab1" class="table  table-condensed table-hover table-bordered" cellspacing="0" width="100%">
 <tr>
            <th><strong>ID</strong></th>
            <th><strong>Name</strong></th>
            <th><center><strong>Status</strong></center></th>
            <th><center><strong>Note</strong></center></th>
            <th><center><strong>Last Call</strong></center></th>
            <th><center><strong>Meeting</strong></center></th>
            

 </tr>

<?php

  while($row = $r->fetch_assoc()){
 

           ?>

<tr>
            <td><?php echo $row['id'] ?></td>
           <td><a href="operator_view_user.php?user_id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
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
             # code...
           
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