<?php
/**
 * 
 * 团购信息
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-09
 */
class TgDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布一条团购信息
	public function release($tg){
		$sql="insert into ecms_tg(tgUserName,tgGender,tgPhone,tgMail,tgContent,tgIsSee,tgIsBuy,tgPropertyId,tgState,tgCreateTime,tgUpdateTime) 
			  values('".(empty($tg['tgUserName'])?'':$tg['tgUserName'])."',
			  ".(empty($tg['tgGender'])?0:$tg['tgGender']).",
			  '".(empty($tg['tgPhone'])?'':$tg['tgPhone'])."',
			  '".(empty($tg['tgMail'])?'':$tg['tgMail'])."',
			  '".(empty($tg['tgContent'])?'':$tg['tgContent'])."',
			  ".(empty($tg['tgIsSee'])?0:$tg['tgIsSee']).",
			  ".(empty($tg['tgIsBuy'])?0:$tg['tgIsBuy']).",
			  ".(empty($tg['tgPropertyId'])?0:$tg['tgPropertyId']).",
			  ".(empty($tg['tgState'])?0:$tg['tgState']).",
			  ".time().",
			  ".time().")";
		return $this->db->getQueryExecute($sql);				
	}
	//改变团购信息的审核状态
	public function changeState($state,$id){
		$sql="update ecms_tg set tgState=$state,tgUpdateTime=".time()." where tgId=$id";
		return $this->db->getQueryExecute($sql);
	}
	//删除团购信息
	public function delTgById($id){
		$sql="delete from  ecms_tg where tgId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	//获取团购信息列表
	public function getTgList($field='*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_tg  
			  $where 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countTgList($where){
		$sql="SELECT COUNT(*) AS counts FROM ecms_tg 
			  $where";
		return $this->db->getQueryValue($sql);
	}
	//获取团购信息列表按楼盘分
	public function getPropertyListForTg($field='*',$where='',$group='',$order='',$limit=''){
		$sql="SELECT $field,SUM(1) AS tgCount FROM ecms_property 
			  INNER JOIN ecms_tg ON propertyId=tgPropertyId
			  $where 
			  $group 
			  $order 
			  $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countPropertyListForTg($where){
		$sql="SELECT COUNT(*) AS counts FROM (SELECT * FROM ecms_property 
			  INNER JOIN ecms_tg ON propertyId=tgPropertyId
			  GROUP BY propertyId) AS tb_new  
			  $where";
		return $this->db->getQueryValue($sql);
	}
}
?>