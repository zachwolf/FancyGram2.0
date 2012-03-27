<?php
	if(isset($_POST['hasSent'])):
		$_POST['hasSent'];

		$path 	= $_SERVER['DOCUMENT_ROOT'];
		$path  .= "/process/make-it-fancy.php";

		$url 	= include_once($path);
		$json 	= json_decode($url, true);

		$status = $json[status];
		$url 	= $json[url];
	endif;
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Fancy Gram | Say it with some emphasis, say it Fancy.</title>
	
	<link href="" type="image/x-icon" rel="shortcut icon" />
	
	<meta name="author" content="Bryan Frank, hello@bryanfrank.com, Zach Wolf, hello@zachwolf.com">
	<!-- <meta name="description" content=""> -->
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;">
	<!-- <meta name="google-site-verification" content="" /> -->
	<meta name="keywords" content="boom boom boom, can I get a wayhoo?!" />

	<!-- <rel="apple-touch-icon" href="images/template/engage.png"/> -->

	<link rel="stylesheet" type="text/css" href="/styles/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="/styles/css/media.css" />	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

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
	<?php
	if(isset($status) && $status == "success"): ?>
		<input type="text" name="" placeholder="" value="<?=$url?>" /> 
	<?php 
	endif; ?>
	<form method="POST" action="/" name="makeMessage">
		<input type="hidden" name="hasSent" value="false">
		<textarea name="fancyMessage" placeholder="message"></textarea>
		<fieldset>
			<input type="radio" name="messageTheme" value="1" checked>
			<label>Option 1</label>
			<input type="radio" name="messageTheme" value="2">
			<label>Option 2</label>
			<input type="radio" name="messageTheme" value="3"> 
			<label>Option 3</label>
		</fieldset>
		<input type="submit" value="Fancify!">
	</form>
	<?php
	if(isset($status) && $status == "failure"):
		echo "please enter a message";
	endif;
	?>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>