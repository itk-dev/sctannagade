$(document).ready( function() {
  var tab_menu = $('#content-inner .item-list'); 
  var tabs = $('li', tab_menu);

  // Save current state
  tab_menu.data('displayed', 'description');

  // The display stuff
  tabs.each(function(index) { 
    var item = $(this);
    if (item.hasClass('description')) {
	item.click( function() {
	  if (tab_menu.data('displayed') != 'description') {
            $('.field-field-'+tab_menu.data('displayed')).hide();
          }
	  $('.field-field-description').show();
	  tab_menu.data('displayed', 'description');
          return false;
	});
    }
    if (item.hasClass('pictures')) {
        item.click( function() {
          if (tab_menu.data('displayed') != 'pictures') {
            $('.field-field-'+tab_menu.data('displayed')).hide();
          }
          $('.field-field-pictures').show();
          tab_menu.data('displayed', 'pictures');
	  return false;
        });
    }
    if (item.hasClass('email')) {
       item.click( function() { return false; });
    }
  });

  // Fix pictures
  var displayed_picture = $('.field-field-pictures');
  var first = $('.imagecache-faste_brugere_images:first');
  first.show();
  displayed_picture.data('show', first);

  var thumbs = $('.imagecache-faste_brugere_images_thumb');
  thumbs.show();
  thumbs.each(function(index) {
    var img = $(this);
    img.click(function() {
      var src = img.attr('src').substring(img.attr('src').lastIndexOf('/')+1);
    
      displayed_picture.data('show').hide();
      $("img[src*='"+src+"']:first").show();
      displayed_picture.data('show', $("img[src*='"+src+"']:first"));
    });
  });  
});
