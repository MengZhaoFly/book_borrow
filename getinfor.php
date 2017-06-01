<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
header('Content-type:text/html;charset:utf-8');
require('connect.php');
$name=$_SESSION["name"];
if(!isset($name)){
	echo 0;
	exit();
}
$sql="SELECT * FROM `user` where u_name='{$name}' ";

$rs=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
if($rs){
	foreach ($rs as $key => $value) {
		
	}
	echo json_encode($rs);
}else{
	echo 0;
}
?>