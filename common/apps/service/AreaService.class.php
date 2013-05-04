<?php
/**
 * �������ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class AreaService{
	private $db=null;
	private $areaDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->areaDAO=new AreaDAO($db);
		$this->linkService=new LinkService($db);
	}
	/**
	 * ��������
	 * @param array $area
	 * @return bool
	 **/
	public function release($area){
		$msg=true;
		$checkUnique=$this->areaDAO->checkAreaUnique($area['name'],$area['fatherId']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='�������Ʋ����ظ���';
		}else{
			$result=$this->areaDAO->release($area);
			if($result<0)$msg='�������Ʒ���ʧ�ܣ�';
			else $this->areaDAO->cache($area['fatherId']);
		}
		return $msg;
	}
	/**
	 * �޸�����
	 * @param array $area
	 * @return bool
	 **/
	public function save($area){
		$msg=true;
		$resultArea=$this->areaDAO->getArea($area['id']);
		if($area['name']==$resultArea['name']){
			$result=$this->areaDAO->save($area);
			if($result<0)$msg='��Ϣ����޸�ʧ�ܣ�';
			else $this->areaDAO->cache($area['fatherId']);
		}else{
			$checkUnique=$this->areaDAO->checkAreaUnique($area['name'],$area['fatherId']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='��Ϣ������Ʋ����ظ���';
			}else{
				$result=$this->areaDAO->save($area);
				if($result<0)$msg='��Ϣ����޸�ʧ�ܣ�';
				else $this->areaDAO->cache($area['fatherId']);
			}
		}
		return $msg;
	}
	/**
	 * ɾ������
	 * @param int $id
	 * @param int $fatherId
	 * @return string
	 **/
	public function delArea($id,$fatherId){
		$msg=true;
		$result=$this->areaDAO->delArea($id);
		if($result<0)$msg='����ɾ��ʧ�ܣ�';
		else $this->areaDAO->cache($fatherId);
		return $msg;		
	}
	/**
	 * ����ɾ������
	 * @param int $arrId
	 * @param int $fatherId
	 * @return string
	 **/
	public function delAreaByIds($arrId,$fatherId){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->areaDAO->delArea($id);
				if($result<0)throw new Exception('����ɾ������');
			}
			$this->db->commit();//�����ύ
			$this->areaDAO->cache($fatherId);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * ����ID��ȡ����
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getArea($id){
		return $this->areaDAO->getArea($id);
	}
	/**
	 * ��ȡ�����б�
	 * @param int $fatherId ����ID
	 * @access public
	 * @return array
	 */
	public function getAreaList($fatherId=0) {
		return $this->areaDAO->getAreaList($fatherId);
	}
	//�ݹ��ҳ�ĳһ������µ����������
	public function getAllAreaChByFatherId($fatherId){
		$areaList=$this->areaDAO->getAreaList($fatherId);
		$idStr='';
		if(!empty($areaList)){
			for($i=0;$i<count($areaList);$i++){
				$idStr.=$this->getAllAreaChByFatherId($areaList[$i]['id']);
			}
			if($idStr!=''){
				return $idStr;
			}
		}else{
			return $idStr.=$fatherId.',';
		}
	}
	//�ݹ��ҳ���һ�����
	public function getAreaFirstType($id){
		$areaDetail=$this->areaDAO->getArea($id);
		if(!empty($areaDetail)){
			if($areaDetail['fatherId']==0){
				return $areaDetail['id'];
			}else{
				return $this->getAreaFirstType($areaDetail['fatherId']);
			}
		}else{
			return $id;
		}
	}
	/**
	 * ��ȡ�����б�(cache)
	 * @param int $fatherId ����ID
	 * @access public
	 * @return array
	 */
	public function getAreaListByCache($fatherId=0) {
		$name=$fatherId;
		return $this->areaDAO->getArray($name);
	}
}
?>