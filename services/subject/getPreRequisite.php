<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	$jsonData = array();
	$count = 0;
	foreach ($pre_requisite as $key => $pre) {
		$sql = $dbConn->query("SELECT * FROM tbl_subject WHERE course_abbr='".$course_abbr."' AND subject_code = '".$pre."' ");
		if($sql->rowCount() > 0 ) {
			if($count<1){
				$jsonData[] = (object) array("response"=>"success");
			}

			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			    $jsonData[] = $row;
			}

			$count++;
		}else{
			$jsonData[] = (object) array("response"=>"empty");
		}
	}
		echo json_encode($jsonData);

 ?>