<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);

	$sql = $dbConn->query("UPDATE tbl_room SET room_status='".$status."' WHERE room_id='".$room_id."' ");
	if($sql){
		$getRoomName = $dbConn->query("SELECT room_name FROM tbl_room WHERE room_id='".$room_id."' ");
		$row = $getRoomName->fetch(PDO::FETCH_ASSOC);
		if($getRoomName->rowCount() > 0){
			extract($row);
			echo json_encode(array("response"=>"success","room_name"=>strtoupper($room_name)));
		}
	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>