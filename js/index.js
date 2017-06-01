(function() {
	/*修复小尺寸响应式导航点击不能收回*/
	var $navbar = $("#navBar li");
	var $slideUp = $("#slideUp");
	var $bodyTab = $(".body-tab-ele");
	$navbar.on("click", function() {
			$(this).addClass("active").siblings().removeClass("active");
			/*循环取消所有arrow-top类 然后根据active类加上arrow-top类*/
			for(var i = 0; i < $navbar.length; i++) {
				if($navbar[i].className == "active") {
					$(this).siblings().find("div").removeClass("arrow-top");
					$(this).find("div").addClass("arrow-top");

				}
			}
			var index = $(this).index();

			for(var i = 0; i < $bodyTab.length; i++) {
				$bodyTab[i].style.display = "none";
			}
			$bodyTab.eq(index).show();

			if($slideUp.is(":visible")) {
				$slideUp.click();
			}
		})
		/*大屏幕下讲导航设为按钮*/
		//				console.log(window.innerWidth);
	function setNav() {
		if(window.innerWidth > 768) {
			$("#navBar li a").attr("href", "javascript:;");
		} else {
			$("#navBar li a").eq(0).attr("href", "#borrowBook");
			$("#navBar li a").eq(1).attr("href", "#borrowList");
			$("#navBar li a").eq(2).attr("href", "#selfInfor");

		}

	}
	setNav();
	window.onresize = setNav;

})();

//ajax动态获取书本信息

(function() {
	var $booktable = $("#getbook tbody"),
		$btnBook = $("#btnBook");
	$btnBook.on("click", function() {
		getbook();
	});
	getbook();

	function getbook() {
		var xhr = new XMLHttpRequest();
		xhr.open('get', 'getbook.php', true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {

				var vTxt = eval('(' + xhr.responseText + ')');
				//			console.log(vTxt[0]);
				var temp = ' ';
				for(var i = 0; i < vTxt.length; i++) {
					if(vTxt[i].number == 0) {
						temp += '<tr ><td><input type="checkbox" name="" id="" value="" /></td><td>' + vTxt[i].b_id + '</td><td>' + vTxt[i].b_name + '</td><td>' + vTxt[i].publish + '</td><td>' + vTxt[i].author + '</td><td>' + vTxt[i].press + '</td><td>' + vTxt[i].publish_at + '</td><td>' + vTxt[i].price + '</td><td>' + vTxt[i].number + '</td><td><a href="javascript:;" class="btn btn-default actionborrow" disabled>借书</a></td></tr>';
					} else {
						temp += '<tr><td><input type="checkbox" name="" id="" value="" /></td><td>' + vTxt[i].b_id + '</td><td>' + vTxt[i].b_name + '</td><td>' + vTxt[i].publish + '</td><td>' + vTxt[i].author + '</td><td>' + vTxt[i].press + '</td><td>' + vTxt[i].publish_at + '</td><td>' + vTxt[i].price + '</td><td>' + vTxt[i].number + '</td><td><a href="javascript:;" class="btn btn-primary actionborrow">借书</a></td></tr>';

					}

				}
				$booktable.html(temp);
			}
		};
	};
	/*setInterval(function() {
		getbook();
	}, 1000000000);*/
})();
/*点击登陆注册之后操作*/
(function() {

	var $divreg = $("#register"), //注册模态框body
		$divlogin = $("#login"), //登录模态框body
		$regbtn = $("#regbtn"), //注册按钮
		$loginbtn = $("#loginbtn"), //登录按钮
		$tips = $("#register form .col-sm-3 p") //提示正确与否
	$nameinput = $("#username"); //用户名输入框
	var reg = {
		"name": /^$/
	};
	//用户名框前端验证
	$nameinput.on("focus", function() {

			$(this).parent().siblings(".col-sm-3").find("p").addClass("false");
			console.log(1);
		})
		//用户名框ajax验证唯一性

	/*点击注册ajax向后发送数据*/
	$regbtn.on('click', function() {
			var name = regform.username.value,
				pwd = regform.pwd.value,
				repwd = regform.repwd.value,
				email = regform.email.value,
				sex = regform.sex.value;
			console.log(sex);
			$.post("checkreg.php", {
				"username": name,
				"pwd": pwd,
				"email": email,
				"sex": sex

			}, function(msg) {
				//成功前端显示成功
				console.log('注册msg' + msg);
				if(msg == '1') {

					$divreg.html('<p class="regsuccess"><i class="iconfont">&#xe60e;</i>注册成功</p>');
				} else {

					$divreg.html('<p class="failed"><i class="iconfont">&#xe6af;</i>注册失败</p>');
				}
			});

		})
		/*登录模块*/
	$loginbtn.on('click', function() {

		var rname = loginform.username.value,
			rpwd = loginform.password.value;
		//		console.log(rname+'  '+rpwd);
		$.post("login.php", {
			"username": rname,
			"password": rpwd
		}, function(result) {
			if(result == '1') {
				$divlogin.html('<p class="regsuccess"><i class="iconfont">&#xe60e;</i>登录成功</p>');
				setTimeout(function() {
					$("#RegLogin").modal('hide');
					console.log('login success');
				}, 1000);
			} else {
				//				console.log(result);
				$divlogin.html('<p class="regsuccess">登录失败</p>');
				setTimeout(function() {
					window.location.reload();
					//					$divlogin.html('<form action="" class="form-horizontal" role="form" name="loginform" action="login.php" method="post"><div class="form-group"><label for="username" class="col-sm-2 control-label">用户名</label><div class="col-sm-10"><input type="text" class="form-control" name="username" id="" value="" placeholder="请输入用户名" /></div></div><div class="form-group"><label for="password" class="col-sm-2 control-label">密码</label><div class="col-sm-10"><input type="password" class="form-control" name="password" id="" value="" placeholder="请输入密码" /></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><div class="checkbox"><label><input type="checkbox">请记住我</label></div></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><!--<button type="submit" class="btn btn-primary" id="loginbtn">登录</button>--><a href="javascript:;" class="btn btn-primary" id="loginbtn">登录</a></div></div></form>');
				}, 1000);

			}
		});

	});

})();
//点击借书弹出相关借阅信息

