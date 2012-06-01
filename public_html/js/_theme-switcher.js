(function() {

	var $body 		= 	$('body'),
		$headline 	= 	$("#themes"),
		$thumbs		= 	$('.thumbs');

	$headline
		.append('<ul class="theme-sorting-options"><li><a href="#slides" id="slides-view" class="sys-btn icon-btn fast-btn active">slides</a></li><li><a href="#grid" id="grid-view" class="sys-btn icon-btn fast-btn">grid</a></li></ul>');

	var $sorting 	= 	$('.theme-sorting-options'),
		$active		= 	$sorting.find(".active"),
		$bttns		= 	$sorting.find(".sys-btn");
		



	$.each($bttns, function( k, $val ){
		var target 	= document.getElementById($val.id),
			$target = $('#'+$val.id);

		new MBP.fastButton(target, function() {
			sortSlides($target);
		});
	});




	sortSlides($active);

	if($('html').hasClass("no-touch") == true) {
		$bttns.on("click", function(e){
			var $this 	=	$(this);
			

			e.preventDefault();

			if($this.attr("id") == $active.attr("id")) return;

			sortSlides($this);
		});
	}	

	function sortSlides($target) {

		$bttns.removeClass("active");
		$target.addClass("active");
		$active		= 	$target,
		$target		= 	$target.attr("id");
		console.log($target);
	}
	
})(jQuery);