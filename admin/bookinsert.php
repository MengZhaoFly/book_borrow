<?php
require ('connect.php');
 
header('Content-type:text/html;charset=utf-8');
$name=$_POST['name'];
$publish=$_POST['publish'];
$author=$_POST['author'];
$press=$_POST['press'];
$publish_at=$_POST['publish_at'];
$price=$_POST['price'];
$number=$_POST['number'];

	$pdo->query('set names utf-8');
	$pdo->exec('set names utf8');
$sql="insert into book(b_name,publish,author,press,publish_at,price,number) 
values('{$name}','{$publish}','{$author}','{$press}','{$publish_at}',{$price},{$number})";

if($pdo->exec($sql)){

header('Location:index.php');	
}else{
	echo "错误，请重试";
}

?>