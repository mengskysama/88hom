<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
/**
 * 用户求购求租中间类
 * @author Max(maxyellow@vip.qq.com)
 * @since 2013-07-14
 */
require 'path.inc.php';
require 'check_login.php';
//action发布，修改，删除
$action = $_GET ['action'];
//wType，1求购，2求租！
if(isset($_POST['wType'])){
	$url_pra=$_POST['wType'];
}else{
	$url_pra=$_GET['wType'];
}
$userWanted = new UserWantedDAO ( $db );
switch ($action){
	case 'release':
//isIntermediary，是否委托1，委托，2，个人直接发布
	if(isset($_POST['isIntermediary'])){
		$url_pra2=$_POST['isIntermediary'];
	}else{
		$url_pra2=$_GET['isIntermediary'];
	}
	$userWanted->release ( $_POST );
	if($_POST['isIntermediary']==1){
		//前往经纪人委托页
		$html->gotoUrl ( 'user_wanted_choose.php?wType='.$url_pra.'&isIntermediary='.$url_pra2);
	}else{
		$html->gotoUrl ( 'user_wanted_manage.php?wType='.$url_pra.'&isIntermediary='.$url_pra2, "发布成功" );
	}
	break;
	case 'modify':
		$userWanted->modify($_POST);
		$html->gotoUrl('user_wanted_manage.php?wType='.$_POST['wType'].'&isIntermediary='.$_POST['isIntermediary'],'修改成功');
	break;
	case 'delete':
		$id=$_GET['id'];
		$userWanted->delUserWantedById($id);
		$html->gotoUrl('user_wanted_manage.php?wType='.$_GET['wType'].'&isIntermediary='.$_GET['isIntermediary'],'删除成功');
	break;
}





?>