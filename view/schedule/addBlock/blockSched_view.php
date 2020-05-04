<?php require '../../../library/config.php'; ?>
<?php extract($_REQUEST); ?>
<input type="hidden" name="course_abbr" id="course_abbr" value="<?php echo $course; ?>">
<input type="hidden" name="addBlock_yearLevel" id="addBlock_yearLevel" value="<?php echo $year_level; ?>">
<input type="hidden" name="addBlock_semester" id="addBlock_semester" value="<?php echo $semester; ?>">
<input type="hidden" id="maxEndTime">
<input type="hidden" id="data_row" name="data_row">

<div>
	<div class="col-md-2">
		<label class="text-header">Choose Schedule Type:</label>
	</div>
	<div class="col-md-2">
		<select name="sched_type" id="sched_type" class="form-control">
			<option value="1">Morning</option>
			<option value="2">Afternoon</option>
			<option value="3">Evening</option>
		</select>
	</div>
	<div class="col-offset-md-6 col-md-12">&nbsp;</div>

	<table class="table table-bordered table-striped table-responsive" id="table_subjects">
		<thead>
			<th>Ecode</th>
			<th style="width:50px;">Subject Code</th>
			<th style="width:250px;">Subject Title</th>
			<th>Lec Time</th>
			<th>Lec Room</th>
			<th>Lab Time</th>
			<th>Lab Room</th>
			<th>Day</th>
			<th>Instructor</th>
		</thead>
		<tbody>
			
		</tbody>
	</table>

</div>


<script>
	$(document).ready(function(){
		
		showLoading();
		var course_abbr = $('#blockCourse_abbr').html();
		var year_level = $('#addBlock_yearLevel').val();
		var semester = $('#addBlock_semester').val();

		setTableData();

		function setTableData(){
			$.post("services/schedule/addBlock/getRow.php",{course_abbr:course_abbr,year_level:year_level,semester:semester},function(data){
				if(data[0]['response']=='success'){
					var main_row = 0;
					for(var row=1;row<=data.length-1;row++){
						// naay lab
						$('#data_row').val(row);
						if(data[row]['lab']!=0){
							var $tr = $('<tr id="schedRow'+main_row+'">').append(
								$('<td id="td_ecode'+row+'"><span id="showEcode'+row+'"></span>').append($('<input type="hidden" name="ecode['+main_row+']" id="ecode">')),
								$('<td>').text(data[row]['subject_code']).append($('<input type="hidden" name="subject_code['+main_row+']" value="'+data[row]["subject_code"]+'">')),
								$('<td>').text(data[row]['subject_title']).append($('<input type="hidden" name="subject_title['+main_row+']" value="'+data[row]["subject_title"]+'">')),
								$('<td style="width:130px"><select class="chosen-select" name="lec_startTime['+main_row+']" id="lec_startTime" required><option disabled selected></option></select><select class="chosen-select" name="lec_endTime['+main_row+']" id="lec_endTime" required></select>'),
								$('<td style="width:130px" id="td_lecRoom'+row+'">'),
								$('<td style="width:130px"><select class="chosen-select" name="lab_startTime['+main_row+']" id="lab_startTime" required></select><select class="chosen-select" name="lab_endTime['+main_row+']" id="lab_endTime" required></select>'),
								$('<td style="width:130px" id="td_labRoom'+row+'">'),
								$('<td style="width:135px"><select class="chosen-select" name="firstDay['+main_row+']" id="firstDay" required><option disabled selected></option><option id="Monday">Monday</option><option id="Tuesday">Tuesday</option><option id="Wednesday">Wednesday</option><option id="Thursday">Thursday</option><option id="Friday">Friday</option><option id="Saturday">Saturday</option></select><select class="chosen-select" name="secondDay['+main_row+']" id="secondDay" ></select>'),
								$('<td style="width:250px" id="td_instructor'+row+'">')
							);
							$('#table_subjects').append($tr);
						}else{
							var $tr = $('<tr id="schedRow'+main_row+'">').append(
								$('<td id="td_ecode'+row+'"><span id="showEcode'+row+'"></span>').append($('<input type="hidden" name="ecode['+main_row+']" id="ecode">')),
								$('<td>').text(data[row]['subject_code']).append($('<input type="hidden" name="subject_code['+main_row+']" value="'+data[row]["subject_code"]+'">')),
								$('<td>').text(data[row]['subject_title']).append($('<input type="hidden" name="subject_title['+main_row+']" value="'+data[row]["subject_title"]+'">')),
								$('<td style="width:130px"><select class="chosen-select" name="lec_startTime['+main_row+']" id="lec_startTime" required><option disabled selected></option></select><select class="chosen-select" name="lec_endTime['+main_row+']" id="lec_endTime" required></select>'),
								$('<td style="width:130px" id="td_lecRoom'+row+'">'),
								$('<td name="lab_startTime['+main_row+']">&nbsp;'),
								$('<td style="width:130px">').append('<input type="hidden" name="lab_room['+main_row+']" required>'),
								$('<td style="width:135px"><select class="chosen-select" name="firstDay['+main_row+']" id="firstDay" required><option disabled selected></option><option id="Monday">Monday</option><option id="Tuesday">Tuesday</option><option id="Wednesday">Wednesday</option><option id="Thursday">Thursday</option><option id="Friday">Friday</option><option id="Saturday">Saturday</option></select><select class="chosen-select" name="secondDay['+main_row+']" id="secondDay" ></select>'),
								$('<td style="width:250px" id="td_instructor'+row+'">')
							);
							$('#table_subjects').append($tr);
						}

						main_row++;
					}

					// set time to selects
					$.get("services/schedule/addBlock/getTime.php",function(data){
						if(data[0]['response']=='success'){
							for(var i=0;i<data.length-1;i++){
								for(var x=1;x<data.length-1;x++){
									$('select[name="lec_startTime['+i+']"]').append($('<option>',{
										value : data[x].military,
										text : data[x].time
									}));
								}
							}
							$('#maxEndTime').val(data[x].military);
							hideLoading();
						}else{
							hideLoading();
							alert('error');
						}
					},"json");


					for(var i=0;i<=row-1;i++){
						$('#td_instructor'+i).load('view/schedule/addBlock/td_instructor.php?row='+(i-1));
						$('#td_lecRoom'+i).load('view/schedule/addBlock/td_lecRoom.php?row='+(i-1));
						$('#td_labRoom'+i).load('view/schedule/addBlock/td_labRoom.php?row='+(i-1));
					}
					
				}else{
					alert('Error');
				}
			},"json");

		}
		// end function


	});
