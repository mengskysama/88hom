<?php
class UserService{
	private $db=null;
	private $userDAO=null;
	public function __construct($db){
		$this->db=$db;
		$this->userDAO=new UserDAO($db);
	}
	//����û����ȡ�û���Ϣ
	public function getUserByUserName($username){
		$result=$this->userDAO->getUserByUserName($username);
		if(null==$result||$result==''){
			return '';
		}else{
			return $result;
		}
	}
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
		if(null==$result||$result==''){
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
		return $this->userDAO->saveUser($user);
	}
	
	public function activeUserEmail($userEmail){
		return $this->userDAO->activeUserEmail($userEmail);
	}
	
	//���ID��ȡ�û���Ϣ
	public function getUserById($id){
		$result=$this->userDAO->getUserById($id);
		if(null==$result||$result==''){
			return '';
		}else{
			return $result;
		}
	}
	
	//��ȡ�û���Ϣ�б�
	public function getUserList($where,$order,$limit){
		$result=$this->userDAO->getUserList($where,$order,$limit);
		if(!empty($result)){
			for($i=0;$i<count($result);$i++){
				$result[$i]['group']=$this->userDAO->getGroupDetailById($result[$i]['userGroupId']);
			}
		}
		return $result;
	}
	//��ȡ�û�����
	public function countUser($where){
		return $this->userDAO->countUser($where);
	}
	/**
	 * ���ID�����Ϣ״̬
	 * @access public
	 * @param int $state ״̬
	 * @param int $id
	 * @return boolean
	 **/
	public function changeState($state,$id){
		$msg=true;
		$result=$this->userDAO->changeState($state,$id);
		if($result<0)$msg='��Ϣ״̬���ʧ�ܣ�';
		return $msg;
	}
	//��̨�û��ǳ�
	public function getAdminLoginOut($msg=NULL){
		global $cfg,$html;
		$_SESSION['Admin_User']='';
		unset($_SESSION['Admin_User']);
		unset($_SESSION['Admin_Login']);
		$html->gotoFrame($cfg['web_url'].'admin/index.php',$msg);
		//header('location:'.$cfg['web_url'].'admin/index.php');
	}
	//����̨�û���¼�Ƿ����
	public function checkAdminUserExpired(){
		if(isset($_SESSION['Admin_User'])&&!empty($_SESSION['Admin_User'])){
			$user=$_SESSION['Admin_User'];
			$time=time()-$user['time'];
			if($time>7200){
				$this->getAdminLoginOut('��¼�ѹ��ڣ������µ�¼!');
			}else{
				$user['time']=time();
				$_SESSION['Admin_User']=$user;
			}
		}else{
			$this->getAdminLoginOut('��¼�ѹ��ڣ������µ�¼!');
		}
	}
	//������̨��������Ϣ
	public function releaseGroup($group){
		$msg=true;
		$checkUnique=$this->userDAO->checkGroupUnique($group['groupName']);
		if(!empty($checkUnique) && $checkUnique['counts']>0){
			$msg='���������Ʋ����ظ���';
		}else{
			$result=$this->userDAO->releaseGroup($group);
			if($result<0)$msg='��ӹ�����ʧ�ܣ�';
		}
		return $msg;
	}
	//�޸ĺ�̨���������Ϣ
	public function saveGroup($group){
		$msg=true;
		$resultGroup=$this->userDAO->getGroupDetailById($group['id']);
		if($group['groupName']==$resultGroup['groupName']){
			$result=$this->userDAO->saveGroup($group);
			if($result<0)$msg='��������޸�ʧ�ܣ�';
		}else{
			$checkUnique=$this->userDAO->checkGroupUnique($group['groupName']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				$msg='���������Ʋ����ظ���';
			}else{
				$result=$this->userDAO->saveGroup($group);
				if($result<0)$msg='��������޸�ʧ�ܣ�';
			}
		}
		return $msg;
	}
	/**
	 * ��ȡ�������
	 * @param string $id ��ϢID
	 * @return array
	 */
	public function getGroupDetailById($id) {
		return $this->userDAO->getGroupDetailById($id);
	}
	/**
	 * ��ȡ����б�
	 * @access public
	 * @return array
	 */
	public function getGroupList(){
		return $this->userDAO->getGroupList();
	}
	/**
	 * �����û����Ȩ��
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
	 * �����û�
	 * @access public
	 * @return array
	 */
	public function releaseSystemUser($user){
		$msg=true;
		$this->db->begin();//����ʼ
		try {
			$checkUnique=$this->userDAO->checkUsersUnique($user['username']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				throw new Exception('�û����Ѿ����ڣ�');
			}else{
				$user['password']=sysAuth($user['password']);
				$result=$this->userDAO->release($user);
				if($result<0){
					throw new Exception('���ϵͳ�û�ʧ�ܣ�');
				}else{
					$userId=$this->db->getInsertNum();
					$group=require ECMS_PATH_CONF.'system/group_'.$user['groupId'].'.php';
					$fp = fopen(ECMS_PATH_CONF . 'system/user_' . $userId . '.php', 'w');
					fputs($fp, '<?php return '.var_export($group, true) . '; ?>');
					fclose($fp);
				}
			}
			$this->db->commit();//�����ύ
		}catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();//�������
		return $msg;
	}
	public function saveSystemUser($user){
		$msg=true;
		$this->db->begin();//����ʼ
		try {
			$user['password']=sysAuth($user['password']);
			$result=$this->userDAO->save($user);
			if($result<0){
				throw new Exception('�޸���Ϣʧ�ܣ�');
			}else{
				$group=require ECMS_PATH_CONF.'system/group_'.$user['groupId'].'.php';
				$fp = fopen(ECMS_PATH_CONF . 'system/user_' . $user['id'] . '.php', 'w');
				fputs($fp, '<?php return '.var_export($group, true) . '; ?>');
				fclose($fp);
			}
			$this->db->commit();//�����ύ
		}catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();//�������
		return $msg;
	}
	public function delById($id){
		$msg=true;
		$result=$this->userDAO->del($id);
		if($result<0)$msg='��Ϣɾ��ʧ�ܣ�';
		return $msg;
	}
	//�޸�ϵͳ�û�Ȩ��
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
			$msg='û�д��û���Ϣ';
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
				$msg='�޸���վ����ʧ�ܣ�';
			}else{
				$webset=$this->getWebSet();
				$this->userDAO->cacheWebSet($webset);
			}
		}else{
			$result=$this->userDAO->releaseWebSet($webset);
			if($result<0){
				$msg='�½���վ����ʧ�ܣ�';
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
		if($result<0)$msg='�����޸Ĵ���';
		return $msg;
	}
	/**
	 * ����WEB�û�
	 * @access public
	 * @return array
	 */
	public function releaseWebUser($webUser){
		$msg=true;
		$this->db->begin();//����ʼ
		try {
			$checkUnique=$this->userDAO->checkWebUsersUnique($webUser['username']);
			if(!empty($checkUnique) && $checkUnique['counts']>0){
				throw new Exception('�û����Ѿ����ڣ�');
			}else{
				$webUser['password']=sysAuth($webUser['password'],'ENCODE',ECMS_KEY_WEB);
				$result=$this->userDAO->releaseWebUser($webUser);
				if($result<0){
					throw new Exception('�û�ע��ʧ�ܣ�');
				}
			}
			$this->db->commit();//�����ύ
		}catch (Exception $e) {
			$msg=$e->getMessage();
			$this->db->rollback();//����ع�
		}
		$this->db->end();//�������
		return $msg;
	}
	public function getWebUserById($id){
		$result=$this->userDAO->getWebUserById($id);
		if(empty($result)){
				return '';
			}else{
				return $result;
			}
		}
	public function getWebUserByUserName($userName){
		$result=$this->userDAO->getWebUserByUserName($userName);
		if(empty($result)){
			return '';
		}else{
			return $result;
		}
	}
	public function loginWebUser($webUser){
		$msg=true;
		$user=$this->getWebUserByUserName($webUser['username']);
		if(empty($user)){
			$msg='�û�����ڣ�';
		}else{
			if($webUser['password']==sysAuth($user['password'],'DECODE',ECMS_KEY_WEB)){
				$user['time']=time();
				$_SESSION['Web_Login']='webLoginOn';
				$_SESSION['Web_User']=$user;
			}else{
				$msg='�������!';
			}
		}
		return $msg;
	}
	public function getWebLoginOut($msg=NULL){
		global $cfg,$html;
		$_SESSION['Web_User']='';
		unset($_SESSION['Web_User']);
		unset($_SESSION['Web_Login']);
		$html->replaceUrl($cfg['web_url']);
		//header('location:'.$cfg['web_url'].'admin/index.php');
	}
	public function saveWebUser($webUser){
		$msg=true;
		$webUser['password']=sysAuth($webUser['password'],'ENCODE',ECMS_KEY_WEB);
		$result=$this->userDAO->saveWebUser($webUser);
		if($result<0){
			$msg='�޸Ļ���Ϣʧ�ܣ�';
		}
		return $msg;
	}
	public function getWebUserList($where='',$order='',$limit=''){
		return $this->userDAO->getWebUserList($where,$order,$limit);
	}
	public function countWebUser($where=''){
		return $this->userDAO->countWebUser($where);
	}
	public function changeWebUserState($id,$state){
		$msg=true;
		$result=$this->userDAO->changeWebUserState($id,$state);
		if($result<0)$msg='����ʧ�ܣ�';
		return $msg;
	}
	public function delWebUserById($id){
		$msg=true;
		$result=$this->userDAO->delWebUserById($id);
		if($result<0)$msg='ɾ��ʧ�ܣ�';
		return $msg;
	}
}
?>