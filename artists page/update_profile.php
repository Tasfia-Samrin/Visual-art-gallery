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
            height: 100vh;
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
            color:black;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Profile</h2>
        <form action="update_artist_profile.php" method="POST">
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
            <input type="password" id="password" name="password" placeholder="Enter a new password">

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your new password">

            <!-- Submit Button -->
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
