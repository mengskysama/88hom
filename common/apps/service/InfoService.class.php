<?php
/**
 * ��Ϣ����ҵ�������
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class InfoService{
	private $db=null;
	private $infoDAO=null;
	private $linkService=null;
	public function __construct($db){
		$this->db=$db;
		$this->infoDAO=new InfoDAO($db);
		$this->linkService=new LinkService($db);
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
//			$info['content']=$this->linkService->addInnerLink($info['content']);
			$result=$this->infoDAO->release($info);
			if($result<0)throw new Exception('������Ϣʧ�ܣ�');
			$infoId=$this->db->getInsertNum();
//			$keyword=$info['keyword'];
//			if($keyword){
//				if($info['typeId']==1||$info['typeId']==2||$info['typeId']==3){
//					$result=$this->linkService->releaseUrlKeyWord($keyword,ECMS_WEB_URL.'news/d-'.$info['typeId'].'-'.$infoId.'.htm',1);
//				}
//				if($result<0)throw new Exception('�����ؼ�������ʧ�ܣ�');
//			}
			//�����ϴ�ͼƬ
			if(!empty($info['picUrl'])){
				foreach($info['picUrl'] as $key=>$value){
					$result=$this->infoDAO->insertInfoPic($info['picUrl'][$key],$info['picThumb'][$key],$info['picDesc'][$key],$infoId);
					if($result<0) throw new Exception('�ϴ���ϢͼƬʧ�ܣ�');
				}
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
	 * �޸���Ϣ
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$msg=true;
		$this->db->begin();
		try {
//			$info['content']=$this->linkService->addInnerLink($info['content']);
			$result=$this->infoDAO->saveInfo($info);
			if($result<0)throw new Exception('��Ϣ�޸�ʧ�ܣ�');
			//ɾ����ϢͼƬ
			$result=$this->infoDAO->delInfoPic($info['id']);
			if($result<0) throw new Exception('ɾ����ϢͼƬʧ�ܣ�');
			//������ϢͼƬ
			if(!empty($info['picUrl'])){
				foreach($info['picUrl'] as $key=>$value){
					$result=$this->infoDAO->insertInfoPic($info['picUrl'][$key],$info['picThumb'][$key],$info['picDesc'][$key],$info['id']);
					if($result<0) throw new Exception('������ϢͼƬʧ�ܣ�');
				}
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
	 * ������ϢIDɾ����Ϣ
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delInfoById($id){
		$msg=true;
		$result=$this->infoDAO->delInfo($id);
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
		return $this->infoDAO->getInfoDetailByInfoId($infoId,$type);
	}
	/**
	 * ȡ������Ϣ����һ��
	 * @return array
	 */
	public function getInfoDetailByFirst(){
		return $this->infoDAO->getInfoDetailByFirst();
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ϣ���
	 * @return array
	 */
	public function getNextInfo($infoId,$typeId,$type='web'){
		return $this->infoDAO->getNextInfo($infoId,$typeId,$type);
	}
	/**
	 * ȡ��һ����Ϣ
	 * @param string $infoId ��ϢID
	 * @param string $field �ֶ�
	 * @param string $typeId ��Ϣ���
	 * @return array
	 */
	public function getPreInfo($infoId,$typeId,$type='web'){
		return $this->infoDAO->getPreInfo($infoId,$typeId,$type);
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
		return $this->infoDAO->getInfoList($field,$where,$order,$limit);
	}
	//�ݹ��ҳ���һ�����
	public function getInfoFirstType($id){
		$typeInfo=$this->infoDAO->getTypeInfo($id);
		if(!empty($typeInfo)){
			if($typeInfo['type_father_id']==0){
				return $typeInfo['id'];
			}else{
				return $this->getInfoFirstType($typeInfo['type_father_id']);
			}
		}else{
			return $id;
		}
	}
	/**
	 * ������Ϣ����
	 * @param string $where ��������
	 * @return int
	 */
	public function countInfo($where = ''){
		return $this->infoDAO->countInfo($where);
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
		$result=$this->infoDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬����ʧ�ܣ�';
		return $msg;
	}
	/**
	 * ���ͳ��
	 * @param string $infoId ��ϢID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		return $this->infoDAO->clickCount($infoId);
	}
//=================================��ϢͼƬ����=============================
	/**
	 * ���ݲ�ƷID��ȡ��ϢͼƬ�б�
	 * @param array $infoId
	 * @return bool
	 **/
	public function getInfoPicListByInfoId($infoId){
		return $this->infoDAO->getInfoPicListByInfoId($infoId);
	}
//=================================��Ϣ������=============================
	/**
	 * ������Ϣ���
	 * @param array $infoType
	 * @return bool
	 **/
	public function releaseInfoType($infoType){
		$msg=true;
		$checkUnique=$this->infoDAO->checkInfoTypeUnique($infoType['typeName'],$infoType['fid']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='��Ϣ������Ʋ����ظ���';
		}else{
			$result=$this->infoDAO->releaseInfoType($infoType);
			if($result<0)$msg='��Ϣ��𷢲�ʧ�ܣ�';
			else $this->infoDAO->cache($infoType['fid'],$infoType['type']);
		}
		return $msg;
	}
	/**
	 * �޸���Ϣ���
	 * @param array $infoType
	 * @return bool
	 **/
	public function saveInfoType($infoType){
		$msg=true;
		$resultInfoType=$this->infoDAO->getTypeInfo($infoType['id']);
		if($infoType['typeName']==$resultInfoType['type_name']){
			$result=$this->infoDAO->saveInfoType($infoType);
			if($result<0)$msg='��Ϣ����޸�ʧ�ܣ�';
			else $this->infoDAO->cache($infoType['fid'],$infoType['type']);
		}else{
			$checkUnique=$this->infoDAO->checkInfoTypeUnique($infoType['typeName'],$infoType['fid']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='��Ϣ������Ʋ����ظ���';
			}else{
				$result=$this->infoDAO->saveInfoType($infoType);
				if($result<0)$msg='��Ϣ����޸�ʧ�ܣ�';
				else $this->infoDAO->cache($infoType['fid'],$infoType['type']);
			}
		}
		return $msg;
	}
	/**
	 * ��Ϣ�������
	 * @param array $typeLayer 
	 * @return bool
	 **/
	public function orderInfoType($typeLayer,$fid,$type){
		$msg=true;
		$this->db->begin();
		try {
			foreach($typeLayer as $id=>$layer){
				$result=$this->infoDAO->changeInfoTypeLayer($layer,$id);
				if($result<0)throw new Exception('����������');
			}
			$this->db->commit();//�����ύ
			$this->infoDAO->cache($fid,$type);
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
	public function delInfoTypeById($id,$fid,$type){
		$msg=true;
		$result=$this->infoDAO->delInfoType($id);
		if($result<0)$msg='��Ϣ���ɾ��ʧ�ܣ�';
		else $this->infoDAO->cache($fid,$type);
		return $msg;		
	}
	/**
	 * ����ɾ����Ϣ���
	 * @param int $arrId
	 * @return bool
	 **/
	public function delInfoType($arrId,$fid,$type){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->infoDAO->delInfoType($id);
				if($result<0)throw new Exception('���ɾ������');
			}
			$this->db->commit();//�����ύ
			$this->infoDAO->cache($fid,$type);
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
	public function getInfoTypeDetailById($id){
		return $this->infoDAO->getTypeInfo($id);
	}
	/**
	 * ��ȡ��Ϣ����б�
	 * @param int $typeFatherId �����ƷID
	 * @access public
	 * @return array
	 */
	public function getInfoTypeList($typeFatherId=1,$type=1) {
		return $this->infoDAO->getInfoTypeList($typeFatherId,$type);
	}
//	public function getAllInfoTypeChByFatherTypeId($typeFatherId){
//		$typeInfoList=$this->infoDAO->getInfoTypeList($typeFatherId);
//		$typeStr='';
//		if(!empty($typeInfoList)){
//			for($i=0;$i<count($typeInfoList);$i++){
//				$typeStr.=$this->getAllInfoTypeChByFatherTypeId($typeInfoList[$i]['id']);
//			}
//			if($typeStr!=''){
//				return $typeStr;
//			}
//		}else{
//			return $typeStr.=$typeFatherId.',';
//		}
//	}
	public function getAllInfoTypeChByFatherTypeId($typeFatherId){
		$typeInfoList=$this->infoDAO->getInfoTypeList($typeFatherId);
		$typeStr='';
		if(!empty($typeInfoList)){
			for($i=0;$i<count($typeInfoList);$i++){
				$typeStr.=$typeInfoList[$i]['id'].',';
			}
			for($i=0;$i<count($typeInfoList);$i++){
				$typeStr.=$this->getAllInfoTypeChByFatherTypeId($typeInfoList[$i]['id']);
			}
			if($typeStr!=''){
				return $typeStr;
			}
		}else{
			//return $typeStr.=$typeFatherId.',';
		}
	}
	/**
	 * ��ȡ��Ϣ����б�(cache)
	 * @param int $typeFatherId �����ƷID
	 * @access public
	 * @return array
	 */
	public function getInfoTypeListByCache($typeFatherId=1,$type=1) {
		$name=$typeFatherId.'_'.$type;
		return $this->infoDAO->getArray($name);
	}
//=================================��Ʒ����=============================
}
?>