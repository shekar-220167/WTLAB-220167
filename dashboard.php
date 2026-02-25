<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}
?>

<h2>Welcome <?= $_SESSION['name']; ?></h2>

<a href="logout.php"><button>Logout</button></a>