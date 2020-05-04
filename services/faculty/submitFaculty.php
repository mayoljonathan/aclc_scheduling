<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);
	$name = ucwords($lastname.", ".$firstname." ".$mi);
	// check and insert
	if(isset($faculty_idDup) && empty($faculty_idDup)){
		$checkDuplicateName = $dbConn->query("
			SELECT * FROM tbl_faculty 
			WHERE CONCAT(lastname,', ',firstname,' ',mi) ='".$name."' ");
		$row = $checkDuplicateName->fetch(PDO::FETCH_ASSOC);
		if($checkDuplicateName->rowCount() > 0 ) {
			echo json_encode(array("response"=>"exists","msg"=>"Instructor name exists."));
		}else{
			$checkDuplicateID = $dbConn->query("
				SELECT * FROM tbl_faculty
				WHERE faculty_id = '".$faculty_id."'");
			$row = $checkDuplicateID->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateID->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Faculty ID exists."));
			}else{
				$sql = $dbConn->query("
					INSERT INTO tbl_faculty (faculty_id,lastname,firstname,mi,gender,email,mobile,address,department_id,faculty_type) 
			    	VALUES ('".$faculty_id."','".$lastname."','".$firstname."','".$mi."','".$gender."','".$email."','".$mobile."','".$address."','".$department_id."','".$faculty_type."')
					");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"added","faculty_id"=>$faculty_id,"name"=>$name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}
	// check and update
	}else{
		// if name is not renamed= updates the other infos
		if($firstnameDup==$firstname && $miDup==$mi && $lastnameDup==$lastname && $faculty_idDup==$faculty_id){
			$sql = $dbConn->query("
				UPDATE tbl_faculty SET gender='".$gender."', address='".$address."' ,mobile='".$mobile."',email='".$email."',department_id='".$department_id."',faculty_type='".$faculty_type."'
				WHERE id='".$id."' ");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"updated","faculty_id"=>$faculty_id,"name"=>$name));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}else if($faculty_idDup!=$faculty_id){
			$checkDuplicateID = $dbConn->query("
				SELECT * FROM tbl_faculty
				WHERE faculty_id = '".$faculty_id."'");
			$row = $checkDuplicateID->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateID->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Faculty ID exists."));
			}else{
				$sql = $dbConn->query("
					UPDATE tbl_faculty SET faculty_id='".$faculty_id."' ,firstname='".$firstname."',mi='".$mi."',lastname='".$lastname."',gender='".$gender."', address='".$address."' ,mobile='".$mobile."',email='".$email."',department_id='".$department_id."',faculty_type='".$faculty_type."'
					WHERE id='".$id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","faculty_id"=>$faculty_id,"name"=>$name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}						
		}else{
			$checkDuplicateName = $dbConn->query("
				SELECT * FROM tbl_faculty 
				WHERE CONCAT(lastname,', ',firstname,' ',mi) ='".$name."' ");
			$row = $checkDuplicateName->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateName->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Instructor name exists."));
			}else{
				$sql = $dbConn->query("
					UPDATE tbl_faculty SET faculty_id='".$faculty_id."' ,firstname='".$firstname."',mi='".$mi."',lastname='".$lastname."',gender='".$gender."', address='".$address."' ,mobile='".$mobile."',email='".$email."',department_id='".$department_id."',faculty_type='".$faculty_type."'
					WHERE id='".$id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","faculty_id"=>$faculty_id,"name"=>$name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}
	}


	
		
?>