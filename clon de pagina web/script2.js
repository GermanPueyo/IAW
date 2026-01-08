// var grecaptchaReady = function() {
//   if (jQuery('.captcha-bicing').length) {
//       var form = jQuery('.captcha-bicing').closest('form')[0];
//       // get the form action to be certain
//       var action = jQuery(form).attr('action');
//       // eliminate query values
//       action = action.split(/[#?]/)[0];
//       parts = action.split("/").length;
//       action = action.split("/")[parts-1];
//         grecaptcha.execute('6LfUWD0aAAAAAC9BJUe0qyNyTKJH-aX12IveSO9i', {action: action})
//           .then(function(token) {
//             var url = Drupal.url.toAbsolute().replace('/undefined', '').replace('bicingback','');
//             url = url.replace("/internalaccess","");
//             url = url.split(/[?#]/)[0];
//             var barra = url.substr(-1,1);
//             url = barra == '/' ? url.substr(0, url.length - 1) : url;
//             url = url + '/recaptcha-response';
//             jQuery.ajax({
//               type: "GET",
//               url: url + '?response=' + token,
//               success: function(datareturn) {
//                 if (datareturn.success && datareturn.score > 0.5) {
//                   // console.log('human');
//                 }
//                 console.log('!');
//               }
//             });
//           });
//   }
// };

jQuery(document).ready(function() {

  jQuery("input[name='password_login_bicing']").each(function(){
    if (jQuery(this).attr("type")=='hidden') {
      jQuery('.show-password').remove();
      jQuery('#bicing-login-form').once('bicing_forms').delay(50).submit();
    }
  });


  if(jQuery('button#per-use-btn').length) {
    var type = bicing_get_parameter_url('type');
    if(type != null) {
        setTimeout(function() {
          var element = jQuery('#' + type);
          element.trigger("click");
        }, 100);
    }
  }

  if (jQuery('#alta-form').length > 0 ) {
    // checkbox set a tick mark
    jQuery('body').on('click', '#alta-form .form-checkbox', function() {
      if(jQuery(this).is(':checked')) {
        jQuery(this).parent().parent().addClass('pulsado');
      } else {
        jQuery(this).parent().parent().removeClass('pulsado');
      }
    });
    jQuery('body').on('click', '#alta-form #edit-prod .btn-tarifa', function() {
          jQuery('#edit-promotional-code-input').val('');
    });
    // address input show address tip:
    jQuery('#edit-address').focus(function(e) {
      var msg = Drupal.t('To speed up the shipping we recommend using an address from Zaragoza');
      var html = '<div class="errors shadow right-col">' + msg + '</div>';
      html += "<script>function fadeOut() { jQuery('.errors').fadeOut()};setTimeout(fadeOut, 10000);</script>";
      jQuery('#address-tip').html(html);
    });
      // fee buttons set selected or not and change text
    feeCardButtonBehavior()
      // toggle diff address checkmark
    diffAdressToggle()
    relocatePromo();
    jQuery(window).resize(function() {
      relocatePromo();
    });
  }

  if (jQuery('#change-plan-form').length) {
    jQuery('body').on('click', '#custom-modal', function(e) {
      if (e.target !== this) { return; }
      jQuery('#custom-modal').removeClass('show');
    });
  }

  if (jQuery('#modify-user-data-form').length) {
    jQuery('body').on('click', '#modify-user-data-form .form-checkbox', function() {
      if(jQuery(this).is(':checked')) {
        jQuery(this).parent().parent().addClass('pulsado');
      } else {
        jQuery(this).parent().parent().removeClass('pulsado');
      }
  });

    if (jQuery('#edit-diff-billing').is(':checked')) {
      jQuery('#modify-user-data-form  #billing-address-container').parent().addClass('mb30');
      jQuery('#modify-user-data-form #billing-address-container').addClass('shown');
    }
    jQuery('body').on('click', '#edit-diff-billing', function() {
      if (jQuery('#edit-diff-billing').is(':checked')) {
        jQuery('#modify-user-data-form  #billing-address-container').parent().addClass('mb30');
        jQuery('#modify-user-data-form #billing-address-container').addClass('shown');
      } else {
        jQuery('#modify-user-data-form #billing-address-container').parent().removeClass('mb30');
        jQuery('#modify-user-data-form #billing-address-container').removeClass('shown');
      }
    });
  }

});

