<?php
require 'path.inc.php';
if(isset($_GET['action'])&&!empty($_GET['action'])){
	$action=$_GET['action'];
}else{
	$html->backUrl('请求出错,没有请求 参数action！');
}
$infoService=new InfoService($db);
switch ($action){
	case 'ajaxDivPage':
		$fileName='index';
		$divPage=sysPageInfo($_GET['total'],$_GET['pageSize'],$_GET['pageIndex'],$fileName,'');
		$divPage=iconv('GBK', 'UTF-8', $divPage);
		echo $divPage;
	break;
	case 'mediaLogin':
		if(isset($_SESSION['codeweb']) && isset($_POST['valideCode']) && $_SESSION['codeweb']==strtolower($_POST['valideCode'])){
			$userService=new UserService($db);
			$result=$userService->loginWebUser($_POST);
			if($result===true){
				$html->replaceUrl('mediaList.htm');
			}else{
				$html->backUrl($result);
			}
		}else{
			$html->backUrl('验证码错误！');
		}
	break;
	case 'mediaDownload':
		if(isset($_GET['id'])&&isset($_GET['fileName'])&&isset($_GET['filePath'])){
			$fileName=$_GET['fileName'];
			$filePath=ECMS_PATH_UPLOADS.$_GET['filePath'];
			if (!file_exists($filePath)) { //检查文件是否存在 
				echo '文件找不到！';
				exit;
			} else { 
				$mediaService=new MediaService($db);
				$mediaService->clickCount($_GET['id']);
				$file = fopen($filePath,"r"); // 打开文件 
				// 输入文件标签 
				Header("Content-type: application/octet-stream"); 
				Header("Accept-Ranges: bytes"); 
				Header("Accept-Length: ".filesize($filePath)); 
				Header("Content-Disposition: attachment; filename=".$fileName); 
				// 输出文件内容 
				echo fread($file,filesize($filePath)); 
				fclose($file); 
				exit;
			} 
		}else{
			$html->backUrl('参数错误');
		}
	break;
}
?>