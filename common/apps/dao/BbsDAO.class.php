<?php
/**
 * BBS管理
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class BbsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
//========================信息操作=================================
	/**
	 * 发布信息
	 * @param arr $info 信息对象
	 * @return boolean
	 */
	public function release($info){
		$sql="insert into ecms_bbs(uid,title,content,create_time,update_time) 
			  values(".$info['uid'].",'".$info['title']."','".$info['content']."'
			  ,".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改信息
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$sql="update ecms_bbs set title='".$info['title']."',content=".$info['content'].",
			  update_time=".time()." 
			  where id=".$info['id']." and uid=".$info['uid'];
		return $this->db->getQueryExeCute($sql);
	}
	/**
	 * 删除信息
	 * @param string $infoId 信息ID
	 * @return bool
	 **/
	public function delInfo($infoId){
		$sql="delete from ecms_bbs where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取信息列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getInfoList($sql){
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 取信息详情
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @return array
	 */
	public function getInfo($sql) {
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 取下一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @param string $typeId 信息类别
	 * @return array
	 */
	public function getNextInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 取上一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @param string $typeId 信息类别
	 * @return array
	 */
	public function getPreInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 点击统计
	 * @param string $infoId 信息ID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		$sql="update ecms_bbs set click_count=click_count+1 where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改信息状态
	 * @param string $state 状态
	 * @param string $id	主键
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_bbs set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
//========================信息回复操作=================================
	/**
	 * 发布信息类别
	 * @param array $infoReply 信息对象
	 * @return void
	 */
	public function releaseInfoReply($infoReply){
		$sql="insert into ecms_bbs_reply(bid,uid,content,create_time,update_time) 
			  values(".$infoReply['bid'].",".$infoReply['uid'].",'".$infoReply['content']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 取信息类别
	 * @param int $typeFatherId 父类信息ID
	 * @return array
	 **/
	public function getInfoReplyList($sql) {
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfoReply($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 根据信息ID获取信息类别信息
	 * @param string $id 信息ID
	 * @return array
	 **/
	public function getInfoReply($id){
		$sql="select * from ecms_bbs_reply where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 删除信息类别
	 * @param int $id
	 * @return bool
	 */
	public function delInfoReply($id) {
		$sql="delete from ecms_bbs_reply where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	public function delInfoReplyByBid($bid){
		$sql="delete from ecms_bbs_reply where bid=$bid";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改信息状态
	 * @param string $state 状态
	 * @param string $id	主键
	 * @return boolean
	 */
	public function changeReplyState($state,$id){
		$sql="update ecms_bbs_reply set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>