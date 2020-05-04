<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);
	// check and insert
	if(isset($room_id) && empty($room_id)){
		$checkDuplicate = $dbConn->query("SELECT * FROM tbl_room WHERE room_name='".$room_name."' ");
		$row = $checkDuplicate->fetch(PDO::FETCH_ASSOC);
		if($checkDuplicate->rowCount() > 0 ) {
			echo json_encode(array("response"=>"exists","msg"=>"Room name is taken."));
		}else{
			$sql = $dbConn->query("
				INSERT INTO tbl_room (room_name,floor_level,student_capacity,room_type) 
		    	VALUES ('".$room_name."','".$floor_level."','".$student_capacity."','".$room_type."')
				");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"added","room_name"=>$room_name));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}
	// check and update
	}else{
		// if room_name is not renamed
		if($room_nameDup==$room_name){
			$sql = $dbConn->query("
				UPDATE tbl_room SET floor_level='".$floor_level."',student_capacity='".$student_capacity."',room_type='".$room_type."' 
				WHERE room_id='".$room_id."' ");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"updated","room_name"=>$room_name));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}else{
			$checkDuplicate = $dbConn->query("SELECT * FROM tbl_room WHERE room_name='".$room_name."' ");
			$row = $checkDuplicate->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicate->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Room name is taken."));
			}else{
				$sql = $dbConn->query("
					UPDATE tbl_room SET room_name='".$room_name."',floor_level='".$floor_level."',student_capacity='".$student_capacity."',room_type='".$room_type."' 
					WHERE room_id='".$room_id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","room_name"=>$room_name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}

		
	}

	
		
?>