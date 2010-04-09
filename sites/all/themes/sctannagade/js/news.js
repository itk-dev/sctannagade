if (jQuery.url.segment(0) == 'nyheder') {
  $(document).ready( function()  {
    var news_elements = $('.views-field-field-news-description-value');
    var nid = jQuery.url.segment(2);
    news_elements.hide();
    news_elements.each(function(index) { 
      var news = $(this);
      var link = $('<a class="read-more-link" onClick="return false;" href="#">Læs mere</a>');
        news.parent().append(link);
	link.toggle(function() {
	  news.slideDown(function () {
	    link.html('Luk');
	  });
	},
	function () {
          news.slideUp(function () {
	    link.html('Læs mere');
          });
	});

	// Should we toggle news?
	if (nid) {
	  var field = news.siblings('.views-field-nid');	  
	  if ($('.field-content', field).html() == nid) {
	    link.click();
	  }
        }
    });
  });
}
