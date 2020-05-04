//############ UPDATE STATUS OF ROOM ##############
$(document).on('click','#btn_inactiveSchedule', function(){
	showLoading();
	var schedule_id = $(this).val();
	$.post("services/schedule/updateStatus.php",{schedule_id:schedule_id,status:'0'},function(data){
		if(data.response=='success'){
			$.when($('#schedule_tabular').load('view/schedule/schedule_tabular.php')).done(function(){
				hideLoading();
			});
		}else{
			alert('Error');
		}
	},"json");
	
});

$(document).on('click','#btn_activeSchedule', function(){
	showLoading();
	var schedule_id = $(this).val();
	$.post("services/schedule/updateStatus.php",{schedule_id:schedule_id,status:'1'},function(data){
		if(data.response=='success'){
			$.when($('#schedule_tabular').load('view/schedule/schedule_tabular.php')).done(function(){
				hideLoading();
			});
		}else{
			alert('Error');
		}
	},"json");

});
//############ END UPDATE STATUS OF schedule ###########