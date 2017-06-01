window.requestAnimFrame = (function() {
	return window.requestAnimationFrame ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame ||
		function(callback) {
			window.setTimeout(callback, 1000 / 60);
		};
})();

var can = document.getElementById("backColor");
var cxt = can.getContext('2d');
/*设置画布宽高和窗口通风大小\n*/
var width = window.innerWidth;
var height = window.innerHeight;
can.width = width;
can.height = height;
/*数量 点与点之间的距离 据鼠标的距离 存各个点的数组*/
var dots = {
		number: 300,
		dis: 50,
		mouseDis: 100,
		array: []
	}
	/*鼠标的初始位置*/
var mousePosition = {
		x: width - 200,
		y: height - 100
	}
	/*构造函数*/
function Dot() {
	this.x = Math.random() * width;
	this.y = Math.random() * height;;

	this.speedX = Math.random() - 0.5;
	this.speedY = Math.random() - 0.5;

	this.r = Math.random() * 5;
	this.color = Color();
}
Dot.prototype.draw = function() {
		cxt.beginPath();
		cxt.arc(this.x, this.y, this.r, 0, 360, false);
		cxt.fillStyle = this.color;
		cxt.fill();
	}
	/*添加圆形*/
function createCircle() {
	for(var i = 0; i < dots.number; i++) {
		dots.array.push(new Dot());
	}
}
/*画圆*/
function drawCircle() {
	for(var i = 0; i < dots.number; i++) {
		var temp = dots.array[i];
		temp.draw();
	}
}
/*移动*/
function move() {
	for(var i = 0; i < dots.number; i++) {
		var temp = dots.array[i];
		if(temp.x < 0 || temp.x > width) {
			temp.speedX = -temp.speedX;

		}
		if(temp.y < 0 || temp.y > height) {
			temp.speedY = -temp.speedY;

		}
		temp.x += temp.speedX;
		temp.y += temp.speedY;

	}
}
/*随机颜色*/
function Color() {
	var r = parseInt(Math.random() * 255),
		g = parseInt(Math.random() * 255),
		b = parseInt(Math.random() * 255),
		a = Math.random().toFixed(1);

	return 'rgba(' + r + ',' + g + ',' + b + ',' + a + ')';

}
//console.log(Color());
/*链接线条*/
function line() {
	for(var i = 0; i < dots.number; i++) {
		var tempi = dots.array[i];
		/*如果距离<=鼠标位置*/
		if((Math.pow((tempi.x - mousePosition.x), 2) + Math.pow((tempi.y - mousePosition.y), 2)) < Math.pow(dots.mouseDis, 2)) {
			for(var j = 0; j < dots.number; j++) {
				var tempj = dots.array[j];
				/*计算两个点的距离*/
				if((Math.pow((tempi.x - tempj.x), 2) + Math.pow((tempi.y - tempj.y), 2)) < Math.pow(dots.dis, 2)) {
					cxt.beginPath();
					cxt.moveTo(tempi.x, tempi.y);
					cxt.lineTo(tempj.x, tempj.y);
					var color = Color();
					cxt.strokeStyle = color;
					cxt.stroke();
				}

			}

		}

	}
}
createCircle();

function animate() {
	cxt.clearRect(0, 0, width, height);
	move();
	drawCircle();
	line();
	window.requestAnimationFrame(animate);

}
animate();

/*鼠标移动则获取鼠标的位置，改变鼠标的初始值*/
can.onmousemove = function(ev) {
	var ev = ev || Window.event;
	mousePosition.x = ev.pageX;
	mousePosition.y = ev.pageY;
	this.onmousedown = function() {
		mousePosition.x = mousePosition.x;
		mousePosition.y = mousePosition.y;
		this.onmousemove = null;

	}

};
//缩放浏览器

window.onresize = function() {
	console.log(11111);
	cxt.clearRect(0, 0, width, height);
	//	width = window.innerWidth;
	//	height = window.innerHeight;
	//	can.width = width;
	//	can.height = height;
	//	createCircle();
	//	move();
	//	drawCircle();
	//	line();
	createCircle();
	animate();
	document.getElementById("backColor").style.display = "none";
};

$(document).mousewheel(function(e, d) {
	if(d < 0) { //下
			$("#navBar li div").remove(".arrow-top");
			console.log('down');
	}else{
		$("#navBar li").append('<div></div>');
		$("#navBar li.active div").addClass('arrow-top');
		console.log('up');
	}

});