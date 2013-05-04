<?php
/**
 * ��Ϣ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class PropertyService{
	private $db=null;
	private $propertyDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->propertyDAO=new PropertyDAO($db);
		$this->linkService=new LinkService($db);
	}
	/**
	 * ������Ϣ
	 * @param array $info ��Ϣ���� 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$result=$this->propertyDAO->release($info);
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
		$result=$this->propertyDAO->save($info);
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
		$result=$this->propertyDAO->delInfo($id);
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
			$sql="select * from ecms_property where id=$id and state=1";
		}else{
			$sql="select * from ecms_property where id=$id";
		}
		return $this->propertyDAO->getInfo($sql);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @access public
	 * @return array
	 **/
	public function getInfoList($where='',$order='',$limit=''){
		$sql="SELECT p.*,a.name,a.fatherId FROM ecms_property AS p INNER JOIN ecms_area AS a ON p.areaId=a.id $where $order $limit";
		return $this->propertyDAO->getInfoList($sql);
	}
	
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where=''){
		$sql="select count(*) as counts from ecms_property as p inner join ecms_area as a on p.areaId=a.id $where";
		return $this->propertyDAO->countInfo($sql);
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
		$result=$this->propertyDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
}
?>