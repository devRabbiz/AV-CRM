<?php
include_once 'header.php';

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
  $ac1=$ac2=$ac3=$ac4=$ac5=$ac6=$ac7=$ac0=$ac8=$ac9=$ac10="";
        
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

          case 'not_interested':
                $r=mysqli_query($con,"SELECT * FROM user  WHERE  sec='5' OR op_status='Non Interested'  ORDER BY id DESC LIMIT $startrow, 30  ");
                $ac7="active";
          break;

          case 'all':
                $r=mysqli_query($con,"SELECT * FROM user  ORDER BY id DESC LIMIT $startrow, 30  ");
                $ac8="active";
          break;

          default:

          break;

} ?> 







<audio id="myAudio">
  <source src="/files/notif.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

 <script type="text/javascript">

document.addEventListener('DOMContentLoaded', function () {
  if (!Notification) {
    alert('Desktop notifications not available in your browser. Try Chromium.'); 
    return;
  }

  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe(a,b) {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('You have a meeting now', {
      icon: 'images/meet.ico',
      body: b,
    });

    Notification.onclick = function () {
      window.open("view_user.php?user_id="+a);
    };

  }

}



   $(document).ready(function(){
    setInterval(function() {getJobs()}, 5000);
   });

function toTimestamp(strDate){
   var datum = Date.parse(strDate);
   return datum/1000;
}
function getJobs() {

$.ajax({
  type: 'GET',
  url: 'admin_jobs.php',
  dataType: 'json',
  success: function(data) {

var data = JSON.parse(JSON.stringify(data));
       for (var i in data) 
            {
 var jobDate= new Date(data[i].meet); 
  jobDate=toTimestamp(jobDate);
  jobDate=parseInt(jobDate);
  
  var currentDate = Date();
  currentDate=toTimestamp(currentDate);
  currentDate=parseInt(currentDate);

  console.log(data[i].name);
  console.log(jobDate+"--job");
  console.log(currentDate+"--now");





    if (currentDate > jobDate){
      console.log('is');
      var notif = document.getElementById("myAudio"); 
        notif.play(); 
 if(confirm(data[i].name)){
  if ($('#showprofile').is(':visible')) {
    $('#showprofile').modal('toggle');
  }
  notifyMe(data[i].def,data[i].name);
     show_profile(data[i].def);
    removeJob(data[i].id);    
    }
    
    
    }

      
           }
  },
  error: function() {
    
  }
});
}

function removeJob(id) {
  $.post("clearmeet_ajax.php",{id:id},function(data){
            
          });
}


</script>






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


  <table  style="background:url('/images/2.png');  margin-bottom: 0px !important;  background-repeat: round;" id="etab3" class="table  table-condensed " cellspacing="0" width="100%">
       <tr >
        <th >
        <center>
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

            <a href="export.php?export=all" class='btn btn-default btnf'>Download all</a>

            <a href="export.php?export=new" class='btn btn-default btnf'>Download Newest</a>

             <button type="button" class="btn btn-default btnf" data-toggle="modal" data-target="#manual-reg">Create New</button>

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

              <div class="btn-group">

    <ul class="pager">
    <li><?php $prev = $startrow - 30; if ($prev >= 0)echo '<a  href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'&pager='.$pager.'#home"><span aria-hidden="true">&larr;&nbsp;</span>Previous </a>'; 
    else echo '<a href="#"class="previous disabled btnf">Previous</a>'?> </li>
    <li><?php echo '<a class="next btnf" href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+30).'&pager='.$pager.'#home">Next <span aria-hidden="true">&nbsp;&rarr;</span> </a>';     ?></li>

    </ul>

    </div>


    </center>
show_profile()
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
      <iframe style="width: 100%;height: 600px;" scrolling="no" frameborder='0' id='shprofile' src="view_user_modal.php?user_id="></iframe>
        
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




