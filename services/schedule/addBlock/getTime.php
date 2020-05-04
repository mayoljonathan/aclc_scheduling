<?php require '../../../library/config.php'; ?>
<?php require '../../../services/global/convertTime.php'; ?>
<?php
	// dynamic time classes
	// $sql = $dbConn->query("SELECT * FROM tbl_time");
	// $row = $sql->fetch(PDO::FETCH_ASSOC);
	// if($sql->rowCount() > 0 ) {
		// $start = $row['timeStart'];
		// $end = $row['timeEnd'];

	// static 
		$start = '7:30';
		$end = '22:00';

		$timeStart     = strtotime($start);
		$timeEnd    = strtotime($end);
		$timeData = array();
		$timeData[] = (object) array("response"=>"success");
		    
		// 1800 = 30 minutes
		for ($i = $timeStart; $i <= $timeEnd; $i += 1800){
		    $timeNow = date('H:i', $i);
		    $newTime = convertTime($timeNow);
		    $timeData[] = array("time"=>$newTime,"military"=>$timeNow);
		}
		echo json_encode($timeData);
	// }
	
?>