(function() {
	//获取今天的年月日
	var data = new Date();
	var year = data.getFullYear(),
		month = data.getMonth() + 1,
		day = data.getDate();
	var $bcontent = $("#bcontent");
	var $sure = $("#sureborrow");
	$("#borrowBook form table tbody").on("click", ".actionborrow", function() {
			var name = $(this).parent().siblings("td").eq(2).html(),
				id = $(this).parent().siblings("td").eq(1).html(),
				author = $(this).parent().siblings("td").eq(4).html(),
				chubanshe = $(this).parent().siblings("td").eq(5).html(),
				today = year + "-" + month + "-" + day;
			//弹出模态框的值等于该行的值
			$bcontent.find("form p.name").html(name);
			$bcontent.find("form p.author").html(author);
			$bcontent.find("form p.chubanshe").html(chubanshe);
			$bcontent.find("form p.today").html(today);

			$('#bcontent').modal('show');
			//未选择时间不能点击确定按钮
			var endtime;
			var timer = setInterval(function() {
				endtime = $("#endtime").val();
				if(endtime.length > 0) {
					//				console.log(endtime);
					//					console.log(1);
					$("#sureborrow").attr('disabled', false);
					clearInterval(timer);
				}

			}, 500);
			$sure.on("click", function() {
				$.post("sureborrow.php", {
					"name": name,
					"id": id,
					"begin": today,
					"end": endtime
				}, function(msg) {
					console.log('借阅返回信息' + msg);
					switch(msg) {
						case '1':
							$('#bcontent .modal-body').html('<p class="regsuccess"><i class="iconfont">&#xe60e;</i>成功</p>');
							setTimeout(function() {
								$('#bcontent').modal('hide');
								$('#bcontent .modal-body').html('<form class="form-horizontal" role="form"><div class="form-group"><label class="col-sm-2 control-label">书名</label><div class="col-sm-5"><p class="form-control-static name"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">编者</label><div class="col-sm-5"><p class="form-control-static author"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">出版社</label><div class="col-sm-5"><p class="form-control-static chubanshe"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">开始日期</label><div class="col-sm-5"><p class="form-control-static today"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">结束日期</label><div class="col-sm-5"><input type="date" name="" id="endtime" value="" /></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-3"></div><div class="col-sm-3"></div></div></form>');
								window.location.reload();

							}, 500);
							break;
						case '0':
							//						console.log('失败');
							$('#bcontent .modal-body').html('<p class="failed"><i class="iconfont">&#xe6af;</i>失败</p>');
							setTimeout(function() {
								$('#bcontent').modal('hide');
								$('#bcontent .modal-body').html('<form class="form-horizontal" role="form"><div class="form-group"><label class="col-sm-2 control-label">书名</label><div class="col-sm-5"><p class="form-control-static name"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">编者</label><div class="col-sm-5"><p class="form-control-static author"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">出版社</label><div class="col-sm-5"><p class="form-control-static chubanshe"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">开始日期</label><div class="col-sm-5"><p class="form-control-static today"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">结束日期</label><div class="col-sm-5"><input type="date" name="" id="endtime" value="" /></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-3"></div><div class="col-sm-3"></div></div></form>');
								window.location.reload();

							}, 1000);
							break;
						case '3':
							$('#bcontent .modal-body').html('<p class="failed"><i class="iconfont">&#xe6af;</i>书本已经存在</p>');
							setTimeout(function() {
								$('#bcontent').modal('hide');
								$('#bcontent .modal-body').html('<form class="form-horizontal" role="form"><div class="form-group"><label class="col-sm-2 control-label">书名</label><div class="col-sm-5"><p class="form-control-static name"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">编者</label><div class="col-sm-5"><p class="form-control-static author"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">出版社</label><div class="col-sm-5"><p class="form-control-static chubanshe"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">开始日期</label><div class="col-sm-5"><p class="form-control-static today"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">结束日期</label><div class="col-sm-5"><input type="date" name="" id="endtime" value="" /></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-3"></div><div class="col-sm-3"></div></div></form>');
								window.location.reload();

							}, 1000);
							break;
						case 'not':
							$('#bcontent .modal-body').html('<p class="failed"><i class="iconfont">&#xe6af;</i>用户未登录</p>');
							setTimeout(function() {
								$('#bcontent').modal('hide');
								$('#bcontent .modal-body').html('<form class="form-horizontal" role="form"><div class="form-group"><label class="col-sm-2 control-label">书名</label><div class="col-sm-5"><p class="form-control-static name"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">编者</label><div class="col-sm-5"><p class="form-control-static author"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">出版社</label><div class="col-sm-5"><p class="form-control-static chubanshe"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">开始日期</label><div class="col-sm-5"><p class="form-control-static today"></p></div></div><div class="form-group"><label class="col-sm-2 control-label">结束日期</label><div class="col-sm-5"><input type="date" name="" id="endtime" value="" /></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-3"></div><div class="col-sm-3"></div></div></form>');
								window.location.reload();

							}, 1000);
							break;

						default:
							break;
					}
				});

				//				console.log(endtime);
			});
		}

	);

})();

