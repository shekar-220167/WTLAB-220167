<?php
require __DIR__ . '/../vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$db = $mongoClient->shekardb;
$users = $db->login;     
?>
