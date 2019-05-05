$(document).ready(function(){

	$("#calendar-logo").mouseenter(function(){
		/*
		$("#calendar-logo img").css("display","none");
		$("#calendar-logo p").html("Calendar");
		*/

		
	});

	$("#newEventBtn").click(function(){
		$(".addEvent").slideToggle();
	});

	$("#searchEventBtn").click(function(){
		$(".searchEvent").slideToggle();
	});

	 function switchTab(id){
	    $('#myTabs a[href='+id+']').tab('show');// Select tab by name
	    scrollToID(syllabus, 750)
	};

	$('.scroll-link').on('click', function(event){
		event.preventDefault();
		var sectionID = $(this).attr("data-id");
		scrollToID('#' + sectionID, 750);
	});
	// scroll to top action
	$('.scroll-top').on('click', function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow'); 		
	});
	// mobile nav toggle
	$('#nav-toggle').on('click', function (event) {
		event.preventDefault();
		$('#main-nav').toggleClass("open");
	});

// scroll function
function scrollToID(id, speed){
	var offSet = 50;
	var targetOffset = $(id).offset().top - offSet;
	var mainNav = $('#main-nav');
	$('html,body').animate({scrollTop:targetOffset}, speed);
	if (mainNav.hasClass("open")) {
		mainNav.css("height", "1px").removeClass("in").addClass("collapse");
		mainNav.removeClass("open");
	}
};

     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        
        $('#back-to-top').tooltip('show');



$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});




});