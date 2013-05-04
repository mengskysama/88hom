<?php
/**
 * 
 * 中介公司
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-10
 */
class IMCPDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布信息
	public function release($imcp){
		$sql="insert into ecms_imcp(imcpName,imcpShortName,imcpWebSite,imcpLogo,imcpState,imcpCreateTime,imcpUpdateTime) values('"
										.empty($imcp['imcpName'])?'':$imcp['imcpName']
										."','".empty($imcp['imcpShortName'])?'':$imcp['imcpShortName']
										."','".empty($imcp['imcpWebSite'])?'':$imcp['imcpWebSite']
										."','".empty($imcp['imcpLogo'])?'':$imcp['imcpLogo']
										."',".empty($imcp['imcpState'])?0:$imcp['imcpState']
										.",".time()
										.",".time()
										.")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改中介公司
	public function modify($imcp){
		$sql="update ecms_imcp set imcpName='"
			.empty($imcp['imcpName'])?'':$imcp['imcpName']
			."',imcpShortName='".empty($imcp['imcpShortName'])?'':$imcp['imcpShortName']
			."',imcpWebSite='".empty($imcp['imcpWebSite'])?'':$imcp['imcpWebSite']
			."',imcpLogo='".empty($imcp['imcpLogo'])?'':$imcp['imcpLogo']
			."',imcpState=".empty($imcp['imcpState'])?0:$imcp['imcpState']
			.",imcpUpdateTime=".time()
			." where imcpId=".$imcp['imcpId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除中介公司
	public function delIMCPById($id){
		$sql="delete from  ecms_imcp where imcpId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取中介公司
	 * @param string $where 
	 * @return array
	 */
	public function getIMCPById($id) {
		$sql="select * from ecms_imcp where imcpId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取中介公司列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getIMCPList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_imcp $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 修改信息中介公司
	 * @param string $state 状态
	 * @param string $imcpId	主键
	 * @return boolean
	 */
	public function changeState($state,$imcpId){
		$sql="update ecms_imcp set imcpState=$state,imcpUpdateTime=".time()." where imcpId=$imcpId";
		return $this->db->getQueryExecute($sql);
	}
	//计算中介公司条数
	public function countIMCP($where = ''){
		$sql="select count(*) as counts from ecms_imcp $where";
		return $this->db->getQueryValue($sql);
	}

}


?>