<?php
require ECMS_PATH_LIBS.'classes/SendMail.class.php';

class UserRegister{
	private $userName;
	private $userPassword;
	private $confirmUserPass;
	private $userEmail;
	private $userPhone;
	private $phoneCert;
	private $agreement;
	private $userRealName;
	private $db;
	
	function __construct($db,$userName,$userPassword,$confirmUserPass,$userRealName,$userEmail,$userPhone,$phoneCert,$agreement){
		$this->db = $db;
		$this->userName = $userName;
		$this->userPassword = $userPassword;
		$this->confirmUserPass = $confirmUserPass;
		$this->userRealName = $userRealName;
		$this->userEmail = $userEmail;
		$this->userPhone = $userPhone;
		$this->phoneCert = $phoneCert;
		$this->agreement = $agreement;
	}
	
	private function validate(){
		$result[0] = ERR_CODE_REGISTER_SUCCESS;
		$result[1] = "";
		
		if($this->userName == ""){
			$result[0] = 203;
			$result[1] = "用户名不合法";
			return $result;
		}
		$userService = new UserService($this->db);
		$user = $userService->checkUserByUserName($this->userName);
		if(!empty($user)){
			$result[0] = 201;
			$result[1] = "该用户名已被使用";
			return $result;
		}
		
		if($this->userPassword == "" || $this->confirmUserPass == "" || $this->userPassword != $this->confirmUserPass){
			$result[0] = 206;
			$result[1] = "两次密码不相同";
			return $result;
		}
		
		if($this->userPhone != ""){
			if($this->userRealName == ""){
				$result[0] = 208;
				$result[1] = "真实姓名不能为空";
				return $result;
			}
			$m=mb_strlen($this->userRealName,'utf-8');
			$s=strlen($this->userRealName);
			if(!($s%$m==0&&$s%3==0)){
				$result[0] = 208;
				$result[1] = "真实姓名只能为汉字";
				return $result;
			}
			$user = $userService->checkUserByUserPhone($this->userPhone);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "该手机号码已被绑定";
				return $result;				
			}
		}
		
		if($this->userEmail != ""){
			$user = $userService->checkUserByUserEmail($this->userEmail);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "该邮箱地址已被绑定";
				return $result;				
			}
		}
		
		if($this->agreement != "yes"){
			$result[0] = 207;
			$result[1] = "没有同意\"服务条款\"和\"隐私权相关政策\"";
			return $result;
		}
		return $result;
	}
	
	public function register(){
		$result = $this->validate();
		if($result[0] != ERR_CODE_REGISTER_SUCCESS){
			return $result;
		}
		
		//save the information in the database		
		$user['userUsername'] = $this->userName;
		$user['userPassword'] = sysAuth($this->userPassword);
		$user['userRealName'] = $this->userRealName;
		$user['userPhone'] = $this->userPhone;
		$user['userPhoneState'] = !empty($this->userPhone) ? 1 : 0;
		$user['userEmail'] = $this->userEmail;
		$user['userEmailState'] = 0;
		$user['userType'] = 3;
		$user['userGroupId'] = 1;
		$user['userState'] = 1;
		$user['QQId'] = "";
		$user['WEIBOId'] = "";
		$userService = new UserService($this->db);
		$userId = $userService->saveUser($user);
		if(!$userId){
			$result[0] = 209;
			$result[1] = "注册失败";
			return $result;
		}

		$userDetail['userId'] = $userId;
		$userDetail['userdetailName'] = $this->userRealName;
		$userDetail['userdetailState'] = !empty($this->userPhone) ? 2 : 1;
		$userService->saveUserDetail($userDetail);
		
		//send the verify email if the register is by email
		if(!empty($this->userEmail)){
			$certCode = md5(uniqid(rand()));
			$userService->saveCertCode($this->userEmail, $certCode);			
			$this->sendEmail($this->userEmail, $this->userName, $userId, $certCode);
		}
		$result[0] = ERR_CODE_REGISTER_SUCCESS;
		return $result;
	}
	
	public function verifyAccount($userId,$verifyCode){
		$userService = new UserService($this->db);
		$user = $userService->getUserById($userId);
		$userEmail = $user['userEmail'];		
		$isValid = $userService->isValidCertCode($userEmail, $verifyCode);
		if($isValid){
			$userService->activeUserEmail($userEmail);
		}
		return $isValid;
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