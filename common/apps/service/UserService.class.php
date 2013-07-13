<?php
class UserService{
	private $db=null;
	private $userDAO=null;
	private $userDetailDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->userDAO=new UserDAO($db);
		$this->userDetailDAO=new UserDetailDAO($db);
	}
	//根据用户名获取用户信息
	public function getUserByUserName($username){
		$result=$this->userDAO->getUserByUserName($username);
		if(null==$result||$result==''){
			return '';
		}else{
			return $result;
		}
	}
	//根据ID获取用户信息
	public function getUserById($id){
		$result=$this->userDAO->getUserById($id);
		if(null==$result||$result==''){
			return '';
		}else{
			return $result;
		}
	}
	
	//获取用户信息列表
	public function getUserList($where,$order,$limit){
		$result=$this->userDAO->getUserList($where,$order,$limit);
		if(!empty($result)){
			for($i=0;$i<count($result);$i++){
				$result[$i]['group']=$this->userDAO->getGroupDetailById($result[$i]['userGroupId']);
			}
		}
		return $result;
	}
	//获取用户总数
	public function countUser($where){
		return $this->userDAO->countUser($where);
	}
	/**
	 * 根据ID更改信息状态
	 * @access public
	 * @param int $state 状态
	 * @param int $id
	 * @return boolean
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->userDAO->changeState($state,$id);
		if($result<0)$msg='信息状态更改失败！';
		return $msg;
	}
	//后台用户登出
	public function getAdminLoginOut($msg=NULL){
		global $cfg,$html;
		$_SESSION['Admin_User']='';
		unset($_SESSION['Admin_User']);
		unset($_SESSION['Admin_Login']);
		$html->gotoFrame($cfg['web_url'].'admin/index.php',$msg);
		//header('location:'.$cfg['web_url'].'admin/index.php');
	}
	//检查后台用户登录是否过期
	public function checkAdminUserExpired(){
		if(isset($_SESSION['Admin_User'])&&!empty($_SESSION['Admin_User'])){
			$user=$_SESSION['Admin_User'];
			$time=time()-$user['time'];
			if($time>18000){
				$this->getAdminLoginOut('登录已过期，请重新登录!');
			}else{
				$user['time']=time();
				$_SESSION['Admin_User']=$user;
			}
		}else{
			$this->getAdminLoginOut('会话已过期，请重新登录!');
		}
	}
	//发布后台管理组信息
	public function releaseGroup($group){
		$msg=true;
		$checkUnique=$this->userDAO->checkGroupUnique($group['groupName']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='管理组别名称不可重复！';
		}else{
			$result=$this->userDAO->releaseGroup($group);
			if($result<0)$msg='添加管理组失败！';
		}
		return $msg;
	}
	//修改后台管理组别信息
	public function saveGroup($group){
		$msg=true;
		$resultGroup=$this->userDAO->getGroupDetailById($group['id']);
		if($group['groupName']==$resultGroup['groupName']){
			$result=$this->userDAO->saveGroup($group);
			if($result<0)$msg='管理组别修改失败！';
		}else{
			$checkUnique=$this->userDAO->checkGroupUnique($group['groupName']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='管理组别名称不可重复！';
			}else{
				$result=$this->userDAO->saveGroup($group);
				if($result<0)$msg='管理组别修改失败！';
			}
		}
		return $msg;
	}
	/**
	 * 获取组别详情
	 * @param string $id 信息ID
	 * @return array
	 */
	public function getGroupDetailById($id) {
		return $this->userDAO->getGroupDetailById($id);
	}
	/**
	 * 获取组别列表
	 * @access public
	 * @return array
	 */
	public function getGroupList(){
		return $this->userDAO->getGroupList();
	}
	/**
	 * 发布用户组别权限
	 * @access public
	 * @return array
	 */
	public function releaseGroupPermissions($group,$gid){
		$userList=$this->userDAO->getUserList('where userGroupId='.$gid);
		for($i=0;$i<count($userList);$i++){	
			if(!file_exists(ECMS_PATH_CONF.'system/group_'.$gid.'.php')){
				$groupOld=array();
			}else{
				$groupOld=require ECMS_PATH_CONF.'system/group_'.$gid.'.php';
			}
			if(!file_exists(ECMS_PATH_CONF.'system/user_'.$userList[$i]['userId'].'.php')){
				$user=array();
			}else{
				$user=require ECMS_PATH_CONF.'system/user_'.$userList[$i]['userId'].'.php';
				if(!is_array($user)){
					$user=array();
				}
			}
			foreach($groupOld as $key=>$value){
				$user[$key]=0;
			}
			if(empty($group)){
				$fp = fopen(ECMS_PATH_CONF . 'system/user_' . $userList[$i]['userId'] . '.php', 'w');
				if(empty($user)){
					fputs($fp, '<?php return array(); ?>');
				}else{
					fputs($fp, '<?php return '.var_export($user, true) . '; ?>');
				}
				fclose($fp);
			}else{
				foreach($group as $key=>$value){
					$user[$key]=$value;
				}
				$fp = fopen(ECMS_PATH_CONF . 'system/user_' . $userList[$i]['userId'] . '.php', 'w');
				if(empty($user)){
					fputs($fp, '<?php return array(); ?>');
				}else{
					fputs($fp, '<?php return '.var_export($user, true) . '; ?>');
				}
				fclose($fp);
			}
		}
		$fp = fopen(ECMS_PATH_CONF . 'system/group_' . $gid . '.php', 'w');
		if(empty($group)){
			fputs($fp, '<?php return array(); ?>');
		}else{
			fputs($fp, '<?php return '.var_export($group, true) . '; ?>');
		}
		fclose($fp);
	}
	/**
	 * 发布用户
	 * @access public
	 * @return array
	 */
	public function releaseSystemUser($user){
		$msg=true;
		$this->db->begin();//事务开始
		try {
			$checkUnique=$this->userDAO->checkUsersUnique($user['userUsername']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				throw new Exception('用户名已经存在！');
			}else{
				$user['userPassword']=sysAuth($user['userPassword']);
				$result=$this->userDAO->release($user);
				if($result<0){
					throw new Exception('添加系统用户失败！');
				}else{
					$userId=$this->db->getInsertNum();
					$group=require ECMS_PATH_CONF.'system/group_'.$user['userGroupId'].'.php';
					$fp = fopen(ECMS_PATH_CONF . 'system/user_' . $userId . '.php', 'w');
					fputs($fp, '<?php return '.var_export($group, true) . '; ?>');
					fclose($fp);
				}
			}
			$this->db->commit();//事务提交
		}catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();//事务结束
		return $msg;
	}
	public function saveSystemUser($user){
		$msg=true;
		$this->db->begin();//事务开始
		try {
			$user['password']=sysAuth($user['password']);
			$result=$this->userDAO->save($user);
			if($result<0){
				throw new Exception('修改信息失败！');
			}else{
				$group=require ECMS_PATH_CONF.'system/group_'.$user['groupId'].'.php';
				$fp = fopen(ECMS_PATH_CONF . 'system/user_' . $user['id'] . '.php', 'w');
				fputs($fp, '<?php return '.var_export($group, true) . '; ?>');
				fclose($fp);
			}
			$this->db->commit();//事务提交
		}catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//事务回滚
		}
		$this->db->end();//事务结束
		return $msg;
	}
	public function delById($id){
		$msg=true;
		$result=$this->userDAO->del($id);
		if($result<0)$msg='信息删除失败！';
		return $msg;
	}
	//修改系统用户权限
	public function releaseSystemUserPermissions($user,$id){
		$msg=true;
		$sysUser=$this->getUserById($id);
		if(!empty($sysUser)){
			if(!file_exists(ECMS_PATH_CONF.'system/group_'.$sysUser['userGroupId'].'.php')){
				$group=array();
			}else{
				$group=require ECMS_PATH_CONF.'system/group_'.$sysUser['userGroupId'].'.php';
			}
			foreach($group as $key=>$value){
				$user[$key]=$value;
			}
			$fp = fopen(ECMS_PATH_CONF . 'system/user_' . $id . '.php', 'w');
			if(empty($user)){
				fputs($fp, '<?php return array(); ?>');
			}else{
				fputs($fp, '<?php return '.var_export($user, true) . '; ?>');
			}
			fclose($fp);
		}else{
			$msg='没有此用户信息';
		}
		return $msg;
	}
	public function getWebSet(){
		return $this->userDAO->getWebSet();
	}
	public function saveWebSet($webset){
		$msg=true;
		$checkUnique=$this->userDAO->checkWebSetUnique();
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$result=$this->userDAO->saveWebSet($webset);
			if($result<0){
				$msg='修改网站配置失败！';
			}else{
				$webset=$this->getWebSet();
				$this->userDAO->cacheWebSet($webset);
			}
		}else{
			$result=$this->userDAO->releaseWebSet($webset);
			if($result<0){
				$msg='新建网站配置失败！';
			}else{
				$webset=$this->getWebSet();
				$this->userDAO->cacheWebSet($webset);
			}	
		}
		return $msg;
	}
	public function editpwd($userId,$pwd){
		$msg=true;
		$result=$this->userDAO->editpwd($userId,$pwd);
		if($result<0)$msg='密码修改错误！';
		return $msg;
	}
	//added by Cheneil
	public function getUserByUserPhone($userPhone){
		$result=$this->userDAO->getUserByUserPhone($userPhone);
		if(null==$result||$result==''){
			return '';
		}else{
			return $result;
		}
	}
	
	public function isValidCertCode($certChannel,$vcode){
		$result=$this->userDAO->isValidCertCode($certChannel,$vcode);
		if(!$result){
			return false;
		}else{
			return true;
		}
	}
	
	public function deactiveCertCode($certChannel,$vcode){
		$result=$this->userDAO->deactiveCertCode($certChannel,$vcode);
		if($result<0){
			return false;
		}else{
			return true;
		}
	}
	
	public function saveCertCode($certChannel,$certCode){
		$result=$this->userDAO->saveCertCode($certChannel,$certCode);
		if($result<0){
			return false;
		}else{
			return true;
		}
	}
	
	public function saveUser($user){
		$userId = $this->userDAO->saveUser($user);
		return $userId;
	}
	
	public function updateUser($user){
		$userId = $this->userDAO->updateUser($user);
		return $userId;
	}
	
	public function activeUserEmail($userEmail){
		return $this->userDAO->activeUserEmail($userEmail);
	}
	
	public function getUserByUserEmail($userEmail){
		return $this->userDAO->getUserByUserEmail($userEmail);
	}
	
	public function getUserByUOpenID($openID){
		return $this->userDAO->getUserByUOpenID($openID);
	}
	
	public function loginUCenter($loginId){
		return $this->userDAO->getUserByLoginId($loginId);
	}
	
	public function getUserDetail($userId){
		return $this->userDetailDAO->getUserDetail($userId);
	}
	
	public function saveUserDetail($user){
		return $this->userDetailDAO->saveUserDetail($user);
	}
	
	public function updateUserDetail($user){
		return $this->userDetailDAO->updateUserDetail($user);
	}
	
	public function verifyEmailReg($userId,$vcode){
		$user = $this->getUserById($userId);
		if(!$user) return $user;
		
		$userEmail = $user['userEmail'];
		$result = $this->userDAO->verifyEmailReg($userEmail,$vcode);
		if($result){
			$this->activeUserEmail($userEmail);
			$userState['userId'] = $userId;
			$userState['userState'] = 1;
			$this->updateUser($userState);
			$this->deactiveCertCode($userEmail, $vcode);
			
			return $user;
		}else{
			return '';
		}
	}
	//Jul 13,2013
	public function authUser($user){
		$userId = $this->userDAO->updateUser($user);
		if($userId && isset($user['phoneCert'])){
			$this->deactiveCertCode($user['userPhone'], $user['phoneCert']);
		}
		return $userId;
	}
	//end to be added by Cheneil
}
?>