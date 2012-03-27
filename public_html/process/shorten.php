<?php
function bitly_shorten($url)
{
    $query = array(
        "version" => "2.0.1",
        "longUrl" => $url,
        "login" => fancygram,
        "apiKey" => R_c5ec16791513df0d52d7b7f9c91e1019
    );
 
    $query = http_build_query($query);
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://api.bit.ly/shorten?".$query);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
    $response = curl_exec($ch);
    curl_close($ch);
 
    $response = json_decode($response);
 
    if($response->errorCode == 0 && $response->statusCode == "OK") {
        return $response->results->{$url}->shortUrl;
    } else {
        return null;
    }
}