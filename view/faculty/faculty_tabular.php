<?php require_once '../../library/config.php'; ?>
<div class="table-responsive">
	<div class="row dashboard-header">
		<table class="table table-striped table-bordered table-hover" id="table_faculty">
			<thead>
				<th>Faculty ID</th>
				<th>Name</th>
				<th>Gender</th>
				<!-- <th>Address</th>
				<th>Mobile</th>
				<th>Email</th> -->
				<th>Department</th>
				<th>Type</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getFaculty = $dbConn->query('SELECT * FROM tbl_faculty f
											  LEFT OUTER JOIN tbl_department d ON f.department_id=d.department_id');
				while($row = $getFaculty->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
					if($mi!=""){
						$mi = $mi.".";
					}
					$name = $lastname.", ".$firstname." ".$mi;
			?>
				<tr>
					<td><?php echo strtoupper($faculty_id); ?></td>
					<td><?php echo ucwords($name); ?></td>
					<td><?php echo $gender; ?></td>
					<!-- <td><?php echo $address; ?></td>
					<td><?php echo $mobile; ?></td>
					<td><?php echo $email; ?></td> -->
					<td><?php echo strtoupper($department_name); ?></td>
					<td><?php echo $faculty_type; ?></td>
					<td><?php echo ($faculty_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
					<td style="width:85px;">
						<button id="btn_editFaculty" class="btn btn-success btn-sm" value="<?php echo $id; ?>"><i class="fa fa-edit"></i></button>
						<?php echo ($faculty_status==1)? '<button id="btn_inactiveFaculty" value="'.$id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeFaculty" value="'.$id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
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
            $('#table_faculty').DataTable({
            	"order": [[ 1, "asc" ]]
            });
        });
    </script>
