<?php require '../../library/config.php'; ?>

<?php 
	
	extract($_POST);

	$sql = $dbConn->query("UPDATE tbl_user SET user_status='".$status."' WHERE user_id='".$id."' ");
	if($sql){
		$getUser = $dbConn->query("SELECT emp_id,lastname,firstname,mi FROM tbl_user WHERE user_id='".$id."' ");
		$row = $getUser->fetch(PDO::FETCH_ASSOC);
		if($getUser->rowCount() > 0){
			extract($row);
			$name = ucwords($lastname.", ".$firstname." ".$mi);			
			echo json_encode(array("response"=>"success","emp_id"=>$emp_id,"name"=>$name));
		}
	}else{
		echo json_encode(array("response"=>"failed"));
	}

?>