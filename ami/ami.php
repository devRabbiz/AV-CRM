<?php
//// asterisk manager api
require_once('../db_connect.php');
require_once ('../session.php');


$r=mysqli_query($dbconfig,'SELECT * FROM vicidial_users WHERE custom_one ="'.$_SESSION['operator_username'].'" ');
while($row=mysqli_fetch_assoc($r)){
	$from_ext= $row['phone_login'];

}	

$to_ext = base64_decode(base64_decode($_REQUEST['to']));
$username='ami';
$secret='test';
$asterisk_ip=$_REQUEST['asterisk_ip'];

$timeout = 10;
$asterisk_ip = "127.0.0.1";

$socket = fsockopen($asterisk_ip,"5038", $errno, $errstr, $timeout);
fputs($socket, "Action: Login\r\n");
fputs($socket, "UserName: $username\r\n");
fputs($socket, "Secret: $secret\r\n\r\n");

$log=fgets($socket,128);

//echo $log;


fputs($socket, "Action: Originate\r\n" );
fputs($socket, "Channel: SIP/$from_ext\r\n" );
fputs($socket, "Exten: $to_ext\r\n" );
fputs($socket, "Context: default\r\n" ); 
fputs($socket, "Priority: 1\r\n" );
fputs($socket, "Callerid: $from_ext\r\n ");
fputs($socket, "Async: yes\r\n\r\n" );

$log=fgets($socket,128);
echo $log;

//echo $to_ext;


//$a=implode(unpack("H*", $to_ext));
//$a= base64_encode($a);


//echo $a."\n";
//$b=base64_decode($a);
//$b=pack("H*", $b);

//echo $b
?>