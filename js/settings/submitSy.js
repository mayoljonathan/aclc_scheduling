$(document).on('submit', '#form_submitSy' , function(e){
	showLoading();
	var formData = $(this).serialize();
	$.post("services/settings/submitSy.php",formData,function(data){
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

		if(data.response=='success'){
			$.when($('#sy_tabular').load('view/settings/sy_tabular.php')).done(function(){
				hideLoading();
				$("#modal_syForm").modal("hide");

				if(data.action=='added'){
	            	toastr.success('School Year <strong>('+strtoupper(data.schoolyear_code)+')</strong> has been added');
				}else if(data.action=='updated'){
	            	toastr.success('School Year <strong>('+strtoupper(data.schoolyear_code)+')</strong> has been updated');
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
