<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);
	
    $pre = "";
	foreach ($pre_requisite as $key => $value) {
		$pre = $pre . $value . ",";
	}
	// remove the last comma
    $pre = rtrim($pre, ',');
    
	//insert
	if(isset($subject_id) && empty($subject_id)){
		$sql = $dbConn->query("
		INSERT INTO tbl_subject (subject_code,subject_title,course_abbr,year_level,semester,lec,lab,pre_requisite) 
    	VALUES ('".strtoupper($subject_code)."','".ucwords($subject_title)."','".$course_abbr."','".$year_level."','".$semester."','".$units_lec."','".$units_lab."','".$pre."') ");
		if($sql){
			echo json_encode(array("response"=>"success","action"=>"added","subject_code"=>strtoupper($subject_code),"subject_title"=>ucwords($subject_title)));
		}else{
			echo json_encode(array("response"=>"failed"));
		}
	//update
	}else{
		$sql = $dbConn->query("
		UPDATE tbl_subject SET subject_code='".strtoupper($subject_code)."',subject_title='".ucwords($subject_title)."',course_abbr='".$course_abbr."',year_level='".$year_level."',semester='".$semester."',lec='".$units_lec."',lab='".$units_lab."',pre_requisite='".$pre."' 
		WHERE subject_id='".$subject_id."' ");
		if($sql){
			echo json_encode(array("response"=>"success","action"=>"updated","subject_code"=>strtoupper($subject_code),"subject_title"=>ucwords($subject_title)));
		}else{
			echo json_encode(array("response"=>"failed"));
		}
	}

?>