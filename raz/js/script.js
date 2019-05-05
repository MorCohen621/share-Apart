$(document).ready(function(){
$("login-btn").click(function(){
  $("li.dropdown").addClass("open");
});

 $(document).ready(function(){
    $(".burger-btn").click(function(){
        $(".burger-btn").toggleClass('flipped');
    });
  });


    $("#mySidenav").hide();
    $(".burger-btn").show();

    $('.burger-btn').click(function () {
        $("#mySidenav").toggle("slide");
    });


  //homepage
    $(".btn-link").hover(function(){
      $(".text").show();


    });


  //calendar
      $("#authorize-button").click(function(){
        $("authorize-button table").show();
      });


    //notes

      $("#newNoteImg").click(function(){
        $("#newNoteContent label,#newNoteContent textarea,#addNoteBtn").slideToggle("slow");
      });



	$("#newEventBtn").click(function(){
		$(".addEvent").slideToggle();
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