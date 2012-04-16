<?php


	include('themes.php');	

	$theme 		= $themes[$_GET['t']];
	$message 	= $_GET['m'];

	$dir		= '../theme/' . $theme . '/';

	if(is_dir($dir)) {
		ob_start();
		include($dir . 'content.php');
		$content = ob_get_clean();
	}

	if(!isset($message) || $message == "") {
		header('Location: ../error/no-message.php');
	} else if(!isset($theme) || $theme == "") {
		header('Location: ../error/no-theme.php?m=' . $message);
	}


?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?=$message?> | Fancy Gram | Say it with some emphasis, say it Fancy.</title>
	
	<link href="" type="image/x-icon" rel="shortcut icon" />
	
	<meta name="author" content="Bryan Frank, hello@bryanfrank.com, Zach Wolf, hello@zachwolf.com">
	<!-- <meta name="description" content=""> -->
	<meta name="viewport" content="initial-scale=1; maximum-scale=1; minimum-scale=1;">
	<!-- <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;"> -->
	<!-- <meta name="google-site-verification" content="" /> -->
	<meta name="keywords" content="boom boom boom, can I get a wayhoo?!" />

	<!-- <link rel="stylesheet" type="text/css" href="/styles/css/styles.css" /> -->
	<link rel="stylesheet" type="text/css" href="/theme/<?=$theme?>/style.css" />
	<!-- <link rel="stylesheet" type="text/css" href="/styles/css/media.css" />	 -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/app.js"></script>

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-30310931-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<body>
	<?=$content?>
</body>
</html>