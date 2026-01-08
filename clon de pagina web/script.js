/* YOUTUBE API TO CONTROL IFRAME PLAY/STOP ON SLICK CAROUSEL {{{ */
if (jQuery('.hasyt').length) {
  var script = document.createElement('script');
  script.id = 'yt-iframe-api';
  script.src = 'https://www.youtube.com/iframe_api';
  firstScript = jQuery('script')[0];
  firstScript.parentNode.insertBefore(script, firstScript);
  var player;
  function onYouTubeIframeAPIReady() {
    var elems1 = jQuery('.hasyt iframe');
    for (var i = 0; i < elems1.length; i++) {
      player = new YT.Player(elems1[i], {
        events: {
          'onStateChange': onPlayerStateChange
        }
      });
    }
  }
}
function handleVideo(playerStatus) {
  switch(playerStatus) {
    case -1:// unstarted
      jQuery('.slider-novetats > div').slick('slickPause');
      break;
    case 0:// ended
      jQuery('.slider-novetats > div').slick('slickPlay');
      break;
    case 1: // playing = green
      jQuery('.slider-novetats > div').slick('slickPause');
      break;
    case 2: // paused = red
      jQuery('.slider-novetats > div').slick('slickPlay');
      break;
    case 3: // buffering = purple
      break;
    case 5: // video cued
      break;
  }
}
function onPlayerStateChange(event) {
  handleVideo(event.data);
}
/* }}} YOUTUBE API END */

Drupal.behaviors.bicingbeh = {
  attach: function (context, settings) {
    setTimeout(function() {
   bicing_igualar_alturas();
    }, 500);
   drauta_maquetar_checkbox();
   drauta_set_blank_targets_on_wysiwyg_file_links();
   toggle_submit_button_contact();
  }
};
function drauta_set_blank_targets_on_wysiwyg_file_links() {
  jQuery('a[data-entity-type="file"]').attr('target', '_blank');
}
function drauta_maquetar_checkbox() {
	if(jQuery('.js-form-type-radio > input').length) {
		jQuery('.js-form-type-radio > input').each(function () {
			var aplicar = true;
			if (jQuery(this).parents('#consent-zone-custom').length) {
				aplicar = false;
			}
			if(aplicar) {
				var label = jQuery(this).parent().find('label');
				label.append(jQuery(this));
				label.append('<span class="checkmark"></span>');
			}

		});
	}
	if(jQuery('.js-form-type-checkbox > input').length) {
		jQuery('.js-form-type-checkbox > input').each(function () {

				var label = jQuery(this).parent().find('label');
				label.append(jQuery(this));
				label.append('<span class="checkmark"></span>');

		});
	}
}
jQuery(document).ready(function () {
	if(jQuery('.chatbox-wrapper').length){
		var lang = jQuery('html').attr('lang');
		jQuery('.chatbox-wrapper #language-selector').val(lang);
		jQuery('#startChatButton').click();
	}

  jQuery(window).scroll(function() {
    if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 100) {
      if(jQuery('.grecaptcha-badge').length) { jQuery('.grecaptcha-badge').css('bottom', '150px'); }
    } else { if(jQuery('.grecaptcha-badge').length) { jQuery('.grecaptcha-badge').css('bottom', '14px'); } }
  });
  if(isIE()) {
		jQuery('body').addClass('isie');
	}
	if(jQuery('.main-form #edit-consulta').length) {
	jQuery('.main-form #edit-consulta').change(function () {
	  jQuery('.main-form input[type="submit"]').trigger("click");
  	});
  	jQuery('.main-form #edit-tipus-de-bicing').change(function () {
	  jQuery('.main-form input[type="submit"]').trigger("click");
  	});
	}

	if(jQuery('.inside-slider-images').length) {
		jQuery('.inside-slider-images > div').slick({
			dots: true,
      arrows: false,
		});
	}
	if(jQuery('.inside-slider-images-doble').length) {
		jQuery('.inside-slider-images-doble > div').slick({
			dots: true,
      nextArrow: '<img class="slick-next" src="/sites/default/files/arrows/arrow_carrot-right.svg">',
      prevArrow: '<img class="slick-prev" src="/sites/default/files/arrows/arrow_carrot-left.svg">',
		});
	}
	if(jQuery('.slider-views .results-rows').length) {
		jQuery('.slider-views .results-rows').slick({
			dots: false,
      nextArrow: '<img class="slick-next" src="/sites/default/files/arrows/arrow_carrot-right.svg">',
      prevArrow: '<img class="slick-prev" src="/sites/default/files/arrows/arrow_carrot-left.svg">',
		});
	}
	if(jQuery('.slider-home > div').length) {
		jQuery('.slider-home > div').slick({
			slidesToShow: 1,
		 	slidesToScroll: 1,
      nextArrow: '<img class="slick-next" src="/sites/default/files/arrows/arrow_carrot-right-white.svg">', // change to white
      prevArrow: '<img class="slick-prev" src="/sites/default/files/arrows/arrow_carrot-left-white.svg">', // change to white
		 	fade: false,
		 	asNavFor: '.slider-home-thumnails > div',
		 	responsive: [
			 	{
		          breakpoint : 800,
		          settings   : {
		            dots : true,
		          }
		        }
		 	]
		});

	}
	if(jQuery('.slider-home-thumnails > div').length) {
      jQuery('.slider-home-thumnails > div').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-home > div',
        centerMode: true,
        dots: false,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3
            }
          }
      ]
    });
	}

  if(jQuery('.slider-views-tres .results-rows').length) {
    jQuery('.slider-views-tres .results-rows').slick({
      slidesToShow   : 3,
      dots: true,
      arrows: false,
      responsive     : [
        {
          breakpoint : 1024,
          settings   : {
            slidesToShow : 2,
          }
        },
        {
          breakpoint : 650,
          settings   : {
            slidesToShow  : 1,
          }
        }
      ]
    });


  }

  if (jQuery('.slider-novetats').length > 0) {
    jQuery('.slider-novetats > div').slick({
      nextArrow: '<img class="slick-next" src="/sites/default/files/arrows/arrow_carrot-right.svg">',
      prevArrow: '<img class="slick-prev" src="/sites/default/files/arrows/arrow_carrot-left.svg">',
    });
    jQuery('.slider-novetats > div').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
      jQuery('.hasyt iframe').each(function() {
        this.contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
      });
    });
  }




	jQuery('.mostrar-slider-home').click(function (e){
		e.preventDefault();
		jQuery(this).parent().toggleClass('show-slider');
	});
	bicing_tabs_system();
	bicing_button_menu();
	igualar_buttons_menu();
	custom_cookies_drauta('drauta-acepta-cookies', '.chatbox-ventana-custom', '.close-ventana-custom-cookie');
  nonLinkableFormLabel('#edit-file-upload--label');
});

