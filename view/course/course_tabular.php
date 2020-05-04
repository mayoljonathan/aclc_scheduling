<?php require_once '../../library/config.php'; ?>

<div class="table-responsive">
	<div class="row dashboard-header animated fadeIn">
		<table class="table table-striped table-bordered table-hover" id="table_course">
			<thead>
				<th>Course Abbr.</th>
				<th>Course Title</th>
				<th>Course Type</th>
				<th>Completion Years</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getCourse = $dbConn->query('SELECT * FROM tbl_course');
				while($row = $getCourse->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
			?>
				<tr>
					<td><?php echo strtoupper($course_abbr); ?></td>
					<td><?php echo strtoupper($course_name); ?></td>
					<td><?php echo strtoupper($course_type); ?></td>
					<td><?php echo $course_noYears; ?></td>
					<td><?php echo ($course_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
					<td style="width:85px;">
						<button id="btn_editCourse" class="btn btn-success btn-sm" value="<?php echo $course_id; ?>"><i class="fa fa-edit"></i></button>
						<?php echo ($course_status==1)? '<button id="btn_inactiveCourse" value="'.$course_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeCourse" value="'.$course_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
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
            $('#table_course').DataTable();
        });
    </script>
