<?php
require 'config.php';

if (isset($_SESSION['user_email'])) {
    header("Location: dashboard.php");
    exit();
}

$login_url = $client->createAuthUrl();
?>

<h2>Login Page</h2>

<a href="<?= $login_url ?>">
    <button>Login with Google</button>
</a>
