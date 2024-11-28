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

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Accessing input values
    $artist_id = $_POST['id'] ?? '';  // Manually entered ID
    $artist_name = $_POST['name'] ?? '';
    $artist_bio = $_POST['bio'] ?? '';
    $artist_email = $_POST['email'] ?? '';
    $artist_phone = $_POST['phone'] ?? '';
    $artist_password = $_POST['new_password'] ?? '';
    $artist_confirmPassword = $_POST['confirmation_password'] ?? '';
    $artist_website = $_POST['link'] ?? '';

    // Validate ID 
    if (empty($artist_id)) {
        echo "<p style='color: red;'>ID cannot be empty.</p>";
        exit;
    }

    $check_query = "SELECT id FROM artist WHERE id = '$artist_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<p style='color: red;'>ID already exists. Please use a different ID.</p>";
        exit;
    }

    // Validate password match
    if ($artist_password !== $artist_confirmPassword) {
        echo "<p style='color: red;'>Passwords do not match!</p>";
        exit;
    }

    // Insert query
    $insert_query = "INSERT INTO artist (id, name, bio, email, phone, password,details) 
                     VALUES ('$artist_id', '$artist_name', '$artist_bio', '$artist_email', '$artist_phone', '$artist_confirmPassword','$artist_website ')";

    $result = mysqli_query($con, $insert_query);

    if ($result) {
        $message = "<p style='color: green;'>Profile updated successfully!</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . mysqli_error($con) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profile Editing Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
        }

        .form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: darkslategray;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: whitesmoke;
            color: black;
        }

        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
</head>
<body>
    <div class="form-container">
        <h2>Edit Profile</h2>
        <form action="update_profile.php" method="POST">
             <!-- Id -->
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" placeholder="Enter your Id here" required>

            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name here" required>

            <!-- Bio -->
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" rows="4" placeholder="Enter your bio here..."></textarea>

            <!-- Contact Information -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>

            <!-- Change Password -->
            <label for="password">New Password:</label>
            <input type="password" id="password" name="new_password" placeholder="Enter a new password">

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirmation_password" placeholder="Confirm your new password">
            
             
            <!--  Website -->
            <label for="link">Website</label>
            <input type="url" id="link" name="link" class="form-control" placeholder="Enter your website link" required> 


            <!-- Submit Button -->
            <button type="submit">Update Profile</button>
        </form>
        <div class="message">
            <?php echo $message; ?>
        </div>
    </div>
</body>
</html>  