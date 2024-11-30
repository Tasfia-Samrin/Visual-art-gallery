<?php
session_start();  // Start session to manage session variables

$conn = mysqli_connect('localhost', 'root', '', 'online_art_gallery');

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user is logged in
if (!isset($_SESSION['customerID'])) {
    echo "<p>Please log in to view your cart.</p>";
    exit();
}

$customer_id = $_SESSION['customerID'];  // Get customer ID from session

// Query to fetch cart items
$cart_query = "SELECT cart.*, art_work.title, art_work.price FROM cart 
               JOIN art_work ON cart.artworkID = art_work.id
               WHERE cart.customerID = '$customer_id'";

$result = mysqli_query($conn, $cart_query);



if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='cart-item'>
                <p>Title: " . $row['title'] . "</p>
                <p>Price: $" . $row['price'] . "</p>
                <p>Quantity: " . $row['quantity'] . "</p>
              </div>";
    }
} 
?>

<!--
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'online_art_gallery');

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user is logged in
if (!isset($_SESSION['customerID'])) {
    echo "<p>Please log in to view your cart.</p>";
    exit();
}

$customer_id = $_SESSION['customerID'];
$cart_query = "SELECT cart.*, art_work.title, art_work.price FROM cart 
               JOIN art_work ON cart.artworkID = art_work.id
               WHERE cart.customerID = '$customer_id'";

$result = mysqli_query($conn, $cart_query);

echo "<h2>Your Cart</h2>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='cart-item'>
                <p>Title: " . $row['title'] . "</p>
                <p>Price: $" . $row['price'] . "</p>
                <p>Quantity: " . $row['quantity'] . "</p>
              </div>";
    }
} else {
    echo "<p>Your cart is empty.</p>";
}
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Visual Art Gallery</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Visual Art Gallery</h1>
            <nav>
                <a href="index.php" class="text-white mx-2">Home</a>
                <a href="gallery.php" class="text-white mx-2">Gallery</a>
                <a href="#" class="text-white mx-2">Artists</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="cart.php" class="text-white mx-2">Cart</a>
                <a href="customer_logout.php" class="text-white mx-2">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Cart Page Content -->
    <div class="container mt-4">
        <h2 class="text-center">Your Cart</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Artwork Title</th>
                    <th>Quantity</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . $row['addedDate'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Your cart is empty.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark text-center p-3">
        <p>&copy; 2024 Visual Art Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

