<?php
/**
 * 
 * 走势图 类别 类别 
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-09
 */
class TrendCategoryDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//走势图 类别
	public function release($trendCategory){
		$sql="insert into ecms_trend_category(name) values('"
										.(empty($trendCategory['name'])?'':$trendCategory['name'])
											."')";
			return $this->db->getQueryExecute($sql);						
	}
	//修改走势图 类别
	public function modify($trendCategory){
		$sql="update ecms_trend_category set name='"
			.(empty($trendCategory['name'])?'':$trendCategory['name'])
			."' where id=".$trendCategory['id'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除走势图 类别
	public function delTrendCategoryById($id){
		$sql="delete from  ecms_trend_category where id=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取走势图 类别
	 * @param $id
	 * @return val
	 */
	public function getTrendCategoryById($id) {
		$sql="select * from ecms_trend_category where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取走势图 类别列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getTrendCategoryList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_trend_category $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//计算走势数据条数
	public function countTrendCategory($where = ''){
		$sql="select count(*) as counts from ecms_trend_category $where";
		return $this->db->getQueryValue($sql);
	}
	

}


?>