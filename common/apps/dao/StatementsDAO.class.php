<?php
/**
 * 投递报表管理
 * @author David chunliumang@gmail.com
 * @version 1.0
 */
class StatementsDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * 发布信息
	 * @param array $info 信息对象
	 * @return boolean
	 */
	public function release($info){
		$sql="insert into ecms_statements(shopId,propertyId,canNum,endNum,notNum,dvState,qcTime,qcState,qcNotify,planDvTime,planQcTime,startTime,endTime,resolution,remark,fileTime,fileDate,status,createTime,updateTime) 
			  values(".$info['shopId'].",".$info['propertyId'].",".(empty($info['canNum'])?0:$info['canNum']).",".(empty($info['endNum'])?0:$info['endNum']).",
			  ".(empty($info['notNum'])?0:$info['notNum']).",'".(empty($info['dvState'])?'':$info['dvState'])."','".(empty($info['qcTime'])?'':$info['qcTime'])."','".(empty($info['qcState'])?'':$info['qcState'])."',
			  '".(empty($info['qcNotify'])?'':$info['qcNotify'])."','".(empty($info['planDvTime'])?'':$info['planDvTime'])."','".(empty($info['planQcTime'])?'':$info['planQcTime'])."',
			  '".(empty($info['startTime'])?'':$info['startTime'])."','".(empty($info['endTime'])?'':$info['endTime'])."','".(empty($info['resolution'])?'':$info['resolution'])."',
			  '".(empty($info['remark'])?'':$info['remark'])."','".(empty($info['fileTime'])?'':$info['fileTime'])."','".(empty($info['fileDate'])?'':$info['fileDate'])."',
			  ".$info['status'].",".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改信息
	 * @param array $info
	 * @return boolean
	 **/
	public function save($info){
		$sql="update ecms_statements set shopId=".$info['shopId'].",propertyId=".$info['propertyId'].",canNum=".(empty($info['canNum'])?0:$info['canNum']).",
			  endNum=".(empty($info['endNum'])?0:$info['endNum']).",notNum=".(empty($info['notNum'])?0:$info['notNum']).",dvState='".(empty($info['dvState'])?'':$info['dvState'])."',qcTime='".(empty($info['qcTime'])?'':$info['qcTime'])."',
			  qcState='".(empty($info['qcState'])?'':$info['qcState'])."',qcNotify='".(empty($info['qcNotify'])?'':$info['qcNotify'])."',planDvTime='".(empty($info['planDvTime'])?'':$info['planDvTime'])."',
			  planQcTime='".(empty($info['planQcTime'])?'':$info['planQcTime'])."',startTime='".(empty($info['startTime'])?'':$info['startTime'])."',endTime='".(empty($info['endTime'])?'':$info['endTime'])."',
			  resolution='".(empty($info['resolution'])?'':$info['resolution'])."',remark='".(empty($info['remark'])?'':$info['remark'])."',fileTime='".(empty($info['fileTime'])?'':$info['fileTime'])."',
			  fileDate='".(empty($info['fileDate'])?'':$info['fileDate'])."',status=".$info['status'].",updateTime=".time()." 
			  where id=".$info['id'];
		return $this->db->getQueryExeCute($sql);
	}
	/**
	 * 删除信息
	 * @param int $id 信息ID
	 * @return boolean
	 **/
	public function delInfo($id){
		$sql="delete from ecms_statements where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取信息详情
	 * @param public
	 * @return array
	 */
	public function getInfo($sql) {
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取信息列表
	 * @access public
	 * @return array
	 */
	public function getInfoList($sql){
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 计算信息条数
	 * @param public
	 * @return int
	 */
	public function countInfo($sql){
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 修改信息状态
	 * @param string $state 状态
	 * @param string $id	主键
	 * @return boolean
	 */
	public function changeState($state,$id){
		$sql="update ecms_statements set state=$state,updateTime=".time()." where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>