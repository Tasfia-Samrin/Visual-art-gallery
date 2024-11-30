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

if (isset($_POST['customer_login'])) {
    $customer_email = $_POST['email'];
    $customer_password = $_POST['password'];

    if ($customer_email  == '' ||$customer_password  == '' ) {
        echo "<p style='color: red; text-align: center;'>Please fill all the fields.</p>";
    } else {
        //Verification
        $verify_match ="select * 
                        from customer
                        where email='$customer_email' and password='$customer_password'";
        

        $check_match=mysqli_query($con, $verify_match);


        if (mysqli_num_rows($check_match ) == 0) {
            echo "<p style='color: red; text-align: center;'>Incorrect values!</p>";
        }
         else {
            header('Location: c_index.php');
        }
     }
}
?>
<!--// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "online_art_gallery";

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['customer_login'])) {
    // Fetching form data using $_POST
    $customer_email = $_POST['email'];
    $customer_password = $_POST['password'];

    if ($customer_email  == '' ||$customer_password  == '' ) {
        echo "<p style='color: red; text-align: center;'>Please fill all the fields.</p>";
    } else {
        // Verification: Check if the email exists
        $verify_match = "SELECT * FROM customer WHERE email='$customer_email'";
        $check_match = mysqli_query($con, $verify_match);

        if (mysqli_num_rows($check_match) == 0) {
            echo "<p style='color: red; text-align: center;'>Incorrect email or password!</p>";
        } else {
            // Fetch the user record
            $user = mysqli_fetch_assoc($check_match);

            // Verify the password
            if (password_verify($customer_password, $user['password'])) {
                // Password is correct, login successful
                //header('Location: http://localhost/online_art_gallery/Visual-art-gallery/customers_page/index.php'); // Redirect to home or user dashboard
                //exit;
                echo "Login successful! <a href='c_index.php'>Click</a>";
            } else {
                // Incorrect password
                echo "<p style='color: red; text-align: center;'>Incorrect email or password!</p>";
            }
        }
    
    }}
    
?>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
        <h2 class="text-center mb-5"> Login</h2>
        <div class="row d-flex justify-content-center">
            <!-- Image Section -->
            <div class="col-lg-6 col-xl-5">
                <img src="../images/registration.jpg" alt="Customer Registration" class="img-fluid">
            </div>

            <!-- Form Section -->
            <div class="col-lg-6 col-xl-5">
                <div class="form-container">
                    <form action="" method="POST">
                        
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
                            <input type="submit" class="btn btn-primary btn-block" name="customer_login" value="Login">
                            <!-- Text and Link to Login Page -->
                            <p class="mt-3">
                                Do no have an account? 
                                <a href="customer_registration.php" class="text-primary">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

