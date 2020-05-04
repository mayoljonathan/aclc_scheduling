<?php require '../../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($course_abbr)){
		$sql = $dbConn->query("SELECT * FROM tbl_subject WHERE (course_abbr = '".$course_abbr."') AND (year_level = '".$year_level."') AND (semester = '".$semester."') AND (subject_status='1')");
		if($sql->rowCount() > 0 ) {
			$jsonData = array();
			$jsonData[] = (object) array("response"=>"success");
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			    $jsonData[] = $row;
			}
		}
		echo json_encode($jsonData);
	}
?>