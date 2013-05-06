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
	
	public function register(){
		$result = validate();
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
		$userService = new UserService($this->db);
		$userId = $userService->saveUser($user);
		
		//send the verify email if the register is by email
		if(!empty($this->userEmail)){
			$certCode = md5(uniqid(rand()));
			$userService->saveCertCode($this->userEmail, $certCode);
			
			$mailSender = new SendMail();
			$mailSender->send();
		}
	}
	
	private function validate(){
		$result[0] = ERR_CODE_REGISTER_SUCCESS;
		$result[1] = "";
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
}
?>