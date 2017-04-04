
<?php include_once 'header.php'; ?>
 

<?php include('menu.php') ?>
  <div class="content-wrapper">
    <section class="content">
 

<?php 

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

        		case 'sec':
        		$_GET['pager']='sec';
            	include 'admin_load.php'; 
        		break;

        		case 'ftd':
        		$_GET['pager']='ftd';
            	include 'admin_load.php'; 
            	$f=' active';
        		break;

        		case 'operator':
        		$_GET['pager']='operator';
            	include 'admin_load.php'; 
        		break;

        		case 'op_leads':
        		$_GET['pager']='op_leads';
            	include 'admin_load.php'; 
        		break;
        		case 'meeting':
            	include 'admin_meet_load.php'; 
        		break;
        		case 'list_operator':
            	include 'list_operator_load.php'; 
        		break;
        		
        	default:
        		
        		break;
        }
?>
              

    </section>
  </div>
<?php  include('footer.php') ?>

