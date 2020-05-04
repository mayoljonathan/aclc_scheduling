<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);
	// check and insert
	if(isset($department_id) && empty($department_id)){
		$checkDuplicate = $dbConn->query("SELECT * FROM tbl_department WHERE department_name='".$department_name."' ");
		$row = $checkDuplicate->fetch(PDO::FETCH_ASSOC);
		if($checkDuplicate->rowCount() > 0 ) {
			echo json_encode(array("response"=>"exists","msg"=>"Department name is taken."));
		}else{
			$sql = $dbConn->query("
				INSERT INTO tbl_department (department_name) 
		    	VALUES ('".$department_name."')
				");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"added",'department_name'=>$department_name));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}
	// check and update
	}else{
		// if department_name is not renamed
		if($department_nameDup==$department_name){
			$sql = $dbConn->query("
				UPDATE tbl_department SET department_head='".$department_head."'
				WHERE department_id='".$department_id."' ");
			if($sql){
				echo json_encode(array("response"=>"success","action"=>"updated",'department_name'=>$department_name));
			}else{
				echo json_encode(array("response"=>"failed"));
			}
		}else{
			$checkDuplicate = $dbConn->query("SELECT * FROM tbl_department WHERE department_name='".$department_name."' ");
			$row = $checkDuplicate->fetch(PDO::FETCH_ASSOC);
			if($checkDuplicate->rowCount() > 0 ) {
				echo json_encode(array("response"=>"exists","msg"=>"Department name is taken."));
			}else{
				$sql = $dbConn->query("
					UPDATE tbl_department SET department_name='".$department_name."' , department_head='".$department_head."'
					WHERE department_id='".$department_id."' ");
				if($sql){
					echo json_encode(array("response"=>"success","action"=>"updated",'department_name'=>$department_name));
				}else{
					echo json_encode(array("response"=>"failed"));
				}
			}
		}

		
	}

	
		
?>