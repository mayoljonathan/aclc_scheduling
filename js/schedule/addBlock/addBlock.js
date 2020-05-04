// ################### CLICKED ADD BLOCK ####################
$(document).on('click', '#btn_addBlockSchedule', function(){
	showLoading();
	var course = $(this).data('course');
	var year_level = $(this).data('year_level');
	var semester =$(this).data('semester');
	$.when(
		$('#blockSched_view').empty(),
		$('#blockSched_view').show().load('view/schedule/addBlock/blockSched_view.php?course='+course+'&year_level='+year_level+'&semester='+semester)
	).done(function(){

	});
});


function convertCourse(course,year_level,semester){
	var course_degree = course.slice(0,2);
	if(course_degree == "BS"){
		var course_concat = course.slice(2);	
	}else{
		var course_concat = course;
	}

	course = course_concat+year_level+semester;
	return course;
}