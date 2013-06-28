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
	private $db;
	
	function __construct($db,$userName,$userPassword,$confirmUserPass,$userEmail,$userPhone,$phoneCert,$agreement){
		$this->db = $db;
		$this->userName = $userName;
		$this->userPassword = $userPassword;
		$this->confirmUserPass = $confirmUserPass;
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
			$result[1] = "invalid account";
			return $result;
		}
		$userService = new UserService($this->db);
		$user = $userService->getUserByUserName($this->userName);
		if(!empty($user)){
			$result[0] = 201;
			$result[1] = "the acount found";
			return $result;
		}
		
		if($this->userPassword == "" || $this->confirmUserPass == "" || $this->userPassword != $this->confirmUserPass){
			$result[0] = 206;
			$result[1] = "Password is incorrect";
			return $result;
		}
		
		if($this->userPhone != ""){
			$user = $userService->getUserByUserPhone($this->userPhone);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "the phone already exist";
				return $result;				
			}
		}
		
		if($this->userEmail != ""){
			$user = $userService->getUserByUserEmail($this->userEmail);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "the email already exist";
				return $result;				
			}
		}
		
		if($this->agreement != "yes"){
			$result[0] = 207;
			$result[1] = "do not agree the related privacy";
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
		$user['userPhone'] = $this->userPhone;
		$user['userPhoneState'] = !empty($this->userPhone) ? 1 : 0;
		$user['userEmail'] = $this->userEmail;
		$user['userEmailState'] = 0;
		$user['userType'] = 3;
		$user['userGroupId'] = 1;
		$user['userState'] = 0;
		$userService = new UserService($this->db);
		$userId = $userService->saveUser($user);
		
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
				"http://www.88hom.com/email_check.php?UserID=".$userId."&VerifyCode=".$vcode."<br/>".		
				"请在48小时内完成验证，如果无法点击上面的链接，您可以复制该地址，并粘帖在浏览器的地址栏中访问。<br/>".
				"这只是一封系统自动发出的邮件，请不要直接回复。";
		$sendMail->body = $body;
		$sendMail->SMTPDebug =false;
		$sendMail->send();
	}
}
?>