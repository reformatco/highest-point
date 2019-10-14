(function($) {

	var md = new MobileDetect(window.navigator.userAgent);

	/*

	1.	Fixed height image module
		Uses ofi.js for fixed height object-fit images

	***************************************************/

	var $fixedImage = $('.photo-fixed img');
	objectFitImages($fixedImage);

	/*

	2.	Banner module
		Uses jQuery.cycle2.js

	***************************************************/

	if( $('.module-banner').length ){

		function initBanner( args ){

			args = args || {};
			var $banner = args.target || '.module-banner';
			args.speed = args.speed || 500;
			args.timeout = args.timeout || 5000;
			args.delay = args.delay || 1000;

			var $bannerWrap = $( $banner + ' .banner-wrap');
			var $slider = $( $banner + ' .banner');
			var $bannerPreloader = $( $banner + ' .banner-preloader');

			$bannerWrap.append('<div class="banner-loader"></div>');
			$bannerWrap.find('.banner-loader').hide().fadeIn(250);

			$bannerPreloader.imagesLoaded(function(){
				$bannerWrap.find('.banner-loader').fadeOut(500);
				$slider.cycle({
					speed : args.speed,
					timeout : args.timeout,
					swipe : true,
					slides : '> .banner-slide',
					pager : '> .banner-pager',
					next : '> .banner-next',
					prev : '> .banner-prev',
			    });
				// $slider.delay(args.delay).fadeTo('slow',1);
				$slider.addClass('is-active');
			});

		}

		// use module-banner or give explicit names to other ones

		initBanner({
			target : '.module-banner',
			speed : 250,
			delay : 1000
		});

	}


	$('.module-hero .arrow-down').click(function() {
		$('html, body').animate({
			scrollTop: $(".scroll-target").offset().top - $('.navbar').height()
		}, 500, 'easeOutQuint');
	});



	if( md.mobile() ){

		var $mobileMenuClone = $('#navbarMenu .menu').clone().removeAttr('id');
		$mobileMenuClone.appendTo('.mobile-menu');

		var $mobileMenu = $('.mobile-menu');

		$('.navbar-toggle a').click(function(){
			var $this = $(this);
			// if( !$this.hasClass('is-disabled') ){

				$this.toggleClass('is-active');
				$mobileMenu.toggleClass('is-active');
				$('body').toggleClass('disable-scrolling');

				// if( $mobileMenu.hasClass('is-active') ){
				// 	$this.addClass
				// 	$mobileMenu.addClass('is-transition').removeClass('is-active');
				// 	$mobileMenu.on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event){
				// 		$mobileMenu.removeClass('is-transition');
				// 		$mobileMenu.find('.menu').removeClass('is-active');
				// 	});
				// }else{
				// 	$mobileMenu.addClass('is-active');
				// 	$mobileMenu.on('transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd', function(event){
				// 		$mobileMenu.find('.menu').addClass('is-active');
				// 	});
				// }

			// }

		});


	}

	if( $('.module-oembed').length ){

		$('body').fitVids({
		  customSelector: 'iframe[src*="facebook"]'
		});

	}

	if( $('.article-content').length ){

		$('.article-content').fitVids();

	}

	// ScrollReveal().reveal('.sr-fade .intro,sr-fade .tiles,.sr-fade .hero-bg,.sr-fade .half-image, .sr-fade .half-text, .sr-fade .article-content, .sr-fade.module-photo img', {
	// 	delay: 250
	// });

	function followMouse(){
		$(document).bind('mousemove', function(e){
		    $('.hover-image').css({
		       left:  e.pageX + 20,
		       top:   e.pageY
		    });
		});
	}

	// if( !md.touch ){
	// 	$('.listings-list a[data-img]').hover(function(){
	// 		var imgsrc = $(this).data('img');
	// 		if( imgsrc ){
	// 			var imgsrcretina = imgsrc.replace('.jpg','@2x.jpg');
	// 			$('body').append('<div class="hover-image"><img src="'+imgsrc+'" srcset="'+imgsrc+' 1x, '+imgsrcretina+' 2x"></div>');
	// 			followMouse();
	// 		}
	// 	},function(){
	// 		$('.hover-image').remove();
	// 	});
	// }



})(jQuery);