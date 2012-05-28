<?php
	if(!isset($_GET[message])) {
		require 'views/home.php';
	} else {
		header('Location: message/?t=' . $_GET['t'] . '&m=' . urlencode($_GET[message]));
		exit;
	}