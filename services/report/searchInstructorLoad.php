<?php require '../../library/config.php'; ?>
<?php require '../../services/global/convertDay.php'; ?>
<?php require '../../services/global/convertTime.php'; ?>
<?php $sy_code = $_SESSION['user']['sy_code']; ?>
<?php 
	extract($_POST);

	if(isset($faculty_id)){



		$sql = $dbConn->query("
					SELECT DISTINCT * FROM tbl_schedule s
					LEFT OUTER JOIN tbl_faculty f ON s.faculty_id=f.faculty_id 
					LEFT OUTER JOIN tbl_subject sj ON s.subject_code=sj.subject_code AND s.course_abbr=sj.course_abbr
					WHERE s.faculty_id='".$faculty_id."' AND s.schedule_status='1' AND s.schoolyear_code='".$sy_code."' ");
		if($sql->rowCount() == 0 ) { ?>
			<div class="wrapper">
				<div class="row">
				<hr>
					<center>
						<h1>No appointed classes for this instructor</h1>
					</center>
				</div>
			</div>
<?php   }else{ ?>
			
			<div class="wrapper">
				<div class="row">
				<hr>
					<table class="table table-striped table-bordered table-hover table_instructorLoad"> 
						<thead>
							<th>Ecode</th>
							<th>Subject Code</th>
							<th style="width:20%">Subject Title</th>
							<th>Lec Time</th>
							<th>Lec Room</th>
							<th>Lab Time</th>
							<th>Lab Room</th>
							<th>Day</th>
							<th>Units</th>
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
		$units = $lec+$lab;
	?>
							<tr>
								<td><?php echo strtoupper($ecode); ?></td>
								<td><?php echo strtoupper($subject_code); ?></td>
								<td style="width:20%"><?php echo ucwords($subject_title); ?></td>
								<td><?php echo $lec_startTime."-".$lec_endTime; ?></td>
								<td><?php echo $lec_room; ?></td>
								<td><?php echo ($lab_startTime != '00:00 AM' ? $lab_startTime."-".$lab_endTime : ''); ?></td>
								<td><?php echo $lab_room; ?></td>
								<td><?php echo $firstDay.$secondDay; ?></td>
								<td><?php echo $units; ?></td>
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
        $('.table_instructorLoad').DataTable({
        	"order": [[ 0, "asc" ]],
        	"dom": 'lTfgtrt<"bottom"ip<"clear">>',
        	// "dom": 'lTfigt',
        	"tableTools": {
            	"sSwfPath": "assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
        	}
        });
    });

</script>
