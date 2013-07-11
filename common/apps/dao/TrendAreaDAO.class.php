<?php
/**
 * 
 * 走势图区域或项目
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-10
 */
class TrendAreaDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//添加走势图区域或项目
	public function release($trendArea){
		$sql="insert into ecms_trend_area(name) values('"
										.(empty($trendArea['name'])?'':$trendArea['name'])
											."')";
			return $this->db->getQueryExecute($sql);						
	}
	//修改走势图区域或项目
	public function modify($trendArea){
		$sql="update ecms_trend_area set name='"
			.(empty($trendArea['name'])?'':$trendArea['name'])
			."' where id=".$trendArea['id'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除走势图区域或项目
	public function delTrendAreaById($id){
		$sql="delete from  ecms_trend_area where id=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取走势图区域或项目
	 * @param $id
	 * @return val
	 */
	public function getTrendAreaById($id) {
		$sql="select * from ecms_trend_area where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取走势图区域或项目列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getTrendAreaList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_trend_area $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//计算走势数据条数
	public function countTrendArea($where = ''){
		$sql="select count(*) as counts from ecms_trend_area $where";
		return $this->db->getQueryValue($sql);
	}
}


?>