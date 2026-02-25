<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}
?>

<h2>Welcome <?= $_SESSION['name']; ?></h2>

<a href="update.php">Update Profile</a>
<a href="delete.php">Delete Account</a>
<a href="logout.php"><button>Logout</button></a>