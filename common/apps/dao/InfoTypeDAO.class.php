<?php
/**
 * 
 * 新闻类别
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-10
 */
class InfoTypeDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布新闻类别
	public function release($infoType){
		$sql="insert into ecms_info_type(infotypeName,infotypeFatherId,infotypeLayer,infotypePic,infotypePicThumb,infotypeState,infotypeCreateTime,infotypeUpdateTime) values('"
										.empty($infoType['infotypeName'])?'':$infoType['infotypeName']
										."',".empty($infoType['infotypeFatherId'])?0:$infoType['infotypeFatherId']
										.",".empty($infoType['infotypeLayer'])?0:$infoType['infotypeLayer']
										.",'".empty($infoType['infotypePic'])?'':$infoType['infotypePic']
										."','".empty($infoType['infotypePicThumb'])?'':$infoType['infotypePicThumb']
										."',".empty($infoType['infotypeState'])?0:$infoType['infotypeState']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改新闻类别
	public function modify($infoType){
		$sql="update ecms_info_type set infotypeName='"
			.empty($infoType['infotypeName'])?'':$infoType['infotypeName']
			."',infotypeFatherId=".empty($infoType['infotypeFatherId'])?0:$infoType['infotypeFatherId']
			.",infotypeLayer=".empty($infoType['infotypeLayer'])?0:$infoType['infotypeLayer']
			.",infotypePic='".empty($infoType['infotypePic'])?'':$infoType['infotypePic']
			."',infotypePicThumb='".empty($infoType['infotypePicThumb'])?'':$infoType['infotypePicThumb']
			."',infotypeState=".empty($infoType['infotypeState'])?0:$infoType['infotypeState']
			.",infotypeUpdateTime=".time()
			." where infotypeId=".$infoType['infotypeId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除新闻类别
	public function delInfoTypeById($id){
		$sql="delete from  ecms_info_type where infotypeId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取新闻类别
	 * @param string $where 
	 * @return array
	 */
	public function getInfoTypeById($id) {
		$sql="select * from ecms_info_type where infotypeId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取新闻类别列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getInfoTypeList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_info_type $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改新闻类别
	 * @param string $state 状态
	 * @param string $infoTypeId	主键
	 * @return boolean
	 */
	public function changeState($state,$infoTypeId){
		$sql="update ecms_info_type set infotypeState=$state,infotypeUpdateTime=".time()." where infotypeId=$infoTypeId";
		return $this->db->getQueryExecute($sql);
	}
	//计算新闻类别条数
	public function countInfoType($where = ''){
		$sql="select count(*) as counts from ecms_info_type $where";
		return $this->db->getQueryValue($sql);
	}

}


?>