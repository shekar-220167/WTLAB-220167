<?php
    $message = "";
    $success = false;
    $uploadedFile = "";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $uploadDir="uploads/";
        if(isset($_FILES["uploadFile"])){
            $filename=basename($_FILES["uploadFile"]["name"]);
            $targetfile=$uploadDir.$filename;

            if(!is_dir($uploadDir)){
                mkdir($uploadDir,0777,true);
            }

            if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$targetfile)){
                $message = "File uploaded successfully!";
                $success = true;
                $uploadedFile = $filename;
            }
            else{
                $message = "Upload File Failed";
            }
        } else {
            $message = "No file received.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styler.css">
    <style>
        .result-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <div class="result-card glass">
            <?php if($success): ?>
                <div style="font-size: 60px; margin-bottom:20px;">🎉</div>
                <h1><?php echo htmlspecialchars($message); ?></h1>
                <p style="color: var(--text-muted); font-size: 18px;">
                    File: <strong style="color: var(--text);"><?php echo htmlspecialchars($uploadedFile); ?></strong>
                </p>
                <div class="action-buttons">
                    <a href="download.php?file=<?php echo urlencode($uploadedFile); ?>" class="btn" style="background: var(--success); box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);">
                        📥 Download
                    </a>
                    <a href="delete.php?file=<?php echo urlencode($uploadedFile); ?>" class="btn" style="background: var(--danger); box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);">
                        🗑️ Delete
                    </a>
                </div>
            <?php else: ?>
                <div style="font-size: 60px; margin-bottom:20px;">❌</div>
                <h1 style="color: var(--danger);"><?php echo htmlspecialchars($message); ?></h1>
            <?php endif; ?>
            
            <div style="margin-top: 40px; border-top: 1px solid var(--border); padding-top: 20px;">
                <a href="index.php" class="btn" style="background: rgba(255,255,255,0.1); box-shadow: none;">← Back to Portal</a>
            </div>
        </div>
    </div>
</body>
</html>
