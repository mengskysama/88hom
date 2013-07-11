<?php 
/**
 * 
 * 趋势图服务类
 * @author Sam(semovy@gmail.com)
 * @since 2013-05-10
 */
class TrendService{
	private $db=null;
	private $trendChartDAO = null;
	private $trendCategoryDAO = null;
	private $trendAreaDAO = null;
	private $trendDataDAO = null; 
	public function __construct($db){
		$this->db=$db;
		$this->trendChartDAO = new TrendChartDAO($db);
		$this->trendCategoryDAO = new TrendCategoryDAO($db);
		$this->trendAreaDAO = new TrendAreaDAO($db);
		$this->trendDataDAO = new TrendDataDAO($db);
	}
	//获取走势数据
	public function getTrendDataList($where){
		$sql="select d.*,a.name as areaName from ecms_trend_data d join ecms_trend_area a on d.areaId=a.id $where";
		return $this->db->getQueryArray($sql);
	}
	//获取走势数据分页参数及过虑数据条件 $params 来自$_REQUEST
	public function getTrendDataPageListParam($params){
		$sql = '';
		$pageStr = '';
		if(isset($params['searchType']) && $params['searchType']!=''){
			//城市
			if(!empty($params['city'])){
				if($sql != '')
					$sql .= " and city='".$params['city']."'";
				else 
					$sql .= " city='".$params['city']."'";	
					
				if($pageStr != '')
					$pageStr .= "&city=".$params['city'];
				else 
					$pageStr .= "city=".$params['city'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&city=";
				else 
					$pageStr .= "city=";
			}
			//区域或项目
			if(!empty($params['areaId'])){
				if($sql != '')
					$sql .= " and areaId=".$params['areaId']."";
				else 
					$sql .= " areaId=".$params['areaId']."";	
					
				if($pageStr != '')
					$pageStr .= "&areaId=".$params['areaId'];
				else 
					$pageStr .= "areaId=".$params['areaId'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&areaId=";
				else 
					$pageStr .= "areaId=";
			}
			//年份
			if(!empty($params['year'])){
				if($sql != '')
					$sql .= " and year=".$params['year']."";
				else 
					$sql .= " year=".$params['year']."";	
					
				if($pageStr != '')
					$pageStr .= "&year=".$params['year'];
				else 
					$pageStr .= "year=".$params['year'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&year=";
				else 
					$pageStr .= "year=";
			}
			//月份
			if(!empty($params['month'])){
				if($sql != '')
					$sql .= " and month=".$params['month']."";
				else 
					$sql .= " month=".$params['month']."";	
					
				if($pageStr != '')
					$pageStr .= "&month=".$params['month'];
				else 
					$pageStr .= "month=".$params['month'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&month=";
				else 
					$pageStr .= "month=";
			}
			//大类
			if(!empty($params['type'])){
				if($sql != '')
					$sql .= " and type='".$params['type']."'";
				else 
					$sql .= " type='".$params['type']."'";	
					
				if($pageStr != '')
					$pageStr .= "&type=".$params['type'];
				else 
					$pageStr .= "type=".$params['type'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&type=";
				else 
					$pageStr .= "type=";
			}
			//子类
			if(!empty($params['subType'])){
				if($sql != '')
					$sql .= " and subType='".$params['subType']."'";
				else 
					$sql .= " subType='".$params['subType']."'";	
					
				if($pageStr != '')
					$pageStr .= "&subType=".$params['subType'];
				else 
					$pageStr .= "subType=".$params['subType'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&subType=";
				else 
					$pageStr .= "subType=";
			}
			$pageStr .= '&searchType=other';
		}
		if($pageStr != '')
			$pageStr .= '&page';
		else 
			$pageStr .= 'page';	
		
		return array($sql,$pageStr);	
	} 
	//获取走势图
	public function getTrendChartList($where){
		$sql="select c.* ,cc.name as categoryName,a.name as areaName from ecms_trend_chart c join ecms_trend_category cc on c.categoryId=cc.id join ecms_trend_area a on c.areaId=a.id $where";
		return $this->db->getQueryArray($sql);
	}
	//获取走势图分页参数及过虑数据条件 $params 来自$_REQUEST
	public function getTrendChartPageListParam($params){
		$sql = '';
		$pageStr = '';
		if(isset($params['searchType']) && $params['searchType']!=''){
			//城市
			if(!empty($params['city'])){
				if($sql != '')
					$sql .= " and city='".$params['city']."'";
				else 
					$sql .= " city='".$params['city']."'";	
					
				if($pageStr != '')
					$pageStr .= "&city=".$params['city'];
				else 
					$pageStr .= "city=".$params['city'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&city=";
				else 
					$pageStr .= "city=";
			}
			//区域或项目
			if(!empty($params['areaId'])){
				if($sql != '')
					$sql .= " and areaId=".$params['areaId']."";
				else 
					$sql .= " areaId=".$params['areaId']."";	
					
				if($pageStr != '')
					$pageStr .= "&areaId=".$params['areaId'];
				else 
					$pageStr .= "areaId=".$params['areaId'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&areaId=";
				else 
					$pageStr .= "areaId=";
			}
			//类别
			if(!empty($params['categoryId'])){
				if($sql != '')
					$sql .= " and categoryId=".$params['categoryId']."";
				else 
					$sql .= " categoryId=".$params['categoryId']."";	
					
				if($pageStr != '')
					$pageStr .= "&categoryId=".$params['categoryId'];
				else 
					$pageStr .= "categoryId=".$params['categoryId'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&categoryId=";
				else 
					$pageStr .= "categoryId=";
			}
			//大类
			if(!empty($params['type'])){
				if($sql != '')
					$sql .= " and type='".$params['type']."'";
				else 
					$sql .= " type='".$params['type']."'";	
					
				if($pageStr != '')
					$pageStr .= "&type=".$params['type'];
				else 
					$pageStr .= "type=".$params['type'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&type=";
				else 
					$pageStr .= "type=";
			}
			//子类
			if(!empty($params['subType'])){
				if($sql != '')
					$sql .= " and subType='".$params['subType']."'";
				else 
					$sql .= " subType='".$params['subType']."'";	
					
				if($pageStr != '')
					$pageStr .= "&subType=".$params['subType'];
				else 
					$pageStr .= "subType=".$params['subType'];	
						
			}
			else 
			{
				if($pageStr != '')
					$pageStr .= "&subType=";
				else 
					$pageStr .= "subType=";
			}
			$pageStr .= '&searchType=other';
		}
		if($pageStr != '')
			$pageStr .= '&page';
		else 
			$pageStr .= 'page';	
		
		return array($sql,$pageStr);	
	}
	//根据id获取走势图数据
	public function getChartJsonById($id){
		$trendChart = $this->trendChartDAO->getTrendChartById($id);
		$sql = "select * from ecms_trend_data d  where city='".$trendChart['city']."' and areaId=".$trendChart['areaId']." and type='".$trendChart['type']."' and subType='".$trendChart['subType']."' and  (year+month*0.01)>=".($trendChart['XFromYear']+$trendChart['XFromMonth']*0.01);
		if($trendChart['XToToday']==1)
			$sql .= " and (year+month*0.01)<=".(date('Y',time())+date('m',time())*0.01);
		else 
			$sql .= " and (year+month*0.01)<=".($trendChart['XToYear']+$trendChart['XToMonth']*0.01);	
		$sql .= " order by year asc,month asc"	;
		
		$trendDataList =  $this->db->getQueryArray($sql);
		$len = count($trendDataList);
		$str = '{
				   "width":'.$trendChart['width'].',
				   "height":'.$trendChart['height'].',
				   "data":{
				  "elements": [
				    {
				      "type": "line",
				      "values": [';
		for($i=0;$i<$len;$i++)
		{
			if($i!=$len-1)
			$str.='{
		          "type": "dot",
		          "value": "'.$trendDataList[$i]['price'].'",
		          "dot-size": 5,
		          "halo-size": 1,
		          "tip": "#x_label#<br>￥#val#<br>'.$trendDataList[$i]['memo'].'"
		        },';
			else
			$str.='{
		          "type": "dot",
		          "value": "'.$trendDataList[$i]['price'].'",
		          "dot-size": 5,
		          "halo-size": 1,
		          "tip": "#x_label#<br>￥#val#<br>'.$trendDataList[$i]['memo'].'"
		        }';
		}
		
		$str .='],
			      "colour": "'.$trendChart['lineColor'].'",
			      "text": "'.$trendChart['title'].'"
			    }
			  ],
			  "x_axis": {
			    "colour": "#A2ACBA",
			    "grid-colour": "#FFFFFF",
			    "offset": false,
			    "steps":'.$trendChart['XStep'].',
			    "labels": {
			      "steps": '.$trendChart['XStep'].',
			      "rotate": '.$trendChart['XRotate'].',
			      "colour": "#000000",
			      "labels": [
			'; 
		for($i=0;$i<$len;$i++)
		{
			if($i!=$len-1)
			$str.='"'.($trendDataList[$i]['year']%100<10?('0'.($trendDataList[$i]['year']%100)):$trendDataList[$i]['year']%100).'/'.($trendDataList[$i]['month']<10?('0'.$trendDataList[$i]['month']):$trendDataList[$i]['month']).'",';
			else
			$str.='"'.($trendDataList[$i]['year']%100<10?('0'.($trendDataList[$i]['year']%100)):$trendDataList[$i]['year']%100).'/'.($trendDataList[$i]['month']<10?('0'.$trendDataList[$i]['month']):$trendDataList[$i]['month']).'"';
		}       
		$str .='   ]
			    }
			  },
			  "y_axis": {
			    "min": '.$trendChart['YFrom'].',
			    "max": '.$trendChart['YTo'].',
			    "steps": '.$trendChart['YStep'].',
			    "colour": "#A2ACBA",
			    "grid-colour": "#FFFFFF"
			  },
			  "bg_colour": "#FFFFFF"
			}
		}';
		return $str;
	}
	//根据类别id获取，该类别下所有区域或项目列表
	function getChartAreasJsonByCategoryId($id){
		$sql = "select c.id,a.name as areaName from ecms_trend_chart c , ecms_trend_area a where c.areaId=a.id and c.categoryId=$id and state=1 order by orderNum desc;";
		$trendAreasList =  $this->db->getQueryArray($sql);
		$str = '{"data":[';
		$len = count($trendAreasList);
		for($i=0;$i<$len;$i++)
		{
			if($i!=$len-1)
				$str.='{"id":'.$trendAreasList[$i]['id'].',"areaName":"'.$trendAreasList[$i]['areaName'].'"},';
			else 
				$str.='{"id":'.$trendAreasList[$i]['id'].',"areaName":"'.$trendAreasList[$i]['areaName'].'"}';	
		}
		$str.='}';
		return $str;
	}	
}

?>