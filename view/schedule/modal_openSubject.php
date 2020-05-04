<form id="form_submitOpenSubject" method="post">
    <div id="modal_openSubjectForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	    <div class="modal-dialog modal-xmd">
            <div class="panel panel-success ">

                <div class="panel-heading">
                    <button type="button" class="close m-t-5" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="panel-title"><center id="modal_openSubjectTitle"></center></h3>
                </div>


                <div class="panel-body">
                    <!-- hidden -->
                    <input type="hidden" name="c_type" id="c_type">
                    <input type="hidden" name="schedule_id" id="schedule_id">

                    <div class="col-md-12 mgt-10" id="course_view">
                        <label class="text-header">Course:</label>
                        <select name="course_abbr" id="course_abbr" class="schedule-details" required>
                            <option disabled readonly selected></option>
                            <optgroup label="DEGREE">
                            <?php 
                                $getDegreeCourses = $dbConn->query("SELECT * FROM tbl_course WHERE course_status='1' AND course_type='DEGREE' ");
                                while ($row = $getDegreeCourses->fetch(PDO::FETCH_ASSOC)) { 
                                    extract($row);
                                ?>

                                <option value="<?php echo $course_abbr; ?>"><?php echo strtoupper($course_abbr); ?></option>
                            <?php
                                }
                            ?>
                            <optgroup label="ASSOCIATE">
                            <?php 
                                $getAssocCourses = $dbConn->query("SELECT * FROM tbl_course WHERE course_status='1' AND course_type='ASSOCIATE' ");
                                while ($row = $getAssocCourses->fetch(PDO::FETCH_ASSOC)) { 
                                    extract($row);
                                ?>

                                <option value="<?php echo $course_abbr; ?>"><?php echo strtoupper($course_abbr); ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mgt-10">
                        <label class="text-header">Ecode:</label>
                        <input type="text" class="schedule-details" name="ecode" id="ecode" required>
                    </div>
                    <div class="col-md-12 mgt-10">
                        <label class="text-header">Subject Code:</label>
                        <input type="hidden" name="subject_code" id="subject_code">
                        <span class="schedule-details" id="subject_codeDup"></span>
                    </div>
                    <div class="col-md-12 mgt-10">
                        <label class="text-header">Subject Title:</label>
                        <input type="hidden" name="subject_title" id="subject_title">
                        <select id="subject_titleDup" class="schedule-details" required></select>
                    </div>
                    <div class="col-md-12 mgt-10">
                        <label class="text-header">Instructor:</label>
                        <select name="faculty_id" id="faculty_id" class="schedule-details" required">
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
                    <hr>
                    </div>
                    <div id="noSubjects"></div>

                    <div class="col-md-12" id="lec_view" style="display:none;">
                        <p><strong>LECTURE</strong></p>
                        <div class="col-md-4">
                            <label class="text-header">Start Time:</label>
                            <select class="chosen-select" name="lec_startTime" id="lec_startTime" required></select>
                        </div>
                        <div class="col-md-4">
                            <label class="text-header">End Time:</label>
                            <select class="chosen-select" name="lec_endTime" id="lec_endTime" required></select>
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
                        <div class="col-md-offset-8 col-md-4">
                            <label class="text-header">Day:</label>
                            <select class="chosen-select" name="firstDay" id="firstDay" required>
                                <option disabled selected></option>
                                <option id="Monday">Monday</option>
                                <option id="Tuesday">Tuesday</option>
                                <option id="Wednesday">Wednesday</option>
                                <option id="Thursday">Thursday</option>
                                <option id="Friday">Friday</option>
                                <option id="Saturday">Saturday</option>
                            </select>
                            <select class="chosen-select" name="secondDay" id="secondDay"></select>
                        </div>
                    </div>

                    <div class="col-md-12" id="lab_view" style="display:none;">
                        <hr>
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
                    <button type="submit" id="btn_submitOpenSubject" class="btn btn-success" >Submit</button>
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>

            </div>
	    </div>
	</div>
</form>



<script>
    $(document).ready(function(){
        // set time to selects

        $.get("services/schedule/addBlock/getTime.php",function(data){
            if(data[0]['response']=='success'){
                for(var x=0;x<data.length;x++){
                    $('select[name="lec_startTime"]').append($('<option>',{
                        value : data[x].military,
                        text : data[x].time
                    }));
                }
            }
        },"json");


        $('#course_abbr').on('change',function(){
            $('#subject_titleDup').empty();
            var course_abbr = $('#course_abbr').val();

            $.post('services/schedule/openSubject/getSubjects.php',{course_abbr:course_abbr},function(data){
                if(data){
                    $("#noSubjects").empty();
                    for(var i=0;i<data.length;i++){
                        $('#subject_titleDup').append($('<option>', {
                            value: data[i].subject_code,
                            text: data[i].subject_title
                        }));
                    }

                    $('#c_type').val('lec');
                    $('#lab_view').hide();
                    $('#lec_view').show();
                    $('#lab_startTime').removeAttr('required');
                    $('#lab_endTime').removeAttr('required');
                    $('#lab_room').removeAttr('required');
                    
                    if(data[0].lab != 0){
                        $('#c_type').val('lab');
                        $('#lab_view').show();
                        $("#lab_startTime").prop('required',true);
                        $("#lab_endTime").prop('required',true);
                        $("#lab_room").prop('required',true);
                    }
                    $('#btn_submitOpenSubject').prop('disabled',false);


                    var subject_code = $('#subject_titleDup').val();
                    var subject_title = $('#subject_titleDup option:selected').text();
                    $('#subject_code').val(subject_code);
                    $('#subject_codeDup').text(subject_code);
                    $('#subject_title').val(subject_title);

                    setTimeout(function(){
                        $('select').trigger('chosen:updated');
                    },0);

                }else{
                    $('#noSubjects').html("<div class='wrapper'><div class='row'><center><h1>There were no subjects in this course yet</h1></center></div></div>");
                    $('#btn_submitOpenSubject').prop('disabled',true);
                    $('#lec_view').hide();
                    $('#lab_view').hide();
                }
            },'json');

        });

        $('#subject_titleDup').on('change',function(){
            var subject_code = $(this).val();
            var subject_title = $('#subject_titleDup option:selected').text();
            var course_abbr = $('#course_abbr').val();
            $.post('services/schedule/openSubject/getUnits.php',{subject_code:subject_code,course_abbr:course_abbr},function(data){
                if(data){
                    $('#c_type').val('lec');
                    $('#lab_view').hide();
                    $('#lec_view').show();
                    $('#lab_startTime').removeAttr('required');
                    $('#lab_endTime').removeAttr('required');
                    $('#lab_room').removeAttr('required');
                    if(data[0].lab != 0){
                        $('#c_type').val('lab');
                        $('#lab_view').show();
                        $("#lab_startTime").prop('required',true);
                        $("#lab_endTime").prop('required',true);
                        $("#lab_room").prop('required',true);
                    }
                    $('#btn_submitOpenSubject').prop('disabled',false);

                }
            },'json');

            $('#subject_title').val(subject_title);
            $('#subject_code').val(subject_code);
            $('#subject_codeDup').text(subject_code);
        });

        // lec_startTime changed
        $("#lec_startTime").on('change',function(){
            var lec_startTime = $(this).val();

            var setLabTimeStart = false;
            // convert maxEndTime to decimal
            var maxEndTime = '22:00';
            var maxEndTimeHour = parseFloat(maxEndTime.slice(0,-3));
            var maxEndTimeMinute = parseFloat(maxEndTime.slice(3));
            var maxEndTimeDeciMinute = maxEndTimeMinute/60;
            deci_maxEndTime = (+maxEndTimeHour) + (+maxEndTimeDeciMinute);

            // empty the select dropdown
            $('select[name="lec_endTime"]').empty();
            $('select[name="lab_startTime"]').empty();
            $('select[name="lab_endTime"]').empty();

            // slicing the startTime for its hour and minutes
            var hour = lec_startTime.slice(0,-3);
            var minute = lec_startTime.slice(3);
            // getting the decimal minute of the minutes
            var deciMinute = minute/60;
            deci_startTime = (+hour) + (+deciMinute);

            for(var i=0; i < 3 ; i++){
                if(deci_maxEndTime > deci_startTime){
                    deci_startTime = deci_startTime+0.5;
                    minute = deci_startTime.toString().slice(2);

                    if(minute==""){
                        minute = "00";
                        hour++;
                    }else if(minute==".5" || minute=="5"){
                        minute = "30";
                    }

                    var lec_endTime = hour+":"+minute;
                    var lec_endTimeMilitary = lec_endTime;

                    lec_endTime = toStandardTime(lec_endTime);
                    lec_endTime = lec_endTime.replace(/^0+/, '');
                    $('select[name="lec_endTime"]').append($('<option>', {
                        value: lec_endTimeMilitary,
                        text: lec_endTime
                    }));

                    // SET LAB TIME START
                    if(!setLabTimeStart){
                        // end time for lecture = start time for lab
                        $('select[name="lab_startTime"]').append($('<option>', {
                            value: lec_endTimeMilitary,
                            text: lec_endTime
                        }));

                        setLabTimeStart = true;
                    }
                }
            }

            setTimeout(function(){
                $('select').trigger('chosen:updated');
            },50);



            // SET LAB END TIME
            var lab_startTime = $('select[name="lab_startTime"]').val();
            var timeLength = lab_startTime.toString().length;

            if(timeLength == 4){
                hour    = lab_startTime.toString().slice(0,1);
                minute  = lab_startTime.toString().slice(2);
            }else if(timeLength == 5){
                hour    = lab_startTime.toString().slice(0,2);
                minute  = lab_startTime.toString().slice(3);
            }

            var deciMinute = minute/60;
            lab_startTime = (+hour) + (+deciMinute);

            for(var i=0; i<3; i++){
                if(deci_maxEndTime > lab_startTime){
                    lab_startTime += 0.5;
                    minute = lab_startTime.toString().slice(2);

                    if(minute==""){
                        minute = "00";
                        hour++;
                    }else if(minute==".5" || minute=="5"){
                        minute = "30";
                    }

                    var lab_endTime = hour+":"+minute;
                    var lab_endTimeMilitary = lab_endTime;

                    lab_endTime = toStandardTime(lab_endTime);
                    lab_endTime = lab_endTime.replace(/^0+/, '');
                    $('select[name="lab_endTime"]').append($('<option>', {
                        value: lab_endTimeMilitary,
                        text: lab_endTime
                    }));
                }
            }

            setTimeout(function(){
                $('select').trigger('chosen:updated');
            },50);

        });

        // lec_endTime CHANGED
        $('#lec_endTime').on('change',function(){
            // empty the select dropdown
            $('select[name="lab_startTime"]').empty();
            $('select[name="lab_endTime"]').empty();

            // SET LAB START TIME
            var lec_endTime = toStandardTime($('select[name="lec_endTime"]').val());
            $('select[name="lab_startTime"]').append($('<option>', {
                value: $('select[name="lec_endTime"]').val(),
                text: lec_endTime
            }));

            setTimeout(function(){
                $('select').trigger('chosen:updated');
            },50);
            

            // SET LAB END TIME
            var lab_startTime = $('select[name="lab_startTime"]').val();
            var timeLength = lab_startTime.toString().length;

            if(timeLength == 4){
                hour    = lab_startTime.toString().slice(0,1);
                minute  = lab_startTime.toString().slice(2);
            }else if(timeLength == 5){
                hour    = lab_startTime.toString().slice(0,2);
                minute  = lab_startTime.toString().slice(3);
            }

            var deciMinute = minute/60;
            lab_startTime = (+hour) + (+deciMinute);

            for(var i=0; i<3; i++){
                if(deci_maxEndTime > lab_startTime){
                    lab_startTime += 0.5;
                    minute = lab_startTime.toString().slice(2);

                    if(minute==""){
                        minute = "00";
                        hour++;
                    }else if(minute==".5" || minute=="5"){
                        minute = "30";
                    }

                    var lab_endTime = hour+":"+minute;
                    var lab_endTimeMilitary = lab_endTime;

                    lab_endTime = toStandardTime(lab_endTime);
                    lab_endTime = lab_endTime.replace(/^0+/, '');
                    $('select[name="lab_endTime"]').append($('<option>', {
                        value: lab_endTimeMilitary,
                        text: lab_endTime
                    }));
                }
            }

            setTimeout(function(){
                $('select').trigger('chosen:updated');
            },50);
            
        });

        //set Days
        $('#firstDay').on('change', function(){
            
            $('select[name="secondDay"]').empty();
            $('select[name="secondDay"]').append($('<option>', {
                value: "",
                text: ""
            }));

            var day;
            var firstDay = $('select[name="firstDay"]').find('option:selected').attr('id');

            if(firstDay == "Monday"){
                day = 1;
            }else if(firstDay == "Tuesday"){
                day = 2;
            }else if(firstDay == "Wednesday"){
                day = 3;
            }else if(firstDay == "Thursday"){
                day = 4;
            }else if(firstDay == "Friday"){
                day = 5;
            }else if(firstDay == "Saturday"){
                day = 6;
            }

            var totalDays = 6;
            while(totalDays>day){
                day++;

                if(day == 1){
                    secondDay = "Monday";
                }else if(day == 2){
                    secondDay = "Tuesday";
                }else if(day == 3){
                    secondDay = "Wednesday";
                }else if(day == 4){
                    secondDay = "Thursday";
                }else if(day == 5){
                    secondDay = "Friday";
                }else if(day == 6){
                    secondDay = "Saturday";
                }

                // Add the converted day to the dropdown list
                $('select[name="secondDay"]').append($('<option>', {
                    value: secondDay,
                    text: secondDay
                }));
            }

            $('select').trigger('chosen:updated');
        });

    });

    $('#form_submitOpenSubject').on('submit',function(){
        showLoading();
        var formData = $(this).serialize();
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

        $.post('services/schedule/openSubject/submitOpenSubject.php',formData,function(data){
            if(data.response=='success'){
                $.post('services/schedule/openSubject/final_submitOpenSubject.php',formData,function(data){
                    if(data.response=='success'){
                        $.when($('#schedule_tabular').load('view/schedule/schedule_tabular.php')).done(function(){
                            toastr.success('Irregular Class ('+strtoupper(data.ecode)+') '+ucwords(data.subject_title)+' has been added');
                            $("#modal_openSubjectForm").modal("hide");
                            hideLoading();
                        });
                    }else{
                        toastr.error('Something error happened. <br>Ask assistance by the system administrator');
                        hideLoading();
                    }
                },'json');

            }else if(data.response=='conflict'){
                toastr.error('There was a conflict schedule found');
                hideLoading();
            }else if(data.response=='exists'){
                toastr.error('Ecode exist. Please choose another one');
                hideLoading();
            }else{
                toastr.error('Something error happened. <br>Ask assistance by the system administrator');
                hideLoading();
            }
        },'json');

        return false;
    });
</script>

<script>
    $(document).ready(function(){
        $(".chosen-select").chosen({ width:"90%" });
        $("#faculty_id").chosen({width: "30%"});
        $("#course_abbr").chosen({width:"30%"});
        $("#subject_titleDup").chosen({width:"50%"});

    });
</script>

                   
           