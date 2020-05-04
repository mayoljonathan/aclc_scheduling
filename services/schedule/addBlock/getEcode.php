<?php require '../../../library/config.php'; ?>

<?php 
	extract($_POST);
	
	if(isset($concat_ecode)){
		$sql = $dbConn->query("SELECT schedule_id,ecode FROM tbl_schedule WHERE ecode LIKE '".$concat_ecode."%' AND schoolyear_code='".$sy_code."' AND schedule_type='".$sched_type."' ");
		if($sql->rowCount() > 0 ) {
			$jsonData = array();
			$jsonData[] = (object) array("response"=>"success");
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			    $jsonData[] = $row;
			}
		}else{
			$jsonData[] = (object) array("response"=>"empty");
		}
		echo json_encode($jsonData);
	}
?>