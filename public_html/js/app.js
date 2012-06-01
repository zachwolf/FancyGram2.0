(function() {
	jQuery.easing.def = 'easeInOutElastic';

	$('.no-js').removeClass("no-js");

	var $body 	= 	$('body'),
		$form 	= 	$('form[name=makeMessage]');

	$form.on("submit", function(e){

		var $this 		= $(this),
			$message 	= $this.find('textarea[name=fancyMessage]'),
			$messageVal	= $message.val(),
			$tempate	= $this.find('input[name=messageTheme]:checked'),
			$tempateVal	= $tempate.val(),
			$subBtn		= $this.find('input[type=submit]');

		e.preventDefault();

		$subBtn
			.attr("disabled", "disabled");

		$.ajax({															// send contact form data
			type: "POST", 													// post the info
			url: "/process/make-it-fancy.php",								// URL for the file
			data: { "fancyMessage": $messageVal,
					"messageTheme": $tempateVal,
					"type": 		"ajax"
					},
			cache: false,													// i don't really know what this does...
			dataType: "json",
			success: function(data){										// if the file opened and returned info correctly,
				if( data.status == "failure") {								// if there was an error processing the form
					alert(data.message);
				} else {													// if there were no errors processing the form
					var $genUrl	= $body.find('#genUrl');					// find the element where the URL will go

					if($genUrl.length == 0) {								// if the element isn't there, add it boiiii
						$genUrl = $('<input />',
							{	
								type: 	"text",
								id: 	"genUrl"
							})
							.appendTo($body.find('#yourUrl'));
					}

					$genUrl.val(data.url);
					$.scrollTo(0, 500);
					$('.container').animate({
						marginTop: 300
					},{ 
						duration: 500,
						easing: 'easeInOutElastic',
						complete: function(){
							console.log($genUrl.val());
							$genUrl.caret(0,$genUrl.val().length);
						}
					});
				}
			},
			error: function(data){											// if something went wrong,
				console.log(data);
				alert("This form seems to be malfunctioning. :(");			// then let them know about it
			}
		})
		.done(function(){
			$subBtn
				.removeAttr("disabled");
		});
	});

	$.each($(".faux-radio"), function( k, v ) {
		var $this 	= 	$(this);
			$rdio 	= 	$this
							.siblings("input[type=radio]");

		$this
			.on("click", function(e){
				e.preventDefault();
				switchRadio($this);
			});

	});

	function switchRadio($target) {
		if($target.hasClass("selected")) return;
		$('.selected')
			.removeClass("selected");

		console.log($target);
		if($target.find(".faux-radio").length != 0) {
			$target = $target.find(".faux-radio");
		}
		$target
			.addClass("selected")
			.siblings("input[type=radio]")
			.attr("checked", "checked");

		console.log($target);
	}

	if($("html").hasClass("touch")){

		var $idsArr 		= [],
			$idIndex		= 1;

		$.each($('.fast-btn'), function( k, v ){
			 var $this 		= 	$(this);

			 uniquifyIDs($this);
		});

		$.each($idsArr, function( k, $val ){
			var target 	= document.getElementById($val),
				$target = $('#'+$val);

			if($target.find(".faux-radio").length >= 1) {
				new MBP.fastButton(target, function() {
					switchRadio($target);
				});
			}
		});

		function uniquifyIDs($target){
			var $this 	=	$target,
				$id 	= 	$target.attr("id");

			if($id == undefined) {
				var $newID = "new-id-" + $idIndex;
				$this.attr("id", $newID);
				$idsArr.push($newID);
				$idIndex++;
			} else {
				if($.inArray($id, $idsArr) == -1) {
					$idsArr.push($id);
				} else {
					$this.attr("id", $id + "-1");
					$idsArr.push($this.attr("id"));
				}
			}
		}	
	}
		
})(jQuery);