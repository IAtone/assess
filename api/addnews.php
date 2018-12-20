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
	// if(isset($_POST['img']) && $_POST['img']!=""){
	// 	$img = htmlentities($_POST['img']);
	// }else{
	// 	$valid = false;
	// 	$message = '图片不能为空';
	// }
	if(isset($_POST['img']) && $_POST['img']!=""){
      $imgBase64 = $_POST['img'];
      if(preg_match('/^(data:\s*image\/(\w+);base64,)/',$imgBase64,$res)){
          // 获取图片类型
          $type = $res[2];
          // 图片路径 
          $new_file = "../upload/".date('Ymd',time()).'/';
          if(!file_exists($new_file)){
            mkdir($new_file,0777,true);
          }
          $new_file = $new_file.time().'.'.$type;
          if (file_put_contents($new_file, base64_decode(str_replace($res[1], '',$imgBase64)))) {
              $message = '头像上传成功';
          }else{
         $valid = false;
         $message = '头像上传失败';
          }
      }
   }
	// 文章内容
	if(isset($_POST['txt']) && $_POST['txt']!=""){
		$txt = htmlentities($_POST['txt']);
	}else{
		$valid = false;
		$message = '文章内容不能为空';
	}
	// 数据库插入数据
	$registerTime = DATATIME;
	if($valid){
		$sql = "INSERT INTO  news (title,classify,info,img,artTime,article)VALUES ('$title','$option','$info','$new_file','$registerTime','$txt')";
		if(mysqli_query($conn,$sql)) {
			$message = "新闻添加成功";
		}else{
			$valid = false;
			$message = "新闻添加失败".$sql;
		}
	}
	echo json_encode(array('valid'=>$valid,'message'=>$message),JSON_UNESCAPED_UNICODE);
?>