<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'online_art_gallery');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Artworks - Visual Art Gallery</title>
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
                <a href="gallery.php" class="text-white mx-2">Gallery</a>
                <a href="#" class="text-white mx-2">Artists</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="./user/user_type.php" class="text-white mx-2">Login</a>
            </nav>
            <form class="form-inline ml-3" action="search.php" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search artworks..." aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-light my-2 my-sm-0" name="search_data_art">
            </form>
        </div>
    </header>

    <!-- Search Results Section -->
    <section class="container mt-5">
        <h2 class="text-center mb-4">Search Results</h2>
        <div class="row">
            <?php
            if (isset($_GET['search_data_art'])) {
                // Get search input and escape to prevent SQL injection
                $search_data_value = mysqli_real_escape_string($conn, $_GET['search_data']);
                
                // Search query
                $search_query = "
                    SELECT aw.id, aw.title, aw.description, aw.price, ai.imageURL
                    FROM art_work aw
                    LEFT JOIN artwork_images ai ON aw.id = ai.artworkID
                    WHERE aw.title LIKE '%$search_data_value%' OR aw.description LIKE '%$search_data_value%'
                ";
                $result_query = mysqli_query($conn, $search_query);

                // Check if any results were found
                if (mysqli_num_rows($result_query) > 0) {
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $art_id = $row['id'];
                        $art_title = $row['title'];
                        $art_description = $row['description'];
                        $art_price = $row['price'];
                        $art_image = $row['imageURL']; 

                        echo "
                        <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./artists page/arts_images/{$art_image}' class='img-fluid'  object-fit: cover;>
                                <div class='card-body'>
                                    <h5 class='card-title'>$art_title</h5>
                                    <p class='card-text'>$art_description</p>
                                    <a href='index.php?add_to_cart=$art_id' class='btn btn-info'>Add to cart</a>
                                    <a href='#' class='btn btn-secondary'>View More</a>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<h5 class='text-center'>No artworks found matching your search.</h5>";
                }
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light text-dark text-center p-3 mt-5">
        <p>&copy; 2024 Visual Art Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

