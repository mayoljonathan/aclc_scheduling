<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($schedule_id)){
		$sql = $dbConn->query("SELECT * FROM tbl_schedule WHERE schedule_id = '".$schedule_id."'");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
?>