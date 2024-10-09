// JavaScript Document

jQuery(document).ready(function($) {
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
	})
	
  // Location Map
	if ($('.location-map-container').length >= 1) {
    initLocationMap();
	}
  
  $('.pro-slider .owl-carousel').owlCarousel({
		items: 3,
		loop: true,
		dots: false,
		nav: true,
		center:true,		
		margin: 100,
		navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
		autoplay:true,
    smartSpeed:800,
    autoplayTimeout:8000,
		autoplayHoverPause:false,
		thumbs: false,
		thumbImage: false,
		responsive:{
			0:{
				items:1,
			},
			640:{
        items:1,
      },
			768:{
        items:2,
      },
			1199:{
        items:3,
      }
		}
	});
    $('.video-btn').click(function () {
    var videoSrc;
    videoSrc = $(this).data("src");
    setTimeout(function () {
      $("#video").attr('src', videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1");
    }, 200);
  });

  $('.video-modal-close').on('click', function (e) {
    $("#video").attr('src', '');
  });
  $('.tutorials-slider .owl-carousel').owlCarousel({
		items: 3,
		loop: true,
		dots: true,
		nav: false,
		center:true,		
		margin: 0,
		navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
		autoplay:true,
		autoplayHoverPause:false,
		thumbs: false,
		thumbImage: false,
		responsive:{
			0:{
				items:1,
			},
			640:{
        items:1,
      },
			768:{
        items:2,
      },
			1199:{
        items:3,
      }
		}
	});

	$('.testimonials-slider .owl-carousel').owlCarousel({
		items: 2,
		loop: true,
		dots: true,
		nav: false,
		center:false,		
		margin: 40,
		navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
		autoplay:true,
    smartSpeed:800,
    autoplayTimeout:8000,
		autoplayHoverPause:false,
		thumbs: false,
		thumbImage: false,
		responsive:{
			0:{
				items:1,
			},
			640:{
        items:1,
      },
			768:{
        items:2,
      },
			1199:{
        items:2,
      }
		}
	});

	$('.slider-banners').owlCarousel({
		items: 1,
		loop: true,
		dots: false,
		nav: true,
		center:false,		
		margin: 0,
		navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
		autoplay:true,
    	smartSpeed:800,
    	autoplayTimeout:8000,
		autoplayHoverPause:false,
		thumbs: false,
		thumbImage: false,
		responsive:{
			0:{
				items:1,
				dots: true,
			},
			640:{
        items:1,
		dots: true,
      },
			768:{
        items:1,
      },
			1199:{
        items:1,
      }
		}
	});
  
  var owl = $('.mobsli .owl-carousel'),
    owlOptions = {
      loop: false,
      margin: 10,
      smartSpeed: 700,
      nav: false,
      dots: true,
      thumbs: false,
      thumbImage: false,
      items: 2,
      responsive:{
			0:{
				items:1,
			},
			640:{
        items:1,
      },
			768:{
        items:2,
      },
			991:{
        items:2,
      }
		}
    };
    $('.woocommerce #reviews #comments ol.commentlist').addClass('owl-carousel');
    $('.woocommerce #reviews #comments ol.commentlist').owlCarousel({
      items: 2,
      loop: false,
      dots: false,
      nav: true,
      center:false,		
      margin: 100,
      navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
      autoplay:true,
      smartSpeed:800,
      autoplayTimeout:8000,
      autoplayHoverPause:false,
      thumbs: false,
      thumbImage: false,
      responsive:{
        0:{
          items:1,
        },
        640:{
          items:1,
        },
        768:{
          items:2,
        },
        1199:{
          items:2,
        }
      }
    });

  if ( $(window).width() < 991 ) {
    var owlActive = owl.owlCarousel(owlOptions);
  } else {
      owl.addClass('off');
  }

  $(window).resize(function() {
    if ( $(window).width() < 991 ) {
      if ( $('.mobsli .owl-carousel').hasClass('off') ) {
          var owlActive = owl.owlCarousel(owlOptions);
          owl.removeClass('off');
      }
    } else {
      if ( !$('.mobsli .owl-carousel').hasClass('off') ) {
          owl.addClass('off').trigger('destroy.owl.carousel');
          owl.find('.owl-stage-outer').children(':eq(0)').unwrap();
      }
    }
  });
  
  
  
});

