<?php
session_start();
require 'config/db.php';

$message = "";
$success = false;

// protect page
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

// handle form submission (from index.php or this page)
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldemail=$_SESSION['user'];
    $newemail=isset($_POST['newemail']) ? $_POST['newemail'] : (isset($_POST['email']) ? $_POST['email'] : '');
    $name=isset($_POST['name']) ? $_POST['name'] : '';
    $password=isset($_POST['password']) ? $_POST['password'] : '';

    $updateData=[];

    if(!empty($newemail)) $updateData['email']=$newemail;
    if(!empty($name)) $updateData['name']=$name;
    if(!empty($password)) $updateData['password']=$password;

    if(!empty($updateData)){
        $users->updateOne(
            ['email'=>$oldemail],
            ['$set'=>$updateData]
        );

        if(!empty($newemail)){
            $_SESSION['user']=$newemail;
        }
        if(!empty($name)){
            $_SESSION['name']=$name;
        }
        $message = "Profile updated successfully!";
        $success = true;
    } else {
        $message = "No fields were filled to update.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styler.css">
    <style>
        .page-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="formal glass" style="width: 100%; max-width: 450px;">
            <h2 style="color: var(--accent); text-align: center; margin-top: 0;">Update Profile</h2>
            
            <?php if($message): ?>
                <div style="background: <?php echo $success ? 'rgba(16, 185, 129, 0.2)' : 'rgba(239, 68, 68, 0.2)'; ?>; color: <?php echo $success ? '#6ee7b7' : '#fca5a5'; ?>; padding: 12px; border-radius: 8px; margin-bottom: 20px; text-align: center; border: 1px solid <?php echo $success ? 'rgba(16, 185, 129, 0.3)' : 'rgba(239, 68, 68, 0.3)'; ?>;">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <input type="email" name="newemail" placeholder="New Email Address (Optional)">
                <input type="text" name="name" placeholder="New Name (Optional)">
                <input type="password" name="password" placeholder="New Password (Optional)">
                
                <button type="submit" style="width: 100%; margin-top: 10px;">Update Details</button>
            </form>
            
            <div style="text-align: center; margin-top: 25px;">
                <a href="dashboard.php" style="color: var(--text-muted); text-decoration: none; font-size: 15px;">← Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
