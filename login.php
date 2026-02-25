<?php
require 'config/db.php';
// require __DIR__ . '/vendor/autoload.php';
// require __DIR__ . '/config/db.php';
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

$email=$_POST['email'];
$password=$_POST['password'];

$user=$users->findOne([
    'email'=>$email,
    'password'=>$password
]);

if($user){
    $_SESSION['user']=$user['email'];
    $_SESSION['name']=$user['name'];
    header("Location: dashboard.php");
    exit();
}else{
    echo "Invalid login";
}

}else{
    echo "Please submit login form";
}
?>