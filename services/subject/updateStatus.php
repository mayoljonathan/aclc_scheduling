<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);

	$sql = $dbConn->query("UPDATE tbl_subject SET subject_status='".$status."' WHERE subject_id='".$subject_id."' ");
	if($sql){
		$getCourse = $dbConn->query("SELECT subject_code,subject_title,course_abbr FROM tbl_subject where subject_id='".$subject_id."' ");
		$row = $getCourse->fetch(PDO::FETCH_ASSOC);
		if($getCourse->rowCount() > 0 ) {
			extract($row);
			echo json_encode(array("response"=>"success","course_abbr"=>$course_abbr,'subject_code'=>$subject_code,'subject_title'=>$subject_title));
		}

	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>