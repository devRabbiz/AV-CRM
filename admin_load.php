<?php
include_once 'header.php';
?>


<?php 

 if (isset($_GET['login'])) { 
   $full_name=mysqli_query($con,"SELECT * FROM admins WHERE username='".$_SESSION['login_username']."'");
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


<?php }



if (isset($_SESSION['login_username'])) {


 
    if($result =$admin1){
        if(mysqli_num_rows($result) > 0){
            while($row1 = mysqli_fetch_array($result)){

            if (is_null($row1[2]))
              echo "";
            else{

             ?>

<audio id="myAudio">
  <source src="/files/notif.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

           <script type="text/javascript">
  var prove<?php echo $row1[1];?>="<?php echo $row1[2]; ?>";
  console.log(prove<?php echo $row1[1];?>);
  console.log("<?php echo $row1[4] ?>");
  // Split timestamp into [ Y, M, D, h, m, s ]
var t<?php echo $row1[1];?> = prove<?php echo $row1[1];?>.split(/[- :]/);

// Apply each element to the Date function
var d<?php echo $row1[1];?> = new Date(Date.UTC(t<?php echo $row1[1];?>[0], t<?php echo $row1[1];?>[1]-1, t<?php echo $row1[1];?>[2], t<?php echo $row1[1];?>[3]-2, t<?php echo $row1[1];?>[4], t<?php echo $row1[1];?>[5]));

var x<?php echo $row1[1];?>=parseInt((d<?php echo $row1[1];?>.getTime()-d<?php echo $row1[1];?>.getMilliseconds())/1000);


document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe<?php echo $row1[1];?>() {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('You have a meeting now', {
      icon: 'images/meet.ico',
      body: "<?php echo $row1[4] ?>",
    });

    Notification.onclick = function () {
      window.open("view_user.php?user_id=<?php echo $row1[1] ?>");
    };

  }

}
function clearmeet<?php echo $row1[1];?>() {

            var admin='<?php echo $_SESSION['login_username']; ?>';
          $.post("clearmeet_admin.php",{id:<?php echo $row1[1]; ?>,admin:admin},function(data){
            //window.location.reload();
          });
        };

  var check<?php echo $row1[1];?>=setInterval(function() {
      var a<?php echo $row1[1];?> =new Date();
     var z<?php echo $row1[1];?>=parseInt((a<?php echo $row1[1];?>.getTime()-a<?php echo $row1[1];?>.getMilliseconds())/1000);
     console.log(z<?php echo $row1[1];?>);
     console.log("--------");
     console.log(x<?php echo $row1[1];?>);
    if (z<?php echo $row1[1];?>>x<?php echo $row1[1];?>){
      var notif<?php echo $row1[1];?> = document.getElementById("myAudio"); 
        notif<?php echo $row1[1];?>.play(); 


      notifyMe<?php echo $row1[1];?>();
      if(confirm('<?php echo $row1[4] ?>'))
        show_profile(<?php echo $row1[1] ?>);
      else
         show_profile(<?php echo $row1[1] ?>);

      //alert("<?php echo $row1[1] ?>");
      clearmeet<?php echo $row1[1];?>();
    clearInterval(check<?php echo $row1[1];?>);
    }




  }, 1000);


$(document).ready(function() {
  setTimeout(function(){
   window.location.reload(1);
}, 300000)

});



</script>
<?php   }

          }
        }
      }
       }  

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
  $ac1=$ac2=$ac3=$ac4=$ac5=$ac6=$ac7=$ac0=$ac8=$ac9=$ac10=$ac11="";
        
        switch ($pager) {

          case 'home': 
           $r = admin_case_home($con,$_SESSION['login_username'],$startrow);
           $ac1="active";
            break;

          case 'sec':
          $r =admin_case_sec($con,$_SESSION['login_username'],$startrow);
          $ac2="active";
          break;

          case 'ftd':
          $r =admin_case_ftd($con,$_SESSION['login_username'],$startrow);
          $ac3="active";
          break;

          case 'operator':
            $r = mysqli_query($con,"SELECT * FROM user WHERE  lang='".$lang."' AND user.reg_by!='admin'  AND user.reg_by!='gabriele' AND user.reg_by!='adi'  AND user.reg_by!='cristianabate' AND user.reg_by!='list'  ORDER BY date DESC LIMIT $startrow, 30 ");
            $ac4="active";
          break;

          case 'op_leads':
             $r = mysqli_query($con,"SELECT * FROM user WHERE  sendto IS NOT NULL AND lang='".$lang."'  AND reg_by='".$_SESSION['login_username']."'   ORDER BY date DESC LIMIT $startrow, 30 ");
             $ac5="active";
          break;

          case 'callback':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE  sec='4'  ORDER BY id DESC LIMIT $startrow, 30  ");
                $ac6="active";
          break;



          case 'all':
                $r=mysqli_query($con,"SELECT * FROM user  ORDER BY id DESC LIMIT $startrow, 30  ");
                $ac8="active";
          break;
          case 'web':
                $r=mysqli_query($con,"SELECT * FROM user where web=0  ORDER BY id DESC LIMIT $startrow, 30  ");
                $ac11="active";
            break;



          case 'potential':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE op_status='Potential'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
          break;
          case 'follow_up':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE op_status='Follow Up'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
          break;
          case 'interested':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE op_status='Interested'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
          break;
          case 'not_interested':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE  sec='5' OR op_status='Non Interested'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
          break;
          case 'no_answer':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE op_status='Non Answer'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
          break;
          case 'call_failed':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE op_status='Call Failed'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
          break;
          case 'secretary':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE op_status='Secretary'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
          break;
          case 'no_status':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE op_status='No Status'  ORDER BY id DESC LIMIT $startrow, 30  ");
                
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
</style>



<div >

<div class="box" style="background-color: #ffffff !important; margin-bottom: 0px">
            <div class="inner">
            
 
  <table  style="  margin-bottom: 0px !important; " id="etab3" class="table  table-condensed " cellspacing="0" width="100%">
       <tr >
        <th >
     

      <td >

            <a href="export.php?export=all" class='btn btn-default btnf'>Download all</a>

            <a href="export.php?export=new" class='btn btn-default btnf'>Download Newest</a>

             <button type="button" class="btn btn-default btnf" data-toggle="modal" data-target="#manual-reg">Create New</button>


             <button type="button" class="btn btn-default btnf" data-toggle="modal" data-target="#uploadmodal">List</button>
            </td>
              <td>&nbsp;</td>     <td>&nbsp;</td>
            <td >

            

    <ul class="pagination pagination-md no-margin pull-right">
    <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'&pager='.$pager.'#home"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
    else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
    <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+30).'&pager='.$pager.'#home">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

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
        echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow=0">Go to start</a></li></ul></div>';

      }

      else{

        ?>


<script src="dist/js/jquery.tablescroll.js"></script>

 <table id="etab1" class="table table-striped table-hover"  width="100%">

          <tr >
            <th><center><strong>ID</strong></center></th>
            <th><strong>Name</strong></th>
            <th><strong>Email</strong></th>
            <th><strong>Phone</strong></th>
            <th><strong>Meeting</strong></th>
            <th><center><strong>Action</strong></center></th>
            <th style="background: #5cb85c;color: white"><center><strong>Send_to</strong><input  style="vertical-align: middle;    margin: 0 0 0 2px !important;" type="checkbox" id="select_all" /></center></th>
            
            <th style="background: #f0ad4e;width: 1px;color: white"><center><strong>Move</strong></center></th>
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


           <center><?php echo $row['id'] ?></center></td>

           <td>
              
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
      
 

           </td>
           <td>
            <?php if(is_null($row['sendto'] )){?>
            <center>
           <input  class="send-to" onclick="show_buttons()" type='checkbox' name='send-to' id='<?php echo $row['id']?>'></center>
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
            <center>
           <input class="move_sec" onclick="show_buttons()" type='checkbox' name='move_sec' id='<?php echo $row['id']?>'></center>
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
      <button type="button" class="btn  btn-primary btn-success" data-toggle="modal" data-target="#dropmodal">Send To</button>
      <!--
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
      -->
        
        <button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#moveto">Move To</button>
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

    $('.send-to').not(this).prop('checked', this.checked);
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
  
  var st_checked = $('.send-to:checked').length + $('.move_sec:checked').length;
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
   <option value="4">Callback</option>
   <option value="5">Not Interested</option>

</select>
     </div>
      <div class="modal-footer">
      <input class="btn  btn-warning" type='button' value='Move' onclick='move_sec(); return false;'>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="showprofile" class="modal fade" role="dialog">
  <div style="width:90%;" class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <iframe style="width: 100%;height: 550px;" scrolling="no" frameborder='0' id='shprofile' src="view_user_modal.php?user_id="></iframe>
        
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
            <table border="1">
              <tr>
                <td>Full name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Alt. Phone</td>
              </tr>
            </table>
            <label class="btn btn-default btn-file">
            <input name="csv" type="file" accept=".csv" id="csv" hidden required="" /> 
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


<script type="text/javascript">

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

if (isset($_GET['upload'])){ ?>

<script type="text/javascript">
    $(window).load(function(){
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
