	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="robots" content="index,follow" />
	<meta name="apple-mobile-web-app-title" content="B.SPORT" />
	
	<meta name="google-site-verification" content="eOp4F9hnVSo12BiWnQy39GiRqcOh-Ln_Qj3CprqmnbU" />
	<meta name="msvalidate.01" content="0F652D91935F25317C22102440B50132" />
	<META name="y_key" content="2bbb32c77c8164dd">
	<meta name="Content-Language" content="fr">
	<meta name="publisher" content="iconeo.fr">
	<meta name="author" content="iconeo.fr">
	<meta name="Revisit-After" content="16 days">
	<meta name="Robots" content="all">
	
	<!-- Styles -->
	<link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico" />
	<link rel="apple-touch-icon" href="img/favicon.png" />
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="css/foundation.css" />
	<link rel="stylesheet" type="text/css" href="js/vendor/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="style.css" />


	<!-- Scripts -->
	<script src="js/vendor/modernizr.js"></script>
	
	<!-- Add jQuery library -->
	<script src="js/vendor/jquery.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	

	<script src="http://thecodeplayer.com/uploads/js/prefixfree.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			 $('.fancybox').fancybox({
				  padding: 0,
				  helpers: {
				    overlay: {
				      locked: false
				    }
				  }
			});

			$('.fancybox-media')
			.attr('rel', 'media-gallery')
			.fancybox({
				openEffect : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				'width': 560,
			    'height': 380,
				arrows : false,
				helpers : {
					media : {},
					buttons : {},
					 overlay: {
						locked: false
					}
				}
			});


			/* Slider références */
			$('.autoplay').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 5000,
				pauseOnHover: true,
				speed:1000
			});

			$('.autoplay2').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
				pauseOnHover: true,
				speed:1000
			});

			$('.fade').slick({
				  dots: true,
				  autoplay: true,
				  infinite: true,
				  speed: 500,
				  fade: true,
				  slide: 'div',
				  cssEase: 'linear'
			});

			
		});

		$(document).ready(function(){

			var native_width = 0;
			var native_height = 0;

			//Now the mousemove function
			$(".magnify").mousemove(function(e){
				//When the user hovers on the image, the script will first calculate
				//the native dimensions if they don't exist. Only after the native dimensions
				//are available, the script will show the zoomed version.
				if(!native_width && !native_height)
				{
					//This will create a new image object with the same image as that in .small
					//We cannot directly get the dimensions from .small because of the 
					//width specified to 200px in the html. To get the actual dimensions we have
					//created this image object.
					var image_object = new Image();
					image_object.src = $(".small").attr("src");
					
					//This code is wrapped in the .load function which is important.
					//width and height of the object would return 0 if accessed before 
					//the image gets loaded.
					native_width = image_object.width;
					native_height = image_object.height;
				}
				else
				{
					//x/y coordinates of the mouse
					//This is the position of .magnify with respect to the document.
					var magnify_offset = $(this).offset();
					//We will deduct the positions of .magnify from the mouse positions with
					//respect to the document to get the mouse positions with respect to the 
					//container(.magnify)
					var mx = e.pageX - magnify_offset.left;
					var my = e.pageY - magnify_offset.top;
					
					//Finally the code to fade out the glass if the mouse is outside the container
					if(mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0)
					{
						$(".large").fadeIn(100);
					}
					else
					{
						$(".large").fadeOut(100);
					}
					if($(".large").is(":visible"))
					{
						//The background position of .large will be changed according to the position
						//of the mouse over the .small image. So we will get the ratio of the pixel
						//under the mouse pointer with respect to the image and use that to position the 
						//large image inside the magnifying glass
						var rx = Math.round(mx/$(".small").width()*native_width - $(".large").width()/2)*-1;
						var ry = Math.round(my/$(".small").height()*native_height - $(".large").height()/2)*-1;
						var bgp = rx + "px " + ry + "px";
						
						//Time to move the magnifying glass with the mouse
						var px = mx - $(".large").width()/2;
						var py = my - $(".large").height()/2;
						//Now the glass moves with the mouse
						//The logic is to deduct half of the glass's width and height from the 
						//mouse coordinates to place it with its center at the mouse coordinates
						
						//If you hover on the image now, you should see the magnifying glass in action
						$(".large").css({left: px, top: py, backgroundPosition: bgp});
					}
				}
			})
		})
		
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
