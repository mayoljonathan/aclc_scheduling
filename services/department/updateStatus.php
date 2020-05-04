<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);


	$sql = $dbConn->query("UPDATE tbl_department SET department_status='".$status."' WHERE department_id='".$department_id."' ");
	if($sql){
		$getDeptName = $dbConn->query("SELECT department_name FROM tbl_department WHERE department_id='".$department_id."' ");
		$row = $getDeptName->fetch(PDO::FETCH_ASSOC);
		if($getDeptName->rowCount() > 0 ) {
			extract($row);
			echo json_encode(array("response"=>"success","department_name"=>$department_name));
		}
	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>