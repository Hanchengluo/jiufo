function myBrowser(){
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
    var isOpera = userAgent.indexOf("Opera") > -1; //判断是否Opera浏览器
    var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera; //判断是否IE浏览器
    var isFF = userAgent.indexOf("Firefox") > -1; //判断是否Firefox浏览器
    var isSafari = userAgent.indexOf("Safari") > -1; //判断是否Safari浏览器
    if (isIE) {
        var IE5 = IE55 = IE6 = IE7 = IE8 = false;
        var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
        reIE.test(userAgent);
        var fIEVersion = parseFloat(RegExp["$1"]);
        IE55 = fIEVersion == 5.5;
        IE6 = fIEVersion == 6.0;
        IE7 = fIEVersion == 7.0;
        IE8 = fIEVersion == 8.0;
        if (IE55) {
            return "a";
        }
        if (IE6) {
            return "a";
        }
        if (IE7) {
            return "a";
        }
        if (IE8) {
            return "a";
        }
    }//isIE end
    if (isFF) {
        return "FF";
    }
    if (isOpera) {
        return "Opera";
    }
}//myBrowser() end
//以下是调用上面的函数

var IE=myBrowser();
if (IE== "a") {
	//解决工程案例部分的问题
	var li=document.querySelectorAll(".ennergin ul li");
	for(var i=1;i<=li.length;i++){
		if(i%4==0){
			li[i-1].style.marginRight="0";
		}
	}
	var li=document.querySelectorAll(".imgContent ul li");
	for(var i=1;i<=li.length;i++){
		if(i%4==0){
			li[i-1].style.marginRight="0";
		}
	}
	//解决轮播的问题
	var icon=document.querySelectorAll(".slidebar ul li span");
    for(var i=0;i<icon.length;i++){
    	icon[i].style.className="";
    }
    var span=document.querySelectorAll(".banner .dot span");
    for(var i=0;i<span.length;i++){
    	span[i].style.display="none";
    }
    //解决侧栏小图标问题
    var s=document.querySelectorAll(".section2 .text span");
    for(var i=0;i<s.length;i++){
    	s[i].style.display="none";
    }
    //解决主页的新闻中心问题
    document.querySelector(".section3 .imggaller").style.display='none';
   
    
}

