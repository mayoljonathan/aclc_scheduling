$(document).on('click','#showCourse_view',function(){
	clearPage();
	showLoading();

	$.when($('#schedCourse_view').load('view/schedule/addBlock/schedCourse_view.php')).done(function(){
		hideLoading();
	});
});

		
