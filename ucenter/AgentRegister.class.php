<?php
class AgentRegister{
	private $userName;
	private $userPassword;
	private $confirmUserPass;
	private $userEmail;
	private $userPhone;
	private $userRealName;
	private $userTel;
	private $areaIndex;
	private $agreement;
	private $db;
	
	function __construct($db,$userName,$userPassword,$confirmUserPass,$userEmail,$userPhone,$userRealName,$areaIndex,$userTel,$agreement){
		$this->db = $db;
		$this->userName = $userName;
		$this->userPassword = $userPassword;
		$this->confirmUserPass = $confirmUserPass;
		$this->userEmail = $userEmail;
		$this->userPhone = $userPhone;
		$this->userRealName = $userRealName;
		$this->userTel = $userTel;
		$this->areaIndex = $areaIndex;
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
		$user = $userService->getUserByUserName($this->userName);
		if(!empty($user)){
			$result[0] = 201;
			$result[1] = "该用户名已经被使用";
			return $result;
		}
		
		if($this->userPassword == "" || $this->confirmUserPass == "" || $this->userPassword != $this->confirmUserPass){
			$result[0] = 206;
			$result[1] = "两次密码不相同";
			return $result;
		}
		
		if($this->areaIndex == ""){
			$result[0] = 207;
			$result[1] = "没有选择所在地区";
			return $result;
		}
		$a = explode("-", $this->areaIndex);
		if(count($a) != 4){
			$result[0] = 207;
			$result[1] = "没有选择所在地区";
			return $result;
		}
		
		if($this->userPhone != ""){
			$user = $userService->getUserByUserPhone($this->userPhone);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "该手机号码已经被绑定";
				return $result;				
			}
		}
		
		if($this->userEmail != ""){
			$user = $userService->getUserByUserEmail($this->userEmail);
			if(!empty($user)){
				$result[0] = 201;
				$result[1] = "该邮箱地址已经被绑定";
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
		$user['userPhone'] = $this->userPhone;
		$user['userPhoneState'] = !empty($this->userPhone) ? 1 : 0;
		$user['userEmail'] = $this->userEmail;
		$user['userEmailState'] = 0;
		$user['userType'] = 2;
		$user['userGroupId'] = 0;
		$user['userState'] = 1;
		$user['UOpenId'] = "";
		$userService = new UserService($this->db);
		$userId = $userService->saveUser($user);
		
		//save the detail information in the database
		$a = explode("-", $this->areaIndex);
		$userDetail['userId'] = $userId;
		$userDetail['userdetailName'] = $this->userRealName;
		$userDetail['userdetailTel'] = $this->userTel;
		$userDetail['userdetailProvince'] = $a[0];
		$userDetail['userdetailCity'] = $a[1];
		$userDetail['userdetailDistrict'] = $a[2];
		$userDetail['userdetailArea'] = $a[3];		
		$userDetail['userdetailState'] = 0;
		$userService->saveUserDetail($userDetail);
		
		$result[0] = ERR_CODE_REGISTER_SUCCESS;
		return $result;
	}
}
?>