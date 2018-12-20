<?php
include 'conn.php';
$valid = true;
$message = '';
if(isset($_POST['send']) && $_POST['send']==1){

     // if (isset($_POST['username']) && $_POST['username']!="") {
     //       $username =  htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
     //       $regexp = "/^[\x7f-\xff]+$/";

     //      if (!preg_match($regexp,$username)){
     //         $message = "用户名必须全部由中文汉字组成";
     //         $valid   = false;
     //        }

     //  }else{
     //    $message = "用户名帐号不合法";
     //    $valid   = false;
     //  }
    
     if(isset($_POST['email']) && $_POST['email']!=""){
      $email = htmlentities($_POST['email'],ENT_QUOTES,'UTF-8');
      $regexp = "/^([_a-z0-9-]+)(\.[a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
      if(!preg_match($regexp, $email)){
        $valid = false;
          $message = "邮箱帐号不合法";
      }
     }else{
        $valid = false;
          $message = "邮箱不能为空";
     } 



      if (isset($_POST['password']) && $_POST['password']!="") {
          $password = $_POST['password'];
          $password = sha1($password);
      }else{
        $message = '密码不能为空';
        $valid = false;
      }


     if ($valid) {
         
         $sql = "SELECT * From Users WHERE email = '$email' &&  password='$password'";
         $result = mysqli_query($conn,$sql);  //验证是否存在
         $row = $result->fetch_assoc();
        if(mysqli_num_rows($result) == 1 ){
                
                
                if(isset($_POST['sevenDay']) && $_POST['sevenDay']==7){
                  $expire=time()+60*60*24*7;
                }else{
                  $expire=time()+3600;
                }
                
                // $_SESSION['email']=$row['email'];
                setcookie("email",$row['email'],$expire,"/");
                setcookie("username",$row['username'],$expire,"/");
                setcookie("userid", $row['id'],$expire,"/");
                setcookie("userlevel", $row['level'],$expire,"/");
                $message = '登陆成功';

          }else{
              $message =  "帐号或密码不正确";
              $valid = false;
          }

     }else{
              $message =  $message;
              $valid = false;
     } 

}else{
  $valid = false;
  $message = '接口调用失败';
}


echo json_encode(
     array('valid' => $valid, 'message' => $message),JSON_UNESCAPED_UNICODE
); 

?> 