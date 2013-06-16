<?php
class UserDAO{
	private $db=null;
	public function __construct($db){
		$this->db=$db;
	}
	/**
	 * ���username��ȡ�û���Ϣ
	 * @param string $username 
	 * @access public
	 * @return array
	 */
	public function getUserByUserName($username){
		$sql="select * from ecms_user where userUsername='$username'";
		return $this->db->getQueryValue($sql);
	}
	//added by Cheneil
	public function getUserByUserPhone($userPhone){
		$sql = "select * from ecms_user where userPhone='".$userPhone."'";
		return $this->db->getQueryValue($sql);
	}
	
	public function isValidCertCode($certChannel,$vcode){
		$sql = "select id from ecms_register_cert_code where cert_channel='".$certChannel."' and cert_code='".$vcode."' and cert_code_status=1";
		return $this->db->getQueryValue($sql);
	}

	public function deactiveCertCode($certChannel,$vcode){
		$sql = "update ecms_register_cert_code set cert_code_status=0 where cert_channel='".$certChannel."' and cert_code='".$vcode."'";
		return $this->db->getQueryExecute($sql);
	}
	
	public function saveCertCode($certChannel,$vcode){
		$sql = "update ecms_register_cert_code set cert_code_status=0 where cert_channel='".$certChannel."' and cert_code_status=1";
		$this->db->getQueryExecute($sql);
		
		$sql = "insert into ecms_register_cert_code(cert_channel,cert_code,cert_code_status,create_time) values('".$certChannel."',".$vcode.",1,now())";
		return $this->db->getQueryExecute($sql);
	}
	
	public function saveUser($user){
		$sql = "insert into ecms_user(userUsername,userPassword,userPhone,userPhoneState,userEmail,userEmailState,userType,userGroupId,userState,UOpenId,userCreateTime,userUpdateTime) ".
				"values('".$user['userUsername']."','".$user['userPassword']."','".$user['userPhone']."',".$user['userPhoneState'].",'".$user['userEmail']."',".$user['userEmailState'].",".$user['userType'].",".$user['userGroupId'].",".$user['userState'].",'".$user['UOpenId']."',UNIX_TIMESTAMP(),UNIX_TIMESTAMP())";
		$this->db->query($sql);
		$userId = $this->db->getInsertNum();
		return $userId;
	}

	public function updateUser($user){
		$sql = "update ecms_user set ";
		if(isset($user['userPassword'])){
			$sql .= "userPassword='".$user['userPassword']."',";
		}
		if(isset($user['userPhone'])){
			$sql .= "userPhone='".$user['userPhone']."',";
		}
		if(isset($user['userPhoneState'])){
			$sql .= "userPhoneState=".$user['userPhoneState'].",";
		}
		if(isset($user['userEmail'])){
			$sql .= "userEmail='".$user['userEmail']."',";
		}
		if(isset($user['userEmailState'])){
			$sql .= "userEmailState=".$user['userEmailState'].",";
		}
		if(isset($user['userType'])){
			$sql .= "userType=".$user['userType'].",";
		}
		if(isset($user['userGroupId'])){
			$sql .= "userGroupId=".$user['userGroupId'].",";
		}
		if(isset($user['userState'])){
			$sql .= "userState=".$user['userState'].",";
		}
		if(isset($user['UOpenId'])){
			$sql .= "UOpenId=".$user['UOpenId'].",";
		}
						
		$sql .= "userUpdateTime=UNIX_TIMESTAMP() where userId=".$user['userId'];
		return $this->db->getQueryExecute($sql);
	}
	
	public function activeUserEmail($userEmail){
		$sql = "update ecms_user set userEmailState=1 where userEmail='".$userEmail."'";
		return $this->db->getQueryExecute($sql);
	}
	
	public function getUserByUserEmail($userEmail){
		$sql = "select * from ecms_user where userEmail='".$userEmail."'";
		return $this->db->getQueryValue($sql);
	}
	
	public function getUserByLoginId($loginId){
		$sql = "select * from ecms_user where userUsername='".$loginId."' or userPhone='".$loginId."' or (userEmail='".$loginId."' and userEmailState=1)";
		return $this->db->getQueryValue($sql);
	}
	
	public function getUserByUOpenID($openID){
		$sql = "select * from ecms_user where UOpenID='".$openID."'";
		return $this->db->getQueryValue($sql);
	}
	
	//end to be added by Cheneil
	
	/**
	 * ���id��ȡ�û���Ϣ
	 * @param string $username 
	 * @access public
	 * @return array
	 */
	public function getUserById($id){
		$sql="select * from ecms_user where userId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ��ȡ�û���Ϣ�б�
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
	 * ���ID�����Ϣ״̬
	 * @access public
	 * @param int $state ״̬
	 * @param int $id
	 * @return boolean
	 **/
	public function changeState($state,$id){
		$sql="update ecms_user set userState=$state where userId=$id";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �����û���Ϣ
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
	 * ���������û�����Ϣ
	 * @param array $user 
	 * @access public
	 * @return array
	 */
	public function releaseGroup($group){
		$sql="insert into ecms_group(group_name) values('".$group['groupName']."')";
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * �޸Ĺ����û�����Ϣ
	 * @param array $user 
	 * @access public
	 * @return array
	 */
	public function saveGroup($group){
		$sql="update ecms_group set groupName='".$group['groupName']."' where groupId=".$group['id'];
		return $this->db->getQueryExecute($sql);
	}
	/**
	 * ��ȡ�������
	 * @param string $id ��ϢID
	 * @return array
	 */
	public function getGroupDetailById($id) {
		$sql="select * from ecms_group where groupId=$id";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ��ȡ����б�
	 * @access public
	 * @return array
	 */
	public function getGroupList(){
		$sql="select * from ecms_group";
		return $this->db->getQueryArray($sql);
	}
	/**
	 * ���������Ψһ��
	 * @param int $info �ֵ�����Ϣ
	 * @return string
	 **/
	public function checkGroupUnique($groupName) {
		$sql="select count(*) as counts from ecms_group where groupName='$groupName'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ���ϵͳ�û��˺�Ψһ��
	 * @param int $info �ֵ�����Ϣ
	 * @return string
	 **/
	public function checkUsersUnique($userName) {
		$sql="select count(*) as counts from ecms_user where userUsername='$userName'";
		return $this->db->getQueryValue($sql);
	}
	/**
	 * ��ȡweb��վ����
	 * @param int $info �ֵ�����Ϣ
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
	 * ���WEB�û��˺�Ψһ��
	 * @param int $info �ֵ�����Ϣ
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