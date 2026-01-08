jQuery(document).ready(function () {
	// Show password.
	jQuery('.show-password').click(function (e) {
		e.preventDefault();
		var destination = jQuery(this).attr('data');
		jQuery('input[name="'+ destination +'"]').attr('type', 'text');
		setTimeout(function () {
			jQuery('input[name="'+ destination +'"]').attr('type', 'password');
		}, 2000);	
	});	
	
	// Menu responsive backend.
	jQuery('.menu-reponsive-backend > ul a.has-childs').click(function (e) {
		e.preventDefault();
		var element  = jQuery(this).parent().find('ul');
		var isHide = false;
		
		if(element.is(':hidden')) {
			isHide = true;
		}
		jQuery('.menu-reponsive-backend > ul  ul').hide();
		jQuery(".menu-reponsive-backend > ul a.has-childs").removeClass('is-active-rebote');
		if(isHide) {
      jQuery('.menu-reponsive-backend > ul > li a.is-active').addClass('is-current');
      jQuery('.menu-reponsive-backend > ul > li a.is-active').removeClass('is-active');
			jQuery(this).addClass('is-active-rebote');
			element.show();
			var liparent = jQuery(this).parent();
			var index = liparent.index();
			var anchura = liparent.innerWidth() + 5;			
			var anchuraTotal = anchura * 5;
			
			/*
element.css('width', anchuraTotal + 'px');
			element.css('left', '-' + (index * anchura) + 'px');
*/
      var left = - jQuery('.is-active-rebote')[0].getBoundingClientRect().left;

      element.css('width', '100vw');
			element.css('left', left + 'px');
			
			
		} else {
      jQuery('.menu-reponsive-backend > ul > li a.is-current').addClass('is-active');
      jQuery('.menu-reponsive-backend > ul > li a.is-current').removeClass('is-current');
			element.hide();
		}
		
	});
	adaptar_alturas_sidebar();

  if (jQuery('.notice').length > 0) { 
    jQuery('.notice .dismiss-button').click(function(e) {
      e.preventDefault();
      jQuery('.notice').parent().next().children().removeClass('mt20');
      jQuery('.notice').parent().next().children().addClass('mt60');
      jQuery('.notice').parent().hide();
      jQuery('.inside-slider-images').parent().removeClass('mt20').addClass('mt50');
    });
  }

});
jQuery( window ).resize(function() {
	
	adaptar_alturas_sidebar();
	
});

  Drupal.behaviors.backuser = {
    attach: function (context, settings) {
	    adaptar_alturas_sidebar();
	    // Avisos load more.
	    jQuery('.read-more-link').unbind( "click" );
		jQuery('.read-more-link').click(function (e) {
			e.preventDefault();
			var destino = jQuery(this).parents('.destination-link-container').find('.destination-link');
			destino.slideToggle();
			jQuery(this).parents('.destination-link-container').toggleClass('active');
		});

        var renovacio_checkboxes = jQuery('.bicing-service-cancellation-form input[type=radio]');
        if (renovacio_checkboxes.length) {
            jQuery('.bicing-service-cancellation-form').removeClass('waiting');
            jQuery('body').on('DOMSubtreeModified', '.bicing-service-cancellation-form', function() {
                jQuery('.bicing-service-cancellation-form').addClass('waiting');
            });
        }

    }
  };
  
  function adaptar_alturas_sidebar() {
	  if(jQuery('.contenedor-backend-content').length) {
		var altura = jQuery('.contenedor-backend-content').innerHeight();
		jQuery('.contenedor-backend-sidebar').css('minHeight', altura + 'px');  
	  }
	  
  
  }
  
  
  
  
