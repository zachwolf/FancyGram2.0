<?php

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/process/shorten.php";
include_once($path);

$themeId 			= $_POST['messageTheme'];
$message 			= $_POST['fancyMessage'];
$type	 			= $_POST['type'];

$safeMessage		= htmlspecialchars($message);

// $newtext			= str_replace("&", "AMP",htmlspecialchars(json_encode($message)));
$newtext			= fullescape(nl2br($message));

function fullescape($in) 
{ 
  $out = ''; 
  for ($i=0;$i<strlen($in);$i++) 
  { 
    $hex = dechex(ord($in[$i])); 
    if ($hex=='') 
       $out = $out.urlencode($in[$i]); 
    else 
       $out = $out .'%'.((strlen($hex)==1) ? ('0'.strtoupper($hex)):(strtoupper($hex))); 
  } 
  $out = str_replace('+','%20',$out); 
  $out = str_replace('_','%5F',$out); 
  $out = str_replace('.','%2E',$out); 
  $out = str_replace('-','%2D',$out); 
  return $out; 
 } 

$longUrl 			= "http://" . $_SERVER['HTTP_HOST'] . "/?t=" . $themeId . "&message=". $newtext;

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