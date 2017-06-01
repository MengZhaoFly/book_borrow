<?php
session_start();
$name = $_SESSION["name"];
$bid = $_POST["id"];
$begin = $_POST["begin"];
$end = $_POST["end"];
require ('connect.php');
require ('islogin.php');
$is_exist = "SELECT * FROM `list` WHERE uname='{$name}' and b_id=$bid";
$num = $pdo -> query($is_exist) -> rowCount();

if ($num == 1) {
	echo 3;
	exit();
}
if ($num == 0) {
	$sql = "INSERT INTO `list`(`uname`, `b_id`, `begin`, `end`) VALUES ('{$name}',{$bid},'{$begin}','{$end}')";
	if ($pdo -> exec($sql)) {
		$pdo -> exec("UPDATE book SET number =number-1 WHERE b_id=$bid");
		$pdo -> exec("UPDATE list SET rest =datediff(end ,begin)");
		echo 1;
	} else {
		echo 0;
	}

}
?>