/**
  * Cookie gestion for chatbox
  */
function custom_cookies_drauta(nombreCookie, classContent, classButtonClose) {
  // if (jQuery('#block-chatbox').hasClass('muestra-mb')) {
    // jQuery(classContent).removeClass("oculto");
  // }
	if (getCookie(nombreCookie) == "") { // NO SE HA ACEPTADO
        jQuery(classContent).removeClass("oculto");
    }

	if(jQuery(classButtonClose).length) {
		jQuery(classButtonClose).click(function (e) {
			e.preventDefault();
			createCookie(nombreCookie, 1, 365);
			jQuery(classContent).fadeOut(500);
		});
	}
}

window.onload = function() {
  bicing_igualar_alturas();
    if(jQuery("#sidebar").length) {
		var paddingTop = jQuery('body').css('paddingTop').replace('px', '');
		var $sidebar   = jQuery("#sidebar"),
        $window    = jQuery(window),
        offset     = $sidebar.offset(),
        topPadding = paddingTop,
        limite = jQuery('#limite-inferior').offset(),
        limiteInferior =  jQuery('body').innerHeight() - limite.top;
		$window.scroll(function() {
			limite = jQuery('#limite-inferior').offset();
      // if ($sidebar.find('.prevcontainer').length) {
      //  limite = jQuery('#limite-inf-tabla').offset();
      // }
			limiteInferior =  jQuery('body').innerHeight() - limite.top;
	        if ($window.scrollTop() > offset.top) {
		        var sumatorio = parseInt($window.scrollTop()) + parseInt($sidebar.innerHeight()) + parseInt(topPadding);
		        if(limite.top > sumatorio) {
				    $sidebar.stop().animate({
		                marginTop: parseInt($window.scrollTop()) - parseInt(offset.top) + parseInt(topPadding)
		            });
		        }
	        } else {
	            $sidebar.stop().animate({
	                marginTop: 0
	            });
	        }
    	});
	}

	  if(jQuery("#promo-container").length) {
    var paddingTop = jQuery('body').css('paddingTop').replace('px', '');
    var $sidebar   = jQuery("#promo-container"),
      $window    = jQuery(window),
      offset     = $sidebar.offset(),
      topPadding = paddingTop,
      limite = jQuery('#limite-inferior').offset(),
      limiteInferior =  jQuery('body').innerHeight() - limite.top;
    $window.scroll(function() {

      if(jQuery( window ).width() > 991){
        limite = jQuery('#limite-inferior').offset();
        limiteInferior =  jQuery('body').innerHeight() - limite.top;
        if ($window.scrollTop() > offset.top) {
          var sumatorio = parseInt($window.scrollTop()) + parseInt($sidebar.innerHeight()) + parseInt(topPadding);
          if(limite.top > sumatorio) {
            $sidebar.stop().animate({
              marginTop: parseInt($window.scrollTop()) - parseInt(offset.top) + parseInt(topPadding)
            });
          }
        } else {
          $sidebar.stop().animate({
            marginTop: 0
          });
        }
      }else{
        $sidebar.stop().animate({
          marginTop: 0
        })
      }
    });
  }
};
jQuery(window).resize(function(){
  bicing_igualar_alturas();
  igualar_buttons_menu();

});
function bicing_igualar_alturas() {
  if (jQuery.fn.equalHeights) {
    if(jQuery('.item-equal .views-row').length) {
      jQuery('.item-equal .views-row').css('height','auto');
      jQuery('.item-equal .views-row').equalHeights();
    }
    if(jQuery('.igualar-altura').length) {
      jQuery('.igualar-altura').css('height','auto');
      jQuery('.igualar-altura').equalHeights();
    }
    if(jQuery('.igualar-altura').length) {
      jQuery('.igualar-altura').css('height','auto');
      jQuery('.igualar-altura').equalHeights();
    }
    if(jQuery('.igualar-altura-v2').length) {
      jQuery('.igualar-altura-v2').css('height','auto');
      jQuery('.igualar-altura-v2').equalHeights();
    }
    if(jQuery('.igualar-altura-v3').length) {
      jQuery('.igualar-altura-v3').css('height','auto');
      jQuery('.igualar-altura-v3').equalHeights();
    }
  }
}
function bicing_tabs_system() {
	if(jQuery('.tabs-system').length) {
		var elementoClick = jQuery('.tabs-content-link');
		var tabElement = jQuery('.tabs-content');
		elementoClick.click(function (e) {
			e.preventDefault();
			elementoClick.removeClass('active');
			tabElement.removeClass('mostrar');
			var destino = jQuery(this).attr('href');
			jQuery(destino).addClass('mostrar');
			jQuery(this).addClass('active');

			var url = window.location.href.split('#')[0] +"#" + destino;
			document.location = url;
		});
	}
}

