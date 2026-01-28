<?php
// 1. Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 2. Receive form data safely
    $fname  = $_POST['fname'] ?? '';
    $lname  = $_POST['lname'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $year   = $_POST['year'] ?? '';
    $course = $_POST['course'] ?? '';

    // Checkbox handling
    if (isset($_POST['branch'])) {
        $branchList = implode(",", $_POST['branch']);
    } else {
        $branchList = '';
    }

    // 3. Database connection
    $conn = mysqli_connect("localhost", "root", "", "shekardb", 3007);

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // 4. Insert query
    $sql = "INSERT INTO users (fname, lname, gender, branch, year, course)
            VALUES ('$fname', '$lname', '$gender', '$branchList', '$year', '$course')";

    // 5. Execute query
    if (mysqli_query($conn, $sql)) {
        echo "✅ Registration Successful";
    } else {
        echo "❌ Registration Failed: " . mysqli_error($conn);
    }

    // 6. Close connection
    mysqli_close($conn);
}
?>
