window.onload=function(){
	var form=document.getElementById("uedit");
	var ue = UE.getEditor('editor');
	document.getElementById("ok").onclick=function(){
		var content=document.getElementById("old").value;
		UE.getEditor('editor').setContent(content);
	}	
	form.onsubmit=function(){
		var num=0;
		if(form.title.value==""){
			num++;
			form.title.nextElementSibling.innerHTML="<font color=red>题目不能为空</font>"
		}
		if(!UE.getEditor('editor').hasContents()){
			num++;
			alert("新闻内容不能为空");
		}
		if(num>0){
			return false;
		}else{
			if(confirm("确认发表吗？")){
				alert("发表成功");
			}else{
				return false;
			}
		}
	}
	
		
}
