<?php require '../../../library/config.php'; ?>

<?php 
    $sy_code = $_SESSION['user']['sy_code'];

	extract($_POST);

// $jsonData = [];

if($sched_type == 1){
	$sched_type = "MORNING";
}else if($sched_type == 2){
	$sched_type = "AFTERNOON";
}else{
	$sched_type = "EVENING";
}

foreach ($subject_code as $i => $value) {
	
	// if lec only
	if($lab_startTime[$i]==""){
		$sql = $dbConn->query("
			INSERT INTO tbl_schedule (ecode,subject_code,subject_title,lec_startTime,lec_endTime,lec_room,firstDay,secondDay,faculty_id,course_abbr,ecode_type,schedule_type,schoolyear_code)
			VALUES ('".$ecode[$i]."','".$subject_code[$i]."','".$subject_title[$i]."','".$lec_startTime[$i]."','".$lec_endTime[$i]."','".$lec_room[$i]."','".$firstDay[$i]."','".$secondDay[$i]."','".$faculty_id[$i]."','".$course_abbr."','BLOCK','".$sched_type."','".$sy_code."')
			");

		// REMOVE SCHEDULE_TYPE FROM DB
		// $sql = $dbConn->query("
		// 	INSERT INTO tbl_schedule (ecode,subject_code,subject_title,lec_startTime,lec_endTime,lec_room,firstDay,secondDay,faculty_id,course_abbr,ecode_type,schoolyear_code)
		// 	VALUES ('".$ecode[$i]."','".$subject_code[$i]."','".$subject_title[$i]."','".$lec_startTime[$i]."','".$lec_endTime[$i]."','".$lec_room[$i]."','".$firstDay[$i]."','".$secondDay[$i]."','".$faculty_id[$i]."','".$course_abbr."','BLOCK','".$sy_code."')
		// 	");
		if($sql){
			echo json_encode(array("response"=>"success"));
		}

	// if it has lab
	}else{
		$sql = $dbConn->query("
			INSERT INTO tbl_schedule (ecode,subject_code,subject_title,lec_startTime,lec_endTime,lab_startTime,lab_endTime,lec_room,lab_room,firstDay,secondDay,faculty_id,course_abbr,ecode_type,schedule_type,schoolyear_code)
			VALUES ('".$ecode[$i]."','".$subject_code[$i]."','".$subject_title[$i]."','".$lec_startTime[$i]."','".$lec_endTime[$i]."','".$lab_startTime[$i]."','".$lab_endTime[$i]."','".$lec_room[$i]."','".$lab_room[$i]."' ,'".$firstDay[$i]."','".$secondDay[$i]."','".$faculty_id[$i]."','".$course_abbr."','BLOCK','".$sched_type."','".$sy_code."')
			");

		// REMOVE SCHEDULE_TYPE FROM DB
		// $sql = $dbConn->query("
		// 	INSERT INTO tbl_schedule (ecode,subject_code,subject_title,lec_startTime,lec_endTime,lab_startTime,lab_endTime,lec_room,lab_room,firstDay,secondDay,faculty_id,course_abbr,ecode_type,schoolyear_code)
		// 	VALUES ('".$ecode[$i]."','".$subject_code[$i]."','".$subject_title[$i]."','".$lec_startTime[$i]."','".$lec_endTime[$i]."','".$lab_startTime[$i]."','".$lab_endTime[$i]."','".$lec_room[$i]."','".$lab_room[$i]."' ,'".$firstDay[$i]."','".$secondDay[$i]."','".$faculty_id[$i]."','".$course_abbr."','BLOCK','".$sy_code."')
		// 	");
		if($sql){
			echo json_encode(array("response"=>"success"));
		}

	}
		
}

	// echo json_encode($jsonData);
		
?>