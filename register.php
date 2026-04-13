<?php
$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function cleanInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $fname  = cleanInput($_POST['fname'] ?? '');
    $lname  = cleanInput($_POST['lname'] ?? '');
    $gender = cleanInput($_POST['gender'] ?? '');
    $year   = cleanInput($_POST['year'] ?? '');
    $course = cleanInput($_POST['course'] ?? '');

    $fname = ucfirst(strtolower($fname));
    $lname = ucfirst(strtolower($lname));

    if (strlen($fname) < 2 || strlen($fname) > 30) {
        $message = "First name must be between 2 and 30 characters";
    }
    else if (strlen($lname) < 2 || strlen($lname) > 30) {
        $message = "Last name must be between 2 and 30 characters";
    }
    else if ($gender == '') {
        $message = "Gender is required";
    }
    else if ($year == '') {
        $message = "Year is required";
    }
    else if ($course == '') {
        $message = "Course is required";
    }
    else if (!isset($_POST['branch']) || !is_array($_POST['branch'])) {
        $message = "Please select at least one branch";
    }
    else {
        $cleanBranches = array_map('cleanInput', $_POST['branch']);
        $branchList = implode(",", $cleanBranches);

        $conn = @mysqli_connect("localhost", "root", "", "shekardb", 3307);

        if (!$conn) {
            $message = "Database connection failed";
        } else {
            $sql = "INSERT INTO registration (fname, lname, gender, branch, year, course)
                    VALUES ('$fname', '$lname', '$gender', '$branchList', '$year', '$course')";

            if (mysqli_query($conn, $sql)) {
                $message = "Registration Successful!";
                $success = true;
            } else {
                $message = "Registration Failed";
            }

            mysqli_close($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
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
            <a href="index.php" class="btn" style="margin-top: 20px;">Return to Portal</a>
        <?php else: ?>
            <div style="font-size: 60px; margin-bottom:20px;">❌</div>
            <h1 style="color: var(--danger);"><?php echo htmlspecialchars($message); ?></h1>
            <a href="index.php" class="btn" style="margin-top: 20px;">Try Again</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
