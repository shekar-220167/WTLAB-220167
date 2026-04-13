<?php
require 'config/db.php';
$message = "Please submit signup form";
$success = false;

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    if(empty($name)||empty($email)||empty($password)){
        $message = "All fields required";
    }
    else if(strlen($password)<6){
        $message = "Password must be 6 chars";
    }
    else {
        $existing=$users->findOne(['email'=>$email]);
        if($existing){
            $message = "Duplicate user";
        }else{
            $users->insertOne([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
            ]);
            $success = true;
            $message = "Signup success! You can now log in.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Result</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styler.css">
    <style>
        .result-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; }
    </style>
</head>
<body>
<div class="result-wrapper">
    <div class="result-card glass">
        <?php if($success): ?>
            <div style="font-size: 60px; margin-bottom:20px;">🎉</div>
            <h1 style="color: var(--success);"><?php echo htmlspecialchars($message); ?></h1>
            <a href="login.php" class="btn" style="margin-top: 20px;">Proceed to Login</a>
        <?php else: ?>
            <div style="font-size: 60px; margin-bottom:20px;">❌</div>
            <h1 style="color: var(--danger);"><?php echo htmlspecialchars($message); ?></h1>
            <a href="sign.html" class="btn" style="margin-top: 20px;">Try Again</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
