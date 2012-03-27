(function() {
	var $body = $('body'),
		$form = $('form[name=makeMessage]');

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
					console.log(data.message);
				} else {													// if there were no errors processing the form

					var $genUrl	= $body.find('#genUrl');

					if($genUrl.length == 0) {								// if the element isn't there, add it boiiii
						$genUrl = $('<input />',
							{	
								type: 	"text",
								id: 	"genUrl"
							})
							.appendTo($body.find('#yourUrl'));
					}

					$genUrl.val(data.url);
				}
			},
			error: function(data){											// if something went wrong,
				alert("This form seems to be malfunctioning. :(");			// then let them know about it
			}
		})
		.done(function(){
			$subBtn
				.removeAttr("disabled");
		});
	});
})(jQuery);