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
            case 'no_number':
            $_GET['pager']='no_number';
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
            case 'filtered':
            $_GET['pager']='filtered';
              include 'admin_load.php'; 
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


              case 'lists':
            $_GET['pager']='lists';
              include 'lists.php'; 
            break;
              case 'view_list':
            $_GET['pager']='view_list';
              include 'admin_load.php'; 
            break;
            case 'view_operator':
            $_GET['admin_load.php'];
              include 'admin_load.php'; 
              break;
            
          default:
            
            break;
        }



      }


  else{ 

    echo "<script>location.href='login_admin.php';</script>";
  }
    
?>
              
 
    </section>

    <?php  
   include_once('menu.php') ;
    ?>
    
  </div>

<?php  include_once('footer.php') 

?>
