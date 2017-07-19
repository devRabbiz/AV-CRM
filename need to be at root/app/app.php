<?php
require_once('../db_connect.php');

 if (isset($_GET['token'])) {
  $fbid=substr_replace($_GET['token'],"",-31 );
    $get=mysqli_query($con,"SELECT * FROM fb_reg WHERE fbid='".$fbid."' LIMIT 1");
    
     while ($row = mysqli_fetch_assoc($get)) {
    echo $row['fbid'];
     echo $row['fbname'];

?>
<div class="wrapper">
    <div class="container">
        <header>
            <h1>Settings</h1>
        </header>
        <section>
            <div class="form">
                <div class="input-item">
                    <div class="label-part">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="name" value="<?php echo $row['fbname'] ?>" placeholder="<?php echo $row['fbname'] ?>" onfocus="this.value = this.value;" />
                    </div>
                    </div>
                <div class="input-item">
                    <div class="label-part">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" id="email" value="<?php echo $row['fbemail'] ?>"  placeholder="<?php echo $row['fbemail'] ?>" />
                    </div>
                </div>
                <div class="input-item">
                    <div class="label-part">
                        <label for="username">Phone Number</label>
                    </div>
                    <div class="input-part">
                        <input type="text" autocomplete="off" value="<?php echo $row['phone'] ?>" id="username" placeholder="<?php echo $row['phone'] ?>" />
                    </div>
                </div>
          
              
            </div>
            <div class="change-image">
                <div class="profile-img-container">
                    <a href="javascript:;">Add image</a>
                    <img src="https://graph.facebook.com/v2.5/<?php echo $row['fbid'] ?>/picture?type=large" class="profile" alt="" />
                </div>
                
            </div>
        </section>
        <footer>
            <a href="javascript:;" class="cancel"><span>&larr;</span> Cancel</a>
        <a href="javascript:;" class="save">Save <span>&rarr;</span></a>
        </footer>
    </div>
</div>





<?php 
}

} else { echo "no token"; } ?>

<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);
* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.hide {
  display: none;
}

body {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
  background-color: #cfd8dc;
  font-family: "Open Sans", sans-serif;
  font-weight: 600;
}

.wrapper {
  margin: 50px auto 50px;
  width: 680px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  overflow: hidden;
  background-image: url("https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d");
  background-size: cover;
  background-repeat: none;
}
.wrapper:after {
  content: "";
  display: table;
  clear: both;

  content: "";
  background: url(https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d);
  opacity: 0.5;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   

}
.wrapper .container {
  width: 100%;
  float: left;
  position: static;
  clear: both;
}

header {
  padding: 42px 49px 0;
}
header h1 {
  font-weight: 400;
  color: #fff;
  font-size: 24px;
  letter-spacing: -1px;
}

