<?php
session_start();
require 'config/db.php';

// protect page
if(!isset($_SESSION['user'])){
    header("Location: login.html");
    exit();
}

// when form submitted
if(isset($_POST['newemail'])){

$oldemail=$_SESSION['user'];
$newemail=$_POST['newemail'];
$name=$_POST['name'];
$password=$_POST['password'];

$updateData=[];

if(!empty($newemail)) $updateData['email']=$newemail;
if(!empty($name)) $updateData['name']=$name;
if(!empty($password)) $updateData['password']=$password;

$users->updateOne(
    ['email'=>$oldemail],
    ['$set'=>$updateData]
);

// update session email if changed
if(!empty($newemail)){
    $_SESSION['user']=$newemail;
}

echo "<p>Profile updated</p>";
}
?>

<h2>Update Profile</h2>

<form method="post">
New Email:
<input type="email" name="newemail"><br>

New Name:
<input type="text" name="name"><br>

New Password:
<input type="password" name="password"><br>

<button type="submit">Update</button>
</form>

<a href="dashboard.php">Back</a>