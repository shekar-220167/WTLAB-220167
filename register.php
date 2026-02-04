<?php
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
        die("First name must be between 2 and 30 characters");
    }

    if (strlen($lname) < 2 || strlen($lname) > 30) {
        die("Last name must be between 2 and 30 characters");
    }

    if ($gender == '') {
        die("Gender is required");
    }

    if ($year == '') {
        die("Year is required");
    }

    if ($course == '') {
        die("Course is required");
    }

    if (isset($_POST['branch']) && is_array($_POST['branch'])) {
        $cleanBranches = array_map('cleanInput', $_POST['branch']);
        $branchList = implode(",", $cleanBranches);
    } else {
        die("Please select at least one branch");
    }

    $conn = mysqli_connect("localhost", "root", "", "shekardb",3307);

    if (!$conn) {
        die("Database connection failed");
    }

    $sql = "INSERT INTO registration (fname, lname, gender, branch, year, course)
            VALUES ('$fname', '$lname', '$gender', '$branchList', '$year', '$course')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration Successful";
    } else {
        die("Registration Failed");
    }

    mysqli_close($conn);
}
?>
