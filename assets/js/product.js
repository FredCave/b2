var Product = {
	
	slideMidPoint: 0, 

	slideOffset: 0, 

	init: function () {

		console.log("Product.init");

		this.bindEvents();

		this.imagesInit();

		this.storeValues();

	},

	bindEvents: function () {

		console.log("Product.bindEvents");

		var self = this;

		$("#product_single_slideshow").on("mousemove", _.throttle( function(e) {

			var x = e.clientX - self.slideOffset;
			if ( x < self.slideMidPoint ) {
				console.log( x, self.slideMidPoint, "Show left arrow");
				$("#product_single_slideshow").css("cursor", "url('" + TEMPLATE + "/assets/img/cursor_right.png')" );
			} else {
				console.log( x, self.slideMidPoint, "url('" + TEMPLATE + "/assets/img/cursor_right.png')" );
				$("#product_single_slideshow").css("cursor", "url('" + TEMPLATE + "/assets/img/cursor_right.png')" );
			}

		}, 100 ));

		$("#product_single_slideshow").on("click", function(e){

			var x = e.clientX - self.slideOffset;
			if ( x < self.slideMidPoint ) {
				self.slideBack();
			} else {
				self.slideForward();				
			}

		});

		$("#single_book_wrapper .cart-customlocation").on("mouseover", function(){
			$(".view_shopping_cart").show();
		});

		$("#single_book_wrapper .cart-customlocation").on("mouseout", function(){
			$(".view_shopping_cart").hide();
		});

		$(window).on( "resize", _.throttle( function(){

			self.storeValues();

		}, 1000 ));

	},

	storeValues: function () {

		console.log("Product.storeValues");

		this.slideMidPoint = $("#product_single_slideshow").width() / 2;
		this.slideOffset = $("#product_single_slideshow").offset().left;

	},

	imagesInit: function () {

		console.log("Product.imagesInit");

		var firstLi = $("#product_single_slideshow li").first();

		Page.imageSize( firstLi.find("img") );

		firstLi.addClass("visible");

		// LOAD NEXT IMAGE
		Page.imageSize( $(".visible").next().find("img") );

	},

	slideForward: function () {

		console.log("Product.slideForward");

		// IF NEXT
		if ( $(".visible").next().length ) {
			$(".visible").removeClass("visible").next().addClass("visible");
			// LOAD NEXT IMAGE
			Page.imageSize( $(".visible").next().find("img") );
		} else {
			// BACK TO BEGINNING
			$(".visible").removeClass("visible");
			$("#product_single_slideshow li").first().addClass("visible");
		}

	},

	slideBack: function () {

		console.log("Product.slideBack");

		// IF PREVIOUS
		if ( $(".visible").prev().length ) {
			var prevImg = $(".visible").prev();
			// LOAD IMAGE
			Page.imageSize( prevImg.find("img") );			
			$(".visible").removeClass("visible").prev().addClass("visible");
		} else {
			// BACK TO END
			$(".visible").removeClass("visible");
			// LOAD IMAGE
			Page.imageSize( $("#product_single_slideshow li").last().find("img") );	
			$("#product_single_slideshow li").last().addClass("visible");
		}

	}



}