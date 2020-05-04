<?php require_once '../../library/config.php'; ?>
<?php $session_user_type = $_SESSION['user']['user_type']; ?>
<div class="table-responsive">
	<div class="row dashboard-header animated fadeIn">
		<table class="table table-striped table-bordered table-hover" id="table_user">
			<thead>
				<th>Employee ID</th>
				<th>Name</th>
				<th>Username</th>
				<th>User Type</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getUsers = $dbConn->query('SELECT * FROM tbl_user');
				while($row = $getUsers->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
					if($mi!=""){$mi = $mi.".";}
					$name = $lastname.", ".$firstname." ".$mi;
			?>
				<tr>
					<td><?php echo strtoupper($emp_id); ?></td>
					<td><?php echo ucwords($name); ?></td>
					<td><?php echo $username; ?></td>
					<td><?php echo $user_type; ?></td>
					<td><?php echo ($user_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
					<td style="width:85px;">
						<?php if($session_user_type == 'ADMIN'){ ?>
						<button id="btn_editUser" class="btn btn-success btn-sm" value="<?php echo $user_id; ?>"><i class="fa fa-edit"></i></button>
						<?php }else{ 
							if($user_type != 'ADMIN'){
						?>
								<button id="btn_editUser" class="btn btn-success btn-sm" value="<?php echo $user_id; ?>"><i class="fa fa-edit"></i></button>
						<?php }
						} 
						?>
						<?php 
							if($user_type != 'ADMIN'){ 
						?>
						<?php echo ($user_status==1)? '<button id="btn_inactiveUser" value="'.$user_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeUser" value="'.$user_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
						<?php } ?>
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
            $('#table_user').DataTable({
            	"order": [[ 3, "asc" ]]
            });
        });
    </script>
