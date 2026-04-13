<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();

$guzzleClient = new \GuzzleHttp\Client(['verify' => false]);
$client->setHttpClient($guzzleClient);

$client->setClientId('YOUR_GOOGLE_CLIENT_ID');
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');
$client->setRedirectUri('http://localhost/PROJECT/callback.php');

$client->addScope("email");
$client->addScope("profile");
?>
