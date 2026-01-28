<?php
// Receive signup data
$id = $_POST['id'];
$password = $_POST['password'];

// Connect to MySQL (shekardb)
$conn = mysqli_connect("127.0.0.1", "root", "", "shekardb", 3307);
// ⚠️ Change port if your MySQL uses 3307 or others

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert user into database
$sql = "INSERT INTO users (id, password)
        VALUES ('$id', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "Account Created Successfully <br>";
    echo "<a href='login.html'>Go to Login</a>";
} else {
    echo "Error: User already exists or data issue";
}

mysqli_close($conn);
?>
