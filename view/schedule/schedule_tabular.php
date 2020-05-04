<?php require '../../library/config.php'; ?>
<?php require '../../services/global/convertDay.php'; ?>
<?php require '../../services/global/convertTime.php'; ?>

<?php 
	$sy_code = $_SESSION['user']['sy_code'];
?>

<div class="table-responsive">
	<div class="row dashboard-header">
		<table class="table table-striped table-bordered table-hover" id="table_schedule">
			<thead>
				<th>Ecode</th>
				<th>Subject Code</th>
				<th style="width:20%">Subject Title</th>
				<th>Lec Time</th>
				<th>Lec Room</th>
				<th>Lab Time</th>
				<th>Lab Room</th>
				<th>Day</th>
				<th>Instructor</th>
				<th>Status</th>
				<th style="width:300px;">Action</th>
			</thead>
			<tbody>
			<?php 
				$getSchedules = $dbConn->query("
					SELECT * FROM tbl_schedule s
					LEFT OUTER JOIN tbl_faculty f ON s.faculty_id=f.faculty_id WHERE s.schoolyear_code='".$sy_code."' GROUP BY ecode");
				while($row = $getSchedules->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
					if($mi!=""){
						$mi = $mi.".";
					}
					$name = $lastname.", ".$firstname." ".$mi;

					$firstDay = convertDay($firstDay);
					$secondDay = convertDay($secondDay);
					$lec_startTime = convertTime($lec_startTime);
					$lec_endTime = convertTime($lec_endTime);
					$lab_startTime = convertTime($lab_startTime);
					$lab_endTime= convertTime($lab_endTime);

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
					<td><?php echo ucwords($name); ?></td>
					<td><?php echo ($schedule_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Dissolved</font></b>' ; ?></td>
					<td style="width:10%;">
						<!-- <button id="btn_editSchedule" class="btn btn-success btn-sm" value="<?php echo $schedule_id; ?>"><i class="fa fa-edit"></i></button> -->
						<?php echo ($schedule_status==1) ? '<button id="btn_inactiveSchedule" value="'.$schedule_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeSchedule" value="'.$schedule_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
					</td>
				</tr>

			<?php } ?>

			</tbody>
		</table>
	</div>
</div>
	<!-- DATATABLES -->
    <script>
        $(document).ready(function() {
            /* Init DataTables */
            $('#table_schedule').DataTable();
        });
    </script>
