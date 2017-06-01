<?php
$name=$_GET['name'];
$id=$_GET['id'];
require ('connect.php');

$sql="DELETE FROM `list` WHERE b_id={$id} and uname='{$name}'";
//echo $sql;
//exit();

if ($pdo->exec($sql)) {
    $url='index.php';
	$update="UPDATE book SET number =number+1 WHERE b_id={$id}";
//	echo $update;
//	exit();
	$pdo->exec($update);
    header('Location:'.$url);
}else{
	echo 'error';
}
?>