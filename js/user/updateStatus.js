//############ UPDATE STATUS OF USER ##############
$(document).on('click','#btn_inactiveUser', function(){
	showLoading();
	var id = $(this).val();
	$.post("services/user/updateStatus.php",{id:id,status:'0'},function(data){
		if(data.response=='success'){
			$.when($('#user_tabular').load('view/user/user_tabular.php')).done(function(){
				hideLoading();
				inactiveUser(data.emp_id,data.name);
			});
		}else{
			alert('Error');
		}
	},"json");
	
});

$(document).on('click','#btn_activeUser', function(){
	showLoading();
	var id = $(this).val();
	$.post("services/user/updateStatus.php",{id:id,status:'1'},function(data){
		if(data.response=='success'){
			$.when($('#user_tabular').load('view/user/user_tabular.php')).done(function(){
				hideLoading();
				activeUser(data.emp_id,data.name);
			});
		}else{
			alert('Error');
		}
	},"json");

});
//############ END UPDATE STATUS OF USER ###########

function activeUser(emp_id,name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.success(strtoupper(name)+' ('+strtoupper(emp_id)+') has been set to ACTIVE');
}

function inactiveUser(emp_id,name){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.error(strtoupper(name)+' ('+strtoupper(emp_id)+') has been set to INACTIVE');
}