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
$id=$_POST['id'];


$sql="UPDATE `book` SET `b_name`='$name',`publish`='$publish',`author`='$author',`press`='$press',`publish_at`='$publish_at',`price`='$price',`number`=$number WHERE b_id=$id";

$pdo->exec($sql);
header('Location:index.php');
?>