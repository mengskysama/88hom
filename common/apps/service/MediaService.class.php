<?php
/**
 * ��Ϣ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class MediaService{
	private $db=null;
	private $mediaDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->mediaDAO=new MediaDAO($db);
	}
//=================================��Ϣ����=============================
	/**
	 * ������Ϣ
	 * @param array $info ��Ϣ���� 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$result=$this->mediaDAO->release($info);
		if($result<0)$msg='������Ϣʧ�ܣ�';
		return $msg;
	}
	/**
	 * �޸���Ϣ
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$msg=true;
		$result=$this->mediaDAO->saveInfo($info);
		if($result<0)$msg='��Ϣ�޸�ʧ�ܣ�';
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
		$result=$this->mediaDAO->delInfo($id);
		if($result<0)$msg='��Ϣɾ��ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ������ϢID��ȡ��Ϣ����
	 * @access public
	 * @param string $id ��ϢID
	 * @return Array
	 **/
	public function getInfoDetailByInfoId($infoId,$type='web'){
		return $this->mediaDAO->getInfoDetailByInfoId($infoId,$type);
	}
	/**
	 * ȡ������Ϣ����һ��
	 * @return array
	 */
	public function getInfoDetailByFirst(){
		return $this->mediaDAO->getInfoDetailByFirst();
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @return array
	 */
	public function getNextInfo($infoId,$type='web'){
		return $this->mediaDAO->getNextInfo($infoId,$type);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @return array
	 */
	public function getPreInfo($infoId,$type='web'){
		return $this->mediaDAO->getPreInfo($infoId,$type);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @param string $field
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return array
	 **/
	public function getInfoList($field = '*',$where='',$order='',$limit=''){
		return $this->mediaDAO->getInfoList($field,$where,$order,$limit);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where = ''){
		return $this->mediaDAO->countInfo($where);
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
		$result=$this->mediaDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ���ͳ��
	 * @param string $infoId ��ϢID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		return $this->mediaDAO->clickCount($infoId);
	}
}
?>