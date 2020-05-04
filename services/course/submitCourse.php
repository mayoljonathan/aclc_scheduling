<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	// check and insert
	if(isset($course_id) && empty($course_id)){
		$checkDuplicateName = $dbConn->query("SELECT * FROM tbl_course WHERE course_name='".$course_name."' ");
		$row = $checkDuplicateName->fetch(PDO::FETCH_ASSOC);
		if($checkDuplicateName->rowCount() > 0 ) {
			echo json_encode(array("response"=>"exists","msg"=>"Course name is taken."));
		}else{
			$checkDuplicateAbbr = $dbConn->query("SELECT * FROM tbl_course WHERE course_abbr='".$course_abbr."' ");
			$row = $checkDuplicateAbbr->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateAbbr->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Course abbreviation is taken."));
			}else{
				$sql = $dbConn->query("
				INSERT INTO tbl_course (course_name,course_abbr,course_type,course_noYears) 
		    	VALUES ('".$course_name."','".$course_abbr."','".$course_type."','".$course_noYears."') ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"added","course_abbr"=>$course_abbr,"course_name"=>$course_name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}
	// check and update
	}else{
		// if course_name is not renamed
		if(strtoupper($course_nameDup)==strtoupper($course_name) && strtoupper($course_abbrDup)==strtoupper($course_abbr)){
			$sql = $dbConn->query("
				UPDATE tbl_course SET course_type='".$course_type."',course_noYears='".$course_noYears."' 
				WHERE course_id='".$course_id."' ");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"updated","course_abbr"=>$course_abbr,"course_name"=>$course_name));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		// if course_abbr is renamed
		}else if(strtoupper($course_nameDup)==strtoupper($course_name) && strtoupper($course_abbrDup)!=strtoupper($course_abbr)){
			$checkDuplicateAbbr = $dbConn->query("SELECT * FROM tbl_course WHERE course_abbr='".$course_abbr."' ");
			$row = $checkDuplicateAbbr->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateAbbr->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Course abbreviation is taken."));
			}else{
				$sql = $dbConn->query("
				UPDATE tbl_course SET course_abbr='".$course_abbr."',course_type='".$course_type."',course_noYears='".$course_noYears."' 
				WHERE course_id='".$course_id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","course_abbr"=>$course_abbr,"course_name"=>$course_name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		// if course_name is renamed
		}else{
			$checkDuplicateName = $dbConn->query("SELECT * FROM tbl_course WHERE course_name='".$course_name."' ");
			$row = $checkDuplicateName->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateName->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Course name is taken."));
			}else{
				$sql = $dbConn->query("
				UPDATE tbl_course SET course_name='".$course_name."',course_abbr='".$course_abbr."',course_type='".$course_type."',course_noYears='".$course_noYears."' 
				WHERE course_id='".$course_id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","course_abbr"=>$course_abbr,"course_name"=>$course_name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}

		
	}

	
		
?>