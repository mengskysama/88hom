<?php
/**
 * 招聘管理业务操作类
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
//=================================招聘信息操作=============================
	/**
	 * 发布招聘信息
	 * @param array $rm 
	 * @return boolean
	 */
	public function release($rm){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->rmDAO->release($rm);
			if($result<0)throw new Exception('发布信息失败！');
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 修改招聘信息
	 * @param array $rm
	 * @return bool
	 **/
	public function saveRecruiment($rm){
		$msg=true;
		$this->db->begin();
		try {
			$result=$this->rmDAO->saveRecruiment($rm);
			if($result<0)throw new Exception('信息修改失败！');
			$this->db->commit();//事务提交
		} catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();
		return $msg;
	}
	/**
	 * 根据招聘信息ID删除信息
	 * @access public
	 * @param string $id
	 * @return bool
	 **/
	public function delRmById($id){
		$msg=true;
		$result=$this->rmDAO->delRecruitemt($id);
		if($result<0)$msg='信息删除失败！';
		return $msg;
	}
	/**
	 * 根据信息ID获取信息详情
	 * @access public
	 * @param string $id 信息ID
	 * @return Array
	 **/
	public function getRmDetailById($id,$type='web'){
		return $this->rmDAO->getRmInfoDetail($id,$type);
	}
	/**
	 * 获取信息列表
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
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($where = ''){
		return $this->rmDAO->countInfo($where);
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
		$result=$this->rmDAO->changeState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	/**
	 * 点击统计
	 * @param string $id 
	 * @return boolean
	 **/
	public function clickCount($id){
		return $this->rmDAO->clickCount($id);
	}
//=================================招聘信息类别操作=============================
	/**
	 * 发布招聘信息类别
	 * @param array $rmType
	 * @return bool
	 **/
	public function releaseRmType($rmType){
		$msg=true;
		$checkUnique=$this->rmDAO->checkRmTypeUnique($rmType['typeName']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='信息类别名称不可重复！';
		}else{
			$result=$this->rmDAO->releaseRmType($rmType);
			if($result<0)$msg='信息类别发布失败！';
			else $this->rmDAO->cache($rmType['fid']);
		}
		return $msg;
	}
	/**
	 * 修改招聘信息类别
	 * @param array $rmType
	 * @return bool
	 **/
	public function saveRmType($rmType){
		$msg=true;
		$resultRmType=$this->rmDAO->getRmTypeDetail($rmType['id']);
		if($rmType['typeName']==$resultRmType['type_name']){
			$result=$this->rmDAO->saveRmType($rmType);
			if($result<0)$msg='信息类别修改失败！';
			else $this->rmDAO->cache($rmType['fid']);
		}else{
			$checkUnique=$this->rmDAO->checkRmTypeUnique($rmType['typeName']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='信息类别名称不可重复！';
			}else{
				$result=$this->rmDAO->saveRmType($rmType);
				if($result<0)$msg='信息类别修改失败！';
				else $this->rmDAO->cache($rmType['fid']);
			}
		}
		return $msg;
	}
	/**
	 * 招聘信息类别排序
	 * @param array $typeLayer 
	 * @return bool
	 **/
	public function orderRmType($typeLayer,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($typeLayer as $id=>$layer){
				$result=$this->rmDAO->changeRmTypeLayer($layer,$id);
				if($result<0)throw new Exception('类别排序错误！');
			}
			$this->db->commit();//事务提交
			$this->rmDAO->cache($fid);
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
	public function delRmTypeById($id,$fid){
		$msg=true;
		$result=$this->rmDAO->delRmType($id);
		if($result<0)$msg='信息类别删除失败！';
		else $this->rmDAO->cache($fid);
		return $msg;		
	}
	/**
	 * 批量删除信息类别
	 * @param int $arrId
	 * @return bool
	 **/
	public function delRmType($arrId,$fid){
		$msg=true;
		$this->db->begin();
		try {
			foreach($arrId as $key=>$id){
				$result=$this->rmDAO->delRmType($id);
				if($result<0)throw new Exception('类别删除错误！');
			}
			$this->db->commit();//事务提交
			$this->rmDAO->cache($fid);
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
	public function getRmTypeDetailById($id){
		return $this->rmDAO->getRmTypeDetail($id);
	}
	/**
	 * 获取信息类别列表
	 * @param int $fid 父类产品ID
	 * @access public
	 * @return array
	 */
	public function getRmTypeList($fid=1) {
		return $this->rmDAO->getRmTypeList($fid);
	}
	/**
	 * 获取信息类别列表(cache)
	 * @param int $fid 
	 * @access public
	 * @return array
	 */
	public function getRmTypeListByCache($fid=1) {
		return $this->rmDAO->getArray($fid);
	}
}
?>