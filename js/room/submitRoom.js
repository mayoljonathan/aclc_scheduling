$(document).on('submit', '#form_submitRoom' , function(e){
	showLoading();
	var formData = $(this).serialize();
	$.post("services/room/submitRoom.php",formData,function(data){
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

		if(data.response=='success'){
			$.when($('#room_tabular').load('view/room/room_tabular.php')).done(function(){
				hideLoading();
				$("#modal_roomForm").modal("hide");

				if(data.action=='added'){
	            	toastr.success('ROOM '+strtoupper(data.room_name)+' has been added');
				}else if(data.action=='updated'){
	            	toastr.success('ROOM '+strtoupper(data.room_name)+' has been updated');
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
