<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styler.css">
    <style>
        .dashboard-wrapper {
            min-height: 100vh;
            padding: 40px 20px;
        }
        .dashboard-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }
        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            border: 2px solid var(--accent);
        }
    </style>
</head>
<body>

<div class="dashboard-wrapper">
    <div class="dashboard-nav glass" style="padding: 20px 40px;">
        <h1 style="margin:0; font-size: 24px; color: var(--text);">Student Portal Dashboard</h1>
        <div>
            <a href="index.php" class="btn" style="margin-right: 15px; background: rgba(255,255,255,0.1); box-shadow: none;">Home</a>
            <a href="logout.php" class="btn" style="background: var(--danger);">Logout</a>
        </div>
    </div>

    <div class="formal glass" style="text-align: center;">
        <?php if(isset($_SESSION['user_image'])): ?>
            <img src="<?php echo htmlspecialchars($_SESSION['user_image']); ?>" alt="Profile Picture" class="profile-img">
        <?php else: ?>
            <div class="profile-img" style="display:inline-flex; align-items:center; justify-content:center; font-size:32px; background:var(--primary);">
                <?= strtoupper(substr($_SESSION['name'], 0, 1)) ?>
            </div>
        <?php endif; ?>

        <h2 style="color: var(--accent); margin-top: 0;">Welcome, <?= htmlspecialchars($_SESSION['name']); ?>!</h2>
        <p style="color: var(--text-muted);"><?= htmlspecialchars($_SESSION['user']); ?></p>

        <div style="margin-top: 40px; display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="index.php" class="btn" style="flex: 1; min-width: 200px;">Portal Tools</a>
            <a href="update.php" class="btn" style="flex: 1; min-width: 200px; background: var(--success);">Update Profile</a>
            <a href="delete.php" class="btn" style="flex: 1; min-width: 200px; background: rgba(239, 68, 68, 0.2); color: #fca5a5 !important; box-shadow: none;">Delete Account</a>
        </div>
    </div>
</div>

</body>
</html>
