<?php
class PropertyHandler{


	public function getRealEstateId($estateService,$estId,$estName){
		$realEstId = $estId;
		//save the estate if it's a new one
		if($estId == ""){
			$estate = $estateService->getEstateByName($estName);
			if(!$estate){
				$estate['communityName'] = $estName;
				$realEstId = $estateService->saveEstate($estate);
			}else{
				$realEstId = $estate['communityId'];
			}
			if(!$realEstId) return false;
		}else{
			//check if the estId is samed. if it's not same, create a new estate
			$existingEstate = $estateService->getEstateById($estId);
			if($existingEstate['communityName'] != $estName){
				$estate['communityName'] = $estName;
				$realEstId = $estateService->saveEstate($estate);
				if(!$realEstId) return false;
			}
		}
		return $realEstId;
	}
	
	protected function uploadPhoto($photo,$userId){
	
		$targetFolder = ECMS_PATH_ROOT.'uploads/community/'; // Relative to the root
		if((($photo["type"] != "image/gif")
				&& ($photo["type"] != "image/jpeg")
				&& ($photo["type"] != "image/pjpeg"))
				|| ($photo["size"] >= 200000)) {
			return false;
		}
		if($photo["error"] > 0) return false;
	
		$fileName = $photo['name'];
		$imageSuffix = substr($fileName,strrpos($fileName,'.'));
		$newfileName = rand(10,20).$userId.rand(1000000,9999999).$imageSuffix;
		$renameResult = copy($photo["tmp_name"],$targetFolder.$newfileName);
		if($renameResult){
			return $newfileName;
		}else{
			return false;
		}
	}
}