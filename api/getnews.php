<?php
	include 'conn.php';
	$valid = true;
	$message = '';

	if (isset($_GET['getNews']) && $_GET['getNews'] == 'all') {
		// 读取管理员数据
		$sql = "SELECT * FROM news";
		$result = mysqli_query($conn, $sql);
		$news = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode(array('valid' => $valid, 'message' => $news), JSON_UNESCAPED_UNICODE);
	} else {
		$valid = false;
		echo json_encode(array('valid' => $valid, 'message' => 0), JSON_UNESCAPED_UNICODE);
	}
?>