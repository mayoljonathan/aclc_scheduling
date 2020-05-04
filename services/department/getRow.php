<?php require '../../library/config.php'; ?>

<?php 
	extract($_POST);

	if(isset($department_id)){
		$sql = $dbConn->query("
			SELECT d.*,f.faculty_id,f.firstname,f.lastname,f.mi FROM tbl_department d,tbl_faculty f 
			WHERE d.department_id = '".$department_id."' AND f.department_id= '".$department_id."' 
			ORDER BY lastname ASC");
		
		if($sql->rowCount() > 0 ) {
			$jsonData = array();
			$jsonData[] = (object) array("response"=>"success");
			while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
			    $jsonData[] = $row;
			}
		}else{
			$jsonData[] = (object) array("response"=>"empty", "department_id"=>$department_id, "department_name"=>$department_name);
		}
		
		echo json_encode($jsonData);
	}
 ?>
