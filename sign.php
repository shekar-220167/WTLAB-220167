<?php
$id = $_POST['id'] ?? '';
$password = $_POST['password'] ?? '';

$conn = mysqli_connect("127.0.0.1", "root", "", "shekardb", 3307);

if (!$conn) {
    die("Database connection failed");
}

$check = "SELECT id FROM login WHERE id='$id'";
$result = mysqli_query($conn, $check);

if (!$result) {
    die("Query failed");
}

if (mysqli_num_rows($result) > 0) {
    die("Account already exists. Please login.");
}

$insert = "INSERT INTO login (id, password) VALUES ('$id', '$password')";

if (mysqli_query($conn, $insert)) {
    echo "Account created successfully";
    print "<br><a href='login.html'>Go to Login</a>";
} else {
    die("Signup failed");
}

mysqli_close($conn);
?>
