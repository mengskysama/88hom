<?php
/**
 * 
 * 中介公司
 * @author David(dev.love.lm@gmail.com)
 * @since 2013-07-02
 */
class ImcpDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布信息
	public function release($imcp){
		$sql="insert into ecms_imcp(imcpName,imcpShortName,imcpAddress,imcpWebSite,imcpContent,
			  imcpLogo,imcpState,imcpUserId,imcpCreateTime,imcpUpdateTime) 
			  values('".(empty($imcp['imcpName'])?'':$imcp['imcpName'])."',
			  '".(empty($imcp['imcpShortName'])?'':$imcp['imcpShortName'])."',
			  '".(empty($imcp['imcpAddress'])?'':$imcp['imcpAddress'])."',
			  '".(empty($imcp['imcpWebSite'])?'':$imcp['imcpWebSite'])."',
			  '".(empty($imcp['imcpContent'])?'':$imcp['imcpContent'])."',
			  '".(empty($imcp['imcpLogo'])?'':$imcp['imcpLogo'])."',
			  ".(empty($imcp['imcpState'])?1:$imcp['imcpState']).",
			  ".(empty($imcp['imcpUserId'])?0:$imcp['imcpUserId']).",
			  ".time().",".time().")";
			return $this->db->getQueryExecute($sql);						
	}
	//修改中介公司
	public function modify($imcp){
		$sql="update ecms_imcp set imcpName='".(empty($imcp['imcpName'])?'':$imcp['imcpName'])."',
			  imcpShortName='".(empty($imcp['imcpShortName'])?'':$imcp['imcpShortName'])."',
			  imcpAddress='".(empty($imcp['imcpAddress'])?'':$imcp['imcpAddress'])."',
			  imcpWebSite='".(empty($imcp['imcpWebSite'])?'':$imcp['imcpWebSite'])."',
			  imcpContent='".(empty($imcp['imcpContent'])?'':$imcp['imcpContent'])."',
			  imcpLogo='".(empty($imcp['imcpLogo'])?'':$imcp['imcpLogo'])."',
			  imcpUpdateTime=".time()." 
			  where imcpId=".$imcp['imcpId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除中介公司
	public function delImcpById($id){
		$sql="delete from  ecms_imcp where imcpId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取中介公司
	 * @param string $where 
	 * @return array
	 */
	public function getImcpById($where) {
		$sql="select imcp.*,user.userId,user.userUsername from ecms_imcp as imcp 
			  inner join ecms_user as user on imcp.imcpUserId=user.userId $where";
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
	public function getImcpList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_imcp as imcp 
			  inner join ecms_user as user on imcp.imcpUserId=user.userId $where $order $limit";
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
	public function countImcp($where = ''){
		$sql="select count(*) as counts from ecms_imcp as imcp 
			  inner join ecms_user as user on imcp.imcpUserId=user.userId $where";
		return $this->db->getQueryValue($sql);
	}

}


?>