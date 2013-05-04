<?php
/**
 * 区域管理业务操作类
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
	 * 发布区域
	 * @param array $area
	 * @return bool
	 **/
	public function release($area){
		$msg=true;
		$checkUnique=$this->areaDAO->checkAreaUnique($area['name'],$area['fatherId']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='区域名称不可重复！';
		}else{
			$result=$this->areaDAO->release($area);
			if($result<0)$msg='区域名称发布失败！';
			else $this->areaDAO->cache($area['fatherId']);
		}
		return $msg;
	}
	/**
	 * 修改区域
	 * @param array $area
	 * @return bool
	 **/
	public function save($area){
		$msg=true;
		$resultArea=$this->areaDAO->getArea($area['id']);
		if($area['name']==$resultArea['name']){
			$result=$this->areaDAO->save($area);
			if($result<0)$msg='信息类别修改失败！';
			else $this->areaDAO->cache($area['fatherId']);
		}else{
			$checkUnique=$this->areaDAO->checkAreaUnique($area['name'],$area['fatherId']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='信息类别名称不可重复！';
			}else{
				$result=$this->areaDAO->save($area);
				if($result<0)$msg='信息类别修改失败！';
				else $this->areaDAO->cache($area['fatherId']);
			}
		}
		return $msg;
	}
	/**
	 * 删除区域
	 * @param int $id
	 * @param int $fatherId
	 * @return string
	 **/
	public function delArea($id,$fatherId){
		$msg=true;
		$result=$this->areaDAO->delArea($id);
		if($result<0)$msg='区域删除失败！';
		else $this->areaDAO->cache($fatherId);
		return $msg;		
	}
	/**
	 * 批量删除区域
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
				if($result<0)throw new Exception('区域删除错误！');
			}
			$this->db->commit();//事务提交
			$this->areaDAO->cache($fatherId);
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据ID获取区域
	 * @access public
	 * @param string $id
	 * @return array
	 **/
	public function getArea($id){
		return $this->areaDAO->getArea($id);
	}
	/**
	 * 获取区域列表
	 * @param int $fatherId 父级ID
	 * @access public
	 * @return array
	 */
	public function getAreaList($fatherId=0) {
		return $this->areaDAO->getAreaList($fatherId);
	}
	//递归找出某一级类别下的所有子类别
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
	//递归找出第一级类别
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
	 * 获取区域列表(cache)
	 * @param int $fatherId 父级ID
	 * @access public
	 * @return array
	 */
	public function getAreaListByCache($fatherId=0) {
		$name=$fatherId;
		return $this->areaDAO->getArray($name);
	}
}
?>