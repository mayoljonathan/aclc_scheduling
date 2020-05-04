<form id="form_submitRoom" method="post">
    <div id="modal_roomForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-md" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_roomTitle">ADD NEW ROOM</center></h3>
                </div>
                
                <div class="panel-body">
                    <!-- HIDDEN DATA-->
                    <input type="hidden" name="room_id" id="room_id">
                    <input type="hidden" name="room_nameDup" id="room_nameDup">

                    <div class="col-md-12">
                    	<label class="text-header">Room name:</label>
                    	<input type="text" class="form-control uppercase" name="room_name" id="room_name" required>
                    </div>
                    <div class="col-md-5">
                        <label class="text-header">Floor Level:</label>
                        <select class="form-control" name="floor_level" id="floor_level" required>
                            <option readonly></option>
                        <?php 
                            $getFloors = $dbConn->query('SELECT DISTINCT floor_level FROM tbl_room ORDER BY floor_level ASC');
                            while($row = $getFloors->fetch(PDO::FETCH_ASSOC)) { 
                                extract($row);
                        ?>
                            <option value="<?php echo $floor_level; ?>"><?php echo $floor_level; ?></option>
                        <?php 
                            } 
                        ?>
                            <option value="<?php echo ($floor_level+1); ?>"><?php echo ($floor_level+1)."(New floor level)"; ?></option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="text-header">Student Capacity:</label>
                        <input type="text" class="form-control" data-mask="99" name="student_capacity" id="student_capacity" required>
                    </div>
                    <div class="col-md-3">
                        <label class="text-header">Room Type</label>
                        <div class="radio radio-info radio-inline" style="margin-top:-5px;">
                            <input type="radio" id="room_regular" name="room_type" value="REGULAR" checked required>
                            <label for="room_regular"> REGULAR </label>&nbsp;&nbsp;
                        
                            <input type="radio" id="room_laboratory" name="room_type" value="LABORATORY" required>
                            <label for="room_laboratory"> LABORATORY </label>
                        </div>
                    </div>
                        
                </div>

            	<div class="modal-footer">
                    <button type="submit" name="btn_submitRoom" id="btn_submitRoom" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
    </div>
</form>