</script>

<script>
	// set SectionCode
	$(document).ready(function(){
		var course = $('#blockCourse_abbr').html();
		var year_level = $('#addBlock_yearLevel').val();
		var semester = $('#addBlock_semester').val();

		concat_ecode = convertCourse(course,year_level,semester);
		var sy_code = $('#sy_code').val();


		var sched_type = $('#sched_type').val();
		if(sched_type==1){
			sched_type="MORNING";
		}else if(sched_type==2){
			sched_type="AFTERNOON";
		}else{
			sched_type="EVENING";
		}

		$.when(
			$.post("services/schedule/addBlock/getEcode.php",{concat_ecode:concat_ecode,sy_code:sy_code,sched_type:sched_type},function(data){
				if(data[0]["response"] == "success"){
					for(var i=1;i <= data.length-1; i++){
						var sectionNum = data[i].ecode.slice(-3);
						//get first letter/number
						var first = sectionNum.slice(0,1);
						if($.isNumeric(first)){
							var sectionLetter = sectionNum.slice(1,2);
						}else{
							var sectionLetter = sectionNum.slice(0,1);
						}
					}

					if(sectionLetter=="A"||sectionLetter=="B"||sectionLetter=="C"||sectionLetter=="D"){
						for(var i=1;i<=4;i++){
							if(sectionLetter == morning[i]){
								var rowCount = $('#table_subjects tr').length-1;
								for(var x=0; x<=rowCount ;x++){
									for(var y=1; y<=x+1 ;y++){
										$('input[name="ecode['+x+']"]').val(concat_ecode+morning[i+1]+y);
									}
								}
							}
						}
					}else if(sectionLetter=="P"||sectionLetter=="Q"||sectionLetter=="R"){
						for(var i=1;i<=3;i++){
							if(sectionLetter == afternoon[i]){
								var rowCount = $('#table_subjects tr').length-1;
								for(var x=0; x<=rowCount ;x++){
									for(var y=1; y<=x+1 ;y++){
										$('input[name="ecode['+x+']"]').val(concat_ecode+afternoon[i+1]+y);
									}
								}
							}
						}
					}else if(sectionLetter=="E"||sectionLetter=="F"||sectionLetter=="G"||sectionLetter=="H"){
						for(var i=1;i<=4;i++){
							if(sectionLetter == evening[i]){
								var rowCount = $('#table_subjects tr').length-1;
								for(var x=0; x<=rowCount ;x++){
									for(var y=1; y<=x+1 ;y++){
										$('input[name="ecode['+x+']"]').val(concat_ecode+evening[i+1]+y);
									}
								}
							}
						}
					// special
					// dont include this
					}else if(sectionLetter=="S"||sectionLetter=="T"||sectionLetter=="U"||sectionLetter=="V"||sectionLetter=="W"||sectionLetter=="X"||sectionLetter=="Y"||sectionLetter=="Z"){
						for(var i=1;i<=8;i++){
							if(sectionLetter == special[i]){
								var rowCount = $('#table_subjects tr').length-1;
								for(var x=0; x<=rowCount ;x++){
									for(var y=1; y<=x+1 ;y++){
										$('input[name="ecode['+x+']"]').val(concat_ecode+special[i+1]+y);
									}
								}
							}
						}
					}
					
					// set ECODE TO SPAN(to show)
					var count = $('#table_subjects tr').length-1;
					var ecodeRow = 0;
					for(var i=1; i<=count; i++){
						$('#td_ecode'+i+' span[id="showEcode'+i+'"]').text($('input[name="ecode['+ecodeRow+']"]').val());
						ecodeRow++;
					}
				//#########DONE SETTING ECODE & OTHER STUFFS FOR EXISTING BLOCK SCHEDS

				}else if(data[0]["response"] == "empty"){

					if($('#sched_type').find("option:selected").val() == 1){
						var rowCount = $('#table_subjects tr').length-1;
						for(var x=0; x<=rowCount ;x++){
							for(var y=1; y<=x+1 ;y++){
								$('input[name="ecode['+x+']"]').val(concat_ecode+morning[1]+y);
							}
						}
					}else if($('#sched_type').find("option:selected").val() == 2){
						var rowCount = $('#table_subjects tr').length-1;
						for(var x=0; x<=rowCount ;x++){
							for(var y=1; y<=x+1 ;y++){
								$('input[name="ecode['+x+']"]').val(concat_ecode+afternoon[1]+y);
							}
						}
					}else{
						var rowCount = $('#table_subjects tr').length-1;
						for(var x=0; x<=rowCount ;x++){
							for(var y=1; y<=x+1 ;y++){
								$('input[name="ecode['+x+']"]').val(concat_ecode+evening[1]+y);
							}
						}
					}


					// set ECODE TO SPAN(to show)
					var count = $('#table_subjects tr').length-1;
					var ecodeRow = 0;
					for(var i=1; i<=count; i++){
						$('#td_ecode'+i+' span[id="showEcode'+i+'"]').text($('input[name="ecode['+ecodeRow+']"]').val());
						ecodeRow++;
					}

				}else{
					alert('error');
				}
			},"json")
		).done(function(){
			hideLoading();
		});

	});
