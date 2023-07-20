(function($){
	"use strict";

	// Mean Menu
	$('.mean-menu').meanmenu({
		meanScreenWidth: "991"
	});

	// Header Sticky
	$(window).on('scroll',function() {
		if ($(this).scrollTop() > 120){  
			$('.navbar-area').addClass("is-sticky");
		}
		else{
			$('.navbar-area').removeClass("is-sticky");
		}
	});

	// Popup Video
	$('.popup-youtube').magnificPopup({
		disableOn: 320,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	// Odometer JS
	$('.odometer').appear(function(e) {
		var odo = $(".odometer");
		odo.each(function() {
			var countNumber = $(this).attr("data-count");
			$(this).html(countNumber);
		});
	});

	// Popup Image
	$('.popup-btn').magnificPopup({
		type: 'image',
		gallery:{
			enabled:true
		}
	});

	// Sidebar Sticky
	$('.fl-portfolio-details-sticky').stickySidebar({
		topSpacing: 100,
		bottomSpacing: 100
	});

	// WOW Animation JS
	if($('.wow').length){
		var wow = new WOW({
			mobile: false
		});
		wow.init();
	}

	// Go to Top
	$(function(){
		// Scroll Event
		$(window).on('scroll', function(){
			var scrolled = $(window).scrollTop();
			if (scrolled > 600) $('.go-top').addClass('active');
			if (scrolled < 600) $('.go-top').removeClass('active');
		});  
		// Click Event
		$('.go-top').on('click', function() {
			$("html, body").animate({ scrollTop: "0" },  500);
		});
	});


	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {

			// FL Services Slides
			$('.fl-services-slides').owlCarousel({
				nav: false,
				loop: true,
				dots: true,
				margin: 30,
				autoplay: false,
				autoplayHoverPause: true,
				navText: [
					"<i class='bx bx-left-arrow-alt'></i>",
					"<i class='bx bx-right-arrow-alt'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 2
					},
					768: {
						items: 2
					},
					992: {
						items: 3
					},
					1200: {
						items: 3
					}
				}
			});

		});

		elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {

			// FL Feedback Slides
			$('.fl-feedback-slides').owlCarousel({
				nav: false,
				loop: true,
				dots: true,
				margin: 30,
				autoplay: false,
				autoplayHoverPause: true,
				navText: [
					"<i class='bx bx-left-arrow-alt'></i>",
					"<i class='bx bx-right-arrow-alt'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 2
					},
					768: {
						items: 2
					},
					992: {
						items: 3
					},
					1200: {
						items: 3
					},
					1550: {
						items: 4
					}
				}
			});
		});
	});



}(jQuery));