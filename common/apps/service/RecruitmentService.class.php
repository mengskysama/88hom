<?php
/**
 * ��Ƹ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class RecruitmentService{
	private $db=null;
	private $rmDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->rmDAO=new RecruitmentDAO($db);
	}
//=================================��Ƹ��Ϣ����=============================
	/**
	 * ������Ƹ��Ϣ
	 * @param array $rm 
	 * @return boolean
	 */
	public function release($rm){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->rmDAO->release($rm);
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
	 * �޸���Ƹ��Ϣ
	 * @param array $rm
	 * @return bool
	 **/
	public function saveRecruiment($rm){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->rmDAO->saveRecruiment($rm);
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
	 * ������Ƹ��ϢIDɾ����Ϣ
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delRmById($id){
		$msg=true;
		$result=$this->rmDAO->delRecruitemt($id);
		if($result<0)$msg='��Ϣɾ��ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ������ϢID��ȡ��Ϣ����
	 * @access public
	 * @param string $id ��ϢID
	 * @return Array
	 **/
	public function getRmDetailById($id,$type='web'){
		return $this->rmDAO->getRmInfoDetail($id,$type);
	}
	/**
	 * ��ȡ��Ϣ�б�
	 * @param string $field
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return array
	 **/
	public function getRmList($field = '*',$where='',$order='',$limit=''){
		return $this->rmDAO->getRmList($field,$where,$order,$limit);
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where = ''){
		return $this->rmDAO->countInfo($where);
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
		$result=$this->rmDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ���ͳ��
	 * @param string $id 
	 * @return boolean
	 **/
	public function clickCount($id){
		return $this->rmDAO->clickCount($id);
	}
//=================================��Ƹ��Ϣ������=============================
	/**
	 * ������Ƹ��Ϣ���
	 * @param array $rmType
	 * @return bool
	 **/
	public function releaseRmType($rmType){
		$msg=true;
		$checkUnique=$this->rmDAO->checkRmTypeUnique($rmType['typeName']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='��Ϣ������Ʋ����ظ���';
		}else{
			$result=$this->rmDAO->releaseRmType($rmType);
			if($result<0)$msg='��Ϣ��𷢲�ʧ�ܣ�';
			else $this->rmDAO->cache($rmType['fid']);
		}
		return $msg;
	}
	/**
	 * �޸���Ƹ��Ϣ���
	 * @param array $rmType
	 * @return bool
	 **/
	public function saveRmType($rmType){
		$msg=true;
		$resultRmType=$this->rmDAO->getRmTypeDetail($rmType['id']);
		if($rmType['typeName']==$resultRmType['type_name']){
			$result=$this->rmDAO->saveRmType($rmType);
			if($result<0)$msg='��Ϣ����޸�ʧ�ܣ�';
			else $this->rmDAO->cache($rmType['fid']);
		}else{
			$checkUnique=$this->rmDAO->checkRmTypeUnique($rmType['typeName']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='��Ϣ������Ʋ����ظ���';
			}else{
				$result=$this->rmDAO->saveRmType($rmType);
				if($result<0)$msg='��Ϣ����޸�ʧ�ܣ�';
				else $this->rmDAO->cache($rmType['fid']);
			}
		}
		return $msg;
	}
	/**
	 * ��Ƹ��Ϣ�������
	 * @param array $typeLayer 
	 * @return bool
	 **/
	public function orderRmType($typeLayer,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($typeLayer as $id=>$layer){
				$result=$this->rmDAO->changeRmTypeLayer($layer,$id);
				if($result<0)throw new Exception('����������');
			}
			$this->db->commit();//�����ύ
			$this->rmDAO->cache($fid);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ɾ����Ϣ���
	 * @param int $id
	 * @return bool
	 **/
	public function delRmTypeById($id,$fid){
		$msg=true;
		$result=$this->rmDAO->delRmType($id);
		if($result<0)$msg='��Ϣ���ɾ��ʧ�ܣ�';
		else $this->rmDAO->cache($fid);
		return $msg;		
	}
	/**
	 * ����ɾ����Ϣ���
	 * @param int $arrId
	 * @return bool
	 **/
	public function delRmType($arrId,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->rmDAO->delRmType($id);
				if($result<0)throw new Exception('���ɾ������');
			}
			$this->db->commit();//�����ύ
			$this->rmDAO->cache($fid);
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
	public function getRmTypeDetailById($id){
		return $this->rmDAO->getRmTypeDetail($id);
	}
	/**
	 * ��ȡ��Ϣ����б�
	 * @param int $fid �����ƷID
	 * @access public
	 * @return array
	 */
	public function getRmTypeList($fid=1) {
		return $this->rmDAO->getRmTypeList($fid);
	}
	/**
	 * ��ȡ��Ϣ����б�(cache)
	 * @param int $fid 
	 * @access public
	 * @return array
	 */
	public function getRmTypeListByCache($fid=1) {
		return $this->rmDAO->getArray($fid);
	}
}
?>