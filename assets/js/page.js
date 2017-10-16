var Page = {

	init: function () {

		console.log("Page.init");

		this.bindEvents();

		if ( $("#single_book_wrapper").length ) {
			Product.init();
		} else {
			// ARCHIVE PAGE
			this.imagesResize();
		}

	},

	bindEvents: function () {

		console.log("Page.bindEvents");

		var self = this;

		$(window).on( "resize", _.throttle( function(){

			self.imagesResize();

		}, 1000 ));

	},

	imageSize: function ( img ) {

		console.log("Page.imageSize");

		// GET IMG WIDTH
		var imgW = img.width(),
			url;

		// IF IMG === PORTRAIT
		if ( img.hasClass("portrait") ) {
			
			imgW = img.height();

			// console.log( 44, imgW );
			if ( imgW > 300 && imgW <= 600 ) {
				url = img.data("med"); // MEDIUM
			} else if ( imgW > 600 && imgW <= 768 ) {
				url = img.data("mdl"); // MEDIUM LARGE
			} else if ( imgW > 768 && imgW <= 900 ) {
				url = img.data("lrg"); // LARGE
			} else if ( imgW > 900 && imgW <= 1200 ) {
				url = img.data("xlg"); // EXTRA LARGE
			} else {
				url = img.data("fll"); // FULL
			}
			
		} else {
			// ELSE LANDSCAPE

			console.log( 61, imgW );
			if ( imgW <= 300 ) {
				url = img.data("thm"); // THUMB
			} else if ( imgW > 300 && imgW <= 600 ) {
				url = img.data("med"); // MEDIUM
				console.log( 66, img );
			} else if ( imgW > 600 && imgW <= 768 ) {
				url = img.data("mdl"); // MEDIUM LARGE
			} else if ( imgW > 768 && imgW <= 900 ) {
				url = img.data("lrg"); // LARGE
			} else if ( imgW > 900 && imgW <= 1200 ) {
				url = img.data("xlg"); // EXTRA LARGE
			} else {
				url = img.data("fll"); // FULL
			} 
		}

		// console.log( 80, url, img.attr("src") );

		// IF NEWSRC NOT SAME AS CURRENT SRC
		if ( url !== img.attr("src") ) {
			img.attr( "src", url );
			console.log( 79, "Src changed." );				
		}

	}, 

	imagesResize: function () {

		console.log("Product.imagesInit");

		var self = this;

		// LOOP THROUGH IMAGES
		$(".visible").each( function(){

			self.imageSize( $(this) );			

		});

	},

}

$(document).on("ready", function(){

	Page.init();

});