jQuery(document).ready(function () {

  // Slider cards on home page
  /* if (jQuery('#home-cards').length) {
    toggleSliderHome();
    jQuery(window).resize(function() {
      toggleSliderHome();
    });
  } */
  
  if (jQuery('.com-funciona').length) {
    switchComFuncionaBtn(jQuery);
//    jQuery(window).resize(function() {
//      switchComFuncionaBtn(jQuery);
//    });
  }
   if (jQuery('#home-cards').length) {
      jQuery('#home-cards').slick({ 
        slidesToShow: 3,
        dots: true,
        arrows: false,
        responsive: [
		   {
		     breakpoint: 1023,
		     settings: {
		       slidesToShow: 2,
		     }
		   },
		   {
		     breakpoint: 650,
		     settings: {
		       slidesToShow: 1,
		     }
		   }
		]       
      });
    } 
});


function toggleSliderHome() {

  if (jQuery(window).width() < 992) {
    if (jQuery('#home-cards .slick-track').length < 1) {
      jQuery('#home-cards').slick({ 
        slidesToShow  : 3,       
      });
    } 
  } else {
    if (jQuery('#home-cards .slick-track').length > 0) {
      jQuery('#home-cards')[0].slick.unslick();
      jQuery('#home-cards setheight').equalHeights();
    } 
  }
}

function switchComFuncionaBtn($) {
  if ($(window).width() < 992) {
    if ($('.com-funciona').length) {
      var btn = $('.com-funciona').find('.btn-big-inside a.btn');
      var papa = btn.parent();
      papa.removeClass('btn-big-inside');
      btn.detach().appendTo(papa.next()).removeClass('mt40').prev().addClass('mb40');
      papa.next().addClass('btn-big-inside');
    }
  } 
}
