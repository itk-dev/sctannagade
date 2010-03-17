$(document).ready( function() {
  var tab_menu = $('#content-inner .item-list'); 
  var tabs = $('li', tab_menu);
  
  function sctannagade_faste_bruger_tab(target) {
    tab_menu.data('displayed').hide();
    tab_menu.data('displayed', target);
    target.show();
  }

  // Save current state
  tab_menu.data('displayed', $('#description'));

  // The display stuff
  tabs.each(function(index) { 
    var item = $(this);
    if (item.hasClass('description')) {
	item.click( function() {  	  
	  target = $('#description');
	  sctannagade_faste_bruger_tab(target);
          return false;
	});
    }
    if (item.hasClass('pictures')) {
        item.click( function() {
	  target = $('.content-pictures');
	  sctannagade_faste_bruger_tab(target);
	  return false;
        });
    }
    if (item.hasClass('overview')) {
	item.click( function() {
	  target = $('#overview');
	  sctannagade_faste_bruger_tab(target);
	  return false;
	});
    }
    if (item.hasClass('other')) {
	item.click( function() {
	  target = $('#other');
	  sctannagade_faste_bruger_tab(target);
	  return false;
	});
    }
    if (item.hasClass('email')) {
       //item.click( function() { return false; });
    }
  });
  
  // Fix pictures
  var displayed_picture = $('.field-field-lokale-pictures');
  var first = $('.imagecache-lej-lokaler:first');
  first.show();
  displayed_picture.data('show', first);

  var thumbs = $('.imagecache-lej-lokaler-thumb');
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
