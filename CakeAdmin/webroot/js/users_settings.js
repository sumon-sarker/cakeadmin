$('#sidebar-expand').change(function(){
	$('body').toggleClass('nav-md nav-sm');
});
$('#sidebar-profile-photo').change(function(){
	$('.sidebar_profile .profile_pic').slideToggle();
});