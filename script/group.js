$(document).ready(function(){

  $("#join-family-btn").click(function(){
        $("#create-family-form").slideUp();
    $("#join-family-form").slideToggle();
  });
  $("#create-family-btn").click(function(){
    $("#create-family-form").slideToggle();
    $("#join-family-form").slideUp();
    $(".family-circle, #search-res").hide();
});


$("#finish-instructions").click(function(){
if(document.getElementById("finish-instructions").checked == true){
	$("#goto-hp").slideToggle();
}
else{
	$("#goto-hp").slideUp();
}
});

$("#goto-hp").click(function(){
	$.post(
		'toggleCalendar.php',
		{
			isPublic:1
		},
		function(){
			alert('Welcome to shareApaet!!!');
			window.location='homepage.php';		
		}
		)	
});



});
