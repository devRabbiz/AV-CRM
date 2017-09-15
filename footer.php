
<footer class="main-footer">

    <div class="pull-right hidden-xs">
     

    </div>
    

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700">





   <div class="col-md-4" style="width: auto !important"> <strong>Copyright &copy; 2017 <a href="#">Adalen VLADI</a>.</strong> All rights
    reserved.
    </div>
    <?php if (isset($_SESSION['login_username'])): ?>
      <div class="col-md-8">
          <iframe class="_cfd_content_features_b_" style="width: 99.9%;position: absolute;" src="https://www.lockwoodinv.com/trade.php/trader/widgets/flux" width="100%" height="25px;" frameborder="0" marginheight="20" scrolling="no" __idm_frm__="516" __idm_id__="1039523841"></iframe>
        </div>
    <?php endif ?>


  
<!-- 
  <div id="live-chat">
    
    <header class="clearfix">
      
      <a href="#" class="chat-close">x</a>

      <h5>Phone</h5>

     

    </header>

    <div class="chat">
      
     <iframe style="height: 450px;" name='wphone' id="wphone" src="web.phone/softphone_operator.html"></iframe>
     

    </div> 

  </div> end live-chat -->
  <style type="text/css">
    @charset "utf-8";
/* CSS Document */



/* ---------- LIVE-CHAT ---------- */

#live-chat {
  bottom: 0;
  font-size: 12px;
  right: 24px;
  position: fixed;
  
}

#live-chat header {
  background: #293239;
  border-radius: 5px 5px 0 0;
  color: #fff;
  cursor: pointer;
  padding: 8px 12px;
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
  padding: 0px !important;
}

.chat-history {
  height: 252px;
  padding: 8px 24px;
  overflow-y: scroll;
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

  <?php if (!isset($_GET['login'])) { ?>
    
  <script type="text/javascript">
    (function() {
    
    $('.chat').css('height','0px')
  $('#live-chat header').on('click', function() {

    $('.chat').animate({
        height: ($('.chat').height() == 450) ? 0 : 450
    }, 500);


  });

  $('.chat-close').on('click', function(e) {

    e.preventDefault();
    $('#live-chat').fadeOut(300);

  });

}) ();
  </script>
  <?php } else { ?>

<script type="text/javascript">
    (function() {
    
    
  $('#live-chat header').on('click', function() {
    
     $('.chat').animate({
        height: ($('.chat').height() == 450) ? 0 : 450
    }, 500);

  });

  $('.chat-close').on('click', function(e) {

    e.preventDefault();
    $('#live-chat').fadeOut(300);

  });

}) ();
  </script>

<?php } ?>

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

</body>

</html>