<?php
header('Content-type:text/html;charset=utf-8');
require ('connect.php');

$sql='select * from book';

$pdo->exec('set names utf8');
$pdo->query('set names utf8');
$rs=$pdo->query($sql);
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
$Jrs=array();
//var_dump($result);
if($result){
	
	foreach($result as $key => $value){
	
	}


	

}else{
	echo "null book";
}
?>