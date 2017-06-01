<?php
session_start();
error_reporting(E_ALL || ~E_NOTICE);
$name=$_SESSION["name"];
require ('connect.php');
?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8" />
		<title>图书借阅</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/index.css" />
	</head>

	<body>
		<canvas id="backColor"></canvas>
		<div id="allContainer">
			<!--导航-->
			<nav class="navbar navbar-default navbar-fixed-top header" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" id="slideUp" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						
					</button>
						<a href="index.php" class="navbar-brand"><i class="iconfont">&#xe646;</i></a>
					</div>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="nav navbar-nav" id="navBar">
							<li class="active" id="btnBook">
								<div class="arrow-top"></div>
								<a href="#borrowBook"><i class="iconfont">&#xe609;</i>借阅图书</a>
							</li>
							<li id="btnList">
								<div class=""></div>
								<a href="#borrowList"><i class="iconfont">&#xe622;</i>借阅清单</a>
							</li>
							<li id="btnself">
								<div class=""></div>

								<a href="#selfInfor"><i class="iconfont">&#xe67e;</i>个人信息</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#RegLogin" data-toggle="modal"><i class="iconfont">&#xe602;</i>登录/注册</a>
							</li>
							<li>
								<a href="#LeaveMsg" data-toggle="modal"><i class="iconfont">&#xe604;</i>留言</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!--登录注册模态框-->
			<div class="modal fade" id="RegLogin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" id="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close " data-dismiss="modal" aria-hidden="true"><i class="iconfont">&#xe83f;</i></button>

						</div>
						<div class="modal-body">
							<ul id="RegLoginTab" class="nav nav-tabs">

								<li class="active">
									<a href="#login" data-toggle="tab">登录</a>
								</li>
								<li>
									<a href="#register" data-toggle="tab">注册</a>
								</li>
							</ul>
							<div id="RegLoginTabContent" class="tab-content">
								<!--注册-->
								<div id="register" class="tab-pane fade in ">
									<form class="form-horizontal" role="form" method="post" name="regform" action="checkreg.php">
										<div class="form-group">
											<label for="username" class="col-sm-2 control-label">用户名</label>
											<div class="col-sm-7">
												<input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
											</div>
											<div class="col-sm-3">
												<p class="true">(5-10)字母数字或汉字组成</p>
											</div>
										</div>
										<div class="form-group">
											<label for="password" class="col-sm-2 control-label">密码</label>
											<div class="col-sm-7">
												<input type="password" class="form-control" id="password" name="pwd" placeholder="请输入密码">
											</div>
											<div class="col-sm-3">
												<p class="true">(6-15)字母数字组成</p>
											</div>
										</div>
										<div class="form-group">
											<label for="repassword" class="col-sm-2 control-label">确认密码</label>
											<div class="col-sm-7">
												<input type="password" class="form-control" id="repassword" name="repwd" placeholder="请输入密码">
											</div>
											<div class="col-sm-3">
												<p class=" true">两次密码一致</p>
											</div>
										</div>
										<div class="form-group">
											<label for="email" class="col-sm-2 control-label">邮箱</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" id="email" name="email" placeholder="请输入邮箱">
											</div>
										</div>
										<div class="form-group">
											<label for="sex" class="col-sm-2 control-label">性别</label>
											<div class="col-sm-10">

												<label class="checkbox-inline">
													<input type="radio" name="sex" id="boy" value="1" checked> 男
												</label>
												<label class="checkbox-inline">
													<input type="radio" name="sex" id="girl"  value="0"> 女
												</label>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<!--<button type="submit" class="btn btn-primary" id="regbtn">注册</button>-->
												<a href="javascript:;" class="btn btn-primary" id="regbtn">注册</a>
											</div>
										</div>
									</form>
								</div>
								<!--登录-->
								<div id="login" class="tab-pane fade in active">
									<form action="" class="form-horizontal" role="form" name="loginform" action="login.php" method="post">
										<div class="form-group">
											<label for="username" class="col-sm-2 control-label">用户名</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="username" id="" value="" placeholder="请输入用户名" />
											</div>

										</div>
										<div class="form-group">
											<label for="password" class="col-sm-2 control-label">密码</label>
											<div class="col-sm-10">
												<input type="password" class="form-control" name="password" id="" value="" placeholder="请输入密码" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<div class="checkbox">
													<label>
          												<input type="checkbox">请记住我
        											</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-2 col-sm-10">
												<!--<button type="submit" class="btn btn-primary" id="loginbtn">登录</button>-->
												<a href="javascript:;" class="btn btn-primary" id="loginbtn">登录</a>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>

			<!--留言模态框-->
			<div class="modal fade" id="LeaveMsg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont">&#xe83f;</i></button>

						</div>
						<div class="modal-body">
							<form role="form" class="form-horizontal" name="msgform">
								<div class="form-group" id="msgbody">

									<label for="password" class="col-sm-2 control-label">请输入</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="msg" rows="4"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<a href="javascript:;" class="btn btn-primary" id="suremsg">留言</a>
									</div>
								</div>
							</form>
						</div>

					</div>

				</div>

			</div>
			<!--图书信息-->
			<div class="container borrow body-tab-ele" id="borrowBook">

				<div class="alert alert-info">图书信息</div>
				<form class="form-horizontal" role="form">

					<table border="" cellspacing="" cellpadding="" class="table table-hover" id="getbook">
						<thead>

							<th>
								<a href="javascript:;" class="btn btn-default">全</a>
								<a href="javascript:;" class="btn btn-primary">借阅</a>
							</th>
							<th>图书编号</th>
							<th>书名</th>
							<th>出版书号</th>
							<th>编著者</th>
							<th>出版社</th>
							<th>出版日期</th>
							<th>单价</th>
							<th>库存</th>
							<th>操作</th>

						</thead>
						<tbody>

						</tbody>
					</table>

				</form>

			</div>

			<div class="modal fade" id="bcontent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont">&#xe83f;</i></button>
							<h4 class="modal-title" id="myModalLabel">借阅订单</h4>

						</div>
						<div class="modal-body">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-sm-2 control-label">书名</label>
									<div class="col-sm-5">
										<p class="form-control-static name"></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">编者</label>
									<div class="col-sm-5">
										<p class="form-control-static author"></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">出版社</label>
									<div class="col-sm-5">
										<p class="form-control-static chubanshe"></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">开始日期</label>
									<div class="col-sm-5">
										<p class="form-control-static today"></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">结束日期</label>
									<div class="col-sm-5">
										<input type="date" name="" id="endtime" value="" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-3">

									</div>
									<div class="col-sm-3">

									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<a href="javascript:;" class="btn btn-primary" id="sureborrow" disabled>确定</a>

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal -->
			</div>

			<!--借阅清单-->
			<div class="container body-tab-ele" id="borrowList">

				<div id="borrowListtips">借阅清单</div>

				<table class="table table-hover">
					<caption>LIST</caption>
					<thead>
						<tr>
							<th>书名</th>
							<th>借阅日期</th>
							<th>归还日期</th>
							<th>还剩天数</th>
						</tr>
					</thead>
          	<thead>
						<tr class="danger">
							<th>java从入门到放弃</th>
							<th>10</th>
							<th>2017-6-1</th>
							<th>0</th>
						</tr>
            	<tr>
							<th>java</th>
							<th>20</th>
							<th>2017-6-11</th>
							<th>10</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<!--个人信息-->
			<div class="container body-tab-ele" id="selfInfor">
				<div class="alert alert-info" id="updatetip"> 个人信息</div>

				<form class="form-horizontal" role="form" name="changeform">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">用户名</label>
						<label for="" class="control-label col-sm-3"></label>
						<div class="col-sm-7 ">
							<!--<input type="text" class="form-control" name="Cname" placeholder="请输入用户名">-->
							<p>not support</p>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">密码</label>
						<label for="" class="control-label col-sm-3"></label>
						<div class="col-sm-2 ">
							<input type="password" class="form-control" name="oldpwd" placeholder="请输入原密码">
						</div>
						<div class="col-sm-2 ">
							<input type="password" class="form-control" name="newpwd" placeholder="请输入新密码">
						</div>
						<div class="col-sm-2 ">
							<input type="password" class="form-control" name="renewpwd" placeholder="请确认新的密码">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">邮箱</label>
						<label for="" class="control-label col-sm-3"></label>

						<div class="col-sm-7 ">
							<input type="email" class="form-control" name="Cemail" id="Cemail" placeholder="请输入邮箱">
						</div>
					</div>
					<div class="form-group">
						<label for="sex" class="col-sm-2 control-label">性别</label>
						<label for="" class="control-label col-sm-3"></label>

						<div id="Csex" class="col-sm-7">
							<label class="checkbox-inline">
									<input type="radio" name="Csex"  value="1" checked="checked"> 男
								</label>
							<label class="checkbox-inline">
									<input type="radio" name="Csex"   value="0"> 女
								</label>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-6 col-sm-7">

							<a href="javascript:;" class="btn btn-primary" id="sureChange">修改</a>
						</div>
					</div>
				</form>
				<?php		
		$sql = "select * from adminreplay where name='{$name}'";
		$pdo -> exec('set names utf8');
		?>
		
					<table class="table">
						<caption>站内信</caption>
						<thead>
							<tr>
								<th>时间</th>
								<th>管理员回复</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($pdo->query($sql) as $value) {?>
							<tr>
								<td><?=$value['date'] ?></td>
								<td><?=$value['msg'] ?></td>
							</tr>
<?php } ?>
						</tbody>
					</table>
	
					<a href="logout.php" class="btn btn-primary">退出</a>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<!--<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>-->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/backColor.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript">
		</script>

	</body>

	</html>