<?php
/**
 * 信息管理业务操作类
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
//=================================信息操作=============================
	/**
	 * 发布信息
	 * @param array $info 信息对象 
	 * @return boolean
	 */
	public function release($info){
		$msg=true;
		$result=$this->mediaDAO->release($info);
		if($result<0)$msg='发布信息失败！';
		return $msg;
	}
	/**
	 * 修改信息
	 * @param array $info
	 * @return bool
	 **/
	public function saveInfo($info){
		$msg=true;
		$result=$this->mediaDAO->saveInfo($info);
		if($result<0)$msg='信息修改失败！';
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
		$result=$this->mediaDAO->delInfo($id);
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
		return $this->mediaDAO->getInfoDetailByInfoId($infoId,$type);
	}
	/**
	 * 取最新信息详情一条
	 * @return array
	 */
	public function getInfoDetailByFirst(){
		return $this->mediaDAO->getInfoDetailByFirst();
	}
	/**
	 * 取下一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @return array
	 */
	public function getNextInfo($infoId,$type='web'){
		return $this->mediaDAO->getNextInfo($infoId,$type);
	}
	/**
	 * 取上一条信息
	 * @param string $infoId 信息ID
	 * @param string $field 字段
	 * @return array
	 */
	public function getPreInfo($infoId,$type='web'){
		return $this->mediaDAO->getPreInfo($infoId,$type);
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
		return $this->mediaDAO->getInfoList($field,$where,$order,$limit);
	}
	/**
	 * 计算信息条数
	 * @param string $where 计算条件
	 * @return int
	 */
	public function countInfo($where = ''){
		return $this->mediaDAO->countInfo($where);
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
		$result=$this->mediaDAO->changeState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	/**
	 * 点击统计
	 * @param string $infoId 信息ID
	 * @return boolean
	 **/
	public function clickCount($infoId){
		return $this->mediaDAO->clickCount($infoId);
	}
}
?>