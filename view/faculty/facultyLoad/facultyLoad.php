<?php require_once '../../../library/config.php'; ?>
<?php require '../../../services/global/convertDay.php'; ?>
<?php require '../../../services/global/convertTime.php'; ?>
<?php 
	extract($_REQUEST);
?>

<?php 
	$getInfo = $dbConn->query("
		SELECT f.*,d.department_name FROM tbl_faculty f
		INNER JOIN tbl_department d ON f.department_id=d.department_id
		WHERE f.faculty_id='".$faculty_id."' ");
	$row = $getInfo->fetch(PDO::FETCH_ASSOC);
	if($getInfo->rowCount() > 0 ) {
		extract($row);
		if($mi!=""){
			$mi = $mi.".";
		}
		$name = $lastname.", ".$firstname." ".$mi;
	}
?>

<?php 
	$sy_code = $_SESSION['user']['sy_code'];
?>
<!-- HIDDEN -->
<input type="hidden" id="sy_code" value="<?php echo $sy_code; ?>">

<div class="widget gray-bg p-sm">
	<div class="row">
		<div class="col-md-offset-1 col-md-6">
			<label>Faculty ID: </label>
			<span class="facultyLoad-details faculty_id"><?php echo $faculty_id; ?></span>
		</div>
		<div class="col-md-5">
			<label>Semester: </label>
			<span class="facultyLoad-details semester"></span>
		</div>
		<div class="col-md-offset-1 col-md-6">
			<label>Name: </label>
			<span class="facultyLoad-details"><?php echo $name; ?></span>
		</div>
		<div class="col-md-5">
			<label>Units Taken: </label>
			<span class="facultyLoad-details"><?php echo $units ?></span>
		</div>
		<div class="col-md-offset-1 col-md-6">
			<label>Department: </label>
			<span class="facultyLoad-details department"><?php echo $department_name; ?></span>
		</div>
		<div class="col-md-5">
			<label>School Year: </label>
			<span class="facultyLoad-details schoolyear"></span>
		</div>
		<div class="col-md-offset-1 col-md-6">
			<label>Faculty Type: </label>
			<span class="facultyLoad-details"><?php echo $faculty_type; ?></span>
		</div>
		<div class="col-md-5">
			<label>SY-Code: </label>
			<span class="facultyLoad-details"><?php echo $sy_code ?></span>
		</div>
	</div>
</div>
<br>

<div class="table-responsive">
	<div class="row dashboard-header">
		<table class="table table-striped table-bordered table-hover" id="table_facultyLoad_modal">
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
				$getSchedules = $dbConn->query("
					SELECT DISTINCT * FROM tbl_schedule s
					LEFT OUTER JOIN tbl_faculty f ON s.faculty_id=f.faculty_id 
					LEFT OUTER JOIN tbl_subject sj ON s.subject_code=sj.subject_code AND s.course_abbr=sj.course_abbr
					WHERE s.faculty_id='".$faculty_id."' AND s.schedule_status='1' AND s.schoolyear_code='".$sy_code."'");
				while($row = $getSchedules->fetch(PDO::FETCH_ASSOC)) { 
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
					<td><?php echo $ecode; ?></td>
					<td><?php echo strtoupper($subject_code); ?></td>
					<td style="width:20%"><?php echo $subject_title; ?></td>
					<td><?php echo $lec_startTime."-".$lec_endTime; ?></td>
					<td><?php echo $lec_room; ?></td>
					<td><?php echo ($lab_startTime != '00:00 AM' ? $lab_startTime."-".$lab_endTime : ''); ?></td>
					<td><?php echo $lab_room; ?></td>
					<td><?php echo $firstDay.$secondDay; ?></td>
					<td><?php echo $units; ?></td>
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
            $('#table_facultyLoad_modal').DataTable();

        });
    </script>

<script>
	$(document).ready(function(){
		var sy_code = $('#sy_code').val();
		var semester = sy_code.slice(-1);
		var start_sy = sy_code.slice(0,2);
		var end_sy   = sy_code.slice(2,4);


		if(semester == 1){
			semester = "1ST SEMESTER";
		}else{
			semester = "2ND SEMESTER";
		}

		$('.schoolyear').text('20'+start_sy+'-20'+end_sy);
		$('.semester').text(semester);

	});

</script>