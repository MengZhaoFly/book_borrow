<?php

header('content-type:text/html;charset=utf-8');
require('connect.php');
$name=$_POST["username"];
$pwd=$_POST["pwd"];
$pwd=md5($pwd);
$email=$_POST["email"];
$sex=$_POST["sex"];

$sql = "INSERT INTO user (u_name, pwd, email,sex)
VALUES ('$name', '$pwd', '$email','$sex')";

if($pdo->exec($sql)){
	 echo 1;

}else{
	echo 0;
}

   
?>