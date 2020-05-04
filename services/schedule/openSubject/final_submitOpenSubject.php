<?php require '../../../library/config.php'; ?>

<?php 
    $sy_code = $_SESSION['user']['sy_code'];
	extract($_POST);
	
	// if lec only
	if($c_type=="lec"){
		$sql = $dbConn->query("
			INSERT INTO tbl_schedule (ecode,subject_code,subject_title,lec_startTime,lec_endTime,lec_room,firstDay,secondDay,faculty_id,course_abbr,ecode_type,schedule_type,schoolyear_code)
			VALUES ('".$ecode."','".$subject_code."','".$subject_title."','".$lec_startTime."','".$lec_endTime."','".$lec_room."','".$firstDay."','".$secondDay."','".$faculty_id."','".$course_abbr."','IRREGULAR','-','".$sy_code."')
			");
		if($sql){
			echo json_encode(array("response"=>"success",'ecode'=>$ecode,"subject_title"=>$subject_title));
		}

	// if it has lab
	}else{
		$sql = $dbConn->query("
			INSERT INTO tbl_schedule (ecode,subject_code,subject_title,lec_startTime,lec_endTime,lab_startTime,lab_endTime,lec_room,lab_room,firstDay,secondDay,faculty_id,course_abbr,ecode_type,schedule_type,schoolyear_code)
			VALUES ('".$ecode."','".$subject_code."','".$subject_title."','".$lec_startTime."','".$lec_endTime."','".$lab_startTime."','".$lab_endTime."','".$lec_room."','".$lab_room."' ,'".$firstDay."','".$secondDay."','".$faculty_id."','".$course_abbr."','IRREGULAR','-','".$sy_code."')
			");
		if($sql){
			echo json_encode(array("response"=>"success",'ecode'=>$ecode,"subject_title"=>$subject_title));
		}

	}
		


		
?>