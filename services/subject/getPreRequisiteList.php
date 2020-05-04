<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($course_id)){
		// $sql = $dbConn->query("
		// SELECT * FROM tbl_course c
		// LEFT OUTER JOIN tbl_subject s ON c.course_abbr = s.course_abbr
		// WHERE (c.course_id = '".$course_id."' AND s.year_level <= '".$year_level."') AND (s.semester <= '".$semester."') ");
		
		// temporary
		$sql = $dbConn->query("
		SELECT * FROM tbl_course c
		INNER JOIN tbl_subject s ON c.course_abbr = s.course_abbr
		WHERE (c.course_id = '".$course_id."') ");
		

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











