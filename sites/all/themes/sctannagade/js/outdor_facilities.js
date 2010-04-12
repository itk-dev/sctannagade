$(document).ready( function() {
  var tab_menu = $('#content-inner .item-list'); 
  var tabs = $('li', tab_menu);

  function sctannagade_outdor_facilities_tab(target, current) {
    // Add/remove active class
    var item = tab_menu.data('active');
    item.removeClass('active');
    $('a', item).removeClass('active');
    // Add to current
    tab_menu.data('active', current);
    current.addClass('active');
    $('a', current).addClass('active');
 
    // Change tab content
    tab_menu.data('displayed').hide();
    tab_menu.data('displayed', target);    
    target.show();
  }

  // Save current state
  tab_menu.data('displayed', $('#description'));
  tab_menu.data('active', $('.description'));

  // The display stuff
  tabs.each(function(index) { 
    var item = $(this);
    if (item.hasClass('description')) {
	item.click( function() {  	  
	  target = $('#description');
	  sctannagade_outdor_facilities_tab(target, $(this));
          return false;
	});
    }
    if (item.hasClass('pictures')) {
        item.click( function() {
	  target = $('.content-pictures');
	  sctannagade_outdor_facilities_tab(target, $(this));
	  return false;
        });
    }
    if (item.hasClass('other')) {
	item.click( function() {
	  target = $('#other');
	  sctannagade_outdor_facilities_tab(target, $(this));
	  return false;
	});
    }
    if (item.hasClass('email')) {
       //item.click( function() { return false; });
    }
  });
  
  // Fix pictures
  var displayed_picture = $('.field-field-outdor-pictures');
  var first = $('.imagecache-udendors_faciliteter:first');
  first.show();
  displayed_picture.data('show', first);

  var thumbs = $('.imagecache-udendors_faciliteter_thumb');
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
