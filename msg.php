<?php
session_start();
$name=$_SESSION["name"];
header('content-type:text/html;charset=utf-8');
require('connect.php');
require('islogin.php');
//$name=$_POST["name"];
$pdo->exec('set names utf8');
$pdo->query('set names utf8');
$msg=$_POST["msg"];

$sql = "INSERT INTO `msg`(`u_name`, `msg`) VALUES ('{$name}','{$msg}')";
if($pdo->exec($sql)){
    echo 1;
}else{
	echo 0;
}

?>