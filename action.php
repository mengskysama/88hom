<?php
require 'path.inc.php';
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('�������,û������ ����action��');
}
$userService=new UserService($db);
switch ($action){
	case 'webLogin':
		$result=null;
		if(isset($_SESSION['codeweb']) && isset($_POST['valideCode']) && $_SESSION['codeweb']==strtolower($_POST['valideCode'])){
			$user=$userService->getWebUserByUserName(iconv('utf-8','gbk',$_POST['username']));
			if(empty($user)){
				$result=array('result'=>'error','error'=>'1','msg'=>charsetIconv('�˺Ż��������1��','gbk','utf-8'));
			}else{
				if($_POST['password']==sysAuth($user['password'],'DECODE',ECMS_KEY_WEB)){
					$result=array('result'=>'success');
					$user['time']=time();
					$_SESSION['Web_Login']='webLoginOn';
					$_SESSION['Web_User']=$user;
					$result=array('result'=>'success','error'=>'0','msg'=>charsetIconv('��¼�ɹ���','gbk','utf-8'));
				}else{
					$result=array('result'=>'error','error'=>'1','msg'=>charsetIconv('�˺Ż��������2��','gbk','utf-8'));
				}
			}
		}else{
			$result=array('result'=>'error','error'=>'2','msg'=>charsetIconv('��֤�����','gbk','utf-8'));
		}
		echo json_encode($result);
	break;
	case 'webLoginOut':
		$userService->getWebLoginOut();
	break;
	case 'webCheckLogin':
		$result=null;
		if(isset($_SESSION['Web_User'])){
			$result=array('result'=>'success');
		}else{
			$result=array('result'=>'error');
		}
		echo json_encode($result);
	break;
}
?>