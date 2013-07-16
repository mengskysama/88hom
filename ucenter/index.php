<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'index.tpl';

$userType = getParameter("userType","GET");

//login
$isValidAccount = true;
if(isset($_POST['button2'])){

	$loginId = getParameter("loginID");
	$loginPwd = getParameter("loginPWD");
	$userType = getParameter("userType");
	
	$userService = new UserService($db);
	$user = $userService->loginUCenter($loginId);
 	if(empty($user) 
 			|| (sysAuth($user['userPassword'],"DECODE") != $loginPwd 
 			|| $user['userState'] != 1 
 			|| $user['userType'] != $userType)){
 		
		$isValidAccount = false;
	}else{
		$userDetail = $userService->getUserDetail($user['userId']);
		if($userDetail){
			$_SESSION['UCUserDetail'] = $userDetail;
		}
		$_SESSION['UCUser'] = $user;
			
		$userType = $user['userType'];
		if($userType == 2){
			header("Location:ucenter_agent.php");
		}else{
			header("Location:ucenter_user.php");
		}
	}
}
//default
$userType = empty($userType) ? 3 : $userType;
if($userType == 2){
	$con_class = "con2";
	$lcon_class = "lcon2";
	$dl_class = "dl1";
	$dl_1_class = "dl_11";
	$login_title = "经纪人登陆";
	$login_page = "index.php?userType=2";
	$regFormAction = "agent_register.php";
}else{
	$con_class = "con";
	$lcon_class = "lcon";
	$dl_class = "dl";
	$dl_1_class = "dl_1";
	$login_title = "个人登陆";
	$login_page = "index.php";
	$regFormAction = "user_register.php";
}
$html->show();

$smarty->assign('con_class',$con_class);
$smarty->assign('lcon_class',$lcon_class);
$smarty->assign('dl_class',$dl_class);
$smarty->assign('dl_1_class',$dl_1_class);
$smarty->assign('login_title',$login_title);
$smarty->assign('$login_page',$login_page);
$smarty->assign('regFormAction',$regFormAction);
$smarty->assign('userType',$userType);
if(!$isValidAccount){
	$smarty->assign('invalidAcc',"alert('用户不存在！');");	
}else{
	$smarty->assign('invalidAcc',"");
}

$smarty->display($tpl_name);

?>