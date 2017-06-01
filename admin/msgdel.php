<?php
$name=$_GET['name'];
require ('connect.php');

$sql="DELETE FROM `msg` WHERE u_name='{$name}'";



if ($pdo->exec($sql)) {
    $url='index.php';
    header('Location:'.$url);
}
?>