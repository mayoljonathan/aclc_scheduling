<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);

	$sql = $dbConn->query("UPDATE tbl_schedule SET schedule_status='".$status."' WHERE schedule_id='".$schedule_id."' ");
	if($sql){
		echo json_encode(array("response"=>"success"));
	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>