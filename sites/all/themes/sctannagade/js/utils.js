$(document).ready(function() {
  if (jQuery.url.segment(0) == 'kontakt' || jQuery.url.segment(0) == 'contact') {
    // Contact form fading out contact mail
    sctannagade_toggle_field($('#contact-mail-page #edit-name'), 'Skrive dit fulde navn');

    // Contact form fading out e-mail
    sctannagade_toggle_field($('#contact-mail-page #edit-mail'), 'Skrive din e-mail adresse');
  }

  // Fix search field
  sctannagade_toggle_field($('#search-block-form #edit-search-block-form-1'), 'Søgetekst...');
});

function sctannagade_toggle_field(field, value) {
  field.val(value);
  field.addClass('fadeText');
  field.focus(function() {
    if ($(this).val() == value) {
      $(this).val('');
      $(this).removeClass('fadeText');
    }
  });
  field.blur(function() {
    if ($(this).val() == '') {
      $(this).val(value);
      $(this).addClass('fadeText');
    }
  });
}


