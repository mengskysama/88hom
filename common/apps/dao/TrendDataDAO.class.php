<?php
/**
 * 
 * 走势数据
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-06
 */
class TrendDataDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//走势数据
	public function release($trendData){
		$sql="insert into ecms_trend_data(city,areaId,year,month,type,subType,price,memo) values('"
										.(empty($trendData['city'])?'':$trendData['city'])
										."',".(empty($trendData['areaId'])?0:$trendData['areaId'])
										.",".(empty($trendData['year'])?0:$trendData['year'])
										.",".(empty($trendData['month'])?0:$trendData['month'])
										.",'".(empty($trendData['type'])?'':$trendData['type'])
										."','".(empty($trendData['subType'])?'':$trendData['subType'])
										."','".(empty($trendData['price'])?'':$trendData['price'])
										."','".(empty($trendData['memo'])?'':$trendData['memo'])
										."')";
			return $this->db->getQueryExecute($sql);					
	}
	//修改走势数据
	public function modify($trendData){
		$sql="update ecms_trend_data set city='"
			.(empty($trendData['city'])?'':$trendData['city'])
			."',areaId=".(empty($trendData['areaId'])?'':$trendData['areaId'])
			.",year=".(empty($trendData['year'])?0:$trendData['year'])
			.",month=".(empty($trendData['month'])?0:$trendData['month'])
			.",type='".(empty($trendData['type'])?'':$trendData['type'])
			."',subType='".(empty($trendData['subType'])?'':$trendData['subType'])
			."',price='".(empty($trendData['price'])?'':$trendData['price'])
			."',memo='".(empty($trendData['memo'])?'':$trendData['memo'])
			."' where id=".$trendData['id'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除走势数据
	public function delTrendDataById($id){
		$sql="delete from  ecms_trend_data where id=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取走势数据
	 * @param $id
	 * @return val
	 */
	public function getTrendDataById($id) {
		$sql="select * from ecms_trend_data where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取走势数据列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getTrendDataList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_trend_data $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//计算走势数据条数
	public function countTrendData($where = ''){
		$sql="select count(*) as counts from ecms_trend_data $where";
		return $this->db->getQueryValue($sql);
	}

}


?>