<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: index.php");
    exit();
}
?>

<h2>Welcome <?= $_SESSION['user_name']; ?></h2>
<p>Email: <?= $_SESSION['user_email']; ?></p>
<img src="<?= $_SESSION['user_image']; ?>" width="100"><br><br>

<a href="logout.php">
    <button>Logout</button>
</a>
