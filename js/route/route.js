$(document).ready(function(){

	// PAGE HASH LISTENER
	var	location = window.location.hash.substr(1);
	switch(location){
		case 'home':
			goToHome();
			break;
		case 'subject':
			goToSubject();
			break;
		case 'schedule_list':
			goToScheduleList();
			addCollapse('ul_schedule');
			break;
		case 'add_block':
			goToAddBlock();
			addCollapse('ul_schedule');
			break;
		case 'course':
			goToCourse();
			break;		
		case 'department':
			goToDepartment();
			break;
		case 'instructor_list':
			goToInstructorList();
			addCollapse('ul_faculty');
			break;
		case 'instructor_load':
			goToInstructorLoad();
			addCollapse('ul_faculty');
			break;
		case 'room':
			goToRoom();
			break;
		case 'report':
			goToReport();
			break;
		case 'user':
			goToUser();
			break;
		case 'settings':
			goToSettings();
			break;
		default:
			goToHome();
			break;
	}
	// END PAGE HASH LISTENER

	// USER TYPE LISTENER
	var user_type = $('#user_type').val();
	switch(user_type){
		case 'HR':
			goToDepartment();
			break;
		// case 'ADMIN':
		// case 'SECRETARY':
		// 	goToHome();
		// 	break;
		case 'REGISTRAR':
			goToSubject();
			break;
		// default:
		// 	goToHome();
		// 	break;
	}


	// CLICKED LISTENERS
		$(document).on('click', '#sb_home',function(){
			goToHome();
		});
		$(document).on('click', '#sb_subject',function(){
			goToSubject();
		});
		$(document).on('click', '#sb_scheduleList',function(){
			goToScheduleList();
		});
		$(document).on('click', '#sb_addBlock',function(){
			goToAddBlock();
		});
		$(document).on('click', '#sb_course',function(){
			goToCourse();
		});
		$(document).on('click', '#sb_department',function(){
			goToDepartment();
		});
		$(document).on('click', '#sb_instructorList',function(){
			goToInstructorList();
		});
		$(document).on('click', '#sb_instructorLoad',function(){
			goToInstructorLoad();
		});
		$(document).on('click', '#sb_room',function(){
			goToRoom();
		});
		$(document).on('click', '#sb_report',function(){
			goToReport();
		});
		$(document).on('click', '#sb_user',function(){
			goToUser();
		});
		$(document).on('click', '#sb_settings',function(){
			goToSettings();
		});
	// END CLICKED LISTENERS

	// FUNCTIONS
	function clearPage(){
		$('#home,#subject,#schedule,#course,#department,#faculty,#room,#report,#user,#settings').empty();
		$('#subject_tabular,#subject_prospectus,#prospectus').empty();
		$('#schedule_tabular,#schedule_room,#schedCourse_view,#schedProspectus_view').empty();
		$('#li_home,#li_subject,#li_schedule,#li_course,#li_department,#li_faculty,#li_room,#li_report,#li_user,#li_settings').removeClass('active');
	}
	function clearCollapse(){
		$('#ul_schedule,#ul_faculty').removeClass('collapse in');
		$('#ul_schedule,#ul_faculty').addClass('collapse');
	}
	function addCollapse(ul){
		$('#'+ul).removeClass('collapse');
		$('#'+ul).addClass('collapse in');
	}

	// GOTO FUNCTIONS
	function goToHome(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_home').addClass('active');
			$('#home').hide().fadeIn('fast').load('view/home/index.php');
		},500); 
	}
	function goToSubject(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			//SHOW
			$('#li_subject').addClass('active');
			$.when($('#subject').hide().fadeIn('fast').load('view/subject/index.php')).done(function(){
				$('#subject_tabular').hide().fadeIn('fast').load('view/subject/subject_tabular.php');
			});
		},500);
	}
	function goToScheduleList(){
		clearPage();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_schedule').addClass('active');
			$.when($('#schedule').hide().fadeIn('fast').load('view/schedule/index.php')).done(function(){
				$('#schedule_tabular').load('view/schedule/schedule_tabular.php');
			});
		},500);
	}
	function goToAddBlock(){
		clearPage();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_schedule').addClass('active');
			$.when($('#schedule').hide().fadeIn('fast').load('view/schedule/addBlock/index.php')).done(function(){
				$('#schedCourse_view').load('view/schedule/addBlock/schedCourse_view.php');
			});
		},500);
	}
	function goToCourse(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_course').addClass('active');
			$.when($('#course').hide().fadeIn('fast').load('view/course/index.php')).done(function(){
				$('#course_tabular').load('view/course/course_tabular.php');
			});
		},500); 
	}
	function goToDepartment(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_department').addClass('active');
			$.when($('#department').hide().fadeIn('fast').load('view/department/index.php')).done(function(){
				$('#department_tabular').load('view/department/department_tabular.php');
			});
		},500);
	}
	function goToInstructorList(){
		clearPage();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_faculty').addClass('active');
			$.when($('#faculty').hide().fadeIn('fast').load('view/faculty/index.php')).done(function(){
				$('#faculty_tabular').load('view/faculty/faculty_tabular.php');
			});
		},500);
	}
	function goToInstructorLoad(){
		clearPage();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_faculty').addClass('active');
			$.when($('#faculty').hide().fadeIn('fast').load('view/faculty/facultyLoad/index.php')).done(function(){
				$('#facultyLoad_tabular').load('view/faculty/facultyLoad/facultyLoad_tabular.php');
			});
		},500);
	}
	function goToRoom(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_room').addClass('active');
			$.when($('#room').hide().fadeIn('fast').load('view/room/index.php')).done(function(){
				$('#room_tabular').load('view/room/room_tabular.php');
			});
		},500);
	}
	function goToReport(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_report').addClass('active');
			$.when($('#report').hide().fadeIn('fast').load('view/report/index.php')).done(function(){
				$('#reports_page').load('view/report/reports.php');
			});
		},500);
	}
	function goToUser(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_user').addClass('active');
			$.when($('#user').hide().fadeIn('fast').load('view/user/index.php')).done(function(){
				$('#user_tabular').load('view/user/user_tabular.php');
			});
		},500);
	}
	function goToSettings(){
		clearPage();
		clearCollapse();
		showLoading();
		setTimeout(function(){
			hideLoading();
			$('#li_settings').addClass('active');
			$.when($('#settings').hide().fadeIn('fast').load('view/settings/index.php')).done(function(){
				$('#settings_page').load('view/settings/settings.php');
			});
		},500);
	}
});
