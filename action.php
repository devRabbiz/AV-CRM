<?php include 'db_connect.php';
include 'session.php';




if (isset($_GET['verify'])) {
if ($_GET['verify']==='all') {
if (isset($_SESSION['login_username'])) {
 $sql="UPDATE user SET checked_by_admin='0' WHERE checked_by_admin='1'";

if (mysqli_query($con, $sql)) {
    echo "done";
} else {
    echo "Error 1.1 " . mysqli_error($conn);
		}
    }
}
}
header('Location: admin.php');
?>






