<?php
require_once '../db_connect.php';
require_once '../session.php';
include_once '../functions.php';
?>
 
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="facivon.ico">

    <title>chat</title>
    <link href="style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

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

<?php

 $results=mysqli_query($con,"SELECT * FROM operator");
 $results1=mysqli_query($con,"SELECT * FROM admins");

while($row=mysqli_fetch_assoc($results)){?>
<div class="user" onclick="openChat('<?php echo $row["username"] ?>')"><?php echo $row['full_name'] ?><label class="label_user" id="<?php echo $row['username']; ?>"></label></div>
<?php } 
while($row=mysqli_fetch_assoc($results1)){?>
<div class="user" onclick="openChat('<?php echo $row["username"] ?>')"><?php echo $row['full_name'] ?><label  class="label_user" id="<?php echo $row['username']; ?>"></label></div>
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


    <script >

  function openChat(username){
    //$('.msg_box').slideDown('slow');
    $('.chat_iframe').attr('src','chat.php?to='+username);
    $('.user_chating').html(username);
    //$('.msg_box').slideUp('slow');
    $.ajax({
      url: 'check.php',
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
    url: 'check.php',
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
          url: 'check.php',
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
  
  $('.user').click(function(){
    $('.msg_wrap').show();
    $('.msg_box').show();
  });



setInterval(chat, 1000);


});


  
    </script>