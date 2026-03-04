<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1063004263049-5c2doc7qo1f3m25lh06lbu8n091utlav.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/project/callback.php');

$client->addScope("email");
$client->addScope("profile");
?>
