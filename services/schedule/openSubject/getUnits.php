<?php require '../../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($_POST)){
		$sql = $dbConn->query("SELECT * FROM tbl_subject WHERE subject_code = '".$subject_code."' AND course_abbr = '".$course_abbr."' AND subject_status='1' ");
		echo json_encode(array($sql->fetch(PDO::FETCH_ASSOC)));
	}
?>