<?php require_once '../../../library/config.php'; ?>
<?php 
	$sy_code = $_SESSION['user']['sy_code'];
?>

<div class="table-responsive">
	<div class="row dashboard-header">
		<table class="table table-striped table-bordered table-hover" id="table_facultyLoad">
			<thead>
				<th>Faculty ID</th>
				<th>Name</th>
				<th>Classes Taken</th>
				<th>Units Taken</th>
				<th>Type</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getFaculty = $dbConn->query("SELECT DISTINCT f.*,s.schoolyear_code FROM tbl_faculty f
											  LEFT OUTER JOIN tbl_schedule s ON f.faculty_id=s.faculty_id
											  WHERE f.faculty_status='1' AND s.schoolyear_code='".$sy_code."' ");
				while($row = $getFaculty->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
					
					$countClass = $dbConn->query("
						SELECT sc.subject_code,COUNT(sc.faculty_id),SUM(s.lec+s.lab) FROM tbl_schedule sc
						LEFT OUTER JOIN tbl_subject s ON s.subject_code=sc.subject_code AND s.course_abbr=sc.course_abbr
						WHERE sc.faculty_id='".$faculty_id."' AND sc.schedule_status='1' AND sc.schoolyear_code='".$sy_code."' ");
					$cc = $countClass->fetch(PDO::FETCH_ASSOC);
					if($countClass->rowCount() > 0){
						$classCounter = $cc['COUNT(sc.faculty_id)'];
						$unitsCounter = $cc['SUM(s.lec+s.lab)'];
						if($cc['SUM(s.lec+s.lab)'] == null){
							$classCounter = 0;
							$unitsCounter = 0;
						}
					}

					if($mi!=""){
						$mi = $mi.".";
					}
					$name = $lastname.", ".$firstname." ".$mi;
			?>
				<tr>
					<td><?php echo strtoupper($row['faculty_id']); ?></td>
					<td><?php echo ucwords($name); ?></td>
					<td><?php echo $classCounter; ?></td> 
					<td><?php echo $unitsCounter; ?></td>
					<td><?php echo $faculty_type; ?></td>
					<td style="width:50px;">
					<center>
						<button id="btn_viewFacultyLoad" class="btn btn-success btn-sm" data-units="<?php echo $unitsCounter; ?>" data-name="<?php echo $name; ?>" value="<?php echo $row['faculty_id']; ?>"><i class="fa fa-eye"></i></button>
					</center>
					</td>
				</tr>

			<?php 
				} 
			?>

			</tbody>
		</table>
	</div>
</div>
	<!-- DATATABLES -->
    <script>
        $(document).ready(function() {
            /* Init DataTables */
            $('#table_facultyLoad').DataTable({
            	"order": [[ 1, "asc" ]]
            });
        });
    </script>
