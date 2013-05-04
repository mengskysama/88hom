<?php
/**
 * 信息管理业务操作类
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class ShopService{
	private $db=null;
	private $shopDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->shopDAO=new ShopDAO($db);
		$this->linkService=new LinkService($db);
	}
	/**
	 * 发布信息
	 * @param array $info 信息对象 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$result=$this->shopDAO->release($info);
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
		$result=$this->shopDAO->save($info);
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
		$result=$this->shopDAO->delInfo($id);
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
	public function getInfoDetail($id,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_shop where id=$id and state=1 and lang='".LANG."'";
		}else{
			$sql="select * from ecms_shop where id=$id and lang='".LANG."'";
		}
		return $this->shopDAO->getInfo($sql);
	}
	/**
	 * 获取信息列表
	 * @access public
	 * @return array
	 **/
	public function getInfoList($where='',$order='',$limit=''){
		$sql="SELECT s.*,a.name,a.fatherId FROM ecms_shop AS s INNER JOIN ecms_area AS a ON s.areaId=a.id $where $order $limit";
		return $this->shopDAO->getInfoList($sql);
	}
	
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($where=''){
		$sql="select count(*) as counts from ecms_shop as s inner join ecms_area as a on s.areaId=a.id $where";
		return $this->shopDAO->countInfo($sql);
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
		$result=$this->shopDAO->changeState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
}
?>