function comprovarIguales(element1,  element2) {
  var $value1 = jQuery(element1).val();
  var $value2 = jQuery(element2).val();
  return $value1 == $value2;
}

function  comprovarPasswords() {
    var iguales = comprovarIguales('#edit-password', '#edit-password-confirm');
    var $html = '<div class="error-register-form';
    $html += iguales ? ' ok' : ' err';
    $html += '">' + Drupal.t('Passwords');
    $html = iguales ? $html + ' ' + Drupal.t("match") + '.' : $html + ' ' + Drupal.t("don't match") + '.' ;
    $html += '</div>';
    jQuery('#pass-confirm-msgbox').html(' ');
    jQuery($html).appendTo('#pass-confirm-msgbox');
}

function  comprovarEmails() {
    var iguales = comprovarIguales('#edit-e-mail', '#edit-e-mail-confirm');
    var $html = '<div class="error-register-form';
    $html += iguales ? ' ok' : ' err';
    $html += '">' + Drupal.t('The emails');
    $html = iguales ? $html + ' ' + Drupal.t("match") + '.' : $html + ' ' + Drupal.t("don't match") + '.' ;
    $html += '</div>';
    jQuery('#email-confirm-msgbox').html(' ');
    jQuery($html).appendTo('#email-confirm-msgbox');
}

function relocatePromo() {
  var promo = jQuery('#promo-container');
  var respContainer = jQuery('#resp-promo-container');
  if (jQuery(window).width() < 992) {
    respContainer.addClass('row');
    respContainer.addClass('mb25');
    //promo.removeClass('col-md-4');
    // promo.removeClass('mt50');
    promo.addClass('col-xs-12');
    promo.detach().appendTo(respContainer);
  } else {
    respContainer.removeClass('row');
    respContainer.removeClass('mb25');
    //promo.addClass('col-md-4');
    // promo.addClass('mt50');
    promo.removeClass('col-xs-12');
    var mainrow = jQuery('.container-promo');
    promo.detach().appendTo(mainrow);
  }
}

function diffAdressToggle() {
  if (jQuery('#edit-diff-address').is(':checked')) {
    jQuery('.alta-form #billing-address-container').addClass('shown');
  } else {
    jQuery('.alta-form #billing-address-container').removeClass('shown');
  }
  jQuery('body').on('click', '#edit-diff-address', function() {
    if (jQuery('#edit-diff-address').is(':checked')) {
      jQuery('.alta-form #billing-address-container').addClass('shown');
    } else {
      jQuery('.alta-form #billing-address-container').removeClass('shown');
    }
  });
}

function feeCardButtonBehavior() {
    if (jQuery('button.btn.btn-tarifa.selected-fee').length == 1) {
      // apparently a timeout of half a second is needed before the click or
      // the event listener from the formBuild will not yet be added
      setTimeout(function() {
      jQuery('button.btn.btn-tarifa.selected-fee').click(); }, 500);
    }

    if (jQuery('body').find('#edit-product-per-year').is(':checked')) {
      jQuery('body').find('#per-year-btn').click();
    } else if (jQuery('body').find('#edit-product-per-use').is(':checked')) {
      jQuery('body').find('#per-use-btn').click();
    }



    jQuery('body').on('click', 'button.btn-tarifa', function() {
      jQuery(this).parent().addClass('selected-fee');
      jQuery(this).addClass('selected-fee');
      jQuery(this).addClass('selected-fee');
      jQuery(this).html(Drupal.t('Selected Fee'));
      jQuery(this).attr('disabled', 'disabled');
      addAjaxCall(jQuery('#edit-promo .tarifa-overlay.card-tarifa') );
      if (jQuery(this).attr('id') == 'per-year-btn') {
        jQuery('#edit-product-per-year').prop('checked', true).change();
        jQuery('#per-use-btn').parent().removeClass('selected-fee');
        jQuery('#per-use-btn').removeClass('selected-fee');
        jQuery('#per-use-btn').removeAttr('disabled');
        jQuery('#per-use-btn').html(Drupal.t('Select this fee'));
      } else if (jQuery(this).attr('id') == 'per-use-btn') {
        jQuery('#edit-product-per-use').prop('checked', true).change();
        jQuery('#per-year-btn').parent().removeClass('selected-fee');
        jQuery('#per-year-btn').removeClass('selected-fee');
        jQuery('#per-year-btn').html(Drupal.t('Select this fee'));
        jQuery('#per-year-btn').removeAttr('disabled');
      }
    });
}