</script>

<script>
	$(document).on('submit','#form_blockSched',function(){
		showLoading();
		var formData = $(this).serializeArray();
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 7000
        };

		$.post("services/schedule/addBlock/submitBlockSchedule.php",formData,function(data){
			var successCount = 0;
			var count = 0;

			for(var i=0;i <= $('#data_row').val(); i++){
				if(data[i]["response"] == "conflict"){
					count++;
					$('#schedRow'+data[i]['main_row']).css("color","red");
				}else if(data[i]["response"] == "success"){
					$('#schedRow'+data[i]['main_row']).css("color","green");
					successCount++;
				}

				if(count == 1){
        			toastr.error('There was a conflict found in the form. <br><br>Legend:<br> Red - Conflict<br>Green - No Conflict');
				}

				if(successCount == $('#data_row').val()){
					// no more conflict
					var formData = $("#form_blockSched").serialize();
					$.post("services/schedule/addBlock/final_submitBlock.php",formData,function(data){
						if(data.response=="success"){
	            			toastr.success('Block section has been created');
	            			$("#modal_blockSched").modal("hide");
						}else{
							toastr.error('Something error happened. <br>Ask assistance for system administrator');
						}
						return false;
					},'json');
				}
			}
		},"json");
		count = 0;
		hideLoading();
		return false;
		
	});
</script>


