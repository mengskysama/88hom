<?php
/**
 * 
 * 新闻回复回复
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-10
 */
class InfoReplyDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布新闻回复
	public function release($infoReply){
		$sql="insert into ecms_info_reply(inforeplyContent,infoId,userId,inforeplyState,inforeplyCreateTime,inforeplyUpdateTime) values('"
										.(empty($infoReply['inforeplyContent'])?'':$infoReply['inforeplyContent'])
										."','".(empty($infoReply['infoId'])?'':$infoReply['infoId'])
										."','".(empty($infoReply['userId'])?'':$infoReply['userId'])
										."','".(empty($infoReply['inforeplyState'])?'':$infoReply['inforeplyState'])
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改新闻回复
	public function modify($infoReply){
		$sql="update ecms_info_reply set inforeplyContent='"
			.(empty($infoReply['inforeplyContent'])?'':$infoReply['inforeplyContent'])
			."',infoId=".(empty($infoReply['infoId'])?0:$infoReply['infoId'])
			.",userId=".(empty($infoReply['userId'])?0:$infoReply['userId'])
			.",inforeplyState=".(empty($infoReply['inforeplyState'])?0:$infoReply['inforeplyState'])
			.",inforeplyUpdateTime=".time()
			." where inforeplyId=".$infoReply['inforeplyId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除新闻回复
	public function delInfoReplyById($id){
		$sql="delete from  ecms_info_reply where inforeplyId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取新闻回复
	 * @param string $where 
	 * @return array
	 */
	public function getInfoReplyById($id) {
		$sql="select * from ecms_info_reply where inforeplyId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取新闻回复列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getInfoReplyList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_info_reply $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改新闻回复
	 * @param string $state 状态
	 * @param string $infoReplyreplyId	主键
	 * @return boolean
	 */
	public function changeState($state,$infoReplyreplyId){
		$sql="update ecms_info_reply set inforeplyState=$state,inforeplyUpdateTime=".time()." where inforeplyId=$infoReplyreplyId";
		return $this->db->getQueryExecute($sql);
	}
	//计算新闻回复条数
	public function countInfoReply($where = ''){
		$sql="select count(*) as counts from ecms_info_reply $where";
		return $this->db->getQueryValue($sql);
	}

}


?>