<?php
class UserDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * 根据username获取用户信息
	 * @param string $username 
	 * @access public
	 * @return array
	 */
	public function getUserByUserName($username){
		$sql="select * from ecms_user where userUsername='$username'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 根据id获取用户信息
	 * @param string $username 
	 * @access public
	 * @return array
	 */
	public function getUserById($id){
		$sql="select * from ecms_user where userId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取用户信息列表
	 * @param array $user 
	 * @access public
	 * @return array
	 */
	public function getUserList($where='',$order='',$limit=''){
		$sql="select * from ecms_user $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countUser($where){
		$sql="select count(*) as counts from ecms_user $where";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 根据ID更改信息状态
	 * @access public
	 * @param int $state 状态
	 * @param int $id
	 * @return boolean
	 **/
	public function changeState($state,$id){
		$sql="update ecms_user set userState=$state where userId=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 发布用户信息
	 * @param array $user 
	 * @access public
	 * @return array
	 */
	public function release($user){
		$sql="insert into ecms_user(username,passwd,email,userGroupId,shopIds,level,type,status)
			  values('".$user['username']."','".$user['password']."','".(empty($user['email'])?'':$user['email'])."',".$user['groupId'].",
			  '".(empty($user['shopIds'])?'':$user['shopIds'])."',".(empty($user['level'])?0:$user['level']).",
			  '".(empty($user['type'])?'admin':$user['type'])."','".(empty($user['status'])?'admin':$user['status'])."')";
		return $this->db->getQueryExecute($sql);
	}
	public function save($user){
		$sql="update ecms_users set passwd='".$user['password']."',email='".(empty($user['email'])?'':$user['email'])."',
			  userGroupId=".$user['groupId'].",shopIds='".(empty($user['shopIds'])?'':$user['shopIds'])."',
			  level=".(empty($user['level'])?0:$user['level'])." where user_id=".$user['id'];
		return $this->db->getQueryExecute($sql);
	}
	public function del($id){
		$sql="delete from ecms_user where userId=$id";
		return $this->db->getQueryExecute($sql);
	}
	public function editpwd($user_id,$pwd){
		$sql="update ecms_user set userPassword='".$pwd."' where userId=$user_id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 发布管理用户组信息
	 * @param array $user 
	 * @access public
	 * @return array
	 */
	public function releaseGroup($group){
		$sql="insert into ecms_group(group_name) values('".$group['groupName']."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 修改管理用户组信息
	 * @param array $user 
	 * @access public
	 * @return array
	 */
	public function saveGroup($group){
		$sql="update ecms_group set groupName='".$group['groupName']."' where groupId=".$group['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * 获取组别详情
	 * @param string $id 信息ID
	 * @return array
	 */
	public function getGroupDetailById($id) {
		$sql="select * from ecms_group where groupId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取组别列表
	 * @access public
	 * @return array
	 */
	public function getGroupList(){
		$sql="select * from ecms_group";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * 检查管理组别唯一性
	 * @param int $info 字典项信息
	 * @return string
	 **/
	public function checkGroupUnique($groupName) {
		$sql="select count(*) as counts from ecms_group where groupName='$groupName'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 检查系统用户账号唯一性
	 * @param int $info 字典项信息
	 * @return string
	 **/
	public function checkUsersUnique($userName) {
		$sql="select count(*) as counts from ecms_user where userUsername='$userName'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 获取web网站配置
	 * @param int $info 字典项信息
	 * @return string
	 **/
	public function getWebSet(){
		$sql="select * from ecms_webset limit 1";
		return $this->db->getQueryValue($sql);
	}
	public function releaseWebSet($webset){
		$sql="insert into ecms_webset(siteName,keywords,description,serverPhone,serverPhone1,serverFax,serverFax1,
			  mobile,mobile1,serverQicq,serverQicq1,serverMSN,serverMSN1,serverMail,serverMail1,baiduCountJs,googleCountJs,lang) 
			  values('".$webset['siteName']."','".$webset['keywords']."','".$webset['description']."','".$webset['serverPhone']."'
			  ,'".$webset['serverPhone1']."','".$webset['serverFax']."','".$webset['serverFax1']."','".$webset['mobile']."'
			  ,'".$webset['mobile1']."','".$webset['serverQicq']."','".$webset['serverQicq1']."','".$webset['serverMSN']."'
			  ,'".$webset['serverMSN1']."','".$webset['serverMail']."','".$webset['serverMail1']."','".$webset['baiduCountJs']."','".$webset['googleCountJs']."')";
		return $this->db->getQueryExecute($sql);
	}
	public function saveWebSet($webset){
		$sql="update ecms_webset set siteName='".$webset['siteName']."',keywords='".$webset['keywords']."',description='".$webset['description']."',serverPhone='".$webset['serverPhone']."'
		,serverPhone1='".$webset['serverPhone1']."',serverFax='".$webset['serverFax']."',serverFax1='".$webset['serverFax1']."',mobile='".$webset['mobile']."'
		,mobile1='".$webset['mobile1']."',serverQicq='".$webset['serverQicq']."',serverQicq1='".$webset['serverQicq1']."',serverMSN='".$webset['serverMSN']."'
		,serverMSN1='".$webset['serverMSN1']."',serverMail='".$webset['serverMail']."',serverMail1='".$webset['serverMail1']."',baiduCountJs='".$webset['baiduCountJs']."',googleCountJs='".$webset['googleCountJs']."'";
		return $this->db->getQueryExecute($sql);
	}
	public function checkWebSetUnique() {
		$sql="select count(*) as counts from ecms_webset ";
		return $this->db->getQueryValue($sql);
	}
	public function cacheWebSet($webset){
		$fp = fopen(ECMS_PATH_CONF . 'web/web.cfg.php', 'w');
		if(!empty($webset)){
			fputs($fp, '<?php return '.var_export($webset, true) . '; ?>');
		}else{
			fputs($fp, '<?php return array(); ?>');
		}
		fclose($fp);
	}
	public function releaseWebUser($webUser){
		$sql="insert into ecms_users_web(username,password,uname,sex,dept,tel,address,path,path_thumb,create_time,update_time)
			  values('".$webUser['username']."','".$webUser['password']."','".(empty($webUser['uname'])?'':$webUser['uname'])."',
			  ".(empty($webUser['sex'])?1:$webUser['sex']).",'".(empty($webUser['dept'])?'':$webUser['dept'])."','".(empty($webUser['tel'])?'':$webUser['tel'])."','".(empty($webUser['address'])?'':$webUser['address'])."',
			  '".(empty($webUser['path'])?'':$webUser['path'])."','".(empty($webUser['pathThumb'])?'':$webUser['pathThumb'])."',".time().",".time().")";
		return $this->db->getQueryExecute($sql);
	}
	public function getWebUserById($id){
		$sql="select * from ecms_users_web where id=$id";
		return $this->db->getQueryValue($sql);
	}
	public function getWebUserByUserName($userName){
		$sql="select * from ecms_users_web where username='".$userName."'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * 检查WEB用户账号唯一性
	 * @param int $info 字典项信息
	 * @return string
	 **/
	public function checkWebUsersUnique($userName) {
		$sql="select count(*) as counts from ecms_users_web where username='$userName'";
		return $this->db->getQueryValue($sql);
	}
	public function saveWebUser($webUser){
		$sql="update ecms_users_web set password='".$webUser['password']."',uname='".(empty($webUser['uname'])?'':$webUser['uname'])."',sex=".(empty($webUser['sex'])?1:$webUser['sex']).",dept='".(empty($webUser['dept'])?'':$webUser['dept'])."',
			  tel='".(empty($webUser['tel'])?'':$webUser['tel'])."',address='".(empty($webUser['address'])?'':$webUser['address'])."',path='".(empty($webUser['path'])?'':$webUser['path'])."',path_thumb='".(empty($webUser['pathThumb'])?'':$webUser['pathThumb'])."',
			  update_time=".time()." where id=".$webUser['id'];
		return $this->db->getQueryExecute($sql);
	}
	public function getWebUserList($where='',$order='',$limit=''){
		$sql="select * from ecms_users_web $where $order $limit";
		return $this->db->getQueryArray($sql);
	}
	public function countWebUser($where=''){
		$sql="select count(*) as counts from ecms_users_web $where";
		return $this->db->getQueryValue($sql);
	}
	public function changeWebUserState($id,$state){
		$sql="update ecms_users_web set state=$state where id=$id";
		return $this->db->getQueryExecute($sql);
	}
	public function delWebUserById($id){
		$sql="delete from ecms_users_web where id=$id";
		return $this->db->getQueryExecute($sql);
	}
}
?>