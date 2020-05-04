//############ UPDATE STATUS OF DEPARTMENT ##############
$(document).on('click','#btn_inactiveDepartment', function(){
	showLoading();
	var department_id = $(this).val();
	$.post("services/department/updateStatus.php",{department_id:department_id,status:'0'},function(data){
		if(data.response=='success'){
			$.when($('#department_tabular').load('view/department/department_tabular.php')).done(function(){
				hideLoading();
				inactiveDepartment(strtoupper(data.department_name));
			});
		}else{
			alert('Error');
		}
	},"json");
	
});

$(document).on('click','#btn_activeDepartment', function(){
	showLoading();
	var department_id = $(this).val();
	$.post("services/department/updateStatus.php",{department_id:department_id,status:'1'},function(data){
		if(data.response=='success'){
			$.when($('#department_tabular').load('view/department/department_tabular.php')).done(function(){
				hideLoading();
				activeDepartment(strtoupper(data.department_name));
			});
		}else{
			alert('Error');
		}
	},"json");

});
//############ END UPDATE STATUS OF DEPARTMENT ###########

function activeDepartment(department_name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.success(department_name+' has been set to ACTIVE');
}

function inactiveDepartment(department_name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.error(department_name+' has been set to INACTIVE');
}