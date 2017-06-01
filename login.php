<?php
session_start();
// 存储 session 数据
$_SESSION['views']=1;
header('Content-type:text/html;charset=utf-8');
require ('connect.php');

$name=$_POST["username"];
$pwd=$_POST["password"];
$pwd=md5($pwd);
$sql="SELECT * FROM `user` where u_name='{$name}' and pwd='{$pwd}'";


$num=$pdo->query($sql);
$num=$num->rowCount();
//echo $num;
if($num==0){
   
	echo 0;
}else{
	$_SESSION["name"]=$name;
	echo 1;
	

}

?>