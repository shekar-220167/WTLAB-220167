<?php
session_start();
require 'config.php';

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $google_service = new Google_Service_Oauth2($client);
    $data = $google_service->userinfo->get();

    $_SESSION['name'] = $data->name;
    $_SESSION['user'] = $data->email;
    $_SESSION['user_image'] = $data->picture;

    header("Location: dashboard.php");
    exit();
}
?>
