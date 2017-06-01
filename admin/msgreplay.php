<?php
require ('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>回复留言</title>
</head>
<body>
    <h3>回复</h3>
    <?php
    $name=$_GET['name'];

    
    $sql="select * from msg where u_name='{$name}'";
    $rs=$pdo->query($sql);

    $result=$rs->fetchAll(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<script>alert("没找到留言");history.back();</script>';
        exit();
    }
    ?>
    <form action="msginsert.php" method="post">

        <p>
            <input type="text" name="name"  value="<?=$name?>">
        </p>
        <p>
            <input type="date" name="date" value="">
        </p>
        <p>
            <input type="text" name="msg"   value="">
        </p>
        
        <p>
            <!--<input type="hidden" name="id" value="<?=$result['name']?>">-->
          
            <button type="submit">回复</button>
        </p>
    </form>
</body>
</html>