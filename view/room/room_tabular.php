<?php require_once '../../library/config.php'; ?>

<div class="table-responsive">
	<div class="row dashboard-header animated fadeIn">
		<table class="table table-striped table-bordered table-hover" id="table_room">
			<thead>
				<th>Room Name</th>
				<th>Room Type</th>
				<th>Floor Level</th>
				<th>Student Capacity</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php 
				$getRooms = $dbConn->query('SELECT * FROM tbl_room');
				while($row = $getRooms->fetch(PDO::FETCH_ASSOC)) { 
					extract($row);
			?>
				<tr>
					<td><?php echo strtoupper($room_name); ?></td>
					<td><?php echo $room_type; ?></td>
					<td><?php echo $floor_level; ?></td>
					<td><?php echo $student_capacity; ?></td>
					<td><?php echo ($room_status==1)? '<b><font color="#17b566">Active</font></b>' : '<b><font color="red">Inactive</font></b>' ; ?></td>
					<td style="width:85px;">
						<button id="btn_editRoom" class="btn btn-success btn-sm" value="<?php echo $room_id; ?>"><i class="fa fa-edit"></i></button>
						<?php echo ($room_status==1)? '<button id="btn_inactiveRoom" value="'.$room_id.'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' : '<button id="btn_activeRoom" value="'.$room_id.'" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>'; ?>
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
            $('#table_room').DataTable();
        });
    </script>
