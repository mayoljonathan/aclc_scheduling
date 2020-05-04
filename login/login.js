$(document).on('submit', '#form_login' , function(e){
	var formData = $(this).serialize();

	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 5000
    };


    $.post('checkLogin.php',formData,function(data){
    	if(data.response=='success'){
			window.location.href = "../";
		}else{
			toastr.error(data.msg);
		}
    },'json');
    e.preventDefault();

	// $.ajax({
	// 	type : "POST",
	// 	url  : "checkLogin.php",
	// 	dataType : "json",
	// 	data : formData,
	// 	cache : false,
	// 	beforeSend : function(){

	// 	},
	// 	success: function(data){
	// 		if(data.response=='success'){
	// 			window.location.href = "../";
	// 		}else{
	// 			toastr.error(data.msg);
	// 		}
	// 	},
	// 	error : function(xhr, ErrorStatus, error){
	// 		console.log(status.error);
	// 	}
	// });
	// return false;
});