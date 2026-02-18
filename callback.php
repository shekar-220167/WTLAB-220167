<?php
require 'config.php';

if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $google_service = new Google_Service_Oauth2($client);
    $data = $google_service->userinfo->get();

    $_SESSION['user_name'] = $data->name;
    $_SESSION['user_email'] = $data->email;
    $_SESSION['user_image'] = $data->picture;

    header("Location: dashboard.php");
    exit();
}
?>
