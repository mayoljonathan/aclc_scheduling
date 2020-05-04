<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);
	// check and insert
	if(isset($schoolyear_id) && empty($schoolyear_id)){
		$checkDuplicate = $dbConn->query("SELECT * FROM tbl_schoolyear WHERE schoolyear_code='".$schoolyear_code."' ");
		$row = $checkDuplicate->fetch(PDO::FETCH_ASSOC);
		if($checkDuplicate->rowCount() > 0 ) {
			echo json_encode(array("response"=>"exists","msg"=>"School Year code is taken."));
		}else{
			$sql = $dbConn->query("
				INSERT INTO tbl_schoolyear (schoolyear_code) 
		    	VALUES ('".$schoolyear_code."')
				");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"added","schoolyear_code"=>$schoolyear_code));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}
	// check and update
	}else{
		$checkDuplicate = $dbConn->query("SELECT * FROM tbl_schoolyear WHERE schoolyear_code='".$schoolyear_code."' ");
		$row = $checkDuplicate->fetch(PDO::FETCH_ASSOC);
		if($checkDuplicate->rowCount() > 0 ) {
			echo json_encode(array("response"=>"exists","msg"=>"School Year code is taken."));
		}else{
			$sql = $dbConn->query("
				UPDATE tbl_schoolyear SET schoolyear_code='".$schoolyear_code."'
				WHERE schoolyear_id='".$schoolyear_id."' ");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"updated","schoolyear_code"=>$schoolyear_code));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}
	}

	
		
?>