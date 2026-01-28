<?php
// Receive data from login form
$id = $_POST['id'];
$password = $_POST['password'];

// Connect to MySQL (use IP + correct DB name)
$conn = mysqli_connect("127.0.0.1", "root", "", "shekardb",3307);
// 🔴 If your MySQL port is NOT 3306, change it here

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check login details
$sql = "SELECT * FROM login 
        WHERE id='$id' AND password='$password'";

$result = mysqli_query($conn, $sql);

// Validate user
if (mysqli_num_rows($result) > 0) {
    echo "Login Successful";
} else {
    echo "Invalid ID or Password";
}

// Close connection
mysqli_close($conn);
?>
