$(document).on('submit', '#form_submitCourse' , function(e){
	showLoading();
	var formData = $(this).serialize();
	$.post("services/course/submitCourse.php",formData,function(data){
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

		if(data.response=='success'){
			$.when($('#course_tabular').load('view/course/course_tabular.php')).done(function(){
				hideLoading();
				$("#modal_courseForm").modal("hide");

				if(data.action=='added'){
	            	toastr.success(strtoupper(data.course_name)+' ('+strtoupper(data.course_abbr)+') has been added');
				}else if(data.action=='updated'){
					toastr.success(strtoupper(data.course_name)+' ('+strtoupper(data.course_abbr)+') has been updated');
				}
			});
		}else if(data.response=='exists'){
			hideLoading();
			toastr.error(data.msg);
		}else{
			hideLoading();
			toastr.error('Something error happened. <br>Ask assistance by the system administrator');
		}
		
	},"json");
	e.preventDefault();
});
