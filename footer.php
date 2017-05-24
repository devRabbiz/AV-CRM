
<footer class="main-footer">

    <div class="pull-right hidden-xs">
     

    </div>
    

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700">





    <strong>Copyright &copy; 2017 <a href="#">Adalen VLADI</a>.</strong> All rights
    reserved.

  <div id="live-chat">
    
    <header class="clearfix">
      
      <a href="#" class="chat-close">x</a>

      <h4>Chat</h4>

      <span class="chat-message-counter">New</span>

    </header>

    <div class="chat">
      
      <div class="chat-history">
     <iframe   style="width:100%!important;height: 100% !important;" frameborder='0' src="chat/chat.php"></iframe>

    </div> <!-- end chat -->

  </div> <!-- end live-chat -->

  </footer>

</div>


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
<style type="text/css">
  
fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}

h4, h5 {
  line-height: 1.5em;
  margin: 0;
}

hr {
  background: #e9e9e9;
    border: 0;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 1px;
    margin: 0;
    min-height: 1px;
}

img {
    border: 0;
    display: block;
    height: auto;
    max-width: 100%;
}

input {
  border: 0;
  color: inherit;
    font-family: inherit;
    font-size: 100%;
    line-height: normal;
    margin: 0;
}

p { margin: 0; }

.clearfix { *zoom: 1; } /* For IE 6/7 */
.clearfix:before, .clearfix:after {
    content: "";
    display: table;
}
.clearfix:after { clear: both; }

/* ---------- LIVE-CHAT ---------- */

#live-chat {
  bottom: 0;
  font-size: 12px;
  right: 0px;
  position: fixed;
  width: 300px;
}

#live-chat header {
  background: #293239;
  border-radius: 5px 5px 0 0;
  color: #fff;
  cursor: pointer;
  padding: 16px 24px;
}

#live-chat h4:before {
  background: #1a8a34;
  border-radius: 50%;
  content: "";
  display: inline-block;
  height: 8px;
  margin: 0 8px 0 0;
  width: 8px;
}

#live-chat h4 {
  font-size: 12px;
}

#live-chat h5 {
  font-size: 10px;
}

#live-chat form {
  padding: 24px;
}

#live-chat input[type="text"] {
  border: 1px solid #ccc;
  border-radius: 3px;
  padding: 8px;
  outline: none;
  width: 234px;
}

.chat-message-counter {
  background: #e62727;
  border: 1px solid #fff;
  border-radius: 50%;
  display: none;
  font-size: 12px;
  font-weight: bold;
  height: 28px;
  left: 0;
  line-height: 28px;
  margin: -15px 0 0 -15px;
  position: absolute;
  text-align: center;
  top: 0;
  width: 28px;
}

.chat-close {
  background: #1b2126;
  border-radius: 50%;
  color: #fff;
  display: block;
  float: right;
  font-size: 10px;
  height: 16px;
  line-height: 16px;
  margin: 2px 0 0 0;
  text-align: center;
  width: 16px;
}

.chat {
  background: #fff;
  padding: 0 !important;
}

.chat-history {
  height:500px;
  
}

.chat-message {
  margin: 16px 0;
}

.chat-message img {
  border-radius: 50%;
  float: left;
}

.chat-message-content {
  margin-left: 56px;
}

.chat-time {
  float: right;
  font-size: 10px;
}

.chat-feedback {
  font-style: italic; 
  margin: 0 0 0 80px;
}
</style>
<script type="text/javascript">
  (function() {
$('.chat').slideToggle(0, 'swing');
    $('.chat-message-counter').fadeToggle(0, 'swing');
  $('#live-chat header').on('click', function() {

    $('.chat').slideToggle(300, 'swing');
    $('.chat-message-counter').fadeToggle(300, 'swing');

  });

  $('.chat-close').on('click', function(e) {

    e.preventDefault();
    $('#live-chat').fadeOut(300);

  });

}) ();
</script>
</body>
</html>