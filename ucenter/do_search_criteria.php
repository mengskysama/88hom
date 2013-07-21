<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
/**
 * 用户选房条件中间类
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-14
 */
require 'path.inc.php';
require 'check_login.php';
//action发布，修改，删除
$action = $_GET ['action'];
//cType，1求购，2求租！
if(isset($_POST['cType'])){
	$url_pra=$_POST['cType'];
}else{
	$url_pra=$_GET['cType'];
}
$url='user_search_criteria.php?cType='.$url_pra;
$urlSecond='user_search_criteria.php?cType='.$url_pra.'#secondLocate';
$userCriteria=new UserCriteriaDAO($db);
switch ($action){
	case 'release':
		$userCriteria->release($_POST);
		if($_POST['hand']==2){
			$html->gotoUrl($urlSecond,'发布成功');
		}else{	
			$html->gotoUrl($url,'发布成功');
		}
	break;
	case 'modify':
		$userCriteria->modify($_POST);
		if($_POST['hand']==2){
			$html->gotoUrl($urlSecond,'修改成功');
		}else{
			$html->gotoUrl($url,'修改成功');
		}
	break;
	case 'delete':
		$id=$_GET['id'];
		$userCriteria=new UserCriteriaDAO($db);
		$userCriteria->delUserCriteriaById($id);
	if(isset($_GET['hand'])){
			$html->gotoUrl($urlSecond,'删除成功');
		}else{
			$html->gotoUrl($url,'删除成功');
		}
	break;
}
?>


