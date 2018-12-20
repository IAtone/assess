<?php
   #跨域 指定访问源，允许其它域名访问
   header('Access-Control-Allow-Origin:*');
   #响应类型
   header('Access-Control-Allow-Methods:GET');
   #响应头设置
   header('Access-Control-Allow-Headers:x-requested-with,content-type');
   header('Access-Control-Allow-Credentials:true');
   #声明网页编码格式
   header("Content-type:text/html;charset=utf-8");
   #声明所在的时区
   date_default_timezone_get('Asia/Shanghai');
   #报错机制
   ini_set('display_errors','On');
   error_reporting(E_ALL);
   #判断当前的php工作环境
   if(version_compare("5.5",PHP_VERSION,">")){
      die('<h1>您的PHP环境不符最低要求，请升级到PHP5.5以上 - 当前版本号："'.PHP_VERSION.'"</h1>');
   }
   define("DATATIME","Y-m-d H:i:s");
   #数据库连接地址
   define("DB_HOST",'sqld-gz.bcehost.com');
   #数据库名
   define('DB_NAME','ISXvRtFafARnOfXTnszt');
   #数据库帐号 
   define('DB_USER','e3467c5a148f4c8087be4a6755d3c570');
   #数据库连接密码 
   define('DB_PASSWORD','daf1484e22034f0d959a342e3a11255b');
   #连接数据库
   $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   #设置读写权限并赋予编码格式
   mysqli_query($conn,"set character set utf8");
   mysqli_query($conn,'set names utf8');
   if($conn->connect_error){
      die('数据库连接失败');
   }else{
      // echo '数据库连接成功';
   }
?>