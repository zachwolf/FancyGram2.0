<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/process/shorten.php";
include_once($path);

$themeId 			= $_POST['messageTheme'];
$message 			= $_POST['fancyMessage'];
$type	 			= $_POST['type'];

$safeMessage		= htmlspecialchars($message);

$longUrl 			= "http://" . $_SERVER['HTTP_HOST'] . "/?t=" . $themeId . "&message=". $safeMessage;

if(isset($message) && $message != "") {

	$shortUrl 			= bitly_shorten($longUrl);
	$formData[url] 		= $shortUrl;
	$formData[status] 	= "success";

} else {

	$formData[status] 	= "failure";
	$formData[message] 	= "A please enter a message.";

}

$json 				= json_encode($formData);

if(isset($type) && $type == "ajax") {
	echo $json;
} else {
	return $json;
}