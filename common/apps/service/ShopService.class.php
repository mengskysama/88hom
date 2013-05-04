<?php
/**
 * ��Ϣ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class ShopService{
	private $db=null;
	private $shopDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->shopDAO=new ShopDAO($db);
		$this->linkService=new LinkService($db);
	}
	/**
	 * ������Ϣ
	 * @param array $info ��Ϣ���� 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$result=$this->shopDAO->release($info);
		if($result<0) $msg='������Ϣʧ�ܣ�';
		return $msg;
	}
	/**
	 * �޸���Ϣ
	 * @param array $info ��Ϣ���� 
	 * @return boolean
	 **/
	public function save($info){
		$msg=true;
		$result=$this->shopDAO->save($info);
		if($result<0)throw new Exception('��Ϣ�޸�ʧ�ܣ�');
		return $msg;
	}
	/**
	 * ������ϢIDɾ����Ϣ
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delInfo($id){
		$msg=true;
		$result=$this->shopDAO->delInfo($id);
		if($result<0)$msg='��Ϣɾ��ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ������ϢID��ȡ��Ϣ����
	 * @access public
	 * @param int $id ��ϢID
	 * @param string $type 'web/admin'
	 * @return Array
	 **/
	public function getInfoDetail($id,$type='web'){
		if($type=='web'){
			$sql="select * from ecms_shop where id=$id and state=1 and lang='".LANG."'";
		}else{
			$sql="select * from ecms_shop where id=$id and lang='".LANG."'";
		}
		return $this->shopDAO->getInfo($sql);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @access public
	 * @return array
	 **/
	public function getInfoList($where='',$order='',$limit=''){
		$sql="SELECT s.*,a.name,a.fatherId FROM ecms_shop AS s INNER JOIN ecms_area AS a ON s.areaId=a.id $where $order $limit";
		return $this->shopDAO->getInfoList($sql);
	}
	
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where=''){
		$sql="select count(*) as counts from ecms_shop as s inner join ecms_area as a on s.areaId=a.id $where";
		return $this->shopDAO->countInfo($sql);
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
		$result=$this->shopDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
}
?>