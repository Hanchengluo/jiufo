<?php
	
	/**
	 * 上传图片到服务器
	 * @param	$imgname	string	file表单的name属性值
	 * @param	$$file		string	要转移到的文件夹名
	 * 注：在$_POST非空的状况下使用
	 */
	function uploadImg($imgName,$file){
		$img='';
		if(!empty($_FILES[$imgName]['name'])){
			$fileName=time();//得到一个文件的前缀  防止文件重名
			move_uploaded_file($_FILES[$imgName]['tmp_name'], ''.$file.'/'.$fileName.$_FILES[$imgName]['name']);
			// 把文件的路径存储在数据库
			$img=''.$file.'/'.$fileName.$_FILES[$imgName]['name'];
		}
		return $img;
	}
	
	/**
	 * 将图片从服务器中删除
	 * @param	$sql	sql语句
	 * @param	$imgName	数据库里的图片栏位名
	 */
	 function deletImg($sql,$imgName){
		$result=mysqli_query($link, $sql);
		$row=mysqli_fetch_assoc($result);
		unlink($row[$imgName]);//删除文件里原来的
	 }
?>