//展示借阅订单
(function() {
	var dangernum = 0;
	var $borrowListtips = $("#borrowListtips");
	var $borrowList = $("#borrowList tbody"),
		$btnList = $("#btnList");
	$btnList.on("click", function() {
		givetip();
		getlist();
	});
	getlist();
	givetip();
	function getlist() {
		var xhr = new XMLHttpRequest();
		xhr.open('get', 'orderlist.php', true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {

				var vTxt = eval('(' + xhr.responseText + ')');
				//				console.log(vTxt);
				//				console.log(vTxt.no0name);
				console.log(vTxt);
				var temp = ' ';

				for(var i = 0; i < vTxt.no + 1; i++) {
					var name1 = 'no' + i + 'name',
						time = i + 'time';
					if(vTxt[time].totime < 20) {
						temp += '<tr class="danger"><td>' + vTxt[name1] + '</td><td>' + vTxt[time].begin + '</td><td>' + vTxt[time].end + '</td><td>' + vTxt[time].totime + '</td></tr>';
						dangernum++;
					} else {
						temp += '<tr class="success"><td>' + vTxt[name1] + '</td><td>' + vTxt[time].begin + '</td><td>' + vTxt[time].end + '</td><td>' + vTxt[time].totime + '</td></tr>';

					}
					//					console.log(vTxt.name1);

				}
				$borrowList.html(temp);
			}
		};
		console.log('dan' + dangernum);

		

	};
	function givetip() {
			if(dangernum > 0) {
				$borrowListtips.html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>共有' + dangernum + '本书需要归还，请尽快归还</div>');
				dangernum = 0;
			} else {
				$borrowListtips.html('<div class="alert alert-info" id="updatetip">借阅订单</div>');

			}
	}
	/*setInterval(function() {
		getlist();
	}, 1000000000);*/

})();

