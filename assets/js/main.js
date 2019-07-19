(function($) {
"use strict";



/**
 * [isMobile description]
 * @type {Object}
 */
window.isMobile = {
	Android: function() {
		return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function() {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function() {
		return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	},
	Opera: function() {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function() {
		return navigator.userAgent.match(/IEMobile/i);
	},
	any: function() {
		return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	}
}
window.isIE = /(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent);
window.windowHeight = window.innerHeight;
window.windowWidth = window.innerWidth;

/**
 * owlCarousel
 */
$('.carousel-element').each(function() {
	var self = $(this),
		optData = eval('(' + self.attr('data-options') + ')'),
		optDefault = {
			items: 1,
			nav: true,
			dot: true,
			loop: true
		},
		options = $.extend(optDefault, optData);

self.owlCarousel(options);
});

// /**
// * Dropdown
// */
$('[data-init="dropdown"]').each(function(index, el) {

$(el).find('a.dropdown-toggle').on('click', function(event) {
		event.preventDefault();
		$(el).find('.dropdown-content').toggleClass('open');
		$(el).toggleClass('open');
	});

$(document).on('click', function(event) {
		var $content = $(el).find('.dropdown-content');
		if ($.contains(el, event.target)) {
			return;
		}

if ($(el).hasClass('open')) {
			$(el).removeClass('open');
		}

if ($content.hasClass('open')) {
			$content.removeClass('open');
		}
	});
});

$(document).ready(function(){
	$('a[href^="#"].clickScroll').on('click',function (e) {
	    e.preventDefault();

var target = this.hash;
	    var $target = $(target);

$('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function() {
	        window.location.hash = target;
	    });
	});
});

$('.back-to-top').on('click', function (e) {
	e.preventDefault();
	$('html,body').animate({
		scrollTop: 0
	}, 700);
});
	// Gallery - uses the magnific popup jQuery plugin
	$('.gallery-popup').magnificPopup({
		type: 'image',
		removalDelay: 300,
		mainClass: 'mfp-fade',
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300,
			easing: 'ease-in-out',
			opener: function (openerElement) {
				return openerElement.is('img') ? openerElement : openerElement.find('img');
			}
		}
	});
/**
 * Menu
 */
$('.navbar').dropdownMenu({
    menuClass: 'menu',
    breakpoint: 992,
    toggleClass: 'active',
    classButtonToggle: 'navbar-toggle',
    subMenu: {
        class: 'sub-menu',
        parentClass: 'menu-item-has-children',
        toggleClass: 'active'
    }
});

$(window).scroll(function() {
	if ($(document).scrollTop() > 100) {
		$('.back-to-top').fadeIn('slow');
		$('.header').addClass('shrink');
	} else {
		$('.back-to-top').fadeOut('slow');
		$('.header').removeClass('shrink');
	}
});
$('.smoothscroll').on('click', function (e) {

	e.preventDefault();

	var target = this.hash,
		$target = $(target);

	$('html, body').stop().animate({
		'scrollTop': $target.offset().top
	}, 800, 'swing', function () {
		window.location.hash = target;
	});

});
/**
 * Event click navbar-toggle
 */
$('.navbar-toggle').each(function(index, el) {
    $(el).on('click', function(event) {
        event.preventDefault();
        $(el).toggleClass('open');
    });

$(document).on('click', function(event) {
        var $content = $(el);
        if ($.contains(el, event.target)) {
            return;
        }

if ($(el).hasClass('open')) {
            $(el).removeClass('open');
        }
    });
});

	

/**
 * Event click search-form
 */
$('.search-form').each(function(index, el) {
    $(el).on('click', function(event) {
        event.preventDefault();
        $(el).addClass('open');
    });

$(document).on('click', function(event) {
        var $content = $(el);
        if ($.contains(el, event.target)) {
            return;
        }

if ($(el).hasClass('open')) {
            $(el).removeClass('open');
        }
    });
});

function slider() {
	var windowWidth    = $(window).innerWidth();
	var containerWidth = $('.container').width();
	var outerPadding   = (windowWidth - containerWidth)/2;

if(windowWidth > 1200) {
		$('.js-slider').css('marginRight', - outerPadding);
	}
}

slider();
var myEfficientFn = debounce(function() {
	slider();
}, 250);

window.addEventListener('resize', myEfficientFn);

 })(jQuery);
