/* ----------------------------- 
Pre Loader
----------------------------- */
$(window).load(function() {
	'use strict';
	$('.loading-icon').delay(500).fadeOut();
	$('#preloader').delay(800).fadeOut('slow');
});

/* ----------------------------- 
Scroll into viewPort Animation
----------------------------- */
$(document).ready(function() {	
	'use strict';
	$('.animated').appear(function() {
		var element = $(this),
			animation = element.data('animation'),
			animationDelay = element.data('animation-delay');
			if ( animationDelay ) {

				setTimeout(function(){
					element.addClass( animation + " visible");
				}, animationDelay);

			} else {
				element.addClass( animation + " visible");
			}
	});
});
	

/* ----------------------------- 
NiceScroll
----------------------------- */	
$(document).ready(function() { 
	'use strict';
    $("html").niceScroll({
		cursorcolor: '#E74C3C',
		cursoropacitymin: '1',
		cursorborder: '0px',
		cursorborderradius: '0px',
		cursorwidth: '5px',
		cursorminheight: 60,
		horizrailenabled: false,
		zindex: 1090
	});
  });

/* ----------------------------- 
Fitvids init
----------------------------- */
 $(document).ready(function(){
    'use strict';
    $('.video-content').fitVids();
 });


/* ----------------------------- 
IE 9 Placeholder fix
----------------------------- */
$('[placeholder]').focus(function() {
  var input = $(this);
  if (input.val() == input.attr('placeholder')) {
    input.val('');
    input.removeClass('placeholder');
  }
}).blur(function() {
  var input = $(this);
  if (input.val() == '' || input.val() == input.attr('placeholder')) {
    input.addClass('placeholder');
    input.val(input.attr('placeholder'));
  }
}).blur();



/* ----------------------------- 
Logo Load
----------------------------- */	
$(document).ready(function() {
	'use strict';
	$('.view-subhaus').on('click', function(e) {
		e.preventDefault();
		
		var href 			= $(this).attr('href') + ' .portfolio-project',
			portfolioWrap	= $('.main-container'),
			contentLoaded 	= $('#subhaus-load'),
			offset			= $('#section-home').offset().top;
		
		portfolioWrap.animate({'left':'-120%'},{duration:400,queue:false});
		portfolioWrap.fadeOut(400);
		$('html, body').animate({scrollTop: offset},{duration:800,queue:true});
		setTimeout(function(){ $('#home-loader').fadeIn('fast'); },300);
		
		setTimeout(function(){
            contentLoaded.load(href, function(){
                $('#home-loader').fadeOut('fast');
                contentLoaded.fadeIn(600).animate({'left':'0'},{duration:800,queue:false});
                $('.back-button').fadeIn(600);
            });
        },400);
		
			
	});
	
	$('.backToHome').on('click', function(e){
		e.preventDefault();
		
		var portfolioWrap	= $('.main-container'),
			contentLoaded 	= $('#subhaus-load');
			
		contentLoaded.animate({'left':'105%'},{duration:400,queue:false}).delay(300).fadeOut(400);
        $(this).parent().fadeOut(400);
		setTimeout(function(){
            portfolioWrap.animate({'left':'0'},{duration:400,queue:false});
            portfolioWrap.fadeIn(600);
        },500);
		
	});

});


							
/* ----------------------------- 
BxSlider
----------------------------- */		
$(document).ready(function() {
	'use strict';
	$('.pitstop-slider').bxSlider({
		pagerCustom: '#bx-pager',
		pager: true,
		touchEnabled: true,
		controls: false
	});	
});

				
/* ----------------------------- 
Main navigation
----------------------------- */
$(document).ready(function() {
	'use strict';
	$('.nav').onePageNav({
		currentClass: 'current',
		scrollSpeed: 1000,
		easing: 'easeInOutQuint'
	});
	$(window).bind('scroll', function(e) {
		var scrollPos = $(window).scrollTop();
		scrollPos > 220 ? $('.sticky-section').addClass('nav-bg') : $('.sticky-section').removeClass('nav-bg');
	});
});				
				
				
/* ----------------------------- 
MailCimp Plugin Script 
----------------------------- */
$(document).ready(function() {
	'use strict';
	$('#subscription-form').ajaxChimp({
		callback: mailchimpCallback,
		url: 'YOUR_URL' /* Replace it with your custom URL inside '' */
	});
	
	function mailchimpCallback(resp) {
		 if(resp.result === 'success') {
			$('.subscription-success')
				.html(resp.msg)
				.delay(500)
				.fadeIn(1000);

			$('.subscription-success').fadeOut(8000);
			
		} else if(resp.result === 'error') {
			$('.subscription-failed')
				.html(resp.msg)
				.delay(500)
				.fadeIn(1000);
				
			$('.subscription-failed').fadeOut(5000);
		}
		$('#subscription-form .input-email').val('');
	};
});

			

/* ----------------------------- 
Contact form
----------------------------- */			
$(document).ready(function() {
	'use strict';
	$('form.contact-form').on('submit', function(e) {
		$.post('contact/contact.php', $(this).serialize(), function(response) {
			if ($('.confirmation p').html() != "") {
				$('.confirmation p').replaceWith('<p><span class="fa fa-check"></span></p>');
			}
			$('.confirmation p').append(response).parent('.confirmation').show();
			$('html, body').animate({
				scrollTop: $('#section-contact').offset().top
				},{duration:800,queue:true});
			$('.form-item').val('');
			setTimeout(function() {
				$('.confirmation').hide();
			}, 8000);
		});
		// disable default action
		e.preventDefault();
	});

});
			
