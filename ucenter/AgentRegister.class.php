<?php
class AgentRegister{
	private $userName;
	private $userPassword;
	private $confirmUserPass;
	private $userEmail;
	private $userPhone;
	private $userRealName;
	private $userTel;
	private $province;
	private $city;
	private $dist;
	private $agreement;
	private $db;
	
	function __construct($db,$userName,$userPassword,$confirmUserPass,$userEmail,$userPhone,$userRealName,$userTel,$province,$city,$dist,$agreement){
		$this->db = $db;
		$this->userName = $userName;
		$this->userPassword = $userPassword;
		$this->confirmUserPass = $confirmUserPass;
		$this->userEmail = $userEmail;
		$this->userPhone = $userPhone;
		$this->userRealName = $userRealName;
		$this->userTel = $userTel;
		$this->province = $province;
		$this->city = $city;
		$this->dist = $dist;
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
		$user['userType'] = 2;
		$user['userGroupId'] = 0;
		$user['userState'] = 0;
		$userService = new UserService($this->db);
		$userId = $userService->saveUser($user);
		
		//save the detail information in the database
		$userDetail['userId'] = $userId;
		$userDetail['userdetailName'] = $this->userRealName;
		$userDetail['userdetailTel'] = $this->userTel;
		$userDetail['userdetailProvince'] = $this->province;
		$userDetail['userdetailCity'] = $this->city;
		$userDetail['userdetailDistrict'] = $this->dist;
		$userDetail['userdetailState'] = 0;
		$userService->saveUserDetail($userDetail);
		
		$result[0] = ERR_CODE_REGISTER_SUCCESS;
		return $result;
	}
}
?>