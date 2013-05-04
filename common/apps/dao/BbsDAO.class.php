<?php
/**
 * BBS����
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class BbsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
//========================��Ϣ����=================================
	/**
	 * ������Ϣ
	 * @param arr $info ��Ϣ����
	 * @return boolean
	 */
	public function release($info){
		$sql="insert into ecms_bbs(uid,title,content,create_time,update_time) 
			  values(".$info['uid'].",'".$info['title']."','".$info['content']."'
			  ,".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸���Ϣ
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
	 * ɾ����Ϣ
	 * @param string $infoId ��ϢID
	 * @return bool
	 **/
	public function delInfo($infoId){
		$sql="delete from ecms_bbs where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @access public
	 * @param string $field ���ݿ��ֶ�
	 * @param string $where ��ѯ����
	 * @param string $order ��������
	 * @param string $limit ��Ϣ����
	 * @return array
	 */
	public function getInfoList($sql){
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ��Ϣ����
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @return array
	 */
	public function getInfo($sql) {
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ϣ���
	 * @return array
	 */
	public function getNextInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ϣ���
	 * @return array
	 */
	public function getPreInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ���ͳ��
	 * @param string $infoId ��ϢID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		$sql="update ecms_bbs set click_count=click_count+1 where id=$infoId";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸���Ϣ״̬
	 * @param string $state ״̬
	 * @param string $id	����
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_bbs set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
//========================��Ϣ�ظ�����=================================
	/**
	 * ������Ϣ���
	 * @param array $infoReply ��Ϣ����
	 * @return void
	 */
	public function releaseInfoReply($infoReply){
		$sql="insert into ecms_bbs_reply(bid,uid,content,create_time,update_time) 
			  values(".$infoReply['bid'].",".$infoReply['uid'].",'".$infoReply['content']."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ȡ��Ϣ���
	 * @param int $typeFatherId ������ϢID
	 * @return array
	 **/
	public function getInfoReplyList($sql) {
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfoReply($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ������ϢID��ȡ��Ϣ�����Ϣ
	 * @param string $id ��ϢID
	 * @return array
	 **/
	public function getInfoReply($id){
		$sql="select * from ecms_bbs_reply where id=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ɾ����Ϣ���
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
	 * �޸���Ϣ״̬
	 * @param string $state ״̬
	 * @param string $id	����
	 * @return boolean
	 */
	public function changeReplyState($state,$id){
		$sql="update ecms_bbs_reply set state=$state,update_time=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>