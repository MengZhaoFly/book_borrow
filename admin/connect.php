<?php
header('content-type:text/html;charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "zmzm@1314";
 
try {
    $pdo = new PDO("mysql:host=$servername;dbname=library", $username, $password);
	$pdo->query('set names utf-8');
	$pdo->exec('set names utf8');
	
    
}
catch(PDOException $e)
{
    echo $e->getMessage();
	exit();
}
?>