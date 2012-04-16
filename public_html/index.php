<?php
	if(!isset($_GET[message])) {
		require 'views/home.php';
	} else {
		// header('Location: views/message.php?t=' . $_GET[t] . '&m=' . $_GET[message]);
		header('Location: message/?t=' . $_GET[t] . '&m=' . $_GET[message]);
		// var_dump($_GET);
		exit;
	}