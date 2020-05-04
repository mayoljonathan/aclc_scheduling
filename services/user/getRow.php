<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($user_id)){
		$sql = $dbConn->query("SELECT * FROM tbl_user WHERE user_id = '".$user_id."'");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
?>