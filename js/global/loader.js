$(document).ready(function(){
	var h = $(window).height();
	var w = $(window).width();
	
	$('#loader').css('margin-top',h/2);
	$('#loader').css('margin-left',w/2);

});

// FUNCTIONS SHOW/HIDE
	function showLoading(){
		$('#loader').show();
		return this;
	}
	function hideLoading(){
		$('#loader').hide();
		return this;
	}
// END FUNCTIONS SHOW/HIDE
