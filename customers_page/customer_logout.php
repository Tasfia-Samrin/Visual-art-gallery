<?php
// Enable output buffering to handle potential output issues
ob_start();

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'online_art_gallery');

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start the session to access session variables
session_start();

// Destroy the session to log out the user
session_destroy();

// Redirect to the login page (adjust the path if necessary)
header("Location: ../index.php");
exit();

// End output buffering
ob_end_flush();
?>
it();
?>

