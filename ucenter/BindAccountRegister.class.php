<?php
require_once ECMS_PATH_LIBS.'classes/SendMail.class.php';

class BindAccountRegister{
	private $userName;
	private $userPassword;
	private $userPhone;
	private $phoneCert;
	private $userEmail;
	private $emailCert;
	private $agreement;
	private $qw_user;
	private $db;
	
	function __construct($db,$userName,$userPassword,$userEmail,$userPhone,$phoneCert,$agreement,$qw_user){
		$this->db = $db;
		$this->userName = $userName;
		$this->userPassword = $userPassword;
		$this->userEmail = $userEmail;
		$this->userPhone = $userPhone;
		$this->phoneCert = $phoneCert;
		$this->agreement = $agreement;
		$this->qw_user = $qw_user;
	}
	
	public function register(){
		
		$userService = new UserService($this->db);
		//binding with an existing account
		if($this->userName != "" && $this->userPassword != ""){
			$user = $userService->getUserByUserName($this->userName);
			if(empty($user) || sysAuth($user['userPassword'],'DECODE') != $this->userPassword){
				$result[0] = 201;
				$result[1] = "该账号不存在或者密码不正确";
				return $result;
			}
			$_SESSION['UCUser'] = $user;
			return $this->bindingWithExistingAcc($user['userId']);
		}

		if($this->agreement == "" || $this->agreement != "yes"){
			$result[0] = 207;
			$result[1] = "请同意\"服务条款\"和\"隐私权相关政策\"";
			return $result;
		}
		
		//binding with a mobile phone
		if($this->userPhone != ""){
			$user = $userService->getUserByUserPhone($this->userPhone);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "该手机号码已被其它账号绑定";
				return $result;
			}
			return $this->bindingWithMobile();	
		}
		//binding with a email
		if($this->userEmail != ""){
			$user = $userService->getUserByUserEmail($this->userEmail);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "该邮箱已被其它账号绑定";
				return $result;				
			}
			return $this->bindingWithEmail();
		}
		
		
		$result[0] = ERR_CODE_REGISTER_SUCCESS;
		return $result;
	}
	
	private function bindingWithMobile(){
		$result[0] = ERR_CODE_REGISTER_SUCCESS;

		$defaultUserPassword = $this->genDefaultUserPassword();
		$defaultUserUserName = $this->genDefaultUserName();
		$user['userUsername'] = $defaultUserUserName;
		$user['userPassword'] = sysAuth($defaultUserPassword);
		$user['userPhone'] = $this->userPhone;
		$user['userPhoneState'] = 1;
		$user['userEmail'] = '';
		$user['userEmailState'] = 0;
		$user['userType'] = 3;
		$user['userGroupId'] = 0;
		$user['userState'] = 1;
		$user['UOpenId'] = $this->qw_user['openID'];
		$userService = new UserService($this->db);
		$userId = $userService->saveUser($user);		
		$userService->deactiveCertCode($this->userPhone,$this->phoneCert);
		$this->sendRegMessage($userId,$defaultUserUserName, $defaultUserPassword);

		$user['userId'] = $userId;
		$_SESSION['UCUser'] = $user;
		return $result;
		
	}
	
	private function bindingWithEmail(){
		$result[0] = ERR_CODE_REGISTER_SUCCESS;

		$defaultUserName = $this->genDefaultUserName();
		$defaultUserPassword = $this->genDefaultUserPassword();
		$user['userUsername'] = $defaultUserName;
		$user['userPassword'] = sysAuth($defaultUserPassword);
		$user['userPhone'] = '';
		$user['userPhoneState'] = 0;
		$user['userEmail'] = $this->userEmail;
		$user['userEmailState'] = 0;
		$user['userType'] = 3;
		$user['userGroupId'] = 0;
		$user['userState'] = 0;
		$user['UOpenId'] = $this->qw_user['openID'];
		$userService = new UserService($this->db);
		$userId = $userService->saveUser($user);
		
		$certCode = md5(uniqid(rand()));
		$userService->saveCertCode($this->userEmail, $certCode);			
		$this->sendEmail($this->userEmail, $defaultUserName, $userId, $certCode);
		$this->sendRegMessage($userId,$defaultUserName, $defaultUserPassword);
		
		$user['userId'] = $userId;
		$_SESSION['UCUser'] = $user;
		return $result;		
	}
	
	private function bindingWithExistingAcc($userId){
		$result[0] = ERR_CODE_REGISTER_SUCCESS;
		
		$user['userId'] = $userId;
		$user['UOpenId'] = $this->qw_user['openID'];
		$userService = new UserService($this->db);
		$userService->updateUser($user);
		return $result;
		
	}
	
	private function genDefaultUserName(){
		$charactors = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$userService = new UserService($this->db);
		while(true){
			$defaultUserName = $charactors[rand(0, 25)].rand(10000,99999);
			$user = $userService->getUserByUserName($defaultUserName);
			if(!empty($user)) continue;
			return $defaultUserName;			
		}
	}
	private function genDefaultUserPassword(){
		return rand(100000, 999999);
	}
	private function sendRegMessage($userId,$userName,$password){
		$message['messageTitle'] = "用户注册信息";
		$message['messageContent'] = $userName." 用户，欢迎您在 ".date("Y年m月d日")." 注册成功，如果您已对信息了解完整，为了安全请即时删除此邮件。".
									 "注册选择类型：个人（不可修改）".
									  "用户名：".$userName."（不可修改）".
									    "密码：".$password."（可修改）";
		$message['messageFromUserId'] = 9999999;
		$message['messagetypeId'] = 2;
		$message['messageState'] = 0;
		$userService = new UserService($this->db);
		$message['messageToUserId'] = $userId;
		$messageService = new MessageService($this->db);
		$messageService->release($message);
	}
	
	private function sendEmail($to,$userName,$userId,$vcode){

		$sendMail = new SendMail();
		$sendMail->mailer = ECMS_MAIL_MAILER;
		$sendMail->SMTPAuth = true;
		$sendMail->isHTML(true);
		$sendMail->host = ECMS_MAIL_HOST;
		$sendMail->from = ECMS_MAIL_USERNAME;
		$sendMail->fromName = ECMS_MAIL_USERNAME;
		$sendMail->sender = ECMS_MAIL_USERNAME;
		$sendMail->username = ECMS_MAIL_USERNAME;
		$sendMail->password = ECMS_MAIL_PASSWORD;
		$sendMail->addAddress($to);
		
		$sendMail->subject = "欢迎注册房不剩房通行证，请验证您的邮箱";
		$body = "亲爱的用户".$userName."，您好：<br/>".
				"感谢您注册房不剩房，点击以下链接验证您的邮箱，只需一步即可尽享房不剩房服务！<br/>".		
				"http://test.88hom.com/ucenter/v_email_check.php?UserID=".$userId."&VerifyCode=".$vcode."<br/>".		
				"请在48小时内完成验证，如果无法点击上面的链接，您可以复制该地址，并粘帖在浏览器的地址栏中访问。<br/>".
				"这只是一封系统自动发出的邮件，请不要直接回复。";
		$sendMail->body = $body;
		$sendMail->SMTPDebug =false;
		$sendMail->send();
	}
}

?>