<?php require_once '../../library/config.php'; ?>
<div class="table-responsive">
	<div class="row dashboard-header">
		<table class="table table-striped table-bordered table-hover" id="table_department">
			<thead>
				<th>Department Name</th>
				<th>Department Head</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getDepartment = $dbConn->query('
					SELECT d.*,f.lastname,f.firstname,f.mi FROM tbl_department d
                    LEFT OUTER JOIN tbl_faculty f ON d.department_head=f.faculty_id ');
				while($row = $getDepartment->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
					if($mi!=""){
						$mi = $mi.".";
					}
					$name = $lastname.", ".$firstname." ".$mi;
			?>
				<tr>
					<td><?php echo strtoupper($department_name); ?></td>
					<td><?php echo (($lastname || $firstname) ? ucwords($name): ''); ?></td>
					<td><?php echo ($department_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
					<td style="width:95px;">
						<button id="btn_editDepartment" class="btn btn-success btn-sm" data-department_name="<?php echo $department_name ?>" value="<?php echo $department_id; ?>"><i class="fa fa-edit"></i></button>
						<?php echo ($department_status==1) ? '<button id="btn_inactiveDepartment" value="'.$department_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeDepartment" value="'.$department_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
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
        $('#table_department').DataTable();
    });
</script>
