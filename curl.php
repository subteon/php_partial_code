<?php

// $std_html = file_get_contents('http://example.com/index.html');

// ----->>

$url = "http://example.com/index.html";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$std_html = curl_exec($ch);
curl_close($ch);

echo($std_html);

?>
