<?php
/**
 * ��Ϣ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class StatementsService{
	private $db=null;
	private $statementDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->statementDAO=new StatementsDAO($db);
		$this->linkService=new LinkService($db);
	}
	/**
	 * ������Ϣ
	 * @param array $info ��Ϣ���� 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$result=$this->statementDAO->release($info);
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
		$result=$this->statementDAO->save($info);
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
		$result=$this->statementDAO->delInfo($id);
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
	public function getInfoDetail($where){
		$sql="SELECT s.*,sp.shopId as shopStrId,sp.shopName,sp.shopTel,sp.areaId as shopAreaId,
			  p.propertyId as propertyStrId,p.propertyName,p.propertyAddress,p.areaId as propertyAreaId,
			  a.name,a.fatherId 
			  FROM ecms_statements AS s 
			  INNER JOIN ecms_shop AS sp ON s.shopId=sp.id 
			  inner join ecms_property as p on s.propertyId=p.id 
			  inner join ecms_area as a on sp.areaId=a.id
			  $where";
		return $this->statementDAO->getInfo($sql);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @access public
	 * @return array
	 **/
	public function getInfoList($where='',$order='',$limit=''){
		$sql="SELECT s.*,sp.shopId as shopStrId,sp.shopName,sp.shopTel,
			  p.propertyId as propertyStrId,p.propertyName,p.propertyAddress,
			  a.name,a.fatherId 
			  FROM ecms_statements AS s 
			  INNER JOIN ecms_shop AS sp ON s.shopId=sp.id 
			  inner join ecms_property as p on s.propertyId=p.id 
			  inner join ecms_area as a on sp.areaId=a.id
			  $where $order $limit";
		return $this->statementDAO->getInfoList($sql);
	}
	
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where=''){
		$sql="select count(*) as counts 
			  from ecms_statements as s 
			  inner join ecms_shop as sp on s.shopId=sp.id 
			  inner join ecms_property as p on s.propertyId=p.id 
			  inner join ecms_area as a on sp.areaId=a.id
			  $where";
		return $this->statementDAO->countInfo($sql);
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
		$result=$this->statementDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
}
?>