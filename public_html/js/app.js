(function() {
	var $body = $('body'),
		$form = $('form[name=makeMessage]');

	$form.on("submit", function(e){
		e.preventDefault();

		var $this 		= $(this),
			$message 	= $this.find('textarea[name=fancyMessage]'),
			$messageVal	= $message.val(),
			$tempate	= $this.find('input[name=messageTheme]:checked'),
			$tempateVal	= $tempate.val();

		$.ajax({																				// send contact form data
			type: "POST", 																		// post the info
			url: "/process/make-it-fancy.php",													// URL for the file
			data: { "fancyMessage": $messageVal,
					"messageTheme": $tempateVal,
					"type": "ajax"
					},
			cache: false,																		// i don't really know what this does...
			dataType: "json",
			success: function(data){															// if the file opened and returned info correctly,
				console.log("success");
				console.log(data);

			},
			error: function(data){																// if something went wrong,
				alert("My form seems to be malfunctioning. :( Try emailing me instead?");		// then let them know about it
				console.log(data);
			}
		});
	});
})(jQuery);