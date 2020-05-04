<?php require '../../../library/config.php'; ?>

<?php 
	extract($_POST);
	// print_r($_POST);
	// exit();

$jsonData = [];
foreach ($subject_code as $i => $value) {

	$lec_startTime[$i] = ltrim($lec_startTime[$i], '0');
	$lab_endTime[$i] = ltrim($lab_endTime[$i], '0');

	// if lec only
	if($lab_startTime[$i]==""){

		$checkTime = $dbConn->query("
						 SELECT * FROM tbl_schedule s 
						 WHERE (lec_startTime < '".$lec_endTime[$i]."') AND (lab_endTime > '".$lec_startTime[$i]."') AND schoolyear_code='".$sy_code."'
						 ");
		$count = 0;
		for($y = 0; $y <= $data_row-1;$y++){

			if($checkTime->rowCount() > 0){
				
				while($row = $checkTime->fetch(PDO::FETCH_ASSOC)) { 
					$conflictCount = 0;
					if($row['firstDay'] == $firstDay[$i] || $row['firstDay'] == $secondDay[$i]){
						if($row['lec_room'] == $lec_room[$i]){
							$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg"=>"Conflict lec room");
							$conflictCount++;
						}
						
						if($conflictCount!=0){
							$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg1"=>"Conflict first day");
						}
					}

					if($row['secondDay'] == $secondDay[$i] || $row['secondDay'] == $firstDay[$i]){
						if($row['lec_room'] == $lec_room[$i]){
			    			$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg"=>"Conflict lec room");
							$conflictCount++;
						}

						if($conflictCount!=0){
							$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg1"=>"Conflict second day");
						}
						
					}

					//IF no more conflicts IN ROOM//DAY
					if($conflictCount==0){	
						$jsonData[$i] = array("response"=>"success","main_row"=>$i);
					}


				}//end while


			// IF TIME IS NOT CONFLICT ONLY(ADD AUTOMATICALLY)
			}else{
				$jsonData[$i] = array("response"=>"success","main_row"=>$i);
			}
			$count++;
		}

	// if it has lab
	}else{
		$checkTime = $dbConn->query("
						 SELECT * FROM tbl_schedule s 
						 WHERE (lec_startTime < '".$lab_endTime[$i]."') AND (lab_endTime > '".$lec_startTime[$i]."') AND schoolyear_code='".$sy_code."'
						 ");
		
		// set array keys
		// for($x = 1; $x <= $data_row;$x++){
		// 	$jsonData = array_merge($jsonData,array($x=>""));
		// }

		// set array values
		$count = 0;
		for($y = 0; $y <= $data_row-1;$y++){
			
			if($checkTime->rowCount() > 0){

				while($row = $checkTime->fetch(PDO::FETCH_ASSOC)) { 
					$conflictCount = 0;
					if($row['firstDay'] == $firstDay[$i] || $row['firstDay'] == $secondDay[$i]){
						if($row['lec_room'] == $lec_room[$i]){
			    			$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg"=>"Conflict lec room");
							$conflictCount++;
						}
						if($row['lab_room'] == $lab_room[$i]){
			    			$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg"=>"Conflict lab room");
							$conflictCount++;
						}

						if($conflictCount!=0){
							$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg1"=>"Conflict first day");
						}
					}

					if($row['secondDay'] == $secondDay[$i] || $row['secondDay'] == $firstDay[$i]){
						if($row['lec_room'] == $lec_room[$i]){
			    			$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg"=>"Conflict lec room");
							$conflictCount++;
						}
						if($row['lab_room'] == $lab_room[$i]){
			    			$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg"=>"Conflict lab room");
							$conflictCount++;
						}

						if($conflictCount!=0){
							$jsonData[$i] = array("response"=>"conflict","main_row"=>$i,"msg1"=>"Conflict second day");
						}
					}

					//IF no more conflicts IN ROOM//DAY
					if($conflictCount==0){	
						$jsonData[$i] = array("response"=>"success","main_row"=>$i);
					}

				}//end while


			// IF TIME IS NOT CONFLICT ONLY(SUCCESS)
			}else{
				$jsonData[$i] = array("response"=>"success","main_row"=>$i);
			}

			$count++;
		}


	}
		
}
		
	echo json_encode($jsonData);
		
?>