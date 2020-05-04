<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($schoolyear_id)){
		$sql = $dbConn->query("SELECT * FROM tbl_schoolyear WHERE schoolyear_id = '".$schoolyear_id."'");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
 ?>