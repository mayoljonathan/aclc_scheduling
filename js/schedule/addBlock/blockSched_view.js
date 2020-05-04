// sched_type change
$(document).on('change','#sched_type',function(){
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

// lec_startTime changed
$(document).on('change','#lec_startTime',function(){
	var row = $(this).attr("name");
	row = parseInt(row.replace(/[^0-9\.]/g, ''), 10);

	var setLabTimeStart = false;

	// convert maxEndTime to decimal
	var maxEndTime = $('#maxEndTime').val();
	var maxEndTimeHour = parseFloat(maxEndTime.slice(0,-3));
	var maxEndTimeMinute = parseFloat(maxEndTime.slice(3));
	var maxEndTimeDeciMinute = maxEndTimeMinute/60;
	deci_maxEndTime = (+maxEndTimeHour) + (+maxEndTimeDeciMinute);

	// empty the select dropdown
	$('select[name="lec_endTime['+row+']"]').empty();
	$('select[name="lab_startTime['+row+']"]').empty();
	$('select[name="lab_endTime['+row+']"]').empty();

	var lec_startTime = $(this).val();
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
    		$('select[name="lec_endTime['+row+']"]').append($('<option>', {
	    		value: lec_endTimeMilitary,
			    text: lec_endTime
			}));

    		// SET LAB TIME START
			if(!setLabTimeStart){
				// end time for lecture = start time for lab
		    	$('select[name="lab_startTime['+row+']"]').append($('<option>', {
		    		value: lec_endTimeMilitary,
				    text: lec_endTime
				}));

				setLabTimeStart = true;
	    	}
		}
    }

   	setTimeout(function(){
		$('select').trigger('chosen:updated');
   	},200);



    // SET LAB END TIME
	var lab_startTime = $('select[name="lab_startTime['+row+']"]').val();
	var timeLength = lab_startTime.toString().length;

	if(timeLength == 4){
		hour 	= lab_startTime.toString().slice(0,1);
		minute 	= lab_startTime.toString().slice(2);
	}else if(timeLength == 5){
		hour 	= lab_startTime.toString().slice(0,2);
		minute 	= lab_startTime.toString().slice(3);
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
	    	$('select[name="lab_endTime['+row+']"]').append($('<option>', {
	    		value: lab_endTimeMilitary,
			    text: lab_endTime
			}));
		}
	}

	setTimeout(function(){
		$('select').trigger('chosen:updated');
   	},200);

});

// lec_endTime CHANGED
$(document).on('change','#lec_endTime',function(){
	var row = $(this).attr("name");
	row = parseInt(row.replace(/[^0-9\.]/g, ''), 10);

	// empty the select dropdown
	$('select[name="lab_startTime['+row+']"]').empty();
	$('select[name="lab_endTime['+row+']"]').empty();

	// SET LAB START TIME
	var lec_endTime = toStandardTime($('select[name="lec_endTime['+row+']"]').val());
	$('select[name="lab_startTime['+row+']"]').append($('<option>', {
		value: $('select[name="lec_endTime['+row+']"]').val(),
	    text: lec_endTime
	}));

	setTimeout(function(){
		$('select').trigger('chosen:updated');
   	},200);
	

	// SET LAB END TIME
	var lab_startTime = $('select[name="lab_startTime['+row+']"]').val();
	var timeLength = lab_startTime.toString().length;

	if(timeLength == 4){
		hour 	= lab_startTime.toString().slice(0,1);
		minute 	= lab_startTime.toString().slice(2);
	}else if(timeLength == 5){
		hour 	= lab_startTime.toString().slice(0,2);
		minute 	= lab_startTime.toString().slice(3);
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
	    	$('select[name="lab_endTime['+row+']"]').append($('<option>', {
	    		value: lab_endTimeMilitary,
			    text: lab_endTime
			}));
		}
	}

	setTimeout(function(){
		$('select').trigger('chosen:updated');
   	},200);
	
});