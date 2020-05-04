<?php require '../../library/config.php'; ?>
<?php require '../../services/global/convertDay.php'; ?>
<?php require '../../services/global/convertTime.php'; ?>
<?php $sy_code = $_SESSION['user']['sy_code']; ?>
<?php 
	extract($_POST);

	if(isset($_POST)){
		if($class_type == 'ALL' && $course_abbr == 'ALL'){
			$sql = $dbConn->query("SELECT * FROM tbl_schedule WHERE schoolyear_code='".$sy_code."' AND schedule_status='1' ");
		}else if($class_type != 'ALL' && $course_abbr == 'ALL'){
			$sql = $dbConn->query("SELECT * FROM tbl_schedule WHERE ecode_type='".$class_type."' AND schoolyear_code='".$sy_code."' AND schedule_status='1' ");
		}else if($class_type == 'ALL' && $course_abbr != 'ALL'){
			$sql = $dbConn->query("SELECT * FROM tbl_schedule WHERE course_abbr='".$course_abbr."' AND schoolyear_code='".$sy_code."' AND schedule_status='1' ");
		}else{
			$sql = $dbConn->query("SELECT * FROM tbl_schedule WHERE ecode_type='".$class_type."' AND course_abbr='".$course_abbr."' AND schoolyear_code='".$sy_code."' AND schedule_status='1' ");
		}

		if($sql->rowCount() == 0 ) { ?>
			<div class="wrapper">
				<div class="row">
				<hr>
					<center>
						<h1>No Classes found in your search query</h1>
					</center>
				</div>
			</div>
<?php   }else{ ?>
			
			<div class="wrapper">
				<div class="row">
				<hr>
					<table class="table table-striped table-bordered table-hover table_classSched"> 
						<thead>
							<th>&nbsp;</th>
							<th>E-Code</th>
							<th>S-Code</th>
							<th>Descriptive Title</th>
							<th>Lec Time</th>
							<th>Lec Day</th>
							<th>Lec Room</th>
							<th>Lab Time</th>
							<th>Lab Day</th>
							<th>Lab Room</th>
						</thead>
						<tbody>

<?php   
		while($row = $sql->fetch(PDO::FETCH_ASSOC)){
		extract($row); 
		$firstDay = convertDay($firstDay);
		$secondDay = convertDay($secondDay);
		$lec_startTime = convertTime($lec_startTime);
		$lec_endTime = convertTime($lec_endTime);
		$lab_startTime = convertTime($lab_startTime);
		$lab_endTime= convertTime($lab_endTime);
	?>
							<tr>
								<td><span style="color:green"><?php echo 'Open' ?></span></td>
								<td><?php echo strtoupper($ecode); ?></td>
								<td><?php echo strtoupper($subject_code); ?></td>
								<td><?php echo ucwords($subject_title); ?></td>
								<td><?php echo $lec_startTime."-".$lec_endTime; ?></td>
								<td><?php echo $firstDay.$secondDay; ?></td>
								<td><?php echo strtoupper($lec_room); ?></td>
								<td><?php echo ($lab_startTime != '00:00 AM' ? $lab_startTime."-".$lab_endTime : ''); ?></td>
								<td><?php echo ($lab_startTime != '00:00 AM' ? $firstDay.$secondDay : ''); ?></td>
								<td><?php echo ($lab_startTime != '00:00 AM' ? strtoupper($lab_room) : ''); ?></td>

							</tr>
<?php   } ?>		
						</tbody>
					</table>
				</div>
			</div>
<?php 
		}
	}	
?>

<!-- DATATABLES -->
<script>
    $(document).ready(function() {
        /* Init DataTables */
        $('.table_classSched').DataTable({
        	"order": [[ 1, "asc" ]],
        	"dom": 'lTfgtrt<"bottom"ip<"clear">>',
        	// "dom": 'lTfigt',
        	"tableTools": {
            	"sSwfPath": "assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
        	}
        });
    });

</script>
