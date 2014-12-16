	$(document).foundation({
		abide : {
		patterns: {
				dashes_only: /^[0-9-]*$/,
				ip_address: /^((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])$/
			}
		}
	});
	
	$(document).ready(function(){
		$('.slider').slick({
			swipe: true
		});
		$('.slider-mills').slick({
			swipe: true
		});
		$('.slider-espace').slick({
			swipe: true
		});
	});
	
	$(window).load(function(){
		var largeur = $('body').width();
		var hauteurSlider = $('.slider-top').height();
		
		/* Blocage du menu en haut lors du scroll et apparition du bouton GoToTop */
		window.addEventListener('scroll', scrollEvent);
		// For Firefox
		window.addEventListener('DOMMouseScroll', scrollEvent);
		
		function scrollEvent(evt) {
		    var pos_top = (document.documentElement.scrollTop||document.body.scrollTop);
		    if(pos_top < hauteurSlider){
		       $('.menu').removeClass('fix');
		       $('.content').removeClass('fix');
		    }
		
		    else if(pos_top > hauteurSlider){
		       $('.menu').addClass('fix');
		       if(largeur>750){
		       		$('.content').addClass('fix');
		       }
		    }
		};
		
		// Défilement vers le contenu des pages
		if(($('body').hasClass('page')) && (largeur>750)) {
			smoothScroll.animateScroll( null, '#contenu' );
		}
	});
	
	
	
	
	