<?php
/**
 * 
 * 用户组
 * @author Sam(semovy@gmail.com)
 * @since 2013-04-29
 */
class GroupDAO  {
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	//发布用户组
	public function release($group){
		$sql="insert into ecms_group(groupName) values('"
										.(empty($group['groupName'])?'':$group['groupName'])."')";
										
			return $this->db->getQueryExecute($sql);	
	}
	//修改用户组
	public function modify($group){
		$sql="update ecms_group set groupName='"
			.(empty($group['groupName'])?'':$group['groupName'])
			."' where groupId=".$group['groupId'];
		return $this->db->getQueryExeCute($sql);
	}
	//删除用户组
	public function delGroupById($id){
		$sql="delete from  ecms_group where groupId=".$id;
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取用户组
	 * @param string $where 
	 * @return array
	 */
	public function getGroupById($id) {
		$sql="select * from ecms_group where groupId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取用户组列表
	 * @access public
	 * @param string $field 数据库字段
	 * @param string $where 查询条件
	 * @param string $order 排序条件
	 * @param string $limit 信息条数
	 * @return array
	 */
	public function getGroupList($field = '*',$where='',$order='',$limit=''){
		$sql="select $field from ecms_group $where $order $limit";
		return $this->db->getQueryArray($sql);
	}


}


?>