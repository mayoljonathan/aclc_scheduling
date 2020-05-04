$(document).on('submit', '#form_submitSubject' , function(e){
	var formData = $(this).serialize();
	showLoading();


	$.post("services/subject/submitSubject.php",formData,function(data){
		toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 5000
        };

		if(data.response=='success'){
			if(data.action=='added'){
            	toastr.success(data.subject_title+' ('+data.subject_code+') has been added');
			}else if(data.action=='updated'){
				toastr.success(data.subject_title+' ('+data.subject_code+') has been updated');
			}

			if($("input[name=subject_style]:checked").val() == "tabular"){
				$.when($('#subject_tabular').load('view/subject/subject_tabular.php')).done(function(){
					$("#modal_subjectForm").modal("hide");
		            
				});
			}else{
				if($("#prospectus").is(":empty")){
					$.when($('#subject_prospectus').load('view/subject/subject_prospectus.php')).done(function(){
						hideLoading();
						$("#modal_subjectForm").modal("hide");
					});
				}else{
					if(!$("#header_course").is(":empty")){
						var course = $("#header_course").data('course');
						$.when($('#prospectus').load('view/subject/prospectus.php?course_abbr='+course)).done(function(){
							hideLoading();
							$("#modal_subjectForm").modal("hide");
						});
					}
				}
			}

		}else{
			hideLoading();
            toastr.error('Something error happened. <br>Ask assistance by the system administrator');
		}
		
	},"json");
	e.preventDefault();

});
