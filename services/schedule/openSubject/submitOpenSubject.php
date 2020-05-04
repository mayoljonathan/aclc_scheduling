<?php require '../../../library/config.php'; ?>

<?php 
	extract($_POST);
    $sy_code = $_SESSION['user']['sy_code'];

	$checkEcode = $dbConn->query("SELECT * FROM tbl_schedule WHERE ecode='".$ecode."' AND schoolyear_code='".$sy_code."' ");
	$ct = $checkEcode->fetch(PDO::FETCH_ASSOC);
	if($checkEcode->rowCount() > 0){
		echo json_encode(array("response"=>"exists","msg"=>"Ecode exists"));
		exit();
	}else{
		$lec_startTime = ltrim($lec_startTime, '0');
		$lab_endTime = ltrim($lab_endTime, '0');
		// if lec only
		if($c_type=="lec"){

			$checkTime = $dbConn->query("
							 SELECT * FROM tbl_schedule s 
							 WHERE (lec_startTime < '".$lec_endTime."') AND (lab_endTime > '".$lec_startTime."') AND schoolyear_code='".$sy_code."'
							 ");
				$row = $checkTime->fetch(PDO::FETCH_ASSOC);
				if($checkTime->rowCount() > 0){
					if($row['firstDay'] == $firstDay || $row['firstDay'] == $secondDay){
						if($row['lec_room'] == $lec_room){
							echo json_encode(array("response"=>"conflict","msg"=>"There was a conflict in lec room"));
							exit();
						}
					}

					if($row['secondDay'] == $secondDay || $row['secondDay'] == $firstDay){
						if($row['lec_room'] == $lec_room){
							echo json_encode(array("response"=>"conflict","msg"=>"There was a conflict in lab room"));
							exit();
						}
					}

					echo json_encode(array("response"=>"success"));

				// IF TIME IS NOT CONFLICT ONLY(ADD AUTOMATICALLY)
				}else{
					echo json_encode(array("response"=>"success",'msg'=>"thru"));
				}

		// if it has lab
		}else{
			$checkTime = $dbConn->query("
							 SELECT * FROM tbl_schedule 
							 WHERE (lec_startTime < '".$lab_endTime."') AND (lab_endTime > '".$lec_startTime."') AND schoolyear_code='".$sy_code."'
							 ");
			$row = $checkTime->fetch(PDO::FETCH_ASSOC);
			if($checkTime->rowCount() > 0){
				if($row['firstDay'] == $firstDay || $row['firstDay'] == $secondDay){
					if($row['lec_room'] == $lec_room){
						echo json_encode(array("response"=>"conflict","msg"=>"There was a conflict in lec room"));
						exit();
					}
					if($row['lab_room'] == $lab_room){
						echo json_encode(array("response"=>"conflict","msg"=>"There was a conflict in lab room"));
						exit();
					}
				}

				if($row['secondDay'] == $secondDay || $row['secondDay'] == $firstDay){
					if($row['lec_room'] == $lec_room){
						echo json_encode(array("response"=>"conflict","msg"=>"There was a conflict in lec room"));
						exit();
					}
					if($row['lab_room'] == $lab_room){
						echo json_encode(array("response"=>"conflict","msg"=>"There was a conflict in lab room"));
						exit();
					}
				}

				echo json_encode(array("response"=>"success"));

			// IF TIME IS NOT CONFLICT ONLY(SUCCESS)
			}else{
				echo json_encode(array("response"=>"success",'msg'=>"thru"));
			}
				
		}

	}

?>