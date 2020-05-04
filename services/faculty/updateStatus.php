<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);

	$sql = $dbConn->query("UPDATE tbl_faculty SET faculty_status='".$status."' WHERE id='".$id."' ");
	if($sql){
		$getFaculty = $dbConn->query("SELECT faculty_id,lastname,firstname,mi FROM tbl_faculty WHERE id='".$id."' ");
		$row = $getFaculty->fetch(PDO::FETCH_ASSOC);
		if($getFaculty->rowCount() > 0){
			extract($row);
			$name = ucwords($lastname.", ".$firstname." ".$mi);			
			echo json_encode(array("response"=>"success","faculty_id"=>$faculty_id,"name"=>$name));
		}
	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>