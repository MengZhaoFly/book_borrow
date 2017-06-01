<?php
require ('connect.php');
 
header('Content-type:text/html;charset=utf-8');
$name=$_POST['name'];
$date=$_POST['date'];
$msg=$_POST['msg'];



$sql="INSERT INTO `adminreplay`(`name`, `date`, `msg`) VALUES ('{$name}','{$date}','$msg')";

if($pdo->exec($sql)){
	echo 'replay success';
//header('Location:index.php');
}else{
	echo 'replay failed';
}

?>