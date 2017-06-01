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
		$Jrs[$key]=array("b_id"=>$value['b_id'],
						 "b_name"=>$value["b_name"],
						 "publish"=>$value["publish"],
						 "author"=>$value["author"],
						 "press"=>$value["press"],
						 "publish_at"=>$value["publish_at"],
						 "price"=>$value["price"],
						 "number"=>$value["number"],
						);
		
	}
echo json_encode($Jrs);

	

}else{
	echo "null book";
}
?>