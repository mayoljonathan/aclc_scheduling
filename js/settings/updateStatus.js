//############ UPDATE STATUS OF ROOM ##############
$(document).on('click','#btn_inactiveSy', function(){
	showLoading();
	var schoolyear_id = $(this).val();
	$.post("services/settings/updateStatus.php",{schoolyear_id:schoolyear_id,status:'0'},function(data){
		if(data.response=='success'){
			$.when($('#sy_tabular').load('view/settings/sy_tabular.php')).done(function(){
				hideLoading();
				inactiveSy(data.schoolyear_code);
			});
		}else{
			alert('Error');
		}
	},"json");
	
});

$(document).on('click','#btn_activeSy', function(){
	showLoading();
	var schoolyear_id = $(this).val();
	$.post("services/settings/updateStatus.php",{schoolyear_id:schoolyear_id,status:'1'},function(data){
		if(data.response=='success'){
			$.when($('#sy_tabular').load('view/settings/sy_tabular.php')).done(function(){
				hideLoading();
				activeSy(data.schoolyear_code);
			});
		}else{
			alert('Error');
		}
	},"json");

});
//############ END UPDATE STATUS OF ROOM ###########

function activeSy(schoolyear_code){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.success('School Year <strong>('+strtoupper(schoolyear_code)+')</strong> has been set to ACTIVE');
}

function inactiveSy(schoolyear_code){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.error('School Year <strong>('+strtoupper(schoolyear_code)+')</strong> has been set to INACTIVE');
}