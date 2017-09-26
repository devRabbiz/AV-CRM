<?php 

require_once 'db_connect.php';
require_once 'session.php';
include_once 'functions.php';



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
<?php if (date('I')==1) { ?>
// daylight is on
var d<?php echo $row1[1];?> = new Date(Date.UTC(t<?php echo $row1[1];?>[0], t<?php echo $row1[1];?>[1]-1, t<?php echo $row1[1];?>[2], t<?php echo $row1[1];?>[3]-2, t<?php echo $row1[1];?>[4], t<?php echo $row1[1];?>[5]));

<?php } elseif (date('I')==0) { ?>
var d<?php echo $row1[1];?> = new Date(Date.UTC(t<?php echo $row1[1];?>[0], t<?php echo $row1[1];?>[1]-1, t<?php echo $row1[1];?>[2], t<?php echo $row1[1];?>[3]-1, t<?php echo $row1[1];?>[4], t<?php echo $row1[1];?>[5]));
<?php  } ?>

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
           show_profile(<?php echo $row1[1]; ?>);

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
     //console.log(z<?php echo $row1[1];?>);
     //console.log("--------");
    // console.log(x<?php echo $row1[1];?>);
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

console.log("Out Meet file loaded");

</script>
<?php   }

          }
        }
      }
       }  






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
<?php if (date('I')==1) { ?>
// daylight is on
var d<?php echo $row1[2];?> = new Date(Date.UTC(t<?php echo $row1[2];?>[0], t<?php echo $row1[2];?>[1]-1, t<?php echo $row1[2];?>[2], t<?php echo $row1[2];?>[3]-2, t<?php echo $row1[2];?>[4], t<?php echo $row1[2];?>[5]));

<?php } elseif (date('I')==0) { ?>
  //daylight is off
  var d<?php echo $row1[2];?> = new Date(Date.UTC(t<?php echo $row1[2];?>[0], t<?php echo $row1[2];?>[1]-1, t<?php echo $row1[2];?>[2], t<?php echo $row1[2];?>[3]-1, t<?php echo $row1[2];?>[4], t<?php echo $row1[2];?>[5]));
<?php  } ?>
console.log(d<?php echo $row1[2];?>);

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
      show_profile(<?php echo $row1[2]; ?>);
    };

  }

}
function clearmeet<?php echo $row1[2];?>() {


          $.post("clearmeet.php",{id:<?php echo $row1[2]; ?>},function(data){
            //window.location.reload();
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
      if(confirm("<?php echo $row1[8] ?>"))
         show_profile(<?php echo $row1[2] ?>);
      //alert("<?php echo $row1[1] ?>");
      clearmeet<?php echo $row1[2];?>();
    clearInterval(check<?php echo $row1[2];?>);
    }

   


  }, 1000);
</script>
<?php   }

        
      } }
        } 

}





       ?>