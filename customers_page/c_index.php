<?php
session_start(); // Start session

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "online_art_gallery";

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Art Gallery</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Visual Art Gallery</h1>
            <nav>
                <a href="c_index.php" class="text-white mx-2">Home</a>
                <a href="c_gallery.php" class="text-white mx-2">Gallery</a>
                <a href="cart.php" class="text-white mx-2">Cart</a>
                <a href="customer_logout.php" class="text-white mx-2">Logout</a>
            </nav>
            <form class="form-inline ml-3" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search artworks..." aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-light my-2 my-sm-0" name="search_data_art">
            </form>
        </div>
    </header>

    <!-- Banner Section -->
    <section class="banner text-center text-black">
        <div class="container">
            <h2 class="display-4">Explore Artworks</h2>
            <p class="lead">Your Daily Dose of Art</p>
        </div>
    </section>

    <!-- Featured Artworks -->
    <div class="row px-3">
        <div class="col-md-10">
            <div class="row">
                <?php
                // Display random artworks
                if (!isset($_GET['arttype'])) {
                    $select_query = "SELECT * FROM `art_work` ORDER BY RAND() LIMIT 0, 5";
                    $result_query = mysqli_query($con, $select_query);

                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $art_id = $row['id'];
                        $art_title = $row['title'];
                        $art_description = $row['description'];
                        $art_image = $row['image'];
                        echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_page/arts_images/$art_image' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$art_title</h5>
                                    <p class='card-text'>$art_description</p>
                                    <a href='add_to_cart.php?art_id=$art_id' class='btn btn-info'>Add to cart</a>
                                </div>
                            </div>
                        </div>";
                    }
                }
                ?>

                <!-- Display artworks by type -->
                <?php
                if (isset($_GET['arttype'])) {
                    $arttype_id = $_GET['arttype'];
                    $select_query = "SELECT * FROM `art_work` WHERE arttype_id=$arttype_id";
                    $result_query = mysqli_query($con, $select_query);
                    $num_of_rows = mysqli_num_rows($result_query);

                    if ($num_of_rows == 0) {
                        echo "<div class='col-12 text-center'>
                <h2>There is no art for this art type</h2>
            </div>";
                    } else {
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $art_id = $row['id'];
                            $art_title = $row['title'];
                            $art_description = $row['description'];
                            $art_image = $row['image'];
                            echo "<div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <img src='./admin_page/arts_images/$art_image' class='card-img-top' alt='...'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$art_title</h5>
                                        <p class='card-text'>$art_description</p>
                                        <a href='add_to_cart.php?art_id=$art_id' class='btn btn-info'>Add to cart</a>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                }
                ?>
            </div>
        </div>

        <!-- Sidebar: Art Types -->
        <div class="col-md-2 bg-dark">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item text-white">
                    <a href="#" class="nav-link text-light font-weight-bold"><h4>Art Type</h4></a>
                </li>
                <?php
                $select_type = "SELECT * FROM `arttype`";
                $result_type = mysqli_query($con, $select_type);

                while ($row_data = mysqli_fetch_assoc($result_type)) {
                    $arttype_title = $row_data['arttype_title'];
                    $arttype_id = $row_data['arttype_id'];
                    echo "<li class='nav-item'>
                        <a href='c_index.php?arttype=$arttype_id' class='nav-link text-light'>$arttype_title</a>
                    </li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark text-center p-3">
        <p>&copy; 2024 Visual Art Gallery. All rights reserved.</p>
    </footer>
</body>
</html>
