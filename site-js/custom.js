// JavaScript Document

$(document).ready(function() {
	// thusm active effect 
	$(".any-thing-thumb ul li").click(function(){
		$(".any-thing-thumb ul li").removeClass("active");
		$(this).addClass("active");
	});
	
});

/// select picker

$(document).ready(function() {
	// thusm active effect 
	$(".side-submenu").click(function(){
		if ($(this).parent().hasClass("active"))
		{
			//alert ("opened");	
			$(this).next().slideUp();
			$(this).parent().removeClass("active");

		}
		else {
			$(".side-submenu").next().slideUp();
			$("#sidebar-nav li").removeClass("active");
			$(this).parent().addClass("active").next("");
			$(this).next().slideDown();
		}
	});
	
});

// page load effect
$(document).ready(function() {
  $(".animsition").animsition();
}); 


//custom scroll bar
$(document).ready(function(){
	$("#side-bar-menu, #admin-content").mCustomScrollbar({
		autoHideScrollbar:true,
		mouseWheelPixels: 200,
		theme:"minimal"
	});
});
$(document).ready(function(){
	$(".wed-lits , .uploded-pics-box, .list-main").mCustomScrollbar({
		autoHideScrollbar:true,
		mouseWheelPixels: 200,
		theme:"minimal"
	});
});

// height major for admin div

$(window).on("load resize",function(){
	var topHead = $(".admin-header").height();
	var winHead = $(window).height();
	var winWidth = $(window).width();
	
	if(winWidth <= 1024 && winWidth >= 641) {
		var cusValue = 60;
		$("#admin-content").height( winHead - topHead - cusValue + 'px');
		
	}
	if(winWidth <= 640) {
		var cusValue = 40;
		$("#admin-content").height( winHead - topHead - cusValue + 'px');
	
	}
	else {
		var cusValue = 82;	
		$("#admin-content").height( winHead - topHead - cusValue + 'px');

		var adminCont = $("#admin-content").height();
		var cusDiduct = 150;
		$(".list-main").height(adminCont - cusDiduct + 'px');

	}

	
});

//notification menu
$(document).ready(function() {
	// thusm active effect 
	$(".noti-nav li a").click(function(){

		var notiDrop = $(this).attr("data-dropid");
		//alert (notiDrop);
		

		if ($(this).hasClass("active"))
		{
			$(this).removeClass("active");
			$(".noti-drop").slideUp();
		}
		else {
			$(".noti-drop").slideUp();
			$(".noti-nav li a").removeClass("active");
			$(this).addClass("active");
			$(notiDrop).slideDown();
		}
	});
	
});



////  custom popup
$(window).on("load resize",function() {
	var winWidth = $(window).width();
	var winHeight = $(window).height();
	$(".custom-pop").height(winHeight).width(winWidth);

	$(".cust-pop-trigger").click(function(){
		var popTarger = $(this).attr("data-cuspop");

		$('#' + popTarger).fadeIn();
		$(".overlay, #pop-close").click(function(){
			$('#' + popTarger).fadeOut();
		});
	});
});
  
//// Admin menu
$(document).ready(function() {
    $("#menu-triger").click(function(){
		if ($(this).hasClass("active")){
			$(this).removeClass("active");
			$("#side-bar-menu").removeClass("active");		
			$(".side-overlay").fadeOut();		
		}
		else {
			$(this).addClass("active");
			$("#side-bar-menu").addClass("active");		
			$(".side-overlay").fadeIn();		
		}
	});
    $(".side-overlay").click(function(){
		$("#side-bar-menu").removeClass("active");		
		$("#menu-triger").removeClass("active");
		$(".side-overlay").fadeOut();		
	});

});
  
// admin custom menu
$(document).ready(function(){
	$("#admin-topmenu-triger").click(function(){
		$(".admin-top-nav").slideToggle();
	});
});
$(window).on("load resize",function(){
	if($(window).width() >= 481){
		$(".admin-top-nav").show();
	}
	else {
		$(".admin-top-nav").hide();
	}
});


///custom check box and radio

function setupLabel() {
	if ($('.label_check input').length) {
		$('.label_check').each(function(){ 
			$(this).removeClass('c_on');
		});
		$('.label_check input:checked').each(function(){ 
			$(this).parent('label').addClass('c_on');
		});                
	};
	// if ($('.label_radio input').length) {
		// $('.label_radio').each(function(){ 
			// $(this).removeClass('r_on');
		// });
		// $('.label_radio input:checked').each(function(){ 
			// $(this).parent('label').addClass('r_on');
		// });
	// };
};
$(document).ready(function(){
	$('.label_check, .label_radio').click(function(){
		setupLabel();
	});
	setupLabel(); 
});

// color slect 
$(document).ready(function() {
    $("#main-clrs label").click(function(){
		$("#main-clrs label").removeClass("active");
		$(this).addClass("active");
	});
    $("#accent-clrs label").click(function(){
		$("#accent-clrs label").removeClass("active");
		$(this).addClass("active");
	});
});
