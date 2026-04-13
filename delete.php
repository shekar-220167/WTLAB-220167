<?php
session_start();
require 'config/db.php';

// handle file delete
if(isset($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath = 'uploads/' . $fileName;
    if(file_exists($filePath)){
        unlink($filePath);
    }
    header("Location: index.php");
    exit();
}

// protect page for account delete
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

// when delete confirmed
if(isset($_POST['delete'])){
    $email=$_SESSION['user'];
    $users->deleteOne(['email'=>$email]);
    session_destroy();
    
    echo "<!DOCTYPE html><html lang='en'><head><link rel='stylesheet' href='styler.css'><link href='https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap' rel='stylesheet'><style>.result-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; }</style></head><body><div class='result-wrapper'><div class='result-card glass'><h1>Account deleted successfully</h1><a href='login.php' class='btn' style='margin-top:20px;'>Go to Login</a></div></div></body></html>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styler.css">
    <style>
        .page-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="result-card glass" style="max-width: 500px;">
            <div style="font-size: 60px; margin-bottom: 20px;">⚠️</div>
            <h2 style="color: var(--danger); margin-top: 0;">Delete Account</h2>
            <p style="color: var(--text-muted); margin-bottom: 30px;">Are you sure you want to permanently delete your account? This action cannot be undone.</p>
            
            <form method="post" style="display: flex; gap: 15px; justify-content: center;">
                <button type="submit" name="delete" style="background: var(--danger); box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);">Yes, Delete My Account</button>
                <a href="dashboard.php" class="btn" style="background: rgba(255,255,255,0.1); box-shadow: none;">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
