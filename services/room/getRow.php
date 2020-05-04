<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($room_id)){
		$sql = $dbConn->query("SELECT * FROM tbl_room WHERE room_id = '".$room_id."'");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
 ?>