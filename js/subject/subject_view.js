// DEFAULT
$(document).ready(function(){


	// ################# CLICKED EVENTS ####################
	// TABULAR STYLE
	$(document).on('click', '#subjectTabular_view',function(){
		clearPage();
		showLoading();

		$.when($('#subject_tabular').load('view/subject/subject_tabular.php')).done(function(){
			$('#subjectProspectus_view').attr('checked',false);
			$('#subjectTabular_view').attr('checked',true);
		});
	});

	// PROSPECTUS STYLE
	$(document).on('click', '#subjectProspectus_view',function(){
		clearPage();
		showLoading();

		$.when($('#subject_prospectus').load('view/subject/subject_prospectus.php')).done(function(){
			hideLoading();
			$('#subjectTabular_view').attr('checked',false);
			$('#subjectProspectus_view').attr('checked',true);
		});
	});

	//ADD NEW SUBJECT
	$(document).on('click', '#btn_addSubject',function(){
		$("#form_submitSubject").trigger("reset");
		$("#subject_id").val("");
		$("#course_abbr").val("").trigger("chosen:updated");
		$("#year_level").empty().prop("disabled",true);
		$("#pre_requisite").val("").trigger("chosen:updated");
		
		$('#modal_subjectTitle').text('ADD NEW SUBJECT');
		$("#btn_submitSubject").text("Submit");
		$("#modal_subjectForm").modal({backdrop:'static', show: true});
		$("#modal_subjectForm").modal("show");
	});

	// EDIT SUBJECT
	$(document).on('click', '#btn_editSubject',function(){
		$("#form_submitSubject").trigger("reset");
		showLoading();
		var subject_id = $(this).val();

		$.post("services/subject/GetRow.php",{subject_id:subject_id},function(data){
			if(data){
				// hidden
				$("#subject_id").val(data[0].subject_id);

				$("#subject_code").val(data[0].subject_code);
				$("#subject_title").val(data[0].subject_title);
				$("#course_abbr").val(data[0].course_abbr).trigger("chosen:updated");
				
				if((data[0].semester)==1){
					$('#semester_1').prop('checked', true);
					var semester = 1;
				}else{
					$('#semester_2').prop('checked', true);
					var semester = 2;
				}

				var pre_requisite = [];
				$.each(data[0].pre_requisite.split(","), function(){	
					pre_requisite.push(this);
				});
				var course_id = ($('#course_abbr').find('option:selected').attr('id'));

				getYearLevelByCourse(course_id,data[0].year_level,semester);

				$.when(
					getPreRequisiteList(course_id,data[0].year_level,semester)
				).done(function(){
					setTimeout(function(){
						// get subject_title for the pre-requisite's subject code
						getPreRequisite(pre_requisite,data[0].course_abbr);
						$("#units_lec").val(data[0].lec);
						$("#units_lab").val(data[0].lab);
						$("#total_units").val((+data[0].lec) + (+data[0].lab));

						$("#modal_subjectForm").modal({backdrop:'static', show: true});
						$("#modal_subjectForm").modal("show");
						$('#modal_subjectTitle').text('EDIT SUBJECT ('+ucwords(data[0].subject_title)+')');
						$("#btn_submitSubject").text("Update");
						hideLoading();
					},200);
				});

			}else{
				hideLoading();
				alert('Error');
			}
		},"json");
	
	});

	// ############# END CLICKED EVENTS ##################

	// ############## FUNCTIONS ###############
	
	function clearPage(){
		//content
		$('#subject_tabular,#subject_prospectus,#prospectus').empty();
		
	}

	function getYearLevelByCourse(course_id,year_level,semester){
		
		$.post("services/subject/getYearLevelByCourse.php",{course_id:course_id},function(data){
			if(data.response="success"){
				$('#year_level').prop('disabled', false);
				$('#year_level').empty();
		        for(var i=1; i <= data[0].course_noYears ;i++){
		            $('#year_level').append($('<option>', {
		                value: i,
		                text: i
		            }));
		        }
				$("#year_level").val(year_level);
			}else{
				alert('Error');
			}
			
		},"json");
		return this;
	}

	function getPreRequisite(pre_requisite,course_abbr){
		$.post("services/subject/getPreRequisite.php",{pre_requisite:pre_requisite,course_abbr:course_abbr},function(data){
			if(data[0].response=="success"){
				for(var i=1; i <= data.length-1 ;i++){
		        	var subject_code = data[i]['subject_code'];
		        	$("#pre_requisite option[id='"+subject_code+"']").prop("selected",true).trigger("chosen:updated");
		        }
			}
		},"json");
		return this;
	}

});
