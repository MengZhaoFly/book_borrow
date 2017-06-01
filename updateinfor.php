<?php
session_start();
$oldname=$_SESSION["name"];
header('content-type:text/html;charset=utf-8');
require('connect.php');
//$name=$_POST["name"];
$pwd=$_POST["pwd"];
$pwd=md5($pwd);
$email=$_POST["email"];
$sex=$_POST["sex"];
$sql = "UPDATE user SET pwd='$pwd',email='$email',sex=$sex WHERE u_name='$oldname'";
if($pdo->exec($sql)){
	session_destroy();
    echo 1;
//require("logout.php");
	
}else{
	echo 0;
}

?>