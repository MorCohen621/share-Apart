  
    function addPresent(){
      $("#newPresentBtn").css("display","block");
      $(".addPresent").css("display","none");    
  };
  
  
	

$(document).ready(function(){	
	
//add chore






	$("#newChoreBtn").click(function(){
	$(".addChore").css('display','block');
	});	
	
	$("label").click(function(){
    $("label").css("box-shadow","initial");
    $(this).css("box-shadow","0px 0px 6px 2px rgba(240,87,104,1)");
  });
	
//add present

  
  

$("#addPresentBtn").click(function(){
document.getElementById("newPresents").innerHTML+=" <div class='task-box presentBox col-lg-3'><center><h2>"+document.getElementsByName('present_name')[0].value+"</h2>  <h4>description:</h4><p class='descriptionFont'>"+document.getElementsByName('present_description')[0].value+"</p><h4>Price:</h4><p class='score_for_chore'>"+ document.getElementsByName('present_price')[0].value +"</p><h4>Asked by:</h4><p>"+document.getElementsByName('present_name')[0].value + "</p></center></div>";  
document.getElementsByName('present_name')[0].value = '';
document.getElementsByName('present_description')[0].value = '';
document.getElementsByName('present_price')[0].value ='';
}); 

	$("#newPresentBtn").click(function(){
	$("#newPresentBtn").css("display","none");
    $(".addPresent").slideToggle();
	});

$("input[value='CLOSE']").click(function(){
    $("#newPresentBtn").css("display","block");
    $(".addPresent").css("display","none");
  });


	$("#newPresentBtn").click(function(){
	$(".addPresent").css('display','block');
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
  e.preventDefault();
  $(this).tab('show');
});


});

