$(document).on('submit', '#form_submitDepartment' , function(e){
	showLoading();
	var formData = $(this).serialize();
	
	$.post("services/department/submitDepartment.php",formData,function(data){
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

		if(data.response=='success'){
			$.when($('#department_tabular').load('view/department/department_tabular.php')).done(function(){
				hideLoading();
				$("#modal_departmentForm").modal("hide");
			});

			if(data.action=='added'){
            	toastr.success(strtoupper(data.department_name)+' has been added');
			}else if(data.action=='updated'){
            	toastr.success(strtoupper(data.department_name)+' has been updated');
			}
			
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
