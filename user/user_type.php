<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "online_art_gallery";

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch the role from the form
    $role = isset($_POST['role']) ? trim($_POST['role']) : '';

    // Redirect based on the role
    if (!empty($role)) {
        switch ($role) {
            case 'customer':
                header('Location: ../customers_page/customer_login.php'); // Redirect to customer login page
                exit;
            case 'admin':
                header('Location: ../admin_page/admin_login.php'); // Redirect to admin login page
                exit;
            case 'artist':
                header('Location: ../artists page/artist_login.php'); // Redirect to artist login page
                exit;
            default:
                echo "<p style='color: red; text-align: center;'>Invalid role selected.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Please select a role.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form action="" method="POST">
            <!-- Role Selection -->
            <div class="form-group">
                <label for="role">Login as:</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                    <option value="artist">Artist</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="Login">
            </div>
        </form>
    </div>
</body>
</html>