function bicing_button_menu() {
	jQuery('.responsive-button').click(function (e) {
		e.preventDefault();
		 jQuery('body').toggleClass('menu-abierto');
     //jQuery('.menu-main').slideToggle();
	});
}


function igualar_buttons_menu() {
	jQuery('.menu-footer-main li a').each(function () {
		var anchura = jQuery(this).innerWidth();
		anchura = anchura + 10;
		jQuery(this).parent().css('width', anchura + 'px');
	});
}

function isIE() {
  ua = navigator.userAgent;
  var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
  return is_ie;
}

function bicing_get_parameter_url(param) {
  var url_string = window.location.href;
  var c = getParameterByName(param, url_string);
  return c;
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// FUNCIONES GENERALES INTERACTUAR CON COOKIES
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else
        var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
}
function eraseCookie(name) {
    createCookie(name, "", -1);
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1);
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}


function nonLinkableFormLabel(element_id) {
  if (jQuery(element_id).length) {
    jQuery(element_id).on('click', function(e) {
        e.preventDefault();
    });
  }
}

function toggle_submit_button_contact() {
    if (jQuery('form.avaries-form [type=submit]').length) {
        jQuery('form.avaries-form [type=submit]').click(function() {
            jQuery(this).addClass('disabled');
        });
    }
}

jQuery(document).ready(function(){
	function estaEnIframe() {
    	return window !== window.top;
	}

	let estilosCustom = `
		  #limite-inferior { display: none; }
.container-custom-menu-main { display: none;}
#sliding-popup	 {display:none}
		`;
	
	if (estaEnIframe()) {
    	jQuery("<style>")
		  .prop("type", "text/css")
		  .html(estilosCustom)
		  .appendTo("head");
	}
});
