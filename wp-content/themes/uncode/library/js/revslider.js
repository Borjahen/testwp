(function($) {
	"use strict";

	UNCODE.revslider = function() {
	var revSliderIn = function(){
		$('rs-module').each(function(){
			var $slider = $(this);

			$slider.on('revolution.slide.onloaded', function(e, data){
				if ( $(e.currentTarget).closest(".header-revslider").length ) {
					var style = $(e.currentTarget).find("rs-slide").eq(0).attr("data-skin"),
						scrolltop = $(document).scrollTop();
					if ( style != undefined ) {
						UNCODE.switchColorsMenu(scrolltop, style);
					}
				}
			});

			$slider.on('revolution.slide.onchange', function(e, data){
				if ( $(e.currentTarget).closest(".header-revslider").length ) {
					var style = $(e.currentTarget).find("rs-slide").eq(data.slideIndex - 1).attr("data-skin"),
						scrolltop = $(document).scrollTop();
					if ( style != undefined ) {
						UNCODE.switchColorsMenu(scrolltop, style);
					}
				}
			});

		});
	};
	revSliderIn();
	$(window).on("load", revSliderIn );
};

})(jQuery);
