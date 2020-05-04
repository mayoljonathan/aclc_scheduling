<?php require '../../library/config.php'; ?>
<?php require '../../services/global/convertYear.php'; ?>
<?php require '../../services/global/convertDay.php'; ?>
<?php require '../../services/global/convertTime.php'; ?>

<?php 
	$sy_code = $_SESSION['user']['sy_code'];
	extract($_REQUEST);
?>

<div class="table-responsive animated fadeIn">
	<?php 
		$getRoom = $dbConn->query("SELECT * FROM tbl_room WHERE room_id='".$room_id."'");
		$gr = $getRoom->fetch(PDO::FETCH_ASSOC);
		if($getRoom->rowCount() > 0 ) {
			extract($gr);
		}
	?>
		<a href="#schedule_list" id="scheduleRoom_view" class="pull-left"><h2><i class="fa fa-chevron-left"></i>&nbsp;Back</h2></a>
		<div class="pull-right">
			<h1 id="header_room" data-course="<?php echo $room_name; ?>"><?php echo "ROOM ".strtoupper($room_name); ?></h1>
			<h4><?php echo "Floor : <span class='pull-right'>".$floor_level."</span>"; ?></h4>
			<h4><?php echo "Capacity: <span class='pull-right'>".$student_capacity."</span>"; ?></h4>
		</div>
		<br><br><br><br><br><br>
		<table class="table table-striped table-bordered table-hover" id="table_roomSchedule">
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
			</thead>
			<tbody>
			<?php 
				$getSchedules = $dbConn->query("
					SELECT * FROM tbl_schedule s
					LEFT OUTER JOIN tbl_faculty f ON s.faculty_id=f.faculty_id WHERE s.schoolyear_code='".$sy_code."' AND (lec_room='".$room_name."' OR lab_room='".$room_name."') GROUP BY ecode ORDER BY s.lec_startTime ASC ");
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
				</tr>

			<?php } ?>

			</tbody>
		</table>
</div>


<!-- DATATABLES -->
    <script>
        $(document).ready(function() {
            /* Init DataTables */
            $('#table_roomSchedule').DataTable({
	        	"dom": 'lTfgtrt<"bottom"ip<"clear">>',
	        	"tableTools": {
	            	"sSwfPath": "assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
	        	}
	        });

        });
    </script>