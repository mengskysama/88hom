<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='��Ƹ��Ϣ�޸�';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('rmModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=1;
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('��������');
}
$rmService=new RecruitmentService($db);
$rmDetail=$rmService->getRmDetailById($id,'admin');
if(empty($rmDetail)){
	$html->backUrl('û���ҵ�����Ϣ��');
}else{
	$rmDetail['persons']=htmlspecialchars($rmDetail['persons'], ENT_QUOTES, 'ISO-8859-1', true);
	$rmDetail['expired_time']=ceil(($rmDetail['expired_time']-time())/86400);
}
$rmTypeList=$rmService->getRmTypeListByCache($fid);
$FCKeditor=createCKeditor('content',1,700,250,$rmDetail['text_content']);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('rmTypeList',$rmTypeList);
$smarty->assign('rmDetail',$rmDetail);
$html->show();
$smarty->display($tpl_name);
?>