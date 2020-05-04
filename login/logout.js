$(document).on('click', '#logout',function(){
	localStorage.removeItem("visited");
	window.location.href="login/logout.php";
});