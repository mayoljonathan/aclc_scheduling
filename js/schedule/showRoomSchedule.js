// ############# SHOW ROOM SCHED ###################
$(document).on('click', '#showRoomSchedule', function(){
	clearPage();
	showLoading();
	var room_id = $(this).data('room');
	
	$.when($('#room').load('view/schedule/roomSchedule.php?room_id='+room_id)).done(function(){
		hideLoading();
	});

	function clearPage(){
		$('#schedule_tabular,#schedule_room,#room').empty();
	}

});


