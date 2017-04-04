<?php
require_once 'db_connect.php';
require_once 'session.php';
include_once 'functions.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="../../dist/css/style.css" rel="stylesheet"/>
  <link href="style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="dist/css/bootstrap-datetimepicker.min.css" />

  <script src="/dist/js/jquery-3.1.1.min.js"></script>
  <script src="/dist/js/pace.min.js"></script>
  <script src="/dist/js/moment.js"></script>
  <script src="/dist/js/clipboard.min.js"></script>
  <script type="text/javascript" src="dist/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="dist/js/jquery.tablesorter.min.js"></script>

  <link rel="shortcut icon" type="image/png" href="/images/hlogo.png"/>

</head>

<body >

<?php

    if (isset($_SESSION['login_username'])){
        $user=$_SESSION['login_username'];
        $role="Administrator";
      }
    elseif(isset($_SESSION['login_student_username'])){
      $user=$_SESSION['login_student_username'];
      $role="Client";
    }
    elseif (isset($_SESSION['operator_username'])) {
      $user=$_SESSION['operator_username'];
      $role="Operator";
    }
    else{
      $user="";
      $role="demo";
     }

     $date = date("j F Y");
?>
<!--   operator header   -->
<?php if (isset($_SESSION['operator_username'])) {

 ?>


<header class="header-op" >


<div class="date"> <i class="fa fa-calendar"></i>

  <div class="menu"><i class="fa fa-bars"></i>
    <div class="title"><img class="hlogo" style="height: 60px !important" src="/images/logg.png"><i class="des">the future forex</i></div>
  </div>
  <div class="user"><img   src="/images/admin.png">
  
    <div class="content">
      <div class="name"><?php echo $user ?> 
      </div>

      <div class="titulus"><?php echo $role ?></div>
    </div>
  </div>
  <div class="search"><i class="fa fa-search"></i></div>
</header>
<?php if ($role!="demo") {?>


<script type="text/javascript">
 $(function() {
$('.hlogo').hover(function() { 
    $('.des').fadeIn(); 
}, function() { 
    $('.des').fadeOut(); 
});
});


$('.user').hover(function(){
  $('.user').animate({
    height: "120px",
   },
    'speed', function() {
    /* stuff to do after animation is complete */
  });
  $(".user").append('<div class="lg" style="color:white;"><a class="btn btn-default" style="float:right" href="logout.php">Logout</a></div>');
},function() { 
    $('.user').animate({
    height: "53px",
   },
    'speed', function() {
    /* stuff to do after animation is complete */
  });
    $('.lg').remove(); 

});
<?php  } ?>

</script>

</div>

<?php } elseif (isset($_SESSION['login_username'])) {
 
 ?>
<header class="header-admin">


<div class="date"> <i class="fa fa-calendar"></i>
  <div class="menu"><i class="fa fa-bars"></i>
    <div class="title"><img class="hlogo" src="/images/logg.png"><i class="des">the future forex</i></div>
  </div>
  <div class="user"><img   src="/images/admin.png">
  
    <div class="content">
      <div class="name"><?php echo $user ?> 
      </div>

      <div class="titulus"><?php echo $role ?></div>
    </div>
  </div>
  <div class="search"><i class="fa fa-search"></i></div>
</header>
<?php if ($role!="demo") {?>


<script type="text/javascript">
 $(function() {
$('.hlogo').hover(function() { 
    $('.des').fadeIn(); 
}, function() { 
    $('.des').fadeOut(); 
});
});



</script>
<script type="text/javascript">
 $(function() {
$('.hlogo').hover(function() { 
    $('.des').fadeIn(); 
}, function() { 
    $('.des').fadeOut(); 
});
});


$('.user').hover(function(){
  $('.user').animate({
    height: "110px",
   },
    'speed', function() {
    /* stuff to do after animation is complete */
  });
  $(".user").append('<div class="lg" style="color:white;"><a class="btn btn-default" style="float:right" href="logout.php">Logout</a></div>');
},function() { 
    $('.user').animate({
    height: "53px",
   },
    'speed', function() {
    /* stuff to do after animation is complete */
  });
    $('.lg').remove(); 

});
<?php  } ?>

</script>
<div class="statusbar menu2">
<?php if (isset($_SESSION['login_username'])) {
    $result=mysqli_query($con,"SELECT count(*) as total from user WHERE checked_by_admin='1'");
    $result1=mysqli_query($con,"SELECT count(*) as total from user WHERE download='1'");
      $data=mysqli_fetch_assoc($result);
      $data1=mysqli_fetch_assoc($result1);
?>
<center>
<div class="notification" style="color: black"><span style="color: black"><?php echo $date; ?></span > &nbsp;&nbsp;&nbsp; Unverified : <span style="color: black"><?php echo $data['total'];?></span> 
&nbsp;&nbsp;&nbsp;&nbsp; Undownloaded : <span style="color: black"><?php echo $data1['total'];?></span>
</div>
</center>



<?php } ?>
</div>
</div>

<script type="text/javascript">
  $('.menu2').addClass('original').clone().insertAfter('.menu2').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();
scrollIntervalID = setInterval(stickIt, 10);

function stickIt() {

  var orgElementPos = $('.original').offset();
  orgElementTop = orgElementPos.top;

  if ($(window).scrollTop() >= (orgElementTop)) {
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
    $('.original').css('visibility','hidden');
  } else {
    // not scrolled past the menu2; only show the original menu.
    $('.cloned').hide();
    $('.original').css('visibility','visible');
  }
}
$(function(){
  $('header').data('size','big');
});

$(window).scroll(function(){
  if($(document).scrollTop() > 0)
{
    if($('header').data('size') == 'big')
    {
        $('header').data('size','small');
        $('.hlogo ').css({
          display: 'none'
        });
        $('.user ').css({
          display: 'none'
        });
        $('header').stop().animate({

            height:'0px'
        },600);
    }
}
else
  {
    if($('header').data('size') == 'small')
      {
        $('header').data('size','big');
         $('.hlogo ').css({
          display: 'block'
        });
         $('.user ').css({
          display: 'block'
        });
        $('header').stop().animate({
            height:'100px'
        },600);
      }  
  }
});


</script>
<?php }  ?>

<?php
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

    notification.onclicke = function () {
      window.open("view_user.php?user_id=<?php echo $row1[1] ?>");
    };

  }

}
function clearmeet<?php echo $row1[1];?>() {

            var admin='<?php echo $_SESSION['login_username']; ?>';
          $.post("clearmeet_admin_backup.php",{id:<?php echo $row1[1]; ?>,admin:admin},function(data){
            window.location.reload();
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
        window.location='view_user.php?user_id=<?php echo $row1[1] ?>';
      else
        window.location='view_user.php?user_id=<?php echo $row1[1] ?>';

      //alert("<?php echo $row1[1] ?>");
      clearmeet<?php echo $row1[1];?>();
    clearInterval(check<?php echo $row1[1];?>);
    }




  }, 1000);
</script>
<?php   }

          }
        }
      }
       }  ?>

