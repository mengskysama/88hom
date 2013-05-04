<?php
require 'path.inc.php';
$tpl_name=$tpl_dir.'modify.tpl';
$html->title='信息修改';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$permissionsState=sysPermissionsChecking('newsModify');
if(!$permissionsState)$tpl_name='admin/error.tpl';
$fid=0;
if(isset($_GET['id'])&&!empty($_GET['id'])){
	$id=$_GET['id'];
}else{
	$html->backUrl('参数错误！');
}
$type=1;
$infoService=new InfoService($db);
$infoDetail=$infoService->getInfoDetailByInfoId($id,'admin');
if(empty($infoDetail)){
	$html->backUrl('没有找到该信息！');
}else{
	$infoDetail['title']=htmlspecialchars($infoDetail['title'], ENT_QUOTES, 'ISO-8859-1', true);
	$infoDetail['key_word']=htmlspecialchars($infoDetail['key_word'], ENT_QUOTES, 'ISO-8859-1', true);
}
$infoTypeDetail=$infoService->getInfoTypeDetailById($infoDetail['type_id']);
if($infoTypeDetail['type_father_id']==$fid){
	$spanType='<span id="span_typeId" style="display: none;"><a id="a_typeId" href="">返回上一级类别</a></span>';
}else{
	$spanType='<span id="span_typeId" style="display: block;"><a id="a_typeId" href="javascript:exeAdminBackInfoType('.$infoTypeDetail['type_father_id'].');">返回上一级类别</a></span>';
}
$infoTypeList=$infoService->getInfoTypeListByCache($fid,$type);
$infoTypeSelectList=$infoService->getInfoTypeListByCache($infoTypeDetail['type_father_id'],$type);
$FCKeditorMin=createCKeditor('contentMin',0,700,150,$infoDetail['text_content_min']);
$FCKeditor=createCKeditor('content',1,700,250,$infoDetail['text_content']);

$infoPicList=$infoService->getInfoPicListByInfoId($id);
$pictureIndex=count($infoPicList);

$timestamp=time();
$token=md5('unique_salt' . $timestamp);

$smarty->assign('timestamp',$timestamp);
$smarty->assign('token',$token);
$smarty->assign('FCKeditor',$FCKeditor);
$smarty->assign('FCKeditorMin',$FCKeditorMin);
$smarty->assign('spanType',$spanType);
$smarty->assign('infoTypeList',$infoTypeList);
$smarty->assign('infoDetail',$infoDetail);
$smarty->assign('infoTypeSelectList',$infoTypeSelectList);
$smarty->assign('infoPicList',$infoPicList);
$smarty->assign('pictureIndex',$pictureIndex);
$html->show();
$smarty->display($tpl_name);
?>