<?php
$id=$_GET['id'];
require ('connect.php');

$sql="DELETE FROM `book` WHERE b_id={$id}";
$is_borrow="SELECT * FROM `list`  WHERE b_id={$id}";
if($pdo->query($is_borrow)->fetchAll(PDO::FETCH_ASSOC)){
	echo '书本已经借出 且未归还 不能删除';
	exit();
}

if ($pdo->exec($sql)) {
    $url='index.php';

	
    header('Location:'.$url);
}
?>