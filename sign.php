<?php
require 'config/db.php';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

if(empty($name)||empty($email)||empty($password)){
    echo "All fields required";
    exit();
}

if(strlen($password)<6){
    echo "Password must be 6 chars";
    exit();
}

$existing=$users->findOne(['email'=>$email]);

if($existing){
    echo "Duplicate user";
}else{
    $users->insertOne([
        'name'=>$name,
        'email'=>$email,
        'password'=>$password
    ]);
    echo "Signup success";
}

}else{
    echo "Please submit signup form";
}
?>