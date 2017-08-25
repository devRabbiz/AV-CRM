<?php 


include_once 'header.php'; ?>
 


  <div class="content-wrapper">
    <section class="content">
 

<?php 
if (isset($_SESSION['login_username'])) {
 


if (!isset($_GET['pager'])) { 
                $pager='home';
        } else{
          $pager=$_GET['pager'];
        }


        switch ($pager) {
          case 'home':
            $_GET['pager']='home';
              include 'admin_load.php'; 
            break;

            case 'all':
            $_GET['pager']='all';
              include 'admin_load.php'; 
            break;

            case 'sec':
            $_GET['pager']='sec';
              include 'admin_load.php';   
            break;

            case 'ftd':
            $_GET['pager']='ftd';
              include 'admin_load.php'; 
            break;

            case 'web':
            $_GET['pager']='web';
              include 'admin_load.php'; 
            break; 

            case 'callback':
            $_GET['pager']='callback';
              include 'admin_load.php'; 
            break;

            

            case 'op_leads':
            $_GET['pager']='op_leads';
              include 'admin_load.php'; 
            break;

            case 'meeting':
            $_GET['pager']='meeting';
              include 'admin_meet_load.php'; 
            break;

            case 'operator':
            $_GET['pager']='operator';
              include 'admin_load.php'; 
            break;

            case 'list_operator':
            $_GET['pager']='list_operator';
              include 'list_operator_load.php'; 
            break;

            case 'lists':
            $_GET['pager']='lists';
              include 'lists.php'; 
            break;



            case 'potential':
            $_GET['pager']='potential';
              include 'admin_load.php'; 
            break;

            case 'follow_up':
            $_GET['pager']='follow_up';
              include 'admin_load.php'; 
             
            break;

            case 'interested':
            $_GET['pager']='interested';
              include 'admin_load.php'; 
            break;

            case 'not_interested':
            $_GET['pager']='not_interested';
              include 'admin_load.php'; 
            break;
             case 'no_answer':
            $_GET['pager']='no_answer';
              include 'admin_load.php'; 
            break;

            case 'call_failed':
            $_GET['pager']='call_failed';
              include 'admin_load.php'; 
            break;
               case 'secretary':
            $_GET['pager']='secretary';
              include 'admin_load.php'; 
            break;
              case 'no_status':
            $_GET['pager']='no_status';
              include 'admin_load.php'; 
            break;

            
          default:
            
            break;
        }

      }

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
              
 
    </section>

    <?php  

    include_once('menu.php') ?>
    
  </div>

<?php  include_once('footer.php') 

?>
