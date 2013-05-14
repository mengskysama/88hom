<?php 
require 'path.inc.php';
$tpl_name = $tpl_dir.'index.tpl';

$userType = getParameter("userType");

//login
$isValidAccount = true;
if(isset($_POST['button2'])){

	$loginId = getParameter("loginID");
	$loginPwd = getParameter("loginPWD");
	$userType = getParameter("userType");
	
	$userService = new UserService($db);
	$user = $userService->loginUCenter($loginId);
 	if(empty($user) || (sysAuth($user['userPassword'],"DECODE") != $loginPwd)){
		$isValidAccount = false;
	}else{
		$_SESSION['UCUser'] = $user;
		$userType = $user['userType'];
		if($userType == 3){
			header("Location:ucenter_user.php");
		}
	}
}
//default
$userType = empty($userType) ? 3 : $userType;
if($userType == 1){
	$userTagClass = "";
	$agentTagClass = "";
	$shopTagClass = "class=current";
	$regFormAction = "shop_register.php";
}else if($userType == 2){
	$userTagClass = "";
	$agentTagClass = "class=current";
	$shopTagClass = "";
	$regFormAction = "agent_register.php";
}else{
	$userTagClass = "class=current";
	$agentTagClass = "";
	$shopTagClass = "";
	$regFormAction = "user_register.php";
}
$html->show();

$smarty->assign('userTagClass',$userTagClass);
$smarty->assign('agentTagClass',$agentTagClass);
$smarty->assign('shopTagClass',$shopTagClass);
$smarty->assign('regFormAction',$regFormAction);
$smarty->assign('userType',$userType);
if(!$isValidAccount){
	$smarty->assign('invalidAcc',"alert('用户不存在！');");	
}else{
	$smarty->assign('invalidAcc',"");
}

$smarty->display($tpl_name);

?>