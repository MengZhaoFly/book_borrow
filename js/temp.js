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