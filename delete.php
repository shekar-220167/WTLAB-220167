<?php
    require 'config/db.php';

    $email=$_GET['email'];

    $users->deleteOne(['email'=>$email]);

    echo "User deleted";
?>