<?php require_once '../../library/config.php'; ?>
<div class="table-responsive">
	<div class="row dashboard-header">
		<table class="table table-striped table-bordered table-hover" id="table_subjectTabular">
			<thead>
				<th>Subject Code</th>
				<th>Subject Title</th>
				<th>Course</th>
				<th>Year Level</th>
				<th>Semester</th>
				<th>Lec</th>
				<th>Lab</th>
				<th>Units</th>
				<th>Pre-requisites</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getSubjects = $dbConn->query('SELECT * FROM tbl_subject');
				while($row = $getSubjects->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
					$total = $lec + $lab;
			?>
				<tr>
					<td><?php echo strtoupper($subject_code); ?></td>
					<td><?php echo ucwords($subject_title); ?></td>
					<td><?php echo strtoupper($course_abbr); ?></td>
					<td><?php echo $year_level; ?></td>
					<td><?php echo ($semester==1) ? '1st' : '2nd' ; ?></td>
					<td><?php echo $lec; ?></td>
					<td><?php echo $lab; ?></td>
					<td><?php echo $total; ?></td>
					<td><?php echo strtoupper($pre_requisite); ?></td>
					<td><?php echo ($subject_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
					<td style="width:95px;">
						<button id="btn_editSubject" class="btn btn-success btn-sm" value="<?php echo $subject_id; ?>"><i class="fa fa-edit"></i></button>
						<?php echo ($subject_status==1)? '<button id="btn_inactiveSubject" value="'.$subject_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeSubject" value="'.$subject_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
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
            $('#table_subjectTabular').DataTable({
				"initComplete": function(settings, json) {
			    	hideLoading();
				}
			});
        });
    </script>
