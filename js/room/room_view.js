$(document).ready(function(){
	//ADD NEW ROOM
	$(document).on('click', '#btn_addRoom',function(){
		$("#form_submitRoom").trigger("reset");
		$('#room_id,#room_nameDup').val("");
		$("#modal_roomForm").modal({backdrop:'static', show: true});
		$("#modal_roomForm").modal("show");
		$('#modal_roomTitle').text('ADD NEW ROOM');
		$("#btn_submitRoom").text("Submit");
		

	});

	// EDIT ROOM
	$(document).on('click', '#btn_editRoom',function(){
		$("#form_submitRoom").trigger("reset");
		showLoading();
		var room_id = $(this).val();

		$.post("services/room/GetRow.php",{room_id:room_id},function(data){
			if(data){
				data[0].room_name = ucwords(data[0].room_name);
				// hidden
				$("#room_id").val(data[0].room_id);
				$("#room_nameDup").val(data[0].room_name);

				$("#room_name").val(data[0].room_name);
				$("#floor_level").val(data[0].floor_level);
				$("#student_capacity").val(data[0].student_capacity);
				if((data[0].room_type)=='REGULAR'){
					$('#room_regular').prop('checked', true);
				}else{
					$('#room_laboratory').prop('checked', true);
				}
				$("#modal_roomForm").modal({backdrop:'static', show: true});
				$("#modal_roomForm").modal("show");
				$('#modal_roomTitle').text('EDIT ROOM ('+data[0].room_name+')');
				$("#btn_submitRoom").text("Update");
				hideLoading();
			}else{
				hideLoading();
				alert('Error');
			}
		},"json");
	
	});

});

