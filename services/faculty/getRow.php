<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($id)){
		$sql = $dbConn->query("SELECT * FROM tbl_faculty WHERE id = '".$id."'");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
 ?>