section {
  margin-top: 36px;
}
section .form, section .change-image {
  float: left;
}
section .form {
  width: 430px;
}
section .form .input-item {
  width: 100%;
  float: left;
  margin-bottom: 6px;
}
section .form .input-item .label-part {
  width: 170px;
  float: left;
  padding-left: 50px;
  height: 48px;
  line-height: 48px;
}
section .form .input-item .label-part label, section .form .input-item .label-part span {
  color: white;
  font-size: 14px;
  cursor: default;
  letter-spacing: -1px;
}
section .form .input-item .input-part {
  float: left;
  display: block;
}
section .form .input-item .input-part input:not([type='radio']) {
  width: 260px;
  height: 48px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  border: 0;
  float: left;
  padding: 0 15px;
  background-color:rgba(32, 30, 31, 0.60);
  font-size: 14px;
  font-family: "Open Sans", sans-serif;
  color: #fff;
  font-weight: 600;
}
section .form .input-item .input-part input:not([type='radio'])::-webkit-input-placeholder {
  font-family: "Open Sans", sans-serif;
  color: #756d70;
  font-size: 14px;
  letter-spacing: -1px;
}
section .form .input-item .input-part input:not([type='radio']):-moz-placeholder {
  font-family: "Open Sans", sans-serif;
  color: #756d70;
  font-size: 14px;
  letter-spacing: -1px;
}
section .form .input-item .input-part input:not([type='radio'])::-moz-placeholder {
  font-family: "Open Sans", sans-serif;
  color: #756d70;
  font-size: 14px;
  letter-spacing: -1px;
}
section .form .input-item .input-part input:not([type='radio']):-ms-input-placeholder {
  font-family: "Open Sans", sans-serif;
  color: #756d70;
  font-size: 14px;
  letter-spacing: -1px;
}
section .form .input-item .input-part input:not([type='radio']):focus {
  outline: none;
  border: 1px solid #b7ad88;
  padding-left: 14px;
}
section .form .input-item .input-part span {
  display: block;
  font-size: 12px;
  color: #b7ad88;
  margin-top: 10px;
}
section .form .input-item.password {
  margin-bottom: 26px;
}
section .form .input-item.password input {
  margin-bottom: 9px;
}
section .form .input-item.newsletter .label-part {
  line-height: inherit;
}
section .form .input-item.newsletter .input-part > div {
  width: 100%;
  margin-bottom: 11px;
}
section .form .input-item.newsletter .input-part > div label {
  color: #fff;
  font-size: 13px;
  display: inline;
}
section .form .input-item.newsletter .radial-choose {
  width: 18px;
  height: 18px;
  margin: 0;
  padding: 0;
  float: left;
  cursor: pointer;
  vertical-align: middle;
  border: none;
  *display: inline;
  margin-top: 3px;
}
section .form .input-item.newsletter .radial-choose:before {
  background: transparent;
  border: 1px solid #b7ad88;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  content: '';
  float: left;
  width: 10px;
  height: 10px;
  display: inline-block;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
section .form .input-item.newsletter .radial-choose.hover:before, section .form .input-item.newsletter .radial-choose.checked:before {
  background-color: #b7ad88;
}
section .change-image {
  padding: 0 50px;
}
section .change-image .profile-img-container {
  width: 150px;
  height: 150px;
  text-align: center;
  position: relative;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
section .change-image .profile-img-container.active {
  border: 1px solid #b7ad88;
}
section .change-image .profile-img-container a {
  display: block;
  height: 150px;
  color: #fff;
  font-size: 12px;
  font-weight: 400;
  width: 150px;
  line-height: 150px;
  position: relative;
  top: 50%;
  text-decoration: none;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -moz-transform: translate(0, -50%);
  -ms-transform: translate(0, -50%);
  -webkit-transform: translate(0, -50%);
  transform: translate(0, -50%);
}
section .change-image .profile-img-container a:hover {
  text-decoration: underline;
}
section .change-image img.profile {
  position: absolute;
  left: 0;
  top: 0;
  width: 150px;
  height: auto;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}
section .change-image img.profile.angle-1 {
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}
section .change-image img.profile.angle-2 {
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}
section .change-image img.profile.angle-3 {
  -moz-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  -webkit-transform: rotate(270deg);
  transform: rotate(270deg);
}
section .change-image .edit {
  width: 100%;
  text-align: center;
  margin-top: 28px;
}
section .change-image .edit img {
  display: inline-block;
}
section .change-image .edit .remove {
  margin-right: 20px;
}

footer {
  width: 100%;
  float: left;
  border-top: 1px solid #3b3739;
  background-color: rgba(32, 30, 31, 0.76);
  padding: 23px 51px;
  margin-top: 31px;
}
footer a {
  display: inline-block;
  color: #fff;
  text-transform: uppercase;
  text-decoration: none;
  font-size: 12px;
}
footer a span {
  color: #b7ad88;
}
footer a.save {
  float: right;
}
footer a.save span {
  margin-left: 9px;
}
footer a.cancel {
  float: left;
}
footer a.cancel span {
  margin-right: 9px;
}
footer a:hover {
  color: #b7ad88;
}

</style>