(function($) {
	"use strict";
	$('.carousel').carousel({
		interval: 5000
	}).on('slide.bs.carousel', function(e) {
		var nextH = $(e.relatedTarget).outerHeight();
		$(this).find('.active.item').parent().animate({ height: nextH }, 500);
	});
})(jQuery);
