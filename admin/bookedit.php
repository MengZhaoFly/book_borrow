<?php
require ('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>书本信息修改</title>
</head>
<body>
    <h3>书本信息修改</h3>
    <?php
    $id=$_GET['id'];

    
    $sql="select * from book where b_id={$id}";
    $rs=$pdo->query($sql);
    $result=$rs->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<script>alert("没找到书本");history.back();</script>';
        exit();
    }
    ?>
    <form action="bookupdate.php" method="post">

        <p>
            <input type="text" name="name"  value="<?=$result['b_name']?>">
        </p>
        <p>
            <input type="text" name="publish" value="<?=$result['publish']?>">
        </p>
        <p>
            <input type="text" name="author"   value="<?=$result['author']?>">
        </p>
        <p>
            <input type="text" name="press"   value="<?=$result['press']?>">
        </p><p>
            <input type="date" name="publish_at"   value="<?=$result['publish_at']?>">
        </p><p>
            <input type="text" name="price"   value="<?=$result['price']?>">
        </p><p>
            <input type="text" name="number"   value="<?=$result['number']?>">
        </p>
        <p>
            <input type="hidden" name="id" value="<?=$result['b_id']?>">
          
            <button type="submit">修改</button>
        </p>
    </form>
</body>
</html>