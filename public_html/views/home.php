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

	include('themes.php');

	$ads_array = array(
		'Hi, I think you\'re great.',
		'You smell great today.',
		'Bawitdaba dabang dabang',
		'If you wanna be my lover, you gotta get with my friends.',
		'Yeah, buddy!'
	);

	$ad = $ads_array[array_rand($ads_array)];

?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">

	<title>FancyGram | Say it with some emphasis, say it Fancy.</title>
	
	<link href="" type="image/x-icon" rel="shortcut icon" />
	
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/h/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/m/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="img/l/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="img/l/apple-touch-icon.png">


	<meta name="author" content="Bryan Frank, hello@bryanfrank.com, Zach Wolf, hello@zachwolf.com">
	<!-- <meta name="description" content=""> -->
	<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;">
	<!-- <meta name="google-site-verification" content="" /> -->
	<meta name="keywords" content="boom boom boom, can I get a wayhoo?!" />
	<meta http-equiv="cleartype" content="on">

	<!-- <rel="apple-touch-icon" href="images/template/engage.png"/> -->

	<link rel="stylesheet" type="text/css" href="/styles/css/app.css" />
	<!-- <link rel="stylesheet" type="text/css" href="/styles/css/media.css" />	 -->

	<script src="/js/libs/modernizr-2.5.3.min.js"></script>
</head>
<!--[if lt IE 7]> <body class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <body class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <body class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <body> <!--<![endif]-->
	<div id="yourUrl" class="sexy-shadow">
		<?php
		if(isset($status) && $status == "success"): ?>
			<input type="text" name="" placeholder="" value="<?=$url?>" /> 
		<?php 
		endif; ?>
	</div>
	<div class="container">
		<section class="body-wrap sexy-shadow">
			<a href="/" class="logo-accent">
				<h1 class="logo img-replacement">
					FancyGram
				</h1>
			</a>
			<div>
				<form method="POST" action="/" name="makeMessage">
					<fieldset>
						<div class="headline-wrap">
							<legend>Message:</legend>
						</div>
						<input type="hidden" name="hasSent" value="false">
						<div class="placeholder-wrap">
							<textarea name="fancyMessage" placeholder="<?=$ad?>" class="sexy-placeholder big-ol-textarea"></textarea>			
						</div>
					</fieldset>
					<fieldset>
						<div class="headline-wrap">
							<legend>Theme:</legend>
							<ul class="theme-sorting-options">
								<li>
									<a href="#slides" id="slides-view" class="sys-btn icon-btn fast-btn active">slides</a>
								</li>
								<li>
									<a href="#grid" id="grid-view" class="sys-btn icon-btn fast-btn">grid</a>
								</li>
							</ul>
						</div>
						<ul class="thumbs">
						<?php 
						$x = 0;
						foreach($themes as $theme): 
						?>
							<li class="thumb-wrap">
								<input type="radio" class="hidden-radio" name="messageTheme" value="<?=$x?>" <?php if($x==0){ echo "checked"; } ?>>
								<label for="<?=$x?>" class="visuallyhidden">Option 1</label>
								<a href="#" class="fast-btn">
									<img src="/img/placeholder.png" alt="<?$theme?> ThumbNail" class="faux-radio<?php if($x==0){ echo " selected"; } ?>"/>
								</a>
							</li>
						<?php 
						$x+=1;
						endforeach;
						?>
						</ul>
					</fieldset>
					<ul class="form-btns">
						<li>
							<a href="#preview" class="sys-btn fast-btn">Preview</a>
						</li>
						<li>
							<input type="submit" value="Fancify!" class="sys-btn fast-btn">
						</li>
					</ul>
				</form>
				<?php
				if(isset($status) && $status == "failure"): ?>
				<section class="reports">
					<h1>
						Please enter a message.
					</h1>
				</section>
				<?php
				endif;
				?>
			</div>
		</section>
		<section class="post-card sexy-shadow">
			<div class="side">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sapien velit, facilisis sed fringilla eu, scelerisque quis arcu. Vestibulum condimentum nisi non lacus imperdiet placerat. Cras eu congue odio. Nulla elementum metus eu augue rutrum vestibulum. 
				</p>
			</div>
			<div class="side">
				<ul>
					<li>
						<h1>
							Follow us on twitter:
						</h1>
						<h2>
							<a href="#">@fancygram</a>
						</h2>
					</li>
					<li>
						<h1>
							Or email us:
						</h1>
						<h2>
							<a href="mailto:contact@fancygram.it">contact@fancygram.it</a>
						</h2>
					</li>
				</ul>
			</div>
		</section>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

	<script type="text/javascript" src="/js/app-ck.js"></script>
	<!-- <script id="grid" type="text/javascript" src="/js/qg.js?lineheight=27"></script>-->

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
</body>
</html>