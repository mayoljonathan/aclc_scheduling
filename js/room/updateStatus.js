//############ UPDATE STATUS OF ROOM ##############
$(document).on('click','#btn_inactiveRoom', function(){
	showLoading();
	var room_id = $(this).val();
	$.post("services/room/updateStatus.php",{room_id:room_id,status:'0'},function(data){
		if(data.response=='success'){
			$.when($('#room_tabular').load('view/room/room_tabular.php')).done(function(){
				hideLoading();
				inactiveRoom(data.room_name);
			});
		}else{
			alert('Error');
		}
	},"json");
	
});

$(document).on('click','#btn_activeRoom', function(){
	showLoading();
	var room_id = $(this).val();
	$.post("services/room/updateStatus.php",{room_id:room_id,status:'1'},function(data){
		if(data.response=='success'){
			$.when($('#room_tabular').load('view/room/room_tabular.php')).done(function(){
				hideLoading();
				activeRoom(data.room_name);
			});
		}else{
			alert('Error');
		}
	},"json");

});
//############ END UPDATE STATUS OF ROOM ###########

function activeRoom(room_name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.success('ROOM '+strtoupper(room_name)+' has been set to ACTIVE');
}

function inactiveRoom(room_name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.error('ROOM '+strtoupper(room_name)+' has been set to INACTIVE');
}