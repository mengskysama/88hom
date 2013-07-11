<?php
/**
 * 
 * 新闻
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-10
 */
class InfoDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布新闻
	public function release($info){
		$sql="insert into ecms_info(infoTitle,infoSummary,infoContent,infoPic,infoPicThumb,infoSource,infoUserId,infoClickCount,infoSuggest,infoLayer,infoState,infoCreateTime,infoUpdateTime) values('"
										.(empty($info['infoTitle'])?'':$info['infoTitle'])
										."','".(empty($info['infoSummary'])?'':$info['infoSummary'])
										."','".(empty($info['infoContent'])?'':$info['infoContent'])
										."','".(empty($info['infoPic'])?'':$info['infoPic'])
										."','".(empty($info['infoPicThumb'])?'':$info['infoPicThumb'])
										."','".(empty($info['infoSource'])?'房不剩房':$info['infoSource'])
										."',".(empty($info['infoUserId'])?0:$info['infoUserId'])
										.",".(empty($info['infoClickCount'])?0:$info['infoClickCount'])
										.",".(empty($info['infoSuggest'])?0:$info['infoSuggest'])
										.",".(empty($info['infoLayer'])?0:$info['infoLayer'])
										.",".(empty($info['infoState'])?0:$info['infoState'])
										.",".time()
										.",".time()
										.")";

			return $this->db->getQueryExecute($sql);						
	}
	//修改新闻
	public function modify($info){
		$sql="update ecms_info set infoTitle='"
			.(empty($info['infoTitle'])?'':$info['infoTitle'])
			."',infoSummary='".(empty($info['infoSummary'])?'':$info['infoSummary'])
			."',infoContent='".(empty($info['infoContent'])?'':$info['infoContent'])
			."',infoPic='".(empty($info['infoPic'])?'':$info['infoPic'])
			."',infoPicThumb='".(empty($info['infoPicThumb'])?'':$info['infoPicThumb'])
			."',infoSource='".(empty($info['infoSource'])?'房不剩房':$info['infoSource'])
			."',infoUserId=".(empty($info['infoUserId'])?0:$info['infoUserId'])
			.",infoSuggest=".(empty($info['infoSuggest'])?0:$info['infoSuggest'])
			.",infoLayer=".(empty($info['infoLayer'])?0:$info['infoLayer'])
			.",infoState=".(empty($info['infoState'])?0:$info['infoState'])
			.",infoUpdateTime=".time()
			." where infoId=".$info['infoId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除新闻
	public function delInfoById($id){
		$sql="delete from  ecms_info where infoId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	//新闻点击量加一
	public function clickInfoById($id){
		$sql="update ecms_info set infoClickCount=infoClickCount+1 where infoId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取新闻
	 * @param string $where 
	 * @return array
	 */
	public function getInfoById($id) {
		$sql="select * from ecms_info where infoId=$id";
		return $this->db->getQueryValue($sql);
	}
	
	//前台
	public function getInfoByIdForPage($id) {
		$sql="select ecms_info.* ,ecms_info_type.infotypeId,ecms_info_type.infotypeSubId from ecms_info,ecms_info_type where ecms_info.infoId=ecms_info_type.infoId and ecms_info.infoId=$id limit 0,1";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取新闻列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getInfoList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_info $where $order $limit";

		return $this->db->getQueryArray($sql);
	}
	//计算新闻条数
	public function countInfo($where=''){
		$sql="select count(distinct ecms_info.infoId) as counts from ecms_info $where";
		return $this->db->getQueryValue($sql);
	}
	//信息上一条，下一条
	public function getInfoPrevNextPage($id,$table,$where,$order,$select){
		$sql = "call getAroundTwoRecord($id,'$table','$where','$order','$select');";
		
		define('CLIENT_MULTI_RESULTS', 131072);
    	$link = mysql_connect(ECMS_DB_HOST, ECMS_DB_USER, ECMS_DB_PW,1,CLIENT_MULTI_RESULTS) or die("Could not connect: ".mysql_error());    
    	
    	mysql_select_db(ECMS_DB_NAME) or die("Could not select database");
    	
    	mysql_query("SET SESSION sql_mode='STRICT_TRANS_TABLES'");
		mysql_query("SET NAMES utf8");
		
    	$result = mysql_query($sql,$link) or die("Query failed:" .mysql_error());
    	$list = array();
    	$i = 0;
    	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
    	{
    		$list[$i++] = array('infoId'=>$row['infoId'],'infoTitle'=>$row['infoTitle'],'num'=>$row['num'],'currentNum'=>$row['currentNum']);
    	}
  	
    	 mysql_free_result($result);
    	 mysql_close($link);
		return $list;
	}

}


?>