var done_behaviors = false;
var done_errors = false;
Drupal.behaviors.bicingForms = {
  attach: function (context, settings) {
    if(jQuery('.reset-password-form, .bicing-change-password-form').length) {
        jQuery('#edit-password-confirm, #edit-password').change(function(){
            comprovarPasswords();
        });

        jQuery('#edit-e-mail, #edit-e-mail-confirm').change(function(){
            comprovarEmails();
        });
    }

    if (jQuery('.alta-form').length) {
      enableForm();
      if (jQuery('div[role="contentinfo"]').length && !done_errors) {
        done_behaviors = false;
        done_errors = true;
      }

        jQuery('#edit-password-confirm, #edit-password').change(function(){
            comprovarPasswords();
        });

        jQuery('#edit-e-mail, #edit-e-mail-confirm').change(function(){
            comprovarEmails();
        });


        if (jQuery('[data-valid-promo]').length) {
          var $elem = jQuery('[data-valid-promo]');
          var $receiver = jQuery('.error-msg-promo');
          if ($elem.data('valid-promo') == 'TRUE') {
            var msg = Drupal.t('Valid code');
            msg += $elem.data('valid-message');
          } else {
            var msg = Drupal.t('Invalid code');
          }
            $receiver.html(msg);
        }

      if (!done_behaviors) {
        diffAdressToggle();
        feeCardButtonBehavior();
        done_behaviors = true;
         relocatePromo();
         jQuery(window).resize(function() {
            relocatePromo();
          });
      }

      jQuery.each(jQuery('#alta-form .form-checkbox'), function(key, value) {
        jQuery(value).parent().tabIndex = 0;
      });
      jQuery.each(jQuery('#alta-form .js-form-type-radio'), function(key, value) {
        jQuery(value).find('label')[0].tabIndex = 0;
      });
      jQuery('#edit-billing-address').focus(function(e) {
        var msg = Drupal.t('To speed up the shipping we recommend using an address from Zaragoza');
        var html = '<div class="errors shadow right-col">' + msg + '</div>';
        html += "<script>function fadeOut() { jQuery('.errors').fadeOut()};setTimeout(fadeOut, 3000);</script>";
        jQuery('#bill-address-tip').html(html);
    });
      if (jQuery('#alta-form iframe').length) {
        jQuery('.background-grey').css('background-color', '#fff');
        jQuery('.background-grey').css('border-top', '1px solid #ececec');
      }
    }
  }
};

function enableForm() {
  if (jQuery('input[name="product"]:checked').length > 0) {
    jQuery('#register-inputs input').prop('disabled', false);
    jQuery('#register-inputs select').prop('disabled', false);
    jQuery('#register-inputs').removeClass('disabled');
  } else {
    jQuery('#register-inputs input').prop('disabled', true);
    jQuery('#register-inputs select').prop('disabled', true);
    jQuery('#register-inputs').addClass('disabled');
  }
}

function addAjaxCall(el) {
  var height = jQuery(el).css('height');
  el.addClass('loading content-loading').html('').css('height', height);
  var capa = jQuery('<div>').addClass('loading-capa');
  var img_src = 'http://prebicing.drautadev.com//themes/bicing/assets/images/Spinner.png';
  var i = jQuery('<img>').attr('src',img_src).appendTo(capa);
  capa.appendTo(el);
  // var i = jQuery('<img>').attr('src', 'http://www.mytreedb.com/uploads/mytreedb/loader/ajax_loader_red_64.gif');
}

(function($) {
  Drupal.behaviors.btnTarifa = {
    attach: function (context) {
      $('[data-product]', context).click(function(event) {
        const target = $(event.target);

        target.parent().addClass('selected-fee');
        target.addClass('selected-fee')
        target.attr('disabled', true);
        target.html(Drupal.t('Selected Fee'));

        addAjaxCall(jQuery('#edit-promo .tarifa-overlay.card-tarifa') );

        $("[data-drupal-selector='edit-product-" + target.attr('data-product-id').replace('_', '-') + "']", context).prop('checked', true).change();

        const other = $('[data-product]', context).not(target);
        other.parent().removeClass('selected-fee');
        other.removeClass('selected-fee');
        other.removeAttr('disabled');
        other.html(Drupal.t('Select this fee'));
      });
    },
  };
})(jQuery, Drupal);
