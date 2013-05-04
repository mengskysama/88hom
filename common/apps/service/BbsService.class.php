<?php
/**
 * ��Ϣ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class BbsService{
	private $db=null;
	private $bbsDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->bbsDAO=new BbsDAO($db);
	}
//=================================��Ϣ����=============================
	/**
	 * ������Ϣ
	 * @param array $info ��Ϣ���� 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->bbsDAO->release($info);
			if($result<0)throw new Exception('������Ϣʧ�ܣ�');
			$this->db->commit();//�����ύ
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * �޸���Ϣ
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->bbsDAO->saveInfo($info);
			if($result<0)throw new Exception('��Ϣ�޸�ʧ�ܣ�');
			$this->db->commit();//�����ύ
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ������ϢIDɾ����Ϣ
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delInfoById($id){
		$msg=true;
		$this->db->begin();
		try {
			$result=null;
			$result=$this->bbsDAO->delInfo($id);
			if($result<0)throw new Exception('��Ϣɾ��ʧ�ܣ�');
			$result=null;
			$result=$this->bbsDAO->delInfoReplyByBid($id);
			if($result<0)throw new Exception('��Ϣɾ��ʧ�ܣ�');
			$this->db->commit();//�����ύ
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ������ϢID��ȡ��Ϣ����
	 * @access public
	 * @param string $id ��ϢID
	 * @return Array
	 **/
	public function getInfoDetailById($id,$type='web'){
		if($type=='web'){
			$sql="select b.*,u.uname from ecms_bbs as b 
				  inner join ecms_users_web as u on b.uid=u.id 
				  where b.state=1 and u.state=1 and b.id=$id";
		}else{
			$sql="select * from ecms_bbs as b 
				  inner join ecms_users_web as u on b.uid=u.id 
				  where b.id=$id";
		}
		return $this->bbsDAO->getInfo($sql);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ϣ���
	 * @return array
	 */
	public function getNextInfo($infoId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_bbs 
				  where id>$infoId and state=1
				  order by id asc";
		}else{
			$sql="select * from ecms_bbs 
				  where id>$infoId 
				  order by id asc";
		}
		return $this->bbsDAO->getNextInfo($sql);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ϣ���
	 * @return array
	 */
	public function getPreInfo($infoId,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_bbs 
				  where id<$infoId and state=1
				  order by id desc";
		}else{
			$sql="select * from ecms_bbs 
				  where id<$infoId  
				  order by id desc";
		}
		return $this->bbsDAO->getPreInfo($sql);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @param string $field
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return array
	 **/
	public function getInfoList($where='',$order='',$limit=''){
		$sql="select b.*,u.uname,count(r.id) as replys from ecms_bbs as b 
			  left join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on b.uid=u.id 
			  $where group by b.id $order $limit";
		return $this->bbsDAO->getInfoList($sql);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where = ''){
		$sql="select count(*) as counts 
			  from (select b.id from ecms_bbs as b 
			  left join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on b.uid=u.id 
			  $where group by b.id) as newTable";
		return $this->bbsDAO->countInfo($sql);
	}
	/**
	 * ���ݲ�ƷID������Ϣ״̬
	 * @access public
	 * @param string $state ״̬
	 * @param string $id
	 * @return bool
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->bbsDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ���ͳ��
	 * @param string $infoId ��ϢID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		return $this->bbsDAO->clickCount($infoId);
	}
//=================================��Ϣ������=============================
	/**
	 * ������Ϣ���
	 * @param array $infoReply
	 * @return bool
	 **/
	public function releaseInfoReply($infoReply){
		$msg=true;
		$result=$this->bbsDAO->releaseInfoReply($infoReply);
		if($result<0)$msg='��Ϣ����ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ɾ����Ϣ���
	 * @param int $id
	 * @return bool
	 **/
	public function delInfoReplyById($id){
		$msg=true;
		$result=$this->bbsDAO->delInfoReply($id);
		if($result<0)$msg='��Ϣɾ��ʧ�ܣ�';
		return $msg;		
	}
	/**
	 * ����ɾ����Ϣ���
	 * @param int $arrId
	 * @return bool
	 **/
	public function delInfoReply($arrId){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->bbsDAO->delInfoReply($id);
				if($result<0)throw new Exception('ɾ������');
			}
			$this->db->commit();//�����ύ
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ������ϢID��ȡ��Ϣ�������
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getInfoReplyDetailById($id){
		return $this->bbsDAO->getInfoReply($id);
	}
	/**
	 * ��ȡ��Ϣ����б�
	 * @param int $typeFatherId �����ƷID
	 * @access public
	 * @return array
	 */
	public function getInfoReplyList($where,$order,$limit) {
		$sql="select u.uname,r.* from ecms_bbs as b 
			  inner join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on u.id=r.uid 
			  $where $order $limit";
		return $this->bbsDAO->getInfoReplyList($sql);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfoReply($where = ''){
		$sql="select count(*) as counts 
			  from ecms_bbs as b 
			  inner join ecms_bbs_reply as r on b.id=r.bid 
			  inner join ecms_users_web as u on r.uid=u.id 
			  $where";
		return $this->bbsDAO->countInfo($sql);
	}
	/**
	 * ���ݲ�ƷID������Ϣ״̬
	 * @access public
	 * @param string $state ״̬
	 * @param string $id
	 * @return bool
	 **/
	public function changeReplyState($state,$id){
		$msg=true;
		$result=$this->bbsDAO->changeReplyState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
}
?>