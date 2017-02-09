(function(IE) {
	//轮播模块
	//第一步：基础配置
	var cliencWigth = document.documentElement.clientWidth || document.body.clientWidth;
	if(cliencWigth <= 1200) {
		cliencWigth = 1200;
	}
	var banner = document.querySelector(".banner");
	banner.style.height = cliencWigth / 3.2 + "px";
	var imgs = document.querySelectorAll(".banner img");
	var imgBox = document.querySelector(".banner ul");
	var span = document.querySelectorAll(".banner .dot span");
	//图片的宽高
	for(var i = 0; i < imgs.length; i++) {
		imgs[i].style.width = cliencWigth + "px";
		imgs[i].style.height = cliencWigth / 3.2 + "px";
	}
	imgBox.style.width = cliencWigth * imgs.length + "px"; //ul的宽度
	var timer = null;
	var index = 0;
	if(IE != "a") {
		//第二步，动起来
		move();
		function move() {
			var lunbo = document.querySelector(".wrap ul");
			var t = 0; //当前的时间
			var b = imgBox.offsetLeft; //起始的位置
			var c = -cliencWigth; //变化的量
			var d = 80; //持续时间	

			lunboTimer = setInterval(move, 10000);
			/* 让轮播向左轮播一张图的距离
			 */
			function move() {
				timer = setInterval(
					function() {
						t++;
						if(t > d) {
							clearInterval(timer);
							t = 0; //重置时间
							index++;
							if(index == 4) {
								index = 0
							}
							spanActive()
							b = imgBox.offsetLeft; //让b更新为当前的left值
							if(b == -cliencWigth * 4) {
								imgBox.style.left = 0;
								b = 0;
							}
						} else {
							imgBox.style.left = Tween.Bounce.easeOut(t, b, c, d) + "px";
						}
					}, 30);
			}
		}

		function stopMove() {
			clearInterval(lunboTimer);
			clearInterval(timer);
		}

		function spanActive() {
			$(".banner .dot span").removeClass("active");
			$(".banner .dot span").eq(index).addClass("active");
		}
		banner.onmouseover = function() {
			stopMove();
			imgBox.style.left = parseInt(imgBox.offsetLeft / cliencWigth) * cliencWigth + "px";
		}
		banner.onmouseleave = function() {
			move();
		}
		document.querySelector(".pref").onclick = function() {
			index--;
			if(index < 0) {
				index = 3;
			}
			imgBox.style.left = index * cliencWigth + "px";
			spanActive();
		}
		document.querySelector(".next").onclick = function() {
			index++;
			if(index == 4) {
				index = 0;
			}
			imgBox.style.left = index * cliencWigth + "px";
			spanActive();
		}
	}
})(IE)