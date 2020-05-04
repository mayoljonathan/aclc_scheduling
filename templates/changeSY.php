<?php require_once '../library/config.php'; ?>

<?php 
	extract($_POST);
	if(isset($_POST) && !empty($_POST)){
		$_SESSION['user']['sy_code'] = $sy_code;
		echo json_encode(array('response'=>'success'));
	}else{
		echo json_encode(array('response'=>'failed'));
	}
?>