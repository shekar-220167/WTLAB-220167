<?php
$uploadDir = "uploads/";

if(isset($_GET['file'])){
    $file = basename($_GET['file']);
    $filepath = $uploadDir . $file;

    if(file_exists($filepath)){
        unlink($filepath);
    }
}

header("Location: index.php");
exit;
?>
