var t; //开始时间
document.querySelector(".totop").onclick = function(event) {
	var e = event || window.event;
	e.stopPropagation();
	e.preventDefault();
	
	var toTop = document.documentElement.scrollTop || document.body.scrollTop;


	t = 0; //开始时间
	b = toTop; //起始的位置
	c = -toTop; //要经过这段距离
	d = 50; //经历多长时间

	var timer = setInterval(function() {
		//保证 每一次 setInterval的时候 t的值发生改变
		t++;
		if(t > d) {
			//当 当前时间 到达 要结束的时候，
			//清空计数器，
			clearInterval(timer);
			timer = null;
		}
		//使当前的宽度距离的变化  以动画的形式进行 滚动
		document.documentElement.scrollTop=document.body.scrollTop= Tween.Bounce.easeOut(t, b, c, d);
		console.log(document.documentElement.scrollTop);
	}, 30);
}
$(".content2 .tab").on("click","li",function(){
	$(this).siblings().removeClass("current");
	$(this).addClass("current");
	if($(this).index()==1){
		$(this).parent().siblings().hide();
		$(this).parent().siblings(".imgContent").show();
	}
	if($(this).index()==0){
		$(this).parent().siblings().hide();
		$(this).parent().siblings(".tabContent").show();
	}
})




