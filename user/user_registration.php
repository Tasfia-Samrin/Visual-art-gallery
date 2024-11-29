<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
        <h2 class="text-center mb-5">User Registration</h2>
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
                            <input type="number" id="id" name="id" placeholder="Enter your ID"
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
                          <!-- Address -->
                        <div class="form-outline mb-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="address" id="address" name="address" placeholder="Enter your address"
                                required class="form-control">
                        </div>

                          <!-- phone -->
                          <div class="form-outline mb-4">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" id="phone" name="phone" placeholder="Enter your phone number"
                                required class="form-control">
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                        <input type="submit" class="btn btn-primary btn-block" name="admin_registration" value="Register">
                            <!-- Text and Link to Login Page -->
                            <p class="mt-3">
                                Already have an account? 
                                <a href="user_login.php" class="text-primary">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>