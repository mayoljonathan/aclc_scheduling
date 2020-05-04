$(document).ready(function(){
	//ADD NEW COURSE
	$(document).on('click', '#btn_addCourse',function(){
		$("#form_submitCourse").trigger("reset");
		$('#course_id,#course_nameDup,#course_abbrDup').val("");
		$('#course_noYears').empty();
        for(var i=4; i < 6 ;i++){
            $('#course_noYears').append($('<option>', {
                value: i,
                text: i
            }));
        }

		// $('#course_id,#firstnameDup,#miDup,#lastnameDup').val("");
		$("#modal_courseForm").modal({backdrop:'static', show: true});
		$("#modal_courseForm").modal("show");
		$('#modal_courseTitle').text('ADD NEW COURSE');
		$("#btn_submitCourse").text("Submit");
	});
	
	// EDIT COURSE
	$(document).on('click', '#btn_editCourse',function(){
		$("#form_submitCourse").trigger("reset");
		$('#course_noYears').empty();
		showLoading();
		var course_id = $(this).val();

		$.post("services/course/GetRow.php",{course_id:course_id},function(data){
			if(data){
				data[0].course_name = ucwords(data[0].course_name);
				// hidden
				$("#course_id").val(data[0].course_id);
				$("#course_nameDup").val(data[0].course_name);
				$("#course_abbrDup").val(data[0].course_abbr);

				$("#course_name").val(data[0].course_name);
				$("#course_abbr").val(data[0].course_abbr);
				if((data[0].course_type)=='DEGREE'){
					$('#course_degree').prop('checked', true);

					for(var i=4; i < 6 ;i++){
			            $('#course_noYears').append($('<option>', {
			                value: i,
			                text: i
			            }));
			        }
				}else{
					$('#course_associate').prop('checked', true);
					$('#course_noYears').append($('<option>', {
			            value: 2,
			            text: 2
			        }));
				}
				$("#course_noYears").val(data[0].course_noYears);

				$("#modal_courseForm").modal({backdrop:'static', show: true});
				$("#modal_courseForm").modal("show");
				$('#modal_courseTitle').text('EDIT COURSE ('+strtoupper(data[0].course_name)+')');
				$("#btn_submitCourse").text("Update");
				hideLoading();
			}else{
				hideLoading();
				alert('Error');
			}
		},"json");
	
	});

});

