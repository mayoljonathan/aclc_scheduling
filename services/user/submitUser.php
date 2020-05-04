<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	$name = ucwords($lastname.", ".$firstname." ".$mi);
	// check and insert
	if(isset($emp_idDup) && empty($emp_idDup)){
		$checkDuplicateName = $dbConn->query("
			SELECT * FROM tbl_user 
			WHERE CONCAT(lastname,', ',firstname,' ',mi) ='".$name."' ");
		$row = $checkDuplicateName->fetch(PDO::FETCH_ASSOC);
		if($checkDuplicateName->rowCount() > 0 ) {
			echo json_encode(array("response"=>"exists","msg"=>"Employee name exists."));
		}else{
			$checkDuplicateID = $dbConn->query("
				SELECT * FROM tbl_user
				WHERE emp_id = '".$emp_id."'");
			$row = $checkDuplicateID->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateID->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Employee ID exists."));
			}else{
				$checkDuplicateUsername = $dbConn->query("
					SELECT * FROM tbl_user
					WHERE username = '".$username."'");
				$row = $checkDuplicateUsername->fetch(PDO::FETCH_ASSOC);
				if($checkDuplicateUsername->rowCount() > 0 ) {
					echo json_encode(array("response"=>"exists","msg"=>"Username exists."));
				}else{
					$sql = $dbConn->query("
						INSERT INTO tbl_user (emp_id,lastname,firstname,mi,username,password,user_type) 
				    	VALUES ('".$emp_id."','".$lastname."','".$firstname."','".$mi."','".$username."','".$password."','".$user_type."')
						");
					if($sql){
						echo json_encode(array("response"=>"success","action"=>"added","emp_id"=>$emp_id,"name"=>$name));
					}else{
						echo json_encode(array("response"=>"failed"));
					}
				}
			}
		}
	// check and update
	}else{
		// if name is not renamed= updates the other infos
		if($firstnameDup==$firstname && $miDup==$mi && $lastnameDup==$lastname && $emp_idDup==$emp_id && $usernameDup==$username){
			$sql = $dbConn->query("
				UPDATE tbl_user SET password='".$password."', user_type='".$user_type."'
				WHERE user_id='".$user_id."' ");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"updated","emp_id"=>$emp_id,"name"=>$name));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}else if($emp_idDup!=$emp_id){
			$checkDuplicateID = $dbConn->query("
				SELECT * FROM tbl_user
				WHERE emp_id = '".$emp_id."'");
			$row = $checkDuplicateID->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateID->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Employee ID exists."));
			}else{
				$sql = $dbConn->query("
					UPDATE tbl_user SET emp_id='".$emp_id."' ,firstname='".$firstname."',mi='".$mi."',lastname='".$lastname."',username='".$username."',password='".$password."',user_type='".$user_type."'
					WHERE user_id='".$user_id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","emp_id"=>$emp_id,"name"=>$name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}

		}else if($usernameDup!=$username){
			$checkDuplicateUsername = $dbConn->query("
				SELECT * FROM tbl_user
				WHERE username = '".$username."'");
			$row = $checkDuplicateUsername->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateUsername->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Username exists."));
			}else{
				$sql = $dbConn->query("
					UPDATE tbl_user SET emp_id='".$emp_id."' ,firstname='".$firstname."',mi='".$mi."',lastname='".$lastname."',username='".$username."',password='".$password."',user_type='".$user_type."'
					WHERE user_id='".$user_id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","emp_id"=>$emp_id,"name"=>$name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}else{
			$checkDuplicateName = $dbConn->query("
				SELECT * FROM tbl_user 
				WHERE CONCAT(lastname,', ',firstname,' ',mi) ='".$name."' ");
			$row = $checkDuplicateName->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicateName->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Employee name exists."));
			}else{
				$sql = $dbConn->query("
					UPDATE tbl_user SET emp_id='".$emp_id."',firstname='".$firstname."',mi='".$mi."',lastname='".$lastname."',username='".$username."',password='".$password."',user_type='".$user_type."'
					WHERE user_id='".$user_id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated","emp_id"=>$emp_id,"name"=>$name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}
	}


	
		
?>