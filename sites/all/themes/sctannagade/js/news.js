$(document).ready( function()  {
	var news_elements = $('.views-field-field-news-description-value');
   	news_elements.hide();
	news_elements.each(function(index) { 
		var news = $(this);
		var link = $('<a class="read-more-link" onClick="return false;" href="#">Læs mere</a>');
		news.parent().append(link);
		link.toggle( function() {
			news.slideDown( function () {
				link.html('Luk');
			});
		},
		function () {
		    news.slideUp( function () {
			    link.html('Læs mere');
		    });
		});
	});
});