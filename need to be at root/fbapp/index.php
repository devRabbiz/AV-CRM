<?php
// function to verify session status
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
// verifying POST data and adding the values to session variables
if(isset($_POST["code"])){
  session_start();
  $_SESSION["code"] = $_POST["code"];
  $_SESSION["csrf_nonce"] = $_POST["csrf_nonce"];
  $ch = curl_init();
  // Set url elements
  $fb_app_id = '1574191325985260';
  $ak_secret = '953589bcacac31d49bdf45a16ad761e6';
  $token = 'AA|'.$fb_app_id.'|'.$ak_secret;
  // Get access token
  $url = 'https://graph.accountkit.com/v1.0/access_token?grant_type=authorization_code&code='.$_POST["code"].'&access_token='.$token;
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,$url);
  $result=curl_exec($ch);
  $info = json_decode($result);
  // Get account information
  $url = 'https://graph.accountkit.com/v1.0/me/?access_token='.$info->access_token;
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,$url);
  $result=curl_exec($ch);
  curl_close($ch);
  $final = json_decode($result);  
}
?>
<html>
<head>
  <title>Login with Account Kit</title>
  <link rel="shortcut icon" href="ak-icon.png">
  <style type="text/css">
    body{
  font-family: helvetica;
}
.ac{
  text-align: center;
}
.buttons{
  max-width: 300px;
  margin: auto;
}
.buttons button{
  width: 100%;
  border-style: none;
  background-color: #4E86FF;
  color: #FFF;
  padding: 10px;
  margin: 5px 0;
}
  </style>
  <!--Hotlinked Account Kit SDK-->
  <script src="https://sdk.accountkit.com/it_IT/sdk.js"></script>
</head>
<body>
<?php
// verifying if the session exists
if(is_session_started() === FALSE && !isset($_SESSION)){
?>
<h1 class="ac">Login with Account Kit</h1>
<p class="ac">This example shows you how to implement<br>Facebook Account Kit for web using PHP.</p>
<div class="buttons">
  <button onclick="phone_btn_onclick();">Login with SMS</button>
  <button onclick="email_btn_onclick();">Login with Email</button>
</div>
<form action="" method="POST" id="my_form">
  <input type="hidden" name="code" id="code">
  <input type="hidden" name="csrf_nonce" id="csrf_nonce">
</form>
<?php
}else{ 
?>
<h1 class="ac">Login with Account Kit</h1>
<p class="ac">The session with Facebook Account Kit is already started.</p>
<h3 class="ac">Your Information</h3>
<p class="ac">

  <?php 
  ////////////////////////////////////////////////////////////////
require_once '../db_connect.php';

$id    = $final->id;

if(isset($final->email)){

$email = $final->email->address;

  $check=mysqli_query($con,"SELECT * FROM akit_reg where id='".$id."'");
  if (mysqli_num_rows($check) < 1) {


    $query="INSERT INTO akit_reg (`id`,`email`) VALUES ('".$id."','".$email."')";
  $in=mysqli_query($con,$query);

  if ($in) {
    echo "success";
  } else {
    print_r($con);
  }

    
  } else {
    echo "exist";
  }


} else {

$prefix= $final->phone->country_prefix;
$phone = $final->phone->national_number;
  
    $check=mysqli_query($con,"SELECT * FROM akit_reg where id='".$id."'");
  if (mysqli_num_rows($check) < 1) {


    $query="INSERT INTO akit_reg (`id`,`phone`,`prefix`) VALUES ('".$id."','".$email."','".$prefix."')";
  $in=mysqli_query($con,$query);

  if ($in) {
   // echo "success";
  } else {
   // print_r($con);
  }

    
  } else {
   // echo "exist";
  }
     
}



  //check if exist
 



////////////////////////////////////////////////////////////////////////
?>

<script type="text/javascript">
  window.location.href="app.php?token="+<?=$final->id?>+"7c96b93ef245f5b201f1fdef8fc1566"
</script>
  <strong>ID:</strong>  <br>
  <?php
  if(isset($final->email)){
  ?>
  <strong>Email:</strong> <?=$final->email->address?>
  <?php
  }else{
  ?>
  <strong>Country Code:</strong> +<?=$final->phone->country_prefix?> <br>
  <strong>Phone Number:</strong> <?=$final->phone->national_number?> 
  <?php
  }
  ?>  
</p>
<div class="buttons">
  <button onclick="logout();">Logout</button>
</div>
<?php
}
?>
</body>
<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:1574191325985260,         
        state:"adalenvladi", 
        version:"v1.1",
        debug: true
      }
      //If your Account Kit configuration requires app_secret, you have to include ir above
    );
  };
  // login callback
  function loginCallback(response) {
    console.log(response);
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      document.getElementById("code").value = response.code;
      document.getElementById("csrf_nonce").value = response.state;
      document.getElementById("my_form").submit();
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      console.log("Authentication failure");
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
      console.log("Bad parameters");
    }
  }
  // phone form submission handler
  function phone_btn_onclick() {
    // you can add countryCode and phoneNumber to set values
    AccountKit.login('PHONE', {countryCode:'+39'}, // will use default values if this is not specified
      loginCallback);
  }
  // email form submission handler
  function email_btn_onclick() {  
    // you can add emailAddress to set value
    AccountKit.login('EMAIL', {}, loginCallback);
  }
  // destroying session
  function logout() {
        document.location = 'logout.php';
  }
</script>
</html>