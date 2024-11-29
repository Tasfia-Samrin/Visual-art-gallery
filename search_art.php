<?php
include('include/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Art Gallery - Search</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Visual Art Gallery</h1>
            <nav>
                <a href="index.php" class="text-white mx-2">Home</a>
                <a href="#" class="text-white mx-2">Gallery</a>
                <a href="#" class="text-white mx-2">Artists</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="#" class="text-white mx-2">Login</a>
            </nav>
            <form class="form-inline ml-3" method="GET" action="search.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search artworks..." 
                       aria-label="Search" name="search_data">
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

    <!-- Search Results Section -->
    <div class="row px-3">
        <div class="col-md-10">
            <div class="row">
                <?php
                // Handle search functionality
                if (isset($_GET['search_data_art'])) {
                    // Retrieve and sanitize user input
                    $user_search = mysqli_real_escape_string($conn, trim($_GET['search_data']));

                    if (!empty($user_search)) {
                        // Query to search artworks and related art types
                        $search_query = "SELECT * FROM `art_work` WHERE 
                                         `title` LIKE '%$user_search%' OR 
                                         `description` LIKE '%$user_search%' OR 
                                         `arttype_id` IN (SELECT arttype_id FROM `arttype` WHERE arttype_title LIKE '%$user_search%')";
                        $result_query = mysqli_query($conn, $search_query);
                        $num_rows = mysqli_num_rows($result_query);

                        // Display search results or a message if no results are found
                        echo "<h2 class='text-center my-3'>Search Results for: <strong>$user_search</strong></h2>";
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result_query)) {
                                $art_id = $row['id'];
                                $art_title = $row['title'];
                                $art_description = $row['description'];
                                $art_price = $row['price'];
                                $art_image = $row['image'];

                                echo "<div class='col-md-4 mb-2'>
                                    <div class='card'>
                                        <img src='./admin_page/arts_images/$art_image' class='card-img-top' alt='$art_title'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$art_title</h5>
                                            <p class='card-text'>$art_description</p>
                                            <a href='#' class='btn btn-info'>Add to cart</a>
                                            <a href='#' class='btn btn-secondary'>View More</a>
                                        </div>
                                    </div>
                                  </div>";
                            }
                        } else {
                            echo "<h3 class='text-center'>No artworks found matching your search!</h3>";
                        }
                    } else {
                        echo "<h3 class='text-center'>Please enter a valid search term.</h3>";
                    }
                }
                ?>
            </div>
        </div>

        <!-- Sidebar for Art Types -->
        <div class="col-md-2 bg-dark">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-bg-primary text-white">
                    <a href="#" class="nav-link text-light font-weight-bold"><h4>Art Type</h4></a>
                </li>
                <?php
                // Display art types
                $select_type = "SELECT * FROM `arttype`";
                $result_type = mysqli_query($conn, $select_type);
                while ($row_data = mysqli_fetch_assoc($result_type)) {
                    $arttype_title = $row_data['arttype_title'];
                    $arttype_id = $row_data['arttype_id'];
                    echo "<li class='nav-item bg-bg-primary text-white'>
                            <a href='index.php?arttyp
