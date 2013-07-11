<?php
/**
 * 
 * 走势图 
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-10
 */
class TrendChartDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//走势图
	public function release($trendChart){
		$sql="insert into ecms_trend_chart(title,categoryId,areaId,city,orderNum,type,subType,XFromYear,XFromMonth,XToYear,XToMonth,
											XToToday,XStep,XRotate,YFrom,YTo,YStep,width,height,lineColor,state,updateTime) values('"
										.(empty($trendChart['title'])?'':$trendChart['title'])
										."',".(empty($trendChart['categoryId'])?'':$trendChart['categoryId'])
										.",".(empty($trendChart['areaId'])?0:$trendChart['areaId'])
										.",'".(empty($trendChart['city'])?'':$trendChart['city'])
										."',".(empty($trendChart['orderNum'])?'':$trendChart['orderNum'])
										.",'".(empty($trendChart['type'])?'':$trendChart['type'])
										."','".(empty($trendChart['subType'])?'':$trendChart['subType'])
										."',".(empty($trendChart['XFromYear'])?0:$trendChart['XFromYear'])
										.",".(empty($trendChart['XFromMonth'])?0:$trendChart['XFromMonth'])
										.",".(empty($trendChart['XToYear'])?0:$trendChart['XToYear'])
										.",".(empty($trendChart['XToMonth'])?0:$trendChart['XToMonth'])
										.",".(empty($trendChart['XToToday'])?-1:$trendChart['XToToday'])
										.",".(empty($trendChart['XStep'])?0:$trendChart['XStep'])
										.",".(empty($trendChart['XRotate'])?0:$trendChart['XRotate'])
										.",".(empty($trendChart['YFrom'])?0:$trendChart['YFrom'])
										.",".(empty($trendChart['YTo'])?0:$trendChart['YTo'])
										.",".(empty($trendChart['YStep'])?0:$trendChart['YStep'])
										.",".(empty($trendChart['width'])?0:$trendChart['width'])
										.",".(empty($trendChart['height'])?0:$trendChart['height'])
										.",'".(empty($trendChart['lineColor'])?'':$trendChart['lineColor'])
										."',".(empty($trendChart['state'])?-1:$trendChart['state'])
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改走势图
	public function modify($trendChart){
		$sql="update ecms_trend_chart set title='"
			.(empty($trendChart['title'])?'':$trendChart['title'])
			."',categoryId=".(empty($trendChart['categoryId'])?0:$trendChart['categoryId'])
			.",areaId=".(empty($trendChart['areaId'])?0:$trendChart['areaId'])
			.",city='".(empty($trendChart['city'])?'':$trendChart['city'])
			."',orderNum=".(empty($trendChart['orderNum'])?0:$trendChart['orderNum'])
			.",type='".(empty($trendChart['type'])?'':$trendChart['type'])
			."',subType='".(empty($trendChart['subType'])?0:$trendChart['subType'])
			."',XFromYear=".(empty($trendChart['XFromYear'])?0:$trendChart['XFromYear'])
			.",XFromMonth=".(empty($trendChart['XFromMonth'])?0:$trendChart['XFromMonth'])
			.",XToYear=".(empty($trendChart['XToYear'])?0:$trendChart['XToYear'])
			.",XToMonth=".(empty($trendChart['XToMonth'])?0:$trendChart['XToMonth'])
			.",XToToday=".(empty($trendChart['XToToday'])?-1:$trendChart['XToToday'])
			.",XStep=".(empty($trendChart['XStep'])?0:$trendChart['XStep'])
			.",XRotate=".(empty($trendChart['XRotate'])?0:$trendChart['XRotate'])
			.",YFrom=".(empty($trendChart['YFrom'])?0:$trendChart['YFrom'])
			.",YTo=".(empty($trendChart['YTo'])?0:$trendChart['YTo'])
			.",YStep=".(empty($trendChart['YStep'])?0:$trendChart['YStep'])
			.",width=".(empty($trendChart['width'])?0:$trendChart['width'])
			.",height=".(empty($trendChart['height'])?0:$trendChart['height'])
			.",lineColor='".(empty($trendChart['lineColor'])?'':$trendChart['lineColor'])
			."',state=".(empty($trendChart['state'])?-1:$trendChart['state'])
			.",updateTime=".time()
			." where id=".$trendChart['id'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除走势图
	public function delTrendChartById($id){
		$sql="delete from  ecms_trend_chart where id=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取走势图
	 * @param $id
	 * @return val
	 */
	public function getTrendChartById($id) {
		$sql="select * from ecms_trend_chart where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取走势图列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getTrendChartList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_trend_chart $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	//计算走势图条数
	public function countTrendChart($where = ''){
		$sql="select count(*) as counts from ecms_trend_chart $where";
		return $this->db->getQueryValue($sql);
	}

}


?>