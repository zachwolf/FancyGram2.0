/*! Author: Zach Wolf!

*/

(function(){

	var $logo 		= 	"http://zachwolf.com/quick-grid/logo.png",
		x 			= 	$('script#grid'),

		$src 		= 	x.attr("src"),

		$lineheight	=	11;

	if($src.split("?").length > 1) {
		var $query 		= 	$src.split('?')[1],
			properties 	= 	$query.split('&'),
			obj 		= 	{};

		properties.forEach(function(property) {
		    var tup = property.split('=');
		    obj[tup[0]] = tup[1];
		});

		$lineheight	= obj.lineheight;
	}

	if( window.devicePixelRatio >= 2 ){
        $logo 		= 	"http://zachwolf.com/quick-grid/logo@2x.png";
    }

	/*////////////////////////
	// BEGIN GRID FUNCTIONS //
	////////////////////////*/

	var $keysDown 		= 	[],
		$gridIsShown	= 	false,
		$grid 			= 	$('<div></div>', {
								class: 	"quick-grid",
								css: 	{
											position: 	"absolute",
											top: 		0,	left: 		0,
											right: 		0,	height: 	$(document).height(),
											background: "url('http://zachwolf.com/quick-grid/lines/" + $lineheight + ".png')",
											zIndex: 	1337
										}
							})
							.prependTo("body")
							.hide();

	if($('html').hasClass("touch") == true) {
		var $gridToggle 	=	$('<a></a>', {
									css: {
										position: 	"absolute",
										display: 	"block",
										top: 		0,	right: 		0,
										height: 	43,	width: 		44,
										background: "url('" + $logo + "') center bottom",
										"background-size": "100%",
										zIndex: 	1338
									}
								})
								.on("touchstart", function(){
									$(this).css("height", 45);
								})
								.on("touchend", function(){
									$(this).css("height", 43);
									toggleGrid();
								})
								.prependTo("body")
								.hide()
								.slideDown(1000);
	}

	$(window).on("keydown", function(e){
		if($.inArray(e.keyCode, $keysDown) == -1) {
			$keysDown.push(e.keyCode);
		}

		if($.inArray(91, $keysDown) != -1 && $.inArray(186, $keysDown) != -1) {
			toggleGrid();
		}
	});

	$(window).on("keyup", function(e){
		$keysDown = [];
	});

	function toggleGrid() {
		if($gridIsShown == false) {
			$grid.show();
			$gridIsShown = true;
		} else {
			$grid.hide();
			$gridIsShown = false;
		}
	}

	/*////////////////////////
	/// END GRID FUNCTIONS ///
	////////////////////////*/

})(jQuery);