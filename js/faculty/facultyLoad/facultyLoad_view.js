$(document).ready(function(){

	$(document).on('click', '#btn_viewFacultyLoad',function(){
		showLoading();
		var faculty_id = $(this).val();
		var name = $(this).data('name');
		var units = $(this).data('units');

		$.when($('#facultyLoad_view').load('view/faculty/facultyLoad/facultyLoad.php?faculty_id='+faculty_id+'&units='+units)).done(function(){

			$("#modal_facultyLoad").modal({backdrop:'static', show: true});
			$('#modal_facultyName').text('View Faculty Load ('+strtoupper(name)+')');

			$("#modal_facultyLoad").modal("show");


			hideLoading();
		});



		// $.post("services/faculty/facultyLoad/getRow.php",{id:id},function(data){
		// 	if(data.response == 'success'){

		// 	}else{
		// 		alert('error');
		// 	}
		// },"json");

		// $.post("services/faculty/GetRow.php",{course_id:course_id},function(data){
		// 	if(data){
		// 		data[0].course_name = ucwords(data[0].course_name);
		// 		// hidden
		// 		$("#course_id").val(data[0].course_id);
		// 		$("#course_nameDup").val(data[0].course_name);
		// 		$("#course_abbrDup").val(data[0].course_abbr);

		// 		$("#course_name").val(data[0].course_name);
		// 		$("#course_abbr").val(data[0].course_abbr);
		// 		if((data[0].course_type)=='DEGREE'){
		// 			$('#course_degree').prop('checked', true);

		// 			for(var i=4; i < 6 ;i++){
		// 	            $('#course_noYears').append($('<option>', {
		// 	                value: i,
		// 	                text: i
		// 	            }));
		// 	        }
		// 		}else{
		// 			$('#course_associate').prop('checked', true);
		// 			$('#course_noYears').append($('<option>', {
		// 	            value: 2,
		// 	            text: 2
		// 	        }));
		// 		}
		// 		$("#course_noYears").val(data[0].course_noYears);

		// 		$("#modal_courseForm").modal({backdrop:'static', show: true});
		// 		$("#modal_courseForm").modal("show");
		// 		$('#modal_courseTitle').text('EDIT COURSE ('+strtoupper(data[0].course_name)+')');
		// 		$("#btn_submitCourse").text("Update");
		// 		hideLoading();
		// 	}else{
		// 		hideLoading();
		// 		alert('Error');
		// 	}
		// },"json");
	
	});

});