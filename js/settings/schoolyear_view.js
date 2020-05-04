$(document).ready(function(){
	//ADD NEW SY
	$(document).on('click', '#btn_addSy',function(){
		$("#form_submitSy").trigger("reset");
		$("#schoolyear_id").val("");

		$("#modal_syForm").modal({backdrop:'static', show: true});
		$("#modal_syForm").modal("show");
		$('#modal_syTitle').text('ADD NEW SCHOOLYEAR');
		$("#btn_submitSy").text("Submit");
	});

	// EDIT SY
	$(document).on('click', '#btn_editSy',function(){
		$("#form_submitSy").trigger("reset");
		showLoading();
		var schoolyear_id = $(this).val();

		$.post("services/settings/getRow.php",{schoolyear_id:schoolyear_id},function(data){
			if(data){
				$("#schoolyear_id").val(data[0].schoolyear_id);
				$("#schoolyear_code").val(data[0].schoolyear_code);

				$("#modal_syForm").modal({backdrop:'static', show: true});
				$("#modal_syForm").modal("show");
				$('#modal_syTitle').text('EDIT SCHOOLYEAR ('+data[0].schoolyear_code+')');
				$("#btn_submitSy").text("Update");
				hideLoading();
			}else{
				hideLoading();
				alert('Error');
			}
		},"json");
	
	});
});