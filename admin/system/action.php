<?php
require 'path.inc.php';
$userService=new UserService($db);
$userService->checkAdminUserExpired();
$Admin_User=$_SESSION['Admin_User'];
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$linkService=new LinkService($db);
switch ($action){
	case 'linkRelease':
		$permissionsState=sysPermissionsChecking('link');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$linkService->release($_POST);
		if($result===true){
			$html->replaceUrl('link.php','发布成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'linkModify':
		$permissionsState=sysPermissionsChecking('link');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$linkService->saveLink($_POST);
		if($result===true){
			$html->replaceUrl('link.php','修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'linkDelById':
		$permissionsState=sysPermissionsChecking('link');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$linkService->delLinkById($_GET['id']);
			if($result===true){
				$html->replaceUrl('link.php','删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'linkDel':
		$permissionsState=sysPermissionsChecking('link');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$linkService->delLink($_POST['chk']);
			if($result===true){
				$html->replaceUrl('link.php','删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要删除的友情链接！');
		}
	break;
	case 'linkChangeState':
		$permissionsState=sysPermissionsChecking('link');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$linkService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('link.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'linkOrder':
		$permissionsState=sysPermissionsChecking('link');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['layer'])&&!empty($_POST['layer'])){
			$result=$linkService->orderLink($_POST['layer']);
			if($result===true){
				$html->replaceUrl('link.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('');
		}
	break;
	case 'link2Release':
		$permissionsState=sysPermissionsChecking('link2');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$linkService->release($_POST);
		if($result===true){
			$html->replaceUrl('link2.php','发布成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'link2Modify':
		$permissionsState=sysPermissionsChecking('link2');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$linkService->saveLink($_POST);
		if($result===true){
			$html->replaceUrl('link.php','修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'link2DelById':
		$permissionsState=sysPermissionsChecking('link2');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$linkService->delLinkById($_GET['id']);
			if($result===true){
				$html->replaceUrl('link2.php','删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'link2Del':
		$permissionsState=sysPermissionsChecking('link2');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['chk'])&&!empty($_POST['chk'])){
			$result=$linkService->delLink($_POST['chk']);
			if($result===true){
				$html->replaceUrl('link2.php','删除成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('请选择中要删除的合作客户！');
		}
	break;
	case 'link2ChangeState':
		$permissionsState=sysPermissionsChecking('link2');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['state'])&&$_GET['state']!=''&&isset($_GET['id'])&&!empty($_GET['id'])){
			$result=$linkService->changeState($_GET['state'],$_GET['id']);
			if($result===true){
				$html->replaceUrl('link2.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('参数错误');
		}
	break;
	case 'link2Order':
		$permissionsState=sysPermissionsChecking('link2');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['layer'])&&!empty($_POST['layer'])){
			$result=$linkService->orderLink($_POST['layer']);
			if($result===true){
				$html->replaceUrl('link2.php');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('');
		}
	break;
	case 'groupRelease':
		$permissionsState=sysPermissionsChecking('group');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$userService->releaseGroup($_POST);
		if($result===true){
			$html->replaceUrl('group.php','发布管理组别成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'groupModify':
		$permissionsState=sysPermissionsChecking('group');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$result=$userService->saveGroup($_POST);
		if($result===true){
			$html->replaceUrl('group.php','管理组别修改成功！');
		}else{
			$html->backUrl($result);
		}
	break;
	case 'groupPermissionsRelease':
		$permissionsState=sysPermissionsChecking('group');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['gid'])&&!empty($_POST['gid'])){
			$group=empty($_POST['admin'])?'':$_POST['admin'];
			$userService->releaseGroupPermissions($group,$_POST['gid']);
			$html->backUrl('修改成功');
		}else{
			$html->backUrl('缺少参数');
		}
	break;
	case 'systemUserRelease':
		$permissionsState=sysPermissionsChecking('user');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST)&&!empty($_POST)){
			$result=$userService->releaseSystemUser($_POST);
			if($result===true){
				$html->replaceUrl('systemUser.php','添加用户成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('缺少type参数');
		}
	break;
	case 'systemUserPermissionsRelease':
		$permissionsState=sysPermissionsChecking('user');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST['id'])&&!empty($_POST['id'])){
			$user=empty($_POST['admin'])?'':$_POST['admin'];
			$userService->releaseSystemUserPermissions($user,$_POST['id']);
			$html->backUrl('修改成功');
		}else{
			$html->backUrl('缺少参数');
		}
	break;
	case 'websetRelease':
		$permissionsState=sysPermissionsChecking('webset');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST)&&!empty($_POST)){
			$result=$userService->saveWebSet($_POST['webset']);
			if($result===true){
				$html->replaceUrl('webset.php','修改网站配置成功！');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('缺少post参数');
		}
	break;
	case 'editpwd':
		$permissionsState=sysPermissionsChecking('editpwd');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_POST)&&!empty($_POST)){
			$pwdOld=$_POST['pwdOld'];
			$pwdNew=sysAuth($_POST['pwdNew']);
			if(sysAuth($Admin_User['passwd'],'DECODE')==$pwdOld){
				$result=$userService->editpwd($Admin_User['user_id'], $pwdNew);
				if($result===true){
					$Admin_User['passwd']=$pwdNew;
					$_SESSION['Admin_User']=$Admin_User;
					$html->replaceUrl('editpwd.php','修改密码成功！');
				}else{
					$html->backUrl($result);
				}
			}else{
				$html->backUrl('原始 密码错误！');
			}
		}else{
			$html->backUrl('缺少post参数');
		}
	break;
	case 'outlinkRelease':
		$permissionsState=sysPermissionsChecking('outlink');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$file=ECMS_PATH_OUTLINK.'outlink.txt';
		$fp=fopen($file,"a");
		if($fp==false){
			fclose($fp);
			$html->backUrl('文件'.$file.'被禁止创建或写入！...');
		}else{
			fwrite($fp,$_POST['outlinkName'].$cfg ['line_tag']);
			fclose($fp);
			$html->replaceUrl('outlink.php?type=outLinkManage','外链地址添加成功！');
		}
	break;
	case 'outlinkSave':
		$permissionsState=sysPermissionsChecking('outlink');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$file=ECMS_PATH_OUTLINK.'outlink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$lines[$_POST['id']-1]=$_POST['outlinkName'].$cfg['line_tag'];
			$fp=fopen($file,"w+");
			if($fp==false){
				fclose($fp);
				$html->backUrl('文件'.$file.'被禁止创建或写入！...');
			}else{
				for($i=0;$i<$total;$i++){
					fwrite($fp,$lines[$i]);
				}
				fclose($fp);
				$html->replaceUrl('outlink.php?type=outLinkManage','外链地址修改成功！');
			}
		}else{
			$html->backUrl('外链地址修改失败！');
		}
	break;
	case 'outlinkDel':
		$permissionsState=sysPermissionsChecking('outlink');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$file=ECMS_PATH_OUTLINK.'outlink.txt';
			if(is_file($file)){
				$lines=file($file);
				$total=count($lines);
				$fp=fopen($file,"w+");
				if($fp==false){
					fclose($fp);
					$html->backUrl('文件'.$file.'被禁止创建或写入！...');
				}else{
					for($i=0;$i<$total;$i++){
						if($i!=($_GET['id']-1)){
							fwrite($fp,$lines[$i]);
						}
					}
					fclose($fp);
					$html->replaceUrl('outlink.php?type=outLinkManage','外链地址删除成功！');
				}
			}else{
				$html->backUrl('外链地址删除失败！');
			}
		}else{
			$html->backUrl('外链地址删除缺少参数！');
		}
	break;
	case 'exelinkRelease':
		$permissionsState=sysPermissionsChecking('outlink');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$file=ECMS_PATH_OUTLINK.'exelink.txt';
		$fp=fopen($file,"a");
		if($fp==false){
			fclose($fp);
			$html->backUrl('文件'.$file.'被禁止创建或写入！...');
		}else{
			fwrite($fp,$_POST['exelinkName'].$cfg ['line_tag']);
			fclose($fp);
			$html->replaceUrl('outlink.php?type=exeLinkManage','执行地址添加成功！');
		}
	break;
	case 'exelinkSave':
		$permissionsState=sysPermissionsChecking('outlink');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$file=ECMS_PATH_OUTLINK.'exelink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$lines[$_POST['id']-1]=$_POST['exelinkName'].$cfg['line_tag'];
			$fp=fopen($file,"w+");
			if($fp==false){
				fclose($fp);
				$html->backUrl('文件'.$file.'被禁止创建或写入！...');
			}else{
				for($i=0;$i<$total;$i++){
					fwrite($fp,$lines[$i]);
				}
				fclose($fp);
				$html->replaceUrl('outlink.php?type=exeLinkManage','执行地址修改成功！');
			}
		}else{
			$html->backUrl('执行地址修改失败！');
		}
	break;
	case 'exelinkDel':
		$permissionsState=sysPermissionsChecking('outlink');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			$file=ECMS_PATH_OUTLINK.'exelink.txt';
			if(is_file($file)){
				$lines=file($file);
				$total=count($lines);
				$fp=fopen($file,"w+");
				if($fp==false){
					fclose($fp);
					$html->backUrl('文件'.$file.'被禁止创建或写入！...');
				}else{
					for($i=0;$i<$total;$i++){
						if($i!=($_GET['id']-1)){
							fwrite($fp,$lines[$i]);
						}
					}
					fclose($fp);
					$html->replaceUrl('outlink.php?type=exeLinkManage','执行地址删除成功！');
				}
			}else{
				$html->backUrl('执行地址删除失败！');
			}
		}else{
			$html->backUrl('执行地址删除缺少参数！');
		}
	break;
	case 'outlinkExeByUrl':
		$permissionsState=sysPermissionsChecking('outlink');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		if(isset($_GET['id'])){
			$id=$_GET['id'];
		}
		if(isset($_GET['url'])){
			$url=$_GET['url'];
		}
		$result=array();
		$file=ECMS_PATH_OUTLINK.'outlink.txt';
		if(is_file($file)){
			$lines=file($file);
			$total=count($lines);
			$curl=curl_init();
			curl_setopt($curl,CURLOPT_USERAGENT,$cfg['web_useragent']);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($curl,CURLOPT_HEADER,false);
			curl_setopt($curl,CURLOPT_NOBODY,true);
			curl_setopt($curl,CURLOPT_TIMEOUT,5); 
			if($id>$total){
				$msg='失败';
			}else{
				$curl_url=$lines[$id-1];
				$curl_url=str_replace('***',$url,$curl_url);
				$curl_url=trim($curl_url);
				curl_setopt($curl,CURLOPT_URL,$curl_url);
				$output=curl_exec($curl);
				$info=curl_getinfo($curl);
				if($info['http_code'] === 200){
					$msg='成功';
				}else{
					$msg='失败';
				}
			}
			curl_close($curl); 
		}
		$result['id']=$id;
		$result['msg']=iconv("GBK", "UTF-8", $msg);
		$json_str=json_encode($result);
		echo $json_str;
	break;
	case 'outlinkExeByList':
		
	break;
	case 'sitemap':
		$permissionsState=sysPermissionsChecking('sitemap');
		if(!$permissionsState)$html->backUrl('您没有权限进行此项操作！');
		$arrAll=array($cfg['web_url']);
		$arrNew=array();
		$arrNew_=array($cfg['web_url']);
		$arrExcept=array('http://','javascript','#','mailto:');
		function getSiteMap($arrNew_){
			global $arrNew,$arrAll,$arrExcept;
			$useragent='LiuMang+Mozilla/5.0 (Windows NT 5.1; rv:7.0.1) Gecko/20100101 Firefox/7.0.1';
			for($i=0;$i<count($arrNew_);$i++){
				$arrNew=array();
				$arrNew_New=array();
				$curl_url=$arrNew_[$i];
				$curl=curl_init();
				curl_setopt($curl,CURLOPT_USERAGENT,$useragent);
				curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl,CURLOPT_HEADER,false);
				curl_setopt($curl,CURLOPT_NOBODY,false);
				curl_setopt($curl,CURLOPT_TIMEOUT,30); 
				curl_setopt($curl,CURLOPT_URL,$curl_url);
				$output=curl_exec($curl);
				$reg='#<a.+?href="(.+?)".*?>(.+?)</a>#';
				$matches=array();
				preg_match_all($reg,$output,$matches);
				$arrUrl=$matches[1];
				$arrUrl=array_unique($arrUrl);
				$arrUrl=array_splice($arrUrl,0);
				array_walk_recursive($arrUrl, 'arrayShow');
				$arrNew_New=array_diff($arrNew, $arrAll);
				$arrNew_New=array_splice($arrNew_New, 0);
				for($j=0;$j<count($arrNew);$j++){
					$arrAll[]=$arrNew[$j];
				}
				$arrAll=array_unique($arrAll);
				$arrAll=array_splice($arrAll, 0);
				curl_close($curl); 	
				getSiteMap($arrNew_New);
			}
			return $arrAll;
		}
		function arrayShow($value,$key){
			global $arrNew,$cfg;
			if(substr_count($value, $cfg['web_url'])){
				$arrNew[]=$value;
			}
		}
		$arr=getSiteMap($arrNew_);
		$file=ECMS_PATH_SITEMAP.'sitemap.txt';
		$fp=fopen($file,"a");
		if($fp==false){
			fclose($fp);
			$html->backUrl('文件'.$file.'被禁止创建或写入！...');
		}else{
			for($i=0;$i<count($arr);$i++){
				fwrite($fp,$arr[$i].$cfg ['line_tag']);
			}
			fclose($fp);
			$html->replaceUrl('sitemap.php','执行地址添加成功！');
		}
	break;
}
?>