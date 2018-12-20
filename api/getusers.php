<?php

	if(!isset($_COOKIE['email'])){
	    echo json_encode(array('valid'=>false,'message'=>'您未登陆'),JSON_UNESCAPED_UNICODE);
	    exit();
	}

    include 'conn.php';
	$valid   = true;
	$users = '';

	$sql ="SELECT id,username,email,userface,regitsterTime,qq,info,sex,level FROM Users ";

	if(isset($_GET['userid']) &&  is_numeric($_GET['userid'])){
		$sql.=" WHERE id=".$_GET['userid'];
	}

	$result = mysqli_query($conn,$sql);
	$users = mysqli_fetch_all($result,MYSQLI_ASSOC);

	echo json_encode(array('valid'=>$valid,'users'=>$users),JSON_UNESCAPED_UNICODE);
