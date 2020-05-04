<?php require '../../../library/config.php'; ?>

<?php 
	extract($_POST);

	$sql = $dbConn->query("SELECT department_id,department_name FROM tbl_department WHERE department_status='1' ");
	if($sql->rowCount() > 0 ) {
		$jsonData = array();
		$jsonData[] = (object) array("response"=>"success");
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		    $jsonData[] = $row;
		}
	}
	echo json_encode($jsonData);
?>