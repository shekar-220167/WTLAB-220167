<?php
$id = $_POST['id'] ?? '';
$password = $_POST['password'] ?? '';

$conn = mysqli_connect("127.0.0.1", "root", "", "shekardb", 3307);

if (!$conn) {
    die("Database connection failed");
}

$sql = "SELECT id FROM login WHERE password='$password'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query execution failed");
}

if (mysqli_num_rows($result) == 1) {
    echo "Login successful. Welcome, $id!";
} else {
    echo "No account found. Please sign up.";
}

mysqli_close($conn);
?>
