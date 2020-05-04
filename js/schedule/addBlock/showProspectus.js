// ############# SHOW GENERATOR/PROSPECTUS ###################
$(document).on('click', '#showProspectus', function(){
	showLoading();
	clearPage();
	var course = $(this).data('course');

	$.when(
		$('#schedProspectus_view').load('view/schedule/addBlock/schedProspectus_view.php?course_abbr='+course))
	.done(function(){
		hideLoading();
	});
});

function clearPage(){
	$('#schedCourse_view,#schedProspectus_view').empty();
}
