<?php
session_start();
include 'koneksi.php';

// Get username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query using prepared statements
$stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if there's a matching user
if ($result->num_rows > 0) {
    // Fetch the user details
    $row = $result->fetch_assoc();

    // Set session variables
    $_SESSION['username'] = $row['username'];
    $_SESSION['status'] = 'login';

    // Redirect to the index page with success status
    header('Location: index.php?status=sukses');
    exit();
} else {
    // Redirect back to the login page with failure status
    header('Location: login.php?status=gagal');
    exit();
}
?>
