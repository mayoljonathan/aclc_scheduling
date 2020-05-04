//############ UPDATE STATUS OF COURSE ##############
$(document).on('click','#btn_inactiveCourse', function(){
	showLoading();
	var course_id = $(this).val();
	$.post("services/course/updateStatus.php",{course_id:course_id,status:'0'},function(data){
		if(data.response=='success'){
			$.when($('#course_tabular').load('view/course/course_tabular.php')).done(function(){
				hideLoading();
				inactiveCourse(data.course_abbr);
			});
		}else{
			alert('Error');
		}
	},"json");
	
});

$(document).on('click','#btn_activeCourse', function(){
	showLoading();
	var course_id = $(this).val();
	$.post("services/course/updateStatus.php",{course_id:course_id,status:'1'},function(data){
		if(data.response=='success'){
			$.when($('#course_tabular').load('view/course/course_tabular.php')).done(function(){
				hideLoading();
				activeCourse(data.course_abbr);
			});
		}else{
			alert('Error');
		}
	},"json");

});
//############ END UPDATE STATUS OF COURSE ###########

function activeCourse(course_abbr){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.success(course_abbr+' has been set to ACTIVE');
}

function inactiveCourse(course_abbr){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
    };
	toastr.error(course_abbr+' has been set to INACTIVE');
}