function initLocationMap() {
    
	var Lat = Number($('.location-map-container').data('lat')),
      Lng = Number($('.location-map-container').data('lng'));
	
	var mapStyles = [];
	
	var myOptions = {
	  zoom: 14,
	  draggable: true,
	  scrollwheel: false,
	  mapTypeControl: false,
	  panControl: false,
	  streetViewControl: false,
	  fullscreenControl: false,
	  zoomControlOptions: false,
	  center: new google.maps.LatLng(Lat,Lng),
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	
	var map = new google.maps.Map(document.getElementsByClassName('location-map-container')[0], myOptions);
	
	/*var templateUrl = themeurl.templateUrl;
	
	var image = templateUrl + '/img/svg/map-marker.svg';
	var marker = {
		url: image,
		size: new google.maps.Size(100, 150),
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(25, 75),
		scaledSize: new google.maps.Size(50, 75)
	};*/
	
	var bodyStyles		= window.getComputedStyle(document.body),
		colorPrimary	= bodyStyles.getPropertyValue('--primary');
	
	var marker = {
		path: "M50,25c0,20-25,31.2-25,50C25,56.2,0,45.1,0,25C0,11.2,11.2,0,25,0S50,11.2,50,25z M25,18.8 c-3.5,0-6.2,2.8-6.2,6.2s2.8,6.2,6.2,6.2s6.2-2.8,6.2-6.2S28.5,18.8,25,18.8z",
		fillColor: colorPrimary,
		fillOpacity: 1,
		strokeWeight: 0,
		rotation: 0,
		scale: 1,
		anchor: new google.maps.Point(25, 75),
	};
	
	var companyPos = new google.maps.LatLng(Lat,Lng);
	
	var companyMarker = new google.maps.Marker({
		position: companyPos,
		animation: google.maps.Animation.DROP,
		map: map,
		icon: marker,
		zIndex: 10
	});
	
	// Set style to map
	map.setOptions({styles: mapStyles});
	
	google.maps.event.addDomListener(window, 'resize', function() {
		var center = new google.maps.LatLng(Lat, Lng);
		map.setCenter(center);
	});
}


// Thumbnail carousel 

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    vertical:true,
    focusOnSelect: true,
    verticalSwiping:true,
    responsive: [
        {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
            }
          }
        ]
});

$('body').find('.variation-PrescriptionFile').each(function() { // This doesn't work because the .div_item children aren't populated?
        imageurl = $(this).next().find('p').html();
        $(this).append('<a href='+imageurl+' target="blank" >View</a>');
        $(this).next().hide();
     });
     
 $(document).ready(function(){
	$('.virtual_try_on').click(function(){
			//$('#virtooal-modal-minimize-ic').trigger('click');
			$('#auglio-bubble').click();
	});
    $('.virtual_try_on_open').click(function(){
			//$('#virtooal-modal-minimize-ic').trigger('click');
			$('#auglio-bubble').click();
	});
});

$('.feature_info').hover(
				
   function () {
       $('.infopopup').show();
       $('.infopopup').css('width','80%');
      }, 
				
   function () {
       $('.infopopup').hide();
   }
);
$('.zendesk_custom').click(function(){

	zE('messenger', 'open');

});
zE('messenger', 'close');
jQuery(document).ready(function($) {
	//for out of stock pointer event css
	if($(".product-card").find(".out-of-stock-p")){
		$(".out-of-stock-p").parent().parent(".product-card").addClass("outstock");
	}
	
	
	
    // Function to update the wishlist counter
    function updateWishlistCounter(count) {
        $('.wishlist-counter').text(count);
    }

    // Function to get the wishlist count using AJAX
    function getWishlistCount() {
        $.ajax({
            url: wishlistCounter.ajax_url,
            type: 'POST',
            data: {
                action: 'get_wishlist_count',
                security: wishlistCounter.wishlistNonce,
            },
            success: function(response) {
                updateWishlistCounter(response);
            },
        });
    }
    // Update counter on page load
    getWishlistCount();

    // Listen for events when items are added/removed from wishlist
    $(document).on('yith_wcwl_add_to_wishlist yith_wcwl_remove_from_wishlist', function() {
        getWishlistCount();
    });
});