//展示个人信息
(function() {
	var $selfInfor = $("#selfInfor "),
		$inforlabel = $("#selfInfor form .form-group");

	getlist();
	$("#btnself").on("click", function() {
		getlist();

	});

	function getlist() {
		var xhr = new XMLHttpRequest();
		xhr.open('get', 'getinfor.php', true);
		xhr.send();
		xhr.onreadystatechange = function() {
			if(xhr.readyState == 4) {

				var vTxt = eval('(' + xhr.responseText + ')');
				if(vTxt == 0) return;
				$inforlabel.eq(0).find('.col-sm-3').html(vTxt[0].u_name);
				var pwd = '';
				for(var i = 0; i < vTxt[0].pwd.length; i++) {
					pwd += '*';
				}
				$inforlabel.eq(1).find('.col-sm-3').html(pwd);
				$inforlabel.eq(2).find('.col-sm-3').html(vTxt[0].email);
				var sex = (vTxt[0].sex == 0) ? '女' : '男';
				$inforlabel.eq(3).find('.col-sm-3').html(sex);

			}
		};
	};
	/*setInterval(function() {
		getlist();
	}, 1000000000);*/

})();

//修改个人信息
(function() {
	$tip = $("#updatetip");

	$("#sureChange").on("click", function() {
		var $oldpwd = changeform.oldpwd.value,
			$newpwd = changeform.newpwd.value,
			$repwd = changeform.renewpwd.value,
			$email = changeform.Cemail.value,
			$sex = changeform.Csex.value;
		$.post("updateinfor.php", {
			//			"name":$name,
			"pwd": $newpwd,
			"email": $email,
			"sex": $sex
		}, function(msg) {
			console.log(msg);
			if(msg == '1') {
				$tip.html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>更新成功 牢记</div>');
				setTimeout(function() {
					$tip.html('个人信息');
					$("#btnBook").click();
					$('#RegLogin').modal('show');

				}, 2000);
			}
		});
		/*		$.post("updateinfor.php",
		    {
		        "pwd":$newpwd,
					"email":$email,
					"sex":$sex
		    },
		        function(data){
		        console.log()
		    });*/

	});

})();

//留言
(function() {
	var $surebtn = $("#suremsg");
	$("#suremsg").on("click", function() {
		var msg = msgform.msg.value;
		if(msg == '') {
			$surebtn.attr("disabled", true);
		}
		$.post("msg.php", {
				"msg": msg
			},
			function(msg) {
				if(msg == '1') {
					$("#msgbody").html('<p class="regsuccess"><i class="iconfont">&#xe60e;</i>成功</p>');
				}
				if(msg == 'not') {
					$("#msgbody").html('<p class="failed"><i class="iconfont">&#xe6af;</i>用户未登录</p>');
				}
			});
	});

})();