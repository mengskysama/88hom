<?php
/**
 * 信息管理业务操作类
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
//=================================信息操作=============================
	/**
	 * 发布信息
	 * @param array $info 信息对象 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$this->db->begin();
		try {
//			$info['content']=$this->linkService->addInnerLink($info['content']);
			$result=$this->infoDAO->release($info);
			if($result<0)throw new Exception('发布信息失败！');
			$infoId=$this->db->getInsertNum();
//			$keyword=$info['keyword'];
//			if($keyword){
//				if($info['typeId']==1||$info['typeId']==2||$info['typeId']==3){
//					$result=$this->linkService->releaseUrlKeyWord($keyword,ECMS_WEB_URL.'news/d-'.$info['typeId'].'-'.$infoId.'.htm',1);
//				}
//				if($result<0)throw new Exception('发布关键字内链失败！');
//			}
			//插入上传图片
			if(!empty($info['picUrl'])){
				foreach($info['picUrl'] as $key=>$value){
					$result=$this->infoDAO->insertInfoPic($info['picUrl'][$key],$info['picThumb'][$key],$info['picDesc'][$key],$infoId);
					if($result<0) throw new Exception('上传信息图片失败！');
				}
			}
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 修改信息
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$msg=true;
		$this->db->begin();
		try {
//			$info['content']=$this->linkService->addInnerLink($info['content']);
			$result=$this->infoDAO->saveInfo($info);
			if($result<0)throw new Exception('信息修改失败！');
			//删除信息图片
			$result=$this->infoDAO->delInfoPic($info['id']);
			if($result<0) throw new Exception('删除信息图片失败！');
			//插入信息图片
			if(!empty($info['picUrl'])){
				foreach($info['picUrl'] as $key=>$value){
					$result=$this->infoDAO->insertInfoPic($info['picUrl'][$key],$info['picThumb'][$key],$info['picDesc'][$key],$info['id']);
					if($result<0) throw new Exception('插入信息图片失败！');
				}
			}
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据信息ID删除信息
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delInfoById($id){
		$msg=true;
		$result=$this->infoDAO->delInfo($id);
		if($result<0)$msg='信息删除失败！';
		return $msg;
	}
	/**
	 * 根据信息ID获取信息详情
	 * @access public
	 * @param string $id 信息ID
	 * @return Array
	 **/
	public function getInfoDetailByInfoId($infoId,$type='web'){
		return $this->infoDAO->getInfoDetailByInfoId($infoId,$type);
	}
	/**
	 * 取最新信息详情一条
	 * @return array
	 */
	public function getInfoDetailByFirst(){
		return $this->infoDAO->getInfoDetailByFirst();
	}
	/**
	 * 取下一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @param string $typeId 信息类别
	 * @return array
	 */
	public function getNextInfo($infoId,$typeId,$type='web'){
		return $this->infoDAO->getNextInfo($infoId,$typeId,$type);
	}
	/**
	 * 取上一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @param string $typeId 信息类别
	 * @return array
	 */
	public function getPreInfo($infoId,$typeId,$type='web'){
		return $this->infoDAO->getPreInfo($infoId,$typeId,$type);
	}
	/**
	 * 获取信息列表
	 * @param string $field
	 * @param string $where
	 * @param string $order
	 * @param string $limit
	 * @return array
	 **/
	public function getInfoList($field = '*',$where='',$order='',$limit=''){
		return $this->infoDAO->getInfoList($field,$where,$order,$limit);
	}
	//递归找出第一级类别
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
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($where = ''){
		return $this->infoDAO->countInfo($where);
	}
	/**
	 * 根据产品ID更改信息状态
	 * @access public
	 * @param string $state 状态
	 * @param string $id
	 * @return bool
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->infoDAO->changeState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	/**
	 * 点击统计
	 * @param string $infoId 信息ID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		return $this->infoDAO->clickCount($infoId);
	}
//=================================信息图片操作=============================
	/**
	 * 根据产品ID获取信息图片列表
	 * @param array $infoId
	 * @return bool
	 **/
	public function getInfoPicListByInfoId($infoId){
		return $this->infoDAO->getInfoPicListByInfoId($infoId);
	}
//=================================信息类别操作=============================
	/**
	 * 发布信息类别
	 * @param array $infoType
	 * @return bool
	 **/
	public function releaseInfoType($infoType){
		$msg=true;
		$checkUnique=$this->infoDAO->checkInfoTypeUnique($infoType['typeName'],$infoType['fid']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='信息类别名称不可重复！';
		}else{
			$result=$this->infoDAO->releaseInfoType($infoType);
			if($result<0)$msg='信息类别发布失败！';
			else $this->infoDAO->cache($infoType['fid'],$infoType['type']);
		}
		return $msg;
	}
	/**
	 * 修改信息类别
	 * @param array $infoType
	 * @return bool
	 **/
	public function saveInfoType($infoType){
		$msg=true;
		$resultInfoType=$this->infoDAO->getTypeInfo($infoType['id']);
		if($infoType['typeName']==$resultInfoType['type_name']){
			$result=$this->infoDAO->saveInfoType($infoType);
			if($result<0)$msg='信息类别修改失败！';
			else $this->infoDAO->cache($infoType['fid'],$infoType['type']);
		}else{
			$checkUnique=$this->infoDAO->checkInfoTypeUnique($infoType['typeName'],$infoType['fid']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='信息类别名称不可重复！';
			}else{
				$result=$this->infoDAO->saveInfoType($infoType);
				if($result<0)$msg='信息类别修改失败！';
				else $this->infoDAO->cache($infoType['fid'],$infoType['type']);
			}
		}
		return $msg;
	}
	/**
	 * 信息类别排序
	 * @param array $typeLayer 
	 * @return bool
	 **/
	public function orderInfoType($typeLayer,$fid,$type){
		$msg=true;
		$this->db->begin();
		try {
			foreach($typeLayer as $id=>$layer){
				$result=$this->infoDAO->changeInfoTypeLayer($layer,$id);
				if($result<0)throw new Exception('类别排序错误！');
			}
			$this->db->commit();//事务提交
			$this->infoDAO->cache($fid,$type);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 删除信息类别
	 * @param int $id
	 * @return bool
	 **/
	public function delInfoTypeById($id,$fid,$type){
		$msg=true;
		$result=$this->infoDAO->delInfoType($id);
		if($result<0)$msg='信息类别删除失败！';
		else $this->infoDAO->cache($fid,$type);
		return $msg;		
	}
	/**
	 * 批量删除信息类别
	 * @param int $arrId
	 * @return bool
	 **/
	public function delInfoType($arrId,$fid,$type){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->infoDAO->delInfoType($id);
				if($result<0)throw new Exception('类别删除错误！');
			}
			$this->db->commit();//事务提交
			$this->infoDAO->cache($fid,$type);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据信息ID获取信息类别详情
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getInfoTypeDetailById($id){
		return $this->infoDAO->getTypeInfo($id);
	}
	/**
	 * 获取信息类别列表
	 * @param int $typeFatherId 父类产品ID
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
	 * 获取信息类别列表(cache)
	 * @param int $typeFatherId 父类产品ID
	 * @access public
	 * @return array
	 */
	public function getInfoTypeListByCache($typeFatherId=1,$type=1) {
		$name=$typeFatherId.'_'.$type;
		return $this->infoDAO->getArray($name);
	}
//=================================产品操作=============================
}
?>