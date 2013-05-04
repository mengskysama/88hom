<?php
/**
 * 信息管理业务操作类
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class StatementsService{
	private $db=null;
	private $statementDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->statementDAO=new StatementsDAO($db);
		$this->linkService=new LinkService($db);
	}
	/**
	 * 发布信息
	 * @param array $info 信息对象 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$result=$this->statementDAO->release($info);
		if($result<0) $msg='发布信息失败！';
		return $msg;
	}
	/**
	 * 修改信息
	 * @param array $info 信息对象 
	 * @return boolean
	 **/
	public function save($info){
		$msg=true;
		$result=$this->statementDAO->save($info);
		if($result<0)throw new Exception('信息修改失败！');
		return $msg;
	}
	/**
	 * 根据信息ID删除信息
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delInfo($id){
		$msg=true;
		$result=$this->statementDAO->delInfo($id);
		if($result<0)$msg='信息删除失败！';
		return $msg;
	}
	/**
	 * 根据信息ID获取信息详情
	 * @access public
	 * @param int $id 信息ID
	 * @param string $type 'web/admin'
	 * @return Array
	 **/
	public function getInfoDetail($where){
		$sql="SELECT s.*,sp.shopId as shopStrId,sp.shopName,sp.shopTel,sp.areaId as shopAreaId,
			  p.propertyId as propertyStrId,p.propertyName,p.propertyAddress,p.areaId as propertyAreaId,
			  a.name,a.fatherId 
			  FROM ecms_statements AS s 
			  INNER JOIN ecms_shop AS sp ON s.shopId=sp.id 
			  inner join ecms_property as p on s.propertyId=p.id 
			  inner join ecms_area as a on sp.areaId=a.id
			  $where";
		return $this->statementDAO->getInfo($sql);
	}
	/**
	 * 获取信息列表
	 * @access public
	 * @return array
	 **/
	public function getInfoList($where='',$order='',$limit=''){
		$sql="SELECT s.*,sp.shopId as shopStrId,sp.shopName,sp.shopTel,
			  p.propertyId as propertyStrId,p.propertyName,p.propertyAddress,
			  a.name,a.fatherId 
			  FROM ecms_statements AS s 
			  INNER JOIN ecms_shop AS sp ON s.shopId=sp.id 
			  inner join ecms_property as p on s.propertyId=p.id 
			  inner join ecms_area as a on sp.areaId=a.id
			  $where $order $limit";
		return $this->statementDAO->getInfoList($sql);
	}
	
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($where=''){
		$sql="select count(*) as counts 
			  from ecms_statements as s 
			  inner join ecms_shop as sp on s.shopId=sp.id 
			  inner join ecms_property as p on s.propertyId=p.id 
			  inner join ecms_area as a on sp.areaId=a.id
			  $where";
		return $this->statementDAO->countInfo($sql);
	}
	/**
	 * 根据产品ID更改信息状态
	 * @access public
	 * @param string $state 状态
	 * @param string $id
	 * @return bool
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->statementDAO->changeState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
}
?>