<?php
header('Content-type:text/html;charset=utf-8');
$name=$_POST["username"];
$select="SELECT * FROM `user` WHERE u_name='{$name}'";
//echo $select;
$num=$pdo->query($select);
$num=$num->rowCount();
//echo $num;
if($num==0){
   
	echo 1;
}else{
	echo 0;

}

?>