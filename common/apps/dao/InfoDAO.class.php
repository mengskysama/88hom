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
		$sql="insert into ecms_info(infoTitle,infoContent,infoPic,infoPicThumb,infoClickCount,infoState,infoId,infoCreateTime,infoUpdateTime) values('"
										.empty($info['infoTitle'])?'':$info['infoTitle']
										."','".empty($info['infoContent'])?'':$info['infoContent']
										."','".empty($info['infoPic'])?'':$info['infoPic']
										."','".empty($info['infoPicThumb'])?'':$info['infoPicThumb']
										."',".empty($info['infoClickCount'])?0:$info['infoClickCount']
										.",".empty($info['infoState'])?0:$info['infoState']
										.",".empty($info['infoId'])?0:$info['infoId']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改新闻
	public function modify($info){
		$sql="update ecms_info set infoTitle='"
			.empty($info['infoTitle'])?'':$info['infoTitle']
			."',infoContent='".empty($info['infoContent'])?'':$info['infoContent']
			."',infoPic='".empty($info['infoPic'])?'':$info['infoPic']
			."',infoPicThumb='".empty($info['infoPicThumb'])?'':$info['infoPicThumb']
			."',infoClickCount=".empty($info['infoClickCount'])?0:$info['infoClickCount']
			.",infoState=".empty($info['infoState'])?0:$info['infoState']
			.",infoId=".empty($info['infoId'])?0:$info['infoId']
			.",infoUpdateTime=".time()
			." where infoId=".$info['infoId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除新闻
	public function delInfoById($id){
		$sql="delete from  ecms_info where infoId=".$id;
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
	/**
	 * 修改新闻
	 * @param string $state 状态
	 * @param string $infoId	主键
	 * @return boolean
	 */
	public function changeState($state,$infoId){
		$sql="update ecms_info set infoState=$state,infoUpdateTime=".time()." where infoId=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	//计算新闻条数
	public function countInfo($where = ''){
		$sql="select count(*) as counts from ecms_info $where";
		return $this->db->getQueryValue($sql);
	}

}


?>