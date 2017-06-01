<?php
require ('connect.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>神圣的管理页面</title>
		<style>table {
	width: 60%;
	border-collapse: collapse;
}

table,
th,
td {
	border: 1px solid #aaa;
}
table tr td{
	height: 20px;
}
table tr td input{
	height: 20px;
}
</style>
	</head>
	<body>

		<?php

		$sql = "select * from book";
		$pdo -> exec('set names utf8');
		?>
		<table style="font-size:12px;height:20px;line-height:25px;overflow:hidden;">
			<caption style="color: red;font-size: 30px;">
				书本列表
			</caption>
			<thead>
				<tr>
					<th>编号</th>
					<th>书名</th>
					<th>出版书号</th>
					<th>作者</th>
					<th>出版社</th>
					<th>出版日期</th>
					<th>单价</th>
					<th>库存</th>
					<th>操作</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pdo->query($sql) as $value) {?>
				<tr style="height: 30px;">
					<td><?=$value['b_id'] ?></td>
					<td><?=$value['b_name'] ?></td>
					<td><?=$value['publish'] ?></td>
					<td><?=$value['author'] ?></td>
					<td><?=$value['press'] ?></td>
					<td><?=$value['publish_at'] ?></td>

					<td><?=$value['price'] ?></td>
					<td><?=$value['number'] ?></td>
					<td><a href="bookedit.php?id=<?=$value['b_id'] ?>">修改</a> <a href="bookdel.php?id=<?=$value['b_id'] ?>" onclick="return del_comfirm();">删除</a></td>
				</tr>
				<?php } ?>
				<tr>
						<form action="bookinsert.php" method="post">
				<td> 请输入 </td>
				<td>
					<input type="text" name="name"  >
				</td>
				<td>
					<input type="text" name="publish" >
				</td>
				<td>
					<input type="text" name="author"   >
				</td>
				<td>
					<input type="text" name="press"   >
				</td>
				<td>
					<input type="date" name="publish_at"   >
				</td>
				<td>
					<input type="text" name="price"   >
				</td>
				<td>
					<input type="text" name="number"   >
				</td>
				<td>
					<button type="submit">
					添加
					</button>
				</td>
			</form>
					
					
				</tr>
			</tbody>

		

		</table>
		<?php

		$sql = "select * from user";
		$pdo -> exec('set names utf8');
		?>
		<table style="font-size:12px;height:20px;line-height:25px;overflow:hidden;">
			<caption style="color: red;font-size: 30px;">
				用户列表
			</caption>
			<thead>
				<tr>
					<th>用户名</th>
					<th>密码</th>
					<th>邮箱</th>
					<th>性别</th>
					<th>操作</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pdo->query($sql) as $value) {?>
				<tr style="height: 30px;">
					<td><?=$value['u_name'] ?></td>
					<td><?=$value['pwd'] ?></td>
					<td><?=$value['email'] ?></td>
					<td><?=$value['sex'] ?></td>

					<td><a href="bookdel.php?id=<?=$value['b_id'] ?>" onclick="return del_comfirm();"></a></td>
				</tr>
				<?php } ?>
				
			</tbody>

		

		</table>
		<?php

		$sql = "select * from list";
		$pdo -> exec('set names utf8');
		?>
		<table style="font-size:12px;height:20px;line-height:25px;overflow:hidden;">
			<caption  style="color: red;font-size: 30px;">
				借阅列表
			</caption>
			<thead>
				<tr>
					<th>用户名</th>
					<th>书本编号</th>
					<th>开始日期</th>
					<th>归还日期</th>
					<th>剩余日期</th>
					<th>操作</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pdo->query($sql) as $value) {?>
				<tr style="height: 30px;">
					<td><?=$value['uname'] ?></td>
					<td><?=$value['b_id'] ?></td>
					<td><?=$value['begin'] ?></td>
					<td><?=$value['end'] ?></td>
					<td><?=$value['rest'] ?></td>
					<td><a href="listdel.php?id=<?=$value['b_id'] ?>&&name=<?=$value['uname'] ?>" onclick="return del_comfirm();">删除</a></td>
				</tr>
				<?php } ?>
				
			</tbody>

		

		</table>
		<?php

		$sql = "select * from msg";
		$pdo -> exec('set names utf8');
		?>
		<table style="font-size:12px;height:20px;line-height:25px;overflow:hidden;">
			<caption style="color: red;font-size: 30px;">
				留言列表
			</caption>
			<thead>
				<tr>
					<th>用户名</th>
					<th>留言内容</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pdo->query($sql) as $value) {?>
				<tr style="height: 30px;">
					<td><?=$value['u_name'] ?></td>
					<td><?=$value['msg'] ?></td>


					<td><a href="msgdel.php?name=<?=$value['u_name'] ?>" onclick="return del_comfirm();">删除</a>
						<a href="msgreplay.php?name=<?=$value['u_name'] ?>" >回复</a>
					</td>
				</tr>
				<?php } ?>
				
			</tbody>

		

		</table>
		<script>function del_comfirm() {
	if(confirm('是否确认删除？')) {
		return true;
	} else {
		return false;
	}
}</script>
	</body>
</html>