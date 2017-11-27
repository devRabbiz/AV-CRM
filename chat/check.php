<?php

//require_once 'db_connect.php';
require_once '../session.php';
//include_once 'functions.php';
if (isset($_SESSION['login_username'])){
  $session=$_SESSION['login_username'];
} elseif (isset($_SESSION['operator_username'])) {
  $session=$_SESSION['operator_username'];
}
 $conm=mysqli_connect("127.0.0.1","root","","chat") or die('asd');

    switch ($_POST['action']) {
    	case 'check':

				
				$check=mysqli_query($conm,"SELECT * FROM messages WHERE (to_username='".$session."' OR to_username='*') AND `read` = 1  AND username!='".$session."'") or die(mysqli_error($conm));
				$output=array();
				while ($row=$check->fetch_assoc()) {
					array_push($output,$row);

				}
				       header('Content-type: application/json');
				       echo json_encode($output); //echo data json 
    		break;
    		case 'beep':
        		$beep=mysqli_query($conm,"UPDATE  messages SET beep=0 WHERE id='".$_POST['id']."' ");
        		$data = array('beep' => $_POST['id']);
    			echo json_encode($data);
    			break;
    		case 'read':
    			$read=mysqli_query($conm,"UPDATE messages SET `read`=0 WHERE username='".$_POST['username']."' AND (to_username='".$session."' OR to_username='*')  ");
				$data = array('success' => $_POST['username']);
    			echo json_encode($data);
    			break;
    	default:
    		# code...
    		break;
    }
?>
