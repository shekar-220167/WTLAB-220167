<?php
require 'config/db.php';
require 'config.php'; // For Google API Client
session_start();

$error_msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $users->findOne([
            'email' => $email,
            'password' => $password
        ]);

        if($user){
            $_SESSION['user'] = $user['email'];
            $_SESSION['name'] = $user['name'] ?? 'User';
            header("Location: dashboard.php");
            exit();
        } else {
            $error_msg = "Invalid email or password.";
        }
    } else {
        $error_msg = "Please fill in all fields.";
    }
}

// Generate Google Auth URL
$google_login_url = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styler.css">
    <style>
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="split-login glass">
        <div class="split-left"></div>
        <div class="split-right">
            <h2 style="margin-top:0; font-size: 28px; color: var(--text);">Student Login</h2>
            <p style="color: var(--text-muted); margin-bottom: 30px;">Sign in to access your student portal.</p>

            <?php if($error_msg): ?>
                <div style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; padding: 10px; border-radius: 8px; margin-bottom: 20px; border: 1px solid rgba(239, 68, 68, 0.3);">
                    <?php echo htmlspecialchars($error_msg); ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <input type="email" name="email" placeholder="Enter Email Address" required>
                <input type="password" name="password" placeholder="Enter Password" required>

                <button type="submit" style="width: 100%; margin-top: 10px;">Login</button>
            </form>

            <div style="margin: 25px 0; display: flex; align-items: center; justify-content: center;">
                <div style="flex:1; height: 1px; background: var(--border);"></div>
                <div style="padding: 0 15px; color: var(--text-muted); font-size: 14px;">OR</div>
                <div style="flex:1; height: 1px; background: var(--border);"></div>
            </div>

            <a href="<?php echo filter_var($google_login_url, FILTER_SANITIZE_URL); ?>" class="btn google-btn">
                <svg viewBox="0 0 48 48" width="24px" height="24px">
                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                </svg>
                Sign in with Google
            </a>

            <!-- CREATE ACCOUNT MESSAGE -->
            <p style="margin-top: 30px; font-size: 15px; color: var(--text-muted); text-align: center;">
                Don't have an account? 
                <a href="sign.html" style="color: var(--accent); text-decoration: none; font-weight: 600;">Create one</a>
            </p>

            <p style="margin-top: 20px; text-align: center;">
                <a href="index.php" style="color: var(--text-muted); text-decoration: none; font-size: 14px; transition: color 0.3s;">← Back to Home</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
