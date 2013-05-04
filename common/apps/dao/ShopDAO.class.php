<?php
/**
 * 店铺管理
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class ShopDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * 发布信息
	 * @param array $info 信息对象
	 * @return boolean
	 */
	public function release($info){
		$sql="insert into ecms_shop(shopId,shopName,shopTel,areaId,createTime,updateTime,lang) 
			  values('".$info['shopId']."','".(empty($info['shopName'])?'':$info['shopName'])."'
			  ,'".(empty($info['shopTel'])?'':$info['shopTel'])."'
			  ,".$info['areaId'].",'".time()."','".time()."','".LANG."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改信息
	 * @param array $info
	 * @return boolean
	 **/
	public function save($info){
		$sql="update ecms_shop set shopId='".$info['shopId']."',shopName='".(empty($info['shopName'])?'':$info['shopName'])."',
			  shopTel='".(empty($info['shopTel'])?'':$info['shopTel'])."',
			  areaId=".$info['areaId'].",updateTime=".time()." 
			  where id=".$info['id']." and lang='".LANG."'";
		return $this->db->getQueryExeCute($sql);
	}
	/**
	 * 删除信息
	 * @param int $id 信息ID
	 * @return boolean
	 **/
	public function delInfo($id){
		$sql="delete from ecms_shop where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取信息详情
	 * @param public
	 * @return array
	 */
	public function getInfo($sql) {
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取信息列表
	 * @access public
	 * @return array
	 */
	public function getInfoList($sql){
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 计算信息条数
	 * @param public
	 * @return int
	 */
	public function countInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 修改信息状态
	 * @param string $state 状态
	 * @param string $id	主键
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_shop set state=$state,updateTime=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>