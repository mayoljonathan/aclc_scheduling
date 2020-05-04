<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);

	$sql = $dbConn->query("UPDATE tbl_course SET course_status='".$status."' WHERE course_id='".$course_id."' ");
	if($sql){
		$getCourseAbbr = $dbConn->query("SELECT course_abbr FROM tbl_course WHERE course_id='".$course_id."' ");
		$row = $getCourseAbbr->fetch(PDO::FETCH_ASSOC);
		if($getCourseAbbr->rowCount() > 0){
			extract($row);
			echo json_encode(array("response"=>"success","course_abbr"=>strtoupper($course_abbr)));
		}
	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>