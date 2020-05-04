<?php require '../../library/config.php'; ?>
<?php 
	require 'backup-db.php';

	extract($_REQUEST);
	extract($_POST);

    $folder = "../../upload/";
	$file = basename($_FILES['db_file']['name']); 
	$full_path = $folder.$file; 

	if(move_uploaded_file($_FILES['db_file']['tmp_name'], $full_path)) { 
		$tables = array();
		$sql = $dbConn->query("SELECT table_name FROM information_schema.tables WHERE table_schema='db_aclcscheduling'");
		while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
			$tables[] = $row;
		}

		foreach ($tables as $key => $value) {
			$deleteTable = $dbConn->query("DROP TABLE IF EXISTS ".$value['table_name']." ");
		}
		

		$file = $full_path;
		if($fp = file_get_contents($file)) {
			$var_array = explode(';',$fp);
			foreach($var_array as $value) {
				$dbConn->query($value.";");
			}
		}
    }

?>
