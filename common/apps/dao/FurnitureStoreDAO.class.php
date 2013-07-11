<?php
/**
 * 
 * 家居卖场
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-15
 */
class FurnitureStoreDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布家居卖场
	public function release($ad){
		$sql="insert into ecms_furniture_store(name,logo,address,phone,businessTime,orderNum,state,updateTime) values("
										."'".(empty($ad['name'])?'':$ad['name'])
										."','".(empty($ad['logo'])?'':$ad['logo'])
										."','".(empty($ad['address'])?'':$ad['address'])
										."','".(empty($ad['phone'])?'':$ad['phone'])
										."','".(empty($ad['businessTime'])?'':$ad['businessTime'])
										."',".(empty($ad['orderNum'])?0:$ad['orderNum'])
										.",".(empty($ad['state'])?0:$ad['state'])
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改家居卖场
	public function modify($ad){
		$sql="update ecms_furniture_store set name='"
			.(empty($ad['name'])?'':$ad['name'])
			."',logo='".(empty($ad['logo'])?'':$ad['logo'])
			."',address='".(empty($ad['address'])?'':$ad['address'])
			."',phone='".(empty($ad['phone'])?'':$ad['phone'])
			."',businessTime='".(empty($ad['businessTime'])?'':$ad['businessTime'])
			."',orderNum=".(empty($ad['orderNum'])?0:$ad['orderNum'])
			.",state=".(empty($ad['state'])?0:$ad['state'])
			.",updateTime=".time()
			." where id=".$ad['id'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除家居卖场
	public function delFurnitureStoreById($id){
		$sql="delete from  ecms_furniture_store where id=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取家居卖场
	 * @param string $where 
	 * @return array
	 */
	public function getFurnitureStoreById($id) {
		$sql="select * from ecms_furniture_store where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取家居卖场列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getFurnitureStoreList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_furniture_store $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改家居卖场
	 * @param string $state 状态
	 * @param string $adId	主键
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_furniture_store set adState=$state,updateTime=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	//计算家居卖场条数
	public function countFurnitureStore($where = ''){
		$sql="select count(*) as counts from ecms_furniture_store $where";
		return $this->db->getQueryValue($sql);
	}

}


?>