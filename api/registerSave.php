<?php
   include 'conn.php';
   $valid = true;
   $mesage = '';

   if(!isset($_COOKIE['email'])){
    echo json_encode(array('valid'=>false,'message'=>'您未登陆'),JSON_UNESCAPED_UNICODE);
    exit();
    }

if(isset($_POST['send']) && $_POST['send']==1){
   // var_dump($_POST);
   if(isset($_POST['UserAvatar']) && $_POST['UserAvatar']!=""){
      $imgBase64 = $_POST['UserAvatar'];
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
   }else{
         $valid = false;
         $message = '头像不能为空';
   }


   if(isset($_POST['username']) && $_POST['username']!=""){
       $username = $_POST['username'];
   }else{
        $valid = false;
         $message = '帐号不能为空';
   }


   if(isset($_POST['email']) && $_POST['email']!=""){
       $email = $_POST['email'];
   }else{
        $valid = false;
         $message = 'email帐号不能为空';
   }


   if(isset($_POST['password']) && $_POST['password']!=""){
       $password = sha1($_POST['password']);
   }else{
        $valid = false;
         $message = '密码不能为空';
   }

  if(isset($_POST['qq']) && $_POST['qq']!=""){
       $qq = $_POST['qq'];
   }else{
     $qq = 0;
   }
  if(isset($_POST['info']) && $_POST['info']!=""){
       $info = $_POST['info'];
   }else{
     $info = '这家伙很懒，什么都没写';
   }

  if(isset($_POST['sex']) && $_POST['sex']!=""){
       $sex = $_POST['sex'];
   }else{
     $sex = 0;
   }

  if(isset($_POST['level']) && $_POST['level']!=""){
       $level = $_POST['level'];
   }else{
     $level = 1;
   }

   $regitsterTime = DATATIME;


   if($valid){
      
      $result = mysqli_query($conn,"SELECT * FROM Users where email='$email'");
      if(mysqli_num_rows($result) == 0 ){
                
 $sql = "INSERT INTO Users(username,password,email,userface,regitsterTime,qq,info,sex,level)
                VALUES
                ('$username','$password','$email','$new_file','$regitsterTime',$qq,'$info',$sex,$level)";

              if(mysqli_query($conn,$sql)){
                    
                    $message = "管理员添加成功";

              }else{
                $valid = false;
                $message = "管理员添加失败".$sql;
              }


      }else{
    $valid = false;
    $message = '邮箱已经存在！请重新输入';
      }


   }else{
    $valid = false;
    $message = $message;
   }
}else{
    $valid = false;
    $message = '接口地址不存在';
}


echo json_encode(array('valid'=>$valid,'message'=>$message));
?>