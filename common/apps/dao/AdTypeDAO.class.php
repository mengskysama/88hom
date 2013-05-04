<?php
/**
 * 
 * 广告类别
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-11
 */
class AdTypeDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布广告类别
	public function release($AdType){
		$sql="insert into ecms_ad_type(adtypeName,adtypeKey,adtypeState,adtypeCreateTime,adtypeUpdateTime) values('"
										.(empty($AdType['adtypeName'])?'':$AdType['adtypeName'])
										."','".(empty($AdType['adtypeKey'])?'':$AdType['adtypeKey'])
										."',".(empty($AdType['adtypeState'])?-1:$AdType['adtypeState'])
										.",".time()
										.",".time()
										.")";
										
			return $this->db->getQueryExecute($sql);	
	}
	//修改广告类别
	public function modify($AdType){
		$sql="update ecms_ad_type set adtypeName='"
			.(empty($AdType['adtypeName'])?'':$AdType['adtypeName'])
			."',adtypeKey='".(empty($AdType['adtypeKey'])?'':$AdType['adtypeKey'])
			."',adtypeState=".(empty($AdType['adtypeState'])?-1:$AdType['adtypeState'])
			.",adtypeUpdateTime=".time()
			." where adtypeId=".$AdType['adtypeId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除广告类别
	public function delAdTypeById($id){
		$sql="delete from  ecms_ad_type where adtypeId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取广告类别
	 * @param string $where 
	 * @return array
	 */
	public function getAdTypeById($id) {
		$sql="select * from ecms_ad_type where adtypeId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取广告类别列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getAdTypeList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_ad_type $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改广告类别
	 * @param string $state 状态
	 * @param string $adtypeId	主键
	 * @return boolean
	 */
	public function changeState($state,$adtypeId){
		$sql="update ecms_ad_type set adtypeState=$state,adtypeUpdateTime=".time()." where adtypeId=$adtypeId";
		return $this->db->getQueryExecute($sql);
	}
	//计算广告类别条数
	public function countAdType($where = ''){
		$sql="select count(*) as counts from ecms_ad_type $where";
		return $this->db->getQueryValue($sql);
	}

}


?>