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

if (isset($_POST['admin_registration'])) {
    // Fetching form data using $_POST
    $admin_id = $_POST['id'];
    $admin_name = $_POST['name'];
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];

    if ($admin_id  == '' ||$admin_name  == ''|| $admin_username  == '' ||$admin_email  == ''  || $admin_password  == '' ) {
        echo "<p style='color: red; text-align: center;'>Please fill all the fields.</p>";
    }
    else {
        //duplicate id,username,email or password check
        $check_id ="select * 
                   from admin 
                   where id='$admin_id'";
        

        $check_idMatch=mysqli_query($con, $check_id);

        $check_username="select * 
                        from admin 
                        where username='$admin_username'";


        $check_usernameMatch=mysqli_query($con,$check_username);


        $check_email="select * 
                   from admin 
                   where email='$admin_email'";
        

        $check_emailMatch=mysqli_query($con,$check_email);

        $check_password="select * 
                        from admin 
                        where password='$admin_password'";
        

        $check_passwordMatch=mysqli_query($con,$check_password);


        if (mysqli_num_rows($check_idMatch) > 0) {
            echo "<p style='color: red; text-align: center;'>This id already exists!</p>";
        }
        else  if (mysqli_num_rows($check_usernameMatch) > 0) {
            echo "<p style='color: red; text-align: center;'>This username already exists!</p>";
        }
        elseif (mysqli_num_rows($check_emailMatch) > 0) {
            echo "<p style='color: red; text-align: center;'>This email already exists!</p>";
        }
        elseif (mysqli_num_rows($check_passwordMatch) > 0) {
            echo "<p style='color: red; text-align: center;'>This password already exists!</p>";
        }

        else {
            //insert admin info to database
            $insert_admin="INSERT INTO `admin`(`Id`, `Name`, `Email`, `UserName`, `Password`)
                                       VALUES ('$admin_id','$admin_name',' $admin_email','$admin_username','$admin_password')";
            
            $result_query = mysqli_query($con, $insert_admin);

            // Check if the query was successful
            if ($result_query) {
                echo "<p style='color: green; text-align: center;'> 
                <a href='admin_login.php'>Login here</a></p>";
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
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <!-- Image Section -->
            <div class="col-lg-6 col-xl-5">
                <img src="../images/registration.jpg" alt="Admin Registration" class="img-fluid">
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

                        <!-- Username Field -->
                        <div class="form-outline mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter your username"
                                required class="form-control">
                        </div>

                        <!-- Email Field -->
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email"
                                required class="form-control">
                        </div>

                        <!-- Password Field -->
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                required class="form-control">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                        <input type="submit" class="btn btn-primary btn-block" name="admin_registration" value="Register">
                            <!-- Text and Link to Login Page -->
                            <p class="mt-3">
                                Already have an account? 
                                <a href="admin_login.php" class="text-primary">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

