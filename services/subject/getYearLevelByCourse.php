<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($course_id)){
		$sql = $dbConn->query("SELECT course_id,course_noYears FROM tbl_course WHERE course_id = '".$course_id."'");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
 ?>