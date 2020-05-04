<?php require_once '../library/config.php'; ?>

<?php 
	extract($_POST);
	$sql = $dbConn->query("
		SELECT * FROM tbl_user
		WHERE username='".$user."' AND password='".$pass."' ");
	$row = $sql->fetch(PDO::FETCH_ASSOC);
	if($sql->rowCount() > 0 ) {
		extract($row);
		if($user_status == 0){
			echo json_encode(array('response'=>'disabled','msg'=>'Account is temporarily disabled. Ask assistance by the system administrator'));
			exit();
		}

		if($user_type == 'ADMIN'){
			$_SESSION['user'] = array('user_id'=>$user_id,
									  'fullname'=>$firstname." ".$mi." ".$lastname,
									  'user_type'=>$user_type,
									  'sy_code'=>$sy_code,
									  'loggedIn'=>true);
			echo json_encode(array('response'=>'success'));
			exit();
		}

		$sql = $dbConn->query("SELECT * FROM tbl_schoolyear WHERE schoolyear_code='".$sy_code."' AND schoolyear_status='1' ");
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		if($sql->rowCount() > 0){
			if($mi!=""){
				$mi = $mi.".";
			}
			$_SESSION['user'] = array('user_id'=>$user_id,
									  'fullname'=>$firstname." ".$mi." ".$lastname,
									  'user_type'=>$user_type,
									  'sy_code'=>$sy_code,
									  'loggedIn'=>true);
			echo json_encode(array('response'=>'success'));
		}else{
			echo json_encode(array('response'=>'failed','msg'=>'No access. School year was disabled.'));
		}
	}else{
		echo json_encode(array('response'=>'failed','msg'=>'No user credentials matched'));
	}
	
		
	
?>