<?php
/**
 * 
 * 店铺
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-10
 */
class IMCPStoreDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布店铺
	public function release($imcp){
		$sql="insert into ecms_imcp_store(imcpstoreName,imcpstoreLogo,imcpstoreTel,imcpstoreAddress,imcpstoreManager,imcpId,imcpstoreState,areaId,imcpstoreCreateTime,imcpstoreUpdateTime) values('"
										.empty($imcp['imcpstoreName'])?'':$imcp['imcpstoreName']
										."','".empty($imcp['imcpstoreLogo'])?'':$imcp['imcpstoreLogo']
										."','".empty($imcp['imcpstoreTel'])?'':$imcp['imcpstoreTel']
										."','".empty($imcp['imcpstoreAddress'])?'':$imcp['imcpstoreAddress']
										."','".empty($imcp['imcpstoreManager'])?'':$imcp['imcpstoreManager']
										."',".empty($imcp['imcpId'])?0:$imcp['imcpId']
										.",".empty($imcp['imcpstoreState'])?0:$imcp['imcpstoreState']
										.",'".empty($imcp['areaId'])?'':$imcp['areaId']
										."',".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改店铺
	public function modify($imcp){
		$sql="update ecms_imcp_store set imcpstoreName='"
			.empty($imcp['imcpstoreName'])?'':$imcp['imcpstoreName']
			."',imcpstoreLogo='".empty($imcp['imcpstoreLogo'])?'':$imcp['imcpstoreLogo']
			."',imcpstoreTel='".empty($imcp['imcpstoreTel'])?'':$imcp['imcpstoreTel']
			."',imcpstoreAddress='".empty($imcp['imcpstoreAddress'])?'':$imcp['imcpstoreAddress']
			."',imcpstoreManager='".empty($imcp['imcpstoreManager'])?'':$imcp['imcpstoreManager']
			."',imcpId=".empty($imcp['imcpId'])?0:$imcp['imcpId']
			.",imcpstoreState=".empty($imcp['imcpstoreState'])?0:$imcp['imcpstoreState']
			.",areaId='".empty($imcp['areaId'])?'':$imcp['areaId']
			."',imcpstoreUpdateTime=".time()
			." where imcpstoreId=".$imcp['imcpstoreId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除店铺
	public function delIMCPStoreById($id){
		$sql="delete from  ecms_imcp_store where imcpstoreId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取店铺
	 * @param string $where 
	 * @return array
	 */
	public function getIMCPStoreById($id) {
		$sql="select * from ecms_imcp_store where imcpstoreId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取店铺列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getIMCPStoreList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_imcp_store $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改店铺
	 * @param string $state 状态
	 * @param string $imcpstoreId	主键
	 * @return boolean
	 */
	public function changeState($state,$imcpstoreId){
		$sql="update ecms_imcp_store set imcpstoreState=$state,imcpUpdateTime=".time()." where imcpstoreId=$imcpstoreId";
		return $this->db->getQueryExecute($sql);
	}
	//计算店铺条数
	public function countIMCPStore($where = ''){
		$sql="select count(*) as counts from ecms_imcp_store $where";
		return $this->db->getQueryValue($sql);
	}

}


?>