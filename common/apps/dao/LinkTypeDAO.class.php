<?php
/**
 * 
 * 友情链接类别
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-11
 */
class LinkTypeDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布友情链接类别
	public function release($LinkType){
		$sql="insert into ecms_link_type(linktypeName,linktypeFatherId,linktypeLayer,linktypeState,linktypeCreateTime,linktypeUpdateTime) values('"
										.empty($LinkType['linktypeName'])?'':$LinkType['linktypeName']
										."',".empty($LinkType['linktypeFatherId'])?0:$LinkType['linktypeFatherId']
										.",".empty($LinkType['linktypeLayer'])?0:$LinkType['linktypeLayer']
										.",".empty($LinkType['linktypeState'])?0:$LinkType['linktypeState']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改友情链接类别
	public function modify($LinkType){
		$sql="update ecms_link_type set linktypeName='"
			.empty($LinkType['linktypeName'])?'':$LinkType['linktypeName']
			."',linktypeFatherId=".empty($LinkType['linktypeFatherId'])?0:$LinkType['linktypeFatherId']
			.",linktypeLayer=".empty($LinkType['linktypeLayer'])?0:$LinkType['linktypeLayer']
			.",linktypeState=".empty($LinkType['linktypeState'])?0:$LinkType['linktypeState']
			.",linktypeUpdateTime=".time()
			." where linktypeId=".$LinkType['linktypeId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除友情链接类别
	public function delLinkTypeById($id){
		$sql="delete from  ecms_link_type where linktypeId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取友情链接类别
	 * @param string $where 
	 * @return array
	 */
	public function getLinkTypeById($id) {
		$sql="select * from ecms_link_type where linktypeId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取友情链接类别列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getLinkTypeList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_link_type $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改友情链接类别
	 * @param string $state 状态
	 * @param string $linktypeId	主键
	 * @return boolean
	 */
	public function changeState($state,$linktypeId){
		$sql="update ecms_link_type set linktypeState=$state,LinkTypeUpdateTime=".time()." where linktypeId=$linktypeId";
		return $this->db->getQueryExecute($sql);
	}
	//计算友情链接类别条数
	public function countLinkType($where = ''){
		$sql="select count(*) as counts from ecms_link_type $where";
		return $this->db->getQueryValue($sql);
	}

}


?>