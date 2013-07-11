<?php
/**
 * 
 * 新闻类别
 * @author Sam(semovy@gmail.com)
 * @since 2013-06-26
 */
class InfoTypeDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布新闻类别
	public function release($infoType){
		$sql="insert into ecms_info_type(infoId,infotypeId,infotypeSubId) values("
										.(empty($infoType['infoId'])?0:$infoType['infoId'])
										.",".(empty($infoType['infotypeId'])?0:$infoType['infotypeId'])
										.",".(empty($infoType['infotypeSubId'])?0:$infoType['infotypeSubId'])
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//删除新闻类别
	public function delInfoTypeByInfoId($id){
		$sql="delete from  ecms_info_type where infoId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取新闻类别
	 * @param string $where 
	 * @return array
	 */
	public function getInfoTypeListByInfoId($id) {
		$sql="select * from ecms_info_type where infoId=$id order by infotypeId";
		return $this->db->getQueryArray($sql);
	}
	//计算新闻类别条数
	public function countInfoType($where = ''){
		$sql="select count(*) as counts from ecms_info_type $where";
		return $this->db->getQueryValue($sql);
	}

}


?>