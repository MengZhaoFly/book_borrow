<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
header('Content-type:text/html;charset=utf-8');
require ('connect.php');
require('islogin.php');
$name=$_SESSION["name"];
$sql="SELECT * FROM `list` where uname='{$name}' ";
$pdo->exec('set names utf8');
$pdo->query('set names utf8');
$rs=$pdo->query($sql);
$result=$rs->fetchAll(PDO::FETCH_ASSOC);
//存入结果 书名 借阅日期 
$Jrs=array();
if($result){
	foreach($result as $key => $value){
		//存入每本书的来时时间和结束时间
		$Jrs[$key.'time']=array("begin"=>$value['begin'],
							"end"=>$value['end'],
							"id"=>$value[b_id],
							"totime"=>$value[rest],
							);

		//存入记录的条数
		$Jrs[no]=$key;
		$bname='no'.$key.'name';
		$getname="SELECT * FROM `book` where b_id=$value[b_id]";
		$name=$pdo->query($getname)->fetchAll(PDO::FETCH_ASSOC);
		foreach($name as $key => $value){
		//存入每次得到的书名
		$Jrs[$bname]=$value['b_name'];

		}
	}
	echo json_encode($Jrs);
}else{
	echo 0;
}

?>