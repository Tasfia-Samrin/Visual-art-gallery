<?php
$conn = mysqli_connect('localhost', 'root', '', 'online_art_gallery');

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
?>
