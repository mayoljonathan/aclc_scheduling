// ############# SHOW PROSPECTUS ###################
$(document).on('click', '#showProspectus', function(){
	clearPage();
	showLoading();
	var course = $(this).data('course');
	
	$.when($('#prospectus').load('view/subject/prospectus.php?course_abbr='+course)).done(function(){
		hideLoading();
	});

	function clearPage(){
		$('#subject_tabular,#subject_prospectus,#prospectus').empty();
	}

});


