<?php

session_start();
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "online_art_gallery";

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all art data
$select_query = "SELECT * FROM art_work";  
$result_query = mysqli_query($con, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Visual Art Gallery</title>
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
                <a href="customers_page\c_index.php" class="text-white mx-2">Gallery</a>
                <a href="cart.php" class="text-white mx-2">Cart</a>
                <a href="customer_logout.php" class="text-white mx-2">Logout</a>
              
            </nav>

            <form class="form-inline ml-3" action="search_art.php" method="get">
              <input class="form-control mr-sm-2" type="search" placeholder="Search artworks..."
               aria-label="Search" name="search_data">
              <!--<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
              <input type="submit" value="Search" class="btn btn-outline-light my-2 my-sm-0"
              name="search_data_art">
          </form>
        </div>
    </header>

    <!-- Gallery Section -->
    <section class="gallery mt-4">
        <div class="container">
            <h2 class="text-center mb-4">Explore Our Artworks</h2>
            <div class="row">
                <?php
                // Check if there are any artworks
                if (mysqli_num_rows($result_query) > 0) {
                    // Loop through the results and display each artwork
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $art_id = $row['id'];
                        $art_title = $row['title'];
                        $art_description = $row['description'];
                        $art_image = $row['image'];  

                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card'>
                                <img src='./admin_page/arts_images/$art_image' class='card-img-top' alt='$art_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$art_title</h5>
                                    <p class='card-text'>$art_description</p>
                                    <a href='c_index.php?add_to_cart=$art_id' class='btn btn-info'>Add to cart</a>
                                    
                                </div>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "<p>No artworks found.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    
    <!-- Footer -->
    <footer class="bg-light text-dark text-center p-3">
        <p>&copy; 2024 Visual Art Gallery. All rights reserved.</p>
    </footer>
</body>
</html>
