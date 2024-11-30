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

if (isset($_POST['artist_registration'])) {
    // Fetching form data using $_POST
    $artist_id = $_POST['id'];
    $artist_name = $_POST['name'];
    $artist_email = $_POST['email'];
    $artist_phone = $_POST['phone'];
    $artist_password = $_POST['password'];
    $artist_bio = $_POST['bio'];

    if ($artist_id  == '' ||$artist_name == ''|| $artist_email  == '' ||$artist_phone  == ''  || $artist_password  == '' ||$artist_bio  == '' ) {
        echo "<p style='color: red; text-align: center;'>Please fill all the fields.</p>";
    }
    else {
        //duplicate id,email or password check
        $check_id ="select * 
                   from artist 
                   where id='$artist_id'";
        

        $check_idMatch=mysqli_query($con, $check_id);


        $check_email="select * 
                   from artist
                   where email='$artist_email'";
        

        $check_emailMatch=mysqli_query($con,$check_email);

        $check_password="select * 
                        from artist
                        where password='$artist_password'";
        

        $check_passwordMatch=mysqli_query($con,$check_password);


        if (mysqli_num_rows($check_idMatch) > 0) {
            echo "<p style='color: red; text-align: center;'>This id already exists!</p>";
        }
        elseif (mysqli_num_rows($check_emailMatch) > 0) {
            echo "<p style='color: red; text-align: center;'>This email already exists!</p>";
        }
        elseif (mysqli_num_rows($check_passwordMatch) > 0) {
            echo "<p style='color: red; text-align: center;'>This password already exists!</p>";
        }

        else {
            //insert artist info to database
            $insert_artist="INSERT INTO `artist`(`Id`, `Name`, `Email`, `Phone`, `Password`, `Bio`)
                            VALUES ('$artist_id','$artist_name',' $artist_email','$artist_phone','$artist_password','$artist_bio')";
            
            $result_query = mysqli_query($con, $insert_artist);

            // Check if the query was successful
            if ($result_query) {
                echo "<p style='color: green; text-align: center;'>Artist data successfully inserted!</p>";
            } else {
                echo "<p style='color: red; text-align: center;'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
     }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        h2 {
            margin-top: 20px;
        }

        .centered-image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px; /* Adjust as needed */
            margin-bottom: 30px;
        }

        .centered-image img {
            width: 500px; /* Set a fixed width */
            height: auto; /* Maintain aspect ratio */
        }

        p {
            font-size: 14px;
            margin-top: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-5">Artist Registration</h2>
        <div class="row d-flex justify-content-center">
            <!-- Image Section -->
            <div class="col-lg-6 col-xl-5">
                <img src="../images/registration.jpg" alt="Artist Registration" class="img-fluid">
            </div>

            <!-- Form Section -->
            <div class="col-lg-6 col-xl-5">
                <div class="form-container">
                    <form action="" method="POST">
                        <!-- ID Field -->
                        <div class="form-outline mb-4">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" id="id" name="id" placeholder="Enter your ID"
                                required class="form-control">
                        </div>

                        <!-- Name Field -->
                        <div class="form-outline mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name"
                                required class="form-control">
                        </div>

                        <!-- Email Field -->
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email"
                                required class="form-control">
                        </div>

                        <!-- Phone Number Field -->
                        <div class="form-outline mb-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" name="phone" placeholder="Enter your phone number"
                                required class="form-control">
                        </div>

                        <!-- Password Field -->
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                required class="form-control">
                        </div>

                        <!-- Bio Field -->
                        <div class="form-outline mb-4">
                            <label for="bio" class="form-label">Bio</label>
                            <input type="text" id="bio" name="bio" placeholder="Enter your bio"
                                required class="form-control">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                        <input type="submit" class="btn btn-primary btn-block" name="artist_registration" value="Register">
                            <!-- Text and Link to Login Page -->
                            <p class="mt-3">
                                Already have an account? 
                                <a href="artist_login.php" class="text-primary">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

