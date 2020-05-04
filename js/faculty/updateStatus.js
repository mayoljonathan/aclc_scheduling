//############ UPDATE STATUS OF FACULTY ##############
$(document).on('click','#btn_inactiveFaculty', function(){
	showLoading();
	var id = $(this).val();
	$.post("services/faculty/updateStatus.php",{id:id,status:'0'},function(data){
		if(data.response=='success'){
			$.when($('#faculty_tabular').load('view/faculty/faculty_tabular.php')).done(function(){
				hideLoading();
				inactiveFaculty(data.faculty_id,data.name);
			});
		}else{
			alert('Error');
		}
	},"json");
	
});

$(document).on('click','#btn_activeFaculty', function(){
	showLoading();
	var id = $(this).val();
	$.post("services/faculty/updateStatus.php",{id:id,status:'1'},function(data){
		if(data.response=='success'){
			$.when($('#faculty_tabular').load('view/faculty/faculty_tabular.php')).done(function(){
				hideLoading();
				activeFaculty(data.faculty_id,data.name);
			});
		}else{
			alert('Error');
		}
	},"json");

});
//############ END UPDATE STATUS OF FACULTY ###########

function activeFaculty(faculty_id,name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.success(strtoupper(name)+' ('+strtoupper(faculty_id)+') has been set to ACTIVE');
}

function inactiveFaculty(faculty_id,name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.error(strtoupper(name)+' ('+strtoupper(faculty_id)+') has been set to INACTIVE');
}