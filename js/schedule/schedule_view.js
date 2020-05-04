// DEFAULT
$(document).ready(function(){

	// ################# SCHEDULE LIST ####################

	// TABULAR STYLE
	$(document).on('click', '#scheduleTabular_view',function(){
		clearPage();
		showLoading();
		hideLoading();
		//SHOW
		$('#scheduleRoom_view').attr('checked',false);
		$('#scheduleTabular_view').attr('checked',true);
		$('#schedule_tabular').hide().fadeIn('slow').load('view/schedule/schedule_tabular.php',function(){
    		$('#table_schedule').DataTable();
		});

		
	});

	// ROOM STYLE
	$(document).on('click', '#scheduleRoom_view',function(){
		clearPage();
		showLoading();
		hideLoading();
		//SHOW
		$('#scheduleTabular_view').attr('checked',false);
		$('#scheduleRoom_view').attr('checked',true);
		$('#schedule_room').hide().fadeIn('fast').load('view/schedule/schedule_room.php');

		
	});

	//OPEN SUBJECT
	$(document).on('click', '#btn_openSubject',function(){
        $("#noSubjects").empty();
		$('#c_type').val('');
		$("#schedule_id").val('');
		$("#course_abbr").val('');
		$("#subject_title").val('');
		$("#subject_titleDup").empty();
		$("#subject_code").val('');
		$("#subject_codeDup").text('');

        $('#lec_view,#lab_view').hide();

        // enable
        $("#course_abbr").prop('disabled',false);
		$("#ecode").prop('disabled',false);
		$("#subject_titleDup").prop('disabled',false);


		setTimeout(function(){
			$('select').trigger('chosen:updated');
	   	},100);
		
		$("#form_submitOpenSubject").trigger("reset");
		$("#modal_openSubjectForm").modal({backdrop:'static', show: true});
		$("#modal_openSubjectForm").modal("show");
		$('#modal_openSubjectTitle').text('OPEN SUBJECT FOR IRREGULAR');
	});

	// EDIT SCHEDULE
	$(document).on('click', '#btn_editSchedule',function(){
		showLoading();
		$("#form_submitOpenSubject").trigger("reset");
        $('#subject_titleDup').empty();
        
        $('#lec_startTime').empty();
        $('#lec_endTime').empty();
        $('#lab_startTime').empty();
        $('#lab_endTime').empty();
		var schedule_id = $(this).val();


		$.post("services/schedule/getRow.php",{schedule_id:schedule_id},function(data){
			if(data){
				var course_abbr = data[0].course_abbr;
				// hidden duplicates
				$("#schedule_id").val(data[0].schedule_id);
				// disabled
				$("#course_abbr").prop('disabled',true);
				$("#ecode").prop('disabled',true);
				$("#subject_titleDup").prop('disabled',true);
				// POPULATE
				$('#subject_titleDup').append($('<option>',{
                    value : data[0].subject_code,
                    text : data[0].subject_title
                }));
				// set data
				$("#course_abbr").val(data[0].course_abbr);
				$("#ecode").val(data[0].ecode);
				$("#subject_code").val(data[0].subject_code);
				$("#subject_codeDup").html(data[0].subject_code);
				$("#subject_title").val(data[0].subject_title);
				$("#subject_titleDup").val(data[0].subject_code);
				$("#faculty_id").val(data[0].faculty_id);

				// SET ROOM AND DAY DATA
				$("#lec_room").val(data[0].lec_room);
				$("#lab_room").val(data[0].lab_room);
				$("#firstDay").val(data[0].firstDay);
			
				// POPULATE SELECT SECOND DAY
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

	            // SET SECOND DAY
				$("#secondDay").val(data[0].secondDay);

	            $.post('services/schedule/openSubject/getUnits.php',{subject_code:data[0].subject_code,course_abbr:course_abbr},function(data){
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
	                    // $('#btn_submitOpenSubject').prop('disabled',false);

	                }
	            },'json');

				// set time to selects
		       	$.get("services/schedule/addBlock/getTime.php",function(data){
		            if(data[0]['response']=='success'){
		                for(var x=1;x<data.length-1;x++){
		                    $('#lec_startTime').append($('<option>',{
		                        value : data[x].military,
		                        text : data[x].time
		                    }));
                		}		
                		// $('#maxEndTime').val(data[x].military);
		            }else{
		                hideLoading();
		                alert('error');
            		}	
        		},"json");

		       	// console.log(data[0].lec_startTime.slice(0,-3));
		       	// console.log(data[0].lec_endTime.slice(0,-3));

				setTimeout(function(){
        			$('#lec_startTime').val(data[0].lec_startTime.slice(0,-3));
		     
		       	},100);



				setTimeout(function(){
					  		$('#lec_endTime').val(data[0].lec_endTime.slice(0,-3));
				},200);

		       	// $.when(
		       	// 	setLecTimeEnd(data[0].lec_startTime.slice(0,-3))
		       	// ).done(function(){
	       		// 	setTimeout(function(){
	        	// 		$('#lec_startTime').val(data[0].lec_startTime.slice(0,-3));
			       // 		$('#lec_endTime').val(data[0].lec_endTime.slice(0,-3));
			       // 	},100);
		       	// })

		       
		       	setTimeout(function(){
		       		$('select').trigger('chosen:updated');
		       	},100);

		       	$("#modal_openSubjectForm").modal({backdrop:'static', show: true});
				$("#modal_openSubjectForm").modal("show");
				$('#modal_openSubjectTitle').text('EDIT SCHEDULE ('+strtoupper(data[0].subject_title)+')');

				hideLoading();
			}else{
				hideLoading();
				alert('Error');
			}
		},"json");






		










		
	
	});


	// ############# END SCHEDULELIST ##################

	function clearPage(){
		$('#schedule_tabular,#schedule_room,#generate_course,#generate_prospectus,#room').empty();
	}

	function setLecTimeEnd(lec_startTime){
		var setLabTimeStart = false;

		// convert maxEndTime to decimal
		var maxEndTime = "22:30";
		var maxEndTimeHour = parseFloat(maxEndTime.slice(0,-3));
		var maxEndTimeMinute = parseFloat(maxEndTime.slice(3));
		var maxEndTimeDeciMinute = maxEndTimeMinute/60;
		deci_maxEndTime = (+maxEndTimeHour) + (+maxEndTimeDeciMinute);

		var lec_startTime = lec_startTime;
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
	   	},100);



	    // SET LAB END TIME
		// var lab_startTime = $('select[name="lab_startTime"]').val();
		// var timeLength = lab_startTime.toString().length;

		// if(timeLength == 4){
		// 	hour 	= lab_startTime.toString().slice(0,1);
		// 	minute 	= lab_startTime.toString().slice(2);
		// }else if(timeLength == 5){
		// 	hour 	= lab_startTime.toString().slice(0,2);
		// 	minute 	= lab_startTime.toString().slice(3);
		// }

		// var deciMinute = minute/60;
		// lab_startTime = (+hour) + (+deciMinute);

		// for(var i=0; i<3; i++){
		// 	if(deci_maxEndTime > lab_startTime){
		// 		lab_startTime += 0.5;
		// 		minute = lab_startTime.toString().slice(2);

		// 		if(minute==""){
		//     		minute = "00";
		//     		hour++;
		//     	}else if(minute==".5" || minute=="5"){
		//     		minute = "30";
		//     	}

		//     	var lab_endTime = hour+":"+minute;
		//     	var lab_endTimeMilitary = lab_endTime;

		//     	lab_endTime = toStandardTime(lab_endTime);
		//     	lab_endTime = lab_endTime.replace(/^0+/, '');
		//     	$('select[name="lab_endTime"]').append($('<option>', {
		//     		value: lab_endTimeMilitary,
		// 		    text: lab_endTime
		// 		}));
		// 	}
		// }

		// setTimeout(function(){
		// 	$('select').trigger('chosen:updated');
	 //   	},100);

	}
});
