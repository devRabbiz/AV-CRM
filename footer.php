
<footer class="main-footer">

    <div class="pull-right hidden-xs">
     

    </div>
    

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700">

 <title>chat</title>
    <link href="chat/style.css" rel="stylesheet">


<style type="text/css">
  .msg_box{
    display: none;
  }
  .chat_body{
    display: none;
  }
</style>
  </head>
  <body>
  
  <div class="chat_box">
  <div class="chat_head"> Chat Box<label id="chat_count" style="float: right;" class=" label label-primary"></label></div>
  <div class="chat_body" style="    overflow: auto;"> 
<div class="user1" onclick="openChat('*')">ALL<label class="label_user" id="*"></label></div>
<?php
 $conm=mysqli_connect("127.0.0.1","root","","reg_db") or die('asd');
 $results11=mysqli_query($conm,"SELECT * FROM operator ORDER BY full_name");
 $results111=mysqli_query($conm,"SELECT * FROM admins ORDER BY full_name");

while($row=mysqli_fetch_assoc($results111)){?>
<div class="user1" onclick="openChat('<?php echo $row["username"] ?>')"><?php echo $row['full_name'] ?><label class="label_user" id="<?php echo $row['username']; ?>"></label></div>
<?php } 
while($row=mysqli_fetch_assoc($results11)){?>
<div class="user1" onclick="openChat('<?php echo $row["username"] ?>')"><?php echo $row['full_name'] ?><label  class="label_user" id="<?php echo $row['username']; ?>"></label></div>
<?php } ?>



  </div>
  </div>

<div class="msg_box" style="right:290px">
  <div class="msg_head">
    <a style="color: white" class="user_chating">Chat</a>
  <div class="close">x</div>
  </div>
  <div class="msg_wrap">
    <div class="msg_body">
      <iframe src="" class="chat_iframe" style="height: 100%;width: 100%"></iframe>
    </div>

</div>
</div>
<?php if (isset($_SESSION['login_username'])){
  $chat='chat/chat.php';
} elseif (isset($_SESSION['operator_username'])) {
  $chat='chat/chat_op.php';
}?>

    <script >

  function openChat(username){
    //$('.msg_box').slideDown('slow');
    $('.chat_iframe').attr('src','<?php echo $chat; ?>?to='+username);
    $('.user_chating').html(username);
    //$('.msg_box').slideUp('slow');
    $.ajax({
      url: 'chat/check.php',
      type: 'POST',
      dataType: 'json',
      data: {action: 'read',username:username},
    })
    .done(function(data) {
      $('.label_user').html('');
      $('#chat_count').html('');
    })
    .fail(function() {
      console.log("error");
    });
    
  }


function chat(){
  $.ajax({
    url: 'chat/check.php',
    type: 'POST',
    dataType: 'json',
    data: {action: 'check'},
  })
  .done(function(data) {
        for (var i = data.length - 1; i >= 0; i--) {
          console.log(data.length);
          if (data.length>=1) {
            $('#'+data[i]['username']).html('<label style="float:right"  class="label label-danger">New</label>');
            $('#chat_count').html(data.length);
          } 
          if (data[i]['beep']==1) {
          var audio = new Audio('beep.ogg');
            audio.play();   
          //console.log(data[i]);
        $.ajax({
          url: 'chat/check.php',
          type: 'POST',
          dataType: 'json',
          data: {action: 'beep',id:data[i]['id']},
        })
        .done(function(data1) {
          console.log(data1);
        })
        .fail(function() {
          console.log("error");
        });
      }


     }
        
  })
  .fail(function() {
    console.log("error");
  });
}



  $(document).ready(function(){


if (typeof(Storage) !== "undefined") {

    if (localStorage.chatOpen) {
      if (localStorage.getItem('chatOpen')=='yes') {//if was open
        $('.chat_body').slideToggle('slow');//open it
        //console.log(localStorage.getItem('chatOpen'));
      } else {


      }
      
  } else {
      localStorage.chatOpen='no';
  }

} else {
    // Sorry! No Web Storage support..
}





        $('.chat_head').click(function(){
          if (localStorage.getItem('chatOpen')=='no') {
            localStorage.setItem('chatOpen','yes')
            //console.log('from no to yes');
          } else if (localStorage.getItem('chatOpen')=='yes') {
            localStorage.setItem('chatOpen','no');
            //console.log('from yes to no');
          }
          $('.chat_body').slideToggle('slow');
      });






  $('.msg_head').click(function(){
    $('.msg_wrap').slideToggle('slow');
  });
  
  $('.close').click(function(){
    $('.msg_box').hide();
  });
  
  $('.user1').click(function(){
    $('.msg_wrap').show();
    $('.msg_box').show();
  });



setInterval(chat, 1000);


});


  
    </script>



   <div class="col-md-4" style="width: auto !important"> <strong>Copyright &copy; 2017 <a target="_blank" href="http://github.com/adalenv">Adalen VLADI</a>.</strong> All rights
    reserved.
    </div>
  
      <div id="lwchdddddddd" class="col-md-4">
          
        </div>

        <script type="text/javascript">
              $(document).ready(function(){
                setTimeout(function(){
                  $('#lwch').append('<iframe class="_cfd_content_features_b_" style="width: 99.9%;position: absolute;" src="https://www.lockwoodinv.com/trade.php/trader/widgets/flux" width="100%" height="25px;" frameborder="0" marginheight="20" scrolling="no" __idm_frm__="516" __idm_id__="1039523841"></iframe>');
                  console.log("lwch success")
                },5000)
              });  
        </script>


  </footer>




<script>
  var AdminLTEOptions = {
    //Enable sidebar expand on hover effect for sidebar mini
    //This option is forced to true if both the fixed layout and sidebar mini
    //are used together

    //sidebarExpandOnHover: true,
    
    //BoxRefresh Plugin
    enableBoxRefresh: true,
    //Bootstrap.js tooltip
    enableBSToppltip: false
  };
</script>
<!-- AdminLTE App -->

<script src="dist/js/app.min.js"></script>

</body>

</html>