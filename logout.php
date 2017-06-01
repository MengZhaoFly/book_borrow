<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
header('ontent-type:text/html;charset=utf-8');
require ('connect.php');
$name = $_SESSION["name"];

if (!isset($name)) {
	header('Location:index.php');
	exit();
	
} else {
	session_destroy();
	header('Location:index.php');

}
?>