<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($subject_id)){
		$sql = $dbConn->query("SELECT * FROM tbl_subject WHERE subject_id = '".$subject_id."'");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
 ?>