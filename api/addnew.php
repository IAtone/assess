<?php
	include 'conn.php';
	$valid = true;
	$message = 1;
	// 标题
	if(isset($_POST['title']) && $_POST['title']!=""){
		$title = $_POST['title'];
	}else{
		$valid = false;
		$message = '标题不能为空';
	}
	// 类别 0 1
	if(isset($_POST['option']) && $_POST['option']!=""){
		$option = $_POST['option'];
	}else{
		$valid = false;
		$message = '类别不能为空';
	}
	// 简介
	if(isset($_POST['info']) && $_POST['info']!=""){
		$info = $_POST['info'];
	}else{
		$valid = false;
		$message = '简介不能为空';
	}
	// 图片路径
	if(isset($_POST['img']) && $_POST['img']!=""){
		$img = ($_POST['img']);
	}else{
		$valid = false;
		$message = '图片不能为空';
	}
	// 文章内容
	if(isset($_POST['txt']) && $_POST['txt']!=""){
		$txt = htmlspecialchars_decode($_POST['txt']);
	}else{
		$valid = false;
		$message = '文章内容不能为空';
	}
	// 数据库插入数据
	$registerTime = DATATIME;
	if($valid){
		$sql = "INSERT INTO  news (title,classify,info,img,artTime,article)VALUES ('$title','$option','$info','$img','$registerTime','$txt')";
		if(mysqli_query($conn,$sql)) {
			$message = "新闻添加成功";
		}else{
			$valid = false;
			$message = "新闻添加失败".$sql;
		}
	}
	echo json_encode(array('valid'=>$valid,'message'=>$message),JSON_UNESCAPED_UNICODE);
?>