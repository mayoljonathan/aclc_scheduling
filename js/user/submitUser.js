$(document).on('submit', '#form_submitUser' , function(e){
	showLoading();
	var formData = $(this).serialize();
	
	$.post("services/user/submitUser.php",formData,function(data){
		console.log(data);
		
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

		if(data.response=='success'){
			$.when($('#user_tabular').load('view/user/user_tabular.php')).done(function(){
				hideLoading();
				$("#modal_userForm").modal("hide");

				if(data.action=='added'){
	            	toastr.success(strtoupper(data.name)+' ('+strtoupper(data.emp_id)+') has been added');
				}else if(data.action=='updated'){
					toastr.success(strtoupper(data.name)+' ('+strtoupper(data.emp_id)+') has been updated');
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
