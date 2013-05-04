<?php
require 'path.inc.php';
if(isset($_SESSION['codeadmin']) && isset($_POST['vadideCode']) && $_SESSION['codeadmin']==strtolower($_POST['vadideCode'])){
	$userService=new UserService($db);
	$user=$userService->getUserByUserName(iconv('utf-8','gbk',$_POST['username']));
	if(empty($user)){
		$result=array('result'=>'error','error'=>'1','msg'=>charsetIconv('账号或密码错误1！','gbk','utf-8'));
	}else{
		if($_POST['password']==sysAuth($user['userPassword'],'DECODE')){
			$result=array('result'=>'success');
			$user['time']=time();
			$_SESSION['Admin_Login']='adminLoginOn';
			$_SESSION['Admin_User']=$user;
		}else{
			$result=array('result'=>'error','error'=>'1','msg'=>charsetIconv('账号或密码错误2！','gbk','utf-8'));
		}
	}
}else{
	$result=array('result'=>'error','error'=>'2','msg'=>charsetIconv('验证码错误！','gbk','utf-8'));
}
echo json_encode($result);
?>