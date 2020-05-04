//############ UPDATE STATUS OF SUBJECT IN PROSPECTUS VIEW ##############
$(document).on('click','#btn_inactiveSubject', function(){

	if($('#subjectProspectus_view').attr('checked')){
		showLoading();
		var subject_id = $(this).val();
		$.post("services/subject/updateStatus.php",{subject_id:subject_id,status:'0'},function(data){
			if(data.response=='success'){
				$.when($('#prospectus').load('view/subject/prospectus.php?course_abbr='+data.course_abbr)).done(function(){
					hideLoading();
					inactiveSubject(data.subject_code,data.subject_title);
				});
			}else{
				alert('Error');
			}
		},"json");
	}else{
		showLoading();
		var subject_id = $(this).val();
		$.post("services/subject/updateStatus.php",{subject_id:subject_id,status:'0'},function(data){
			if(data.response=='success'){
				$.when($('#subject_tabular').load('view/subject/subject_tabular.php')).done(function(){
					inactiveSubject(data.subject_code,data.subject_title);
				});
			}else{
				alert('Error');
			}
		},"json");
	}
	
});

$(document).on('click','#btn_activeSubject', function(){
	if($('#subjectProspectus_view').attr('checked')){
		showLoading();
		var subject_id = $(this).val();
		$.post("services/subject/updateStatus.php",{subject_id:subject_id,status:'1'},function(data){
			if(data.response=='success'){
				$.when($('#prospectus').load('view/subject/prospectus.php?course_abbr='+data.course_abbr)).done(function(){
					hideLoading();
					activeSubject(data.subject_code,data.subject_title);
				});
			}else{
				alert('Error');
			}
		},"json");
	}else{
		showLoading();
		var subject_id = $(this).val();
		$.post("services/subject/updateStatus.php",{subject_id:subject_id,status:'1'},function(data){
			if(data.response=='success'){
				$.when($('#subject_tabular').load('view/subject/subject_tabular.php')).done(function(){
					activeSubject(data.subject_code,data.subject_title);
				});
			}else{
				alert('Error');
			}
		},"json");
	}
});
//############ END UPDATE STATUS OF SUBJECT IN PROSPECTUS VIEW ###########

function activeSubject(subject_code,subject_title){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 5000
    };
	toastr.success(subject_title+'('+subject_code+') has been set to ACTIVE');
}

function inactiveSubject(subject_code,subject_title){
	toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 5000
    };
	toastr.error(subject_title+'('+subject_code+') has been set to INACTIVE');
}