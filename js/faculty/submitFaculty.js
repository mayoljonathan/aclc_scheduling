$(document).on('submit', '#form_submitFaculty' , function(e){
	showLoading();
	var formData = $(this).serialize();
	
	$.post("services/faculty/submitFaculty.php",formData,function(data){
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

		if(data.response=='success'){
			$.when($('#faculty_tabular').load('view/faculty/faculty_tabular.php')).done(function(){
				hideLoading();
				$("#modal_facultyForm").modal("hide");

				if(data.action=='added'){
	            	toastr.success(strtoupper(data.name)+' ('+strtoupper(data.faculty_id)+') has been added');
				}else if(data.action=='updated'){
					toastr.success(strtoupper(data.name)+' ('+strtoupper(data.faculty_id)+') has been updated');
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
