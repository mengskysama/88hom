<?php
/**
 * 
 * 团购信息
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-09
 */
class TgService{
	private $db=null;
	private $tgDAO = null;

	public function __construct($db){
		$this->db=$db;
		$this->tgDAO = new TgDAO($db);
	}
	//发布一条团购信息
	public function release($tg){
		$msg=true;
		$result=$this->tgDAO->release($tg);
		if($result<0)$msg='报名团购失败！';
		return $msg;
	}
	//改变团购信息的审核状态
	public function changeState($state,$id){
		$msg=true;
		$result=$this->tgDAO->changeState($state,$id);
		if($result<0)$msg='审核状态更改失败！';
		return $msg;
	}
	//删除团购信息
	public function delTgById($id){
		$msg=true;
		$result=$this->tgDAO->delTgById($id);
		if($result<0)$msg='信息删除失败！';
		return $msg;
	}
	//批量删除团购信息
	public function delTgByIds($ids){
		$msg=true;
		foreach($ids as $key=>$id){
			$result=$this->tgDAO->delTgById($id);
			if($result<0){
				$msg='信息删除失败！';
				break;
			}
		}
		return $msg;
	}
	//获取团购信息列表
	public function getTgList($field='*',$where='',$order='',$limit=''){
		return $this->tgDAO->getTgList($field,$where,$order,$limit);
	}
	public function countTgList($where){
		return $this->tgDAO->countTgList($where);
	}
	//获取团购信息列表按楼盘分
	public function getPropertyListForTg($field='*',$where='',$group='',$order='',$limit=''){
		require_once ECMS_PATH_ROOT.'includes/area.inc.php';
		$result=null;
		$result=$this->tgDAO->getPropertyListForTg($field,$where,$group,$order,$limit);
		if(!empty($result)){
			for($i=0;$i<count($result);$i++){
				$result[$i]['propertyAreaName']=$C[$result[$i]['propertyProvince']][$result[$i]['propertyCity']].'-'.$D[$result[$i]['propertyProvince']][$result[$i]['propertyCity']][$result[$i]['propertyDistrict']];
			}
		}
		return $result;
	}
	public function countPropertyListForTg($where){
		return $this->tgDAO->countPropertyListForTg($where);
	}
}
?>