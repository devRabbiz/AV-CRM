<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php

if (!file_exists('db_connect.php')) {
	
	header('Location: install.php');
	}
	

?>

<a href="admin.php">Admin</a>
<a href="operator.php">Operator</a>
</body>
</html>