<?php require_once '../../library/config.php'; ?>

<div class="table-responsive">
	<div class="row dashboard-header animated fadeIn">
		<table class="table table-striped table-bordered table-hover" id="table_sy">
			<thead>
				<th>SchoolYear Code</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getSy = $dbConn->query('SELECT * FROM tbl_schoolyear');
				while($row = $getSy->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
			?>
				<tr>
					<td><?php echo strtoupper($schoolyear_code); ?></td>
					<td><?php echo ($schoolyear_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
					<td style="width:85px;">
						<button id="btn_editSy" class="btn btn-success btn-sm" value="<?php echo $schoolyear_id; ?>"><i class="fa fa-edit"></i></button>
						<?php echo ($schoolyear_status==1)? '<button id="btn_inactiveSy" value="'.$schoolyear_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeSy" value="'.$schoolyear_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
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
            $('#table_sy').DataTable();
        });
    </script>
