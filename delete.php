<?php
session_start();
require 'config/db.php';

// protect page
if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit();
}

// when delete confirmed
if(isset($_POST['delete'])){

$email=$_SESSION['user'];

$users->deleteOne(['email'=>$email]);

session_destroy();

echo "<p>Account deleted successfully</p>";
echo "<a href='login.html'>Go to Login</a>";
exit();
}
?>

<h2>Delete Account</h2>
<p>Are you sure you want to delete your account?</p>

<form method="post">
<button type="submit" name="delete">Yes Delete</button>
</form>

<a href="dashboard.php">Cancel</a>