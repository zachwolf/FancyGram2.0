<?php

	if(!isset($_GET[message])) {
		@require 'views/home.php';
	} else {
		@require 'views/message.php';
	}