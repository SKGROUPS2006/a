<?php
$host = "localhost";
$user = "root";  // Change if needed
$pass = "";  // Change if needed
$db = "user_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Login Successful!'); window.location='welcome.html';</script>";
    } else {
        echo "<script>alert('Invalid Credentials!'); window.location='login.html';</script>";
    }
}

$conn->close();
?>
