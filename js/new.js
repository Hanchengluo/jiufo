var news = document.querySelector("#indexNew ul");
var li = document.querySelector("#indexNew ul li");
var allh = news.offsetHeight;
var lih = li.offsetHeight;
var timer = null;
timer = setInterval(function() {
	news.style.top = news.offsetTop - 0.6 + "px";
	if(-news.offsetTop > allh - lih * 5) {
		news.style.top = '0px';
	}
}, 50)

news.onmouseover = function() {
	clearInterval(timer);
}
news.onmouseout = function() {
	timer = setInterval(function() {
		news.style.top = news.offsetTop - 0.6 + "px";
		if(-news.offsetTop > allh - lih * 5) {
			news.style.top = '0px';
		}
	}, 50)
}