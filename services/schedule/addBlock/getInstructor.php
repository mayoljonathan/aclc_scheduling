<?php require '../../../library/config.php'; ?>

<?php 
	extract($_POST);

	$sql = $dbConn->query("
		SELECT f.*,d.department_name FROM tbl_faculty f
		LEFT OUTER JOIN tbl_department d ON f.department_id=d.department_id
		WHERE f.faculty_status='1' 
		ORDER BY f.lastname ASC");
	if($sql->rowCount() > 0 ) {
		$jsonData = array();
		$jsonData[] = (object) array("response"=>"success");
		while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		    $jsonData[] = $row;
		}
	}
	echo json_encode($jsonData);
?>