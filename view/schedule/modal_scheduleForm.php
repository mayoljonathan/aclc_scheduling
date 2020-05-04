<form id="form_submitSchedule" method="post">
    <div id="modal_scheduleForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-xmd" style="margin-top:70px;">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_scheduleTitle"></center></h3>
                </div>


                <div class="panel-body">
                    <!-- hidden -->
                    <input type="hidden" name="schedule_id" id="schedule_id">
                    <div class="col-md-12">
                        <label class="text-header">Ecode:</label>
                        <span class="schedule-details" id="ecode"></span>
                    </div>
                    <div class="col-md-12">
                        <label class="text-header">Subject Code:</label>
                        <span class="schedule-details" id="subject_code"></span>
                    </div>
                    <div class="col-md-12">
                        <label class="text-header">Subject Title:</label>
                        <span class="schedule-details" id="subject_title"></span>
                    </div>
                    <div class="col-md-12">
                        <label class="text-header">Instructor:</label>
                        <select class="schedule-details instructor-chosen" name="faculty_id" id="faculty_id" required">
                            <option disabled selected></option>
                                <?php 
                                    $sql = $dbConn->query("SELECT department_id,department_name FROM tbl_department WHERE department_status='1' ");
                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                                        extract($row);
                                ?>
                                    <optgroup label="<?php echo $department_name ?>">

                                        <?php 
                                            $getInstructors = $dbConn->query("SELECT * FROM tbl_faculty WHERE department_id='".$department_id."' AND faculty_status='1' ORDER BY lastname ASC");
                                            while($gi = $getInstructors->fetch(PDO::FETCH_ASSOC)){
                                                extract($gi);
                                                if($mi!=""){
                                                    $mi = $mi.".";
                                                }
                                                $fullname=$lastname;

                                                if($faculty_type=="FULL TIME"){
                                                    $ft = "[FULL] ";
                                                }else{
                                                    $ft = "[PART] ";
                                                }
                                        ?>
                                            <option value="<?php echo $faculty_id; ?>" ><?php echo $ft.$fullname; ?></option>
                                        <?php 
                                            } 
                                        ?>
                                        </optgroup>
                                <?php 
                                    } 
                                ?>
                        </select>
                    </div>

                    <div class="col-md-12"><br>
                        <p><strong>LECTURE</strong></p>
                        <div class="col-md-4">
                            <label class="text-header">Start Time:</label>
                            <select class="chosen-select" name="lec_startTime" id="lec_startTime" required></select>
                        </div>
                        <div class="col-md-4">
                            <label class="text-header">End Time:</label>
                            <select class="" name="lec_endTime" id="lec_endTime" required></select>
                        </div>
                        <div class="col-md-4">
                            <label class="text-header">Room:</label>
                            <select class="chosen-select" name="lec_room" id="lec_room" required>
                                <option readonly></option>
                                <optgroup label="REGULAR">
                                    <?php

                                    $sql = $dbConn->query("SELECT * FROM tbl_room WHERE room_type='REGULAR' AND room_status='1' ");
                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                                        extract($row);
                                    ?>
                                        <option value="<?php echo strtoupper($room_name); ?>" ><?php echo strtoupper($room_name); ?></option>

                                    <?php } ?>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="text-header">Day:</label>
                            <select class="chosen-select" name="firstDay" id="firstDay" required></select>
                            <select class="chosen-select" name="secondDay" id="secondDay" required></select>
                        </div>
                    </div>

                    <div class="col-md-12"><br>
                        <p><strong>LABORATORY</strong></p>
                        <div class="col-md-4">
                            <label class="text-header">Start Time:</label>
                            <select class="chosen-select" name="lab_startTime" id="lab_startTime" required></select>
                        </div>
                        <div class="col-md-4">
                            <label class="text-header">End Time:</label>
                            <select class="chosen-select" name="lab_endTime" id="lab_endTime" required></select>
                        </div>
                        <div class="col-md-4">
                            <label class="text-header">Room:</label>
                            <select class="chosen-select" name="lab_room" id="lab_room" required>
                                <option readonly></option>
                                <optgroup label="LABORATORY">
                                    <?php

                                    $sql = $dbConn->query("SELECT * FROM tbl_room WHERE room_type='LABORATORY' AND room_status='1' ");
                                    while($row = $sql->fetch(PDO::FETCH_ASSOC)) { 
                                        extract($row);
                                    ?>
                                        <option value="<?php echo strtoupper($room_name); ?>" ><?php echo strtoupper($room_name); ?></option>

                                    <?php } ?>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    
                </div>

            	<div class="modal-footer">
                    <button type="submit" id="btn_updateSchedule" class="btn btn-success" >Update</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
	</div>
</form>

<script>
    $(document).ready(function(){
        
    });
</script>

<script>
    $(".chosen-select").chosen({ width:"90%" });
    $(".instructor-chosen").chosen({width: "40%"});
</script>