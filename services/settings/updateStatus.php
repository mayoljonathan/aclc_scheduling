<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);

	$sql = $dbConn->query("UPDATE tbl_schoolyear SET schoolyear_status='".$status."' WHERE schoolyear_id='".$schoolyear_id."' ");
	if($sql){
		$getSyCode = $dbConn->query("SELECT schoolyear_code FROM tbl_schoolyear WHERE schoolyear_id='".$schoolyear_id."' ");
		$row = $getSyCode->fetch(PDO::FETCH_ASSOC);
		if($getSyCode->rowCount() > 0){
			extract($row);
			echo json_encode(array("response"=>"success","schoolyear_code"=>strtoupper($schoolyear_code)));
		}
	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>