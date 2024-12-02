<?php
// Include the database connection
include('include/connect.php'); 

// Fetch all artworks with their associated images
$select_query = "
    SELECT aw.id, aw.title, aw.description, aw.price, ai.imageURL
    FROM art_work aw
    LEFT JOIN artwork_images ai ON aw.id = ai.artworkID
";  
$result_query = mysqli_query($conn, $select_query);
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
                <a href="index.php" class="text-white mx-2">Home</a>
                <a href="gallery.php" class="text-white mx-2">Gallery</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <?php
                if (isset($_SESSION['logged_in_user'])) {
                    echo '<a href="user/account.php" class="text-white mx-2">Account</a>';
                } else {
                    echo '<a href="user/user_type.php" class="text-white mx-2">Login</a>';
                }
                ?>
            </nav>

            <form class="form-inline ml-3" action="search_art.php" method="get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search artworks..."
                    aria-label="Search" name="search_data">
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
                        $art_price = $row['price'];
                        $art_image = $row['imageURL'];  // Ensure this matches your database column

                        echo "
                        <div class='col-md-4 mb-4'>
                            <div class='card'>
                                <img src='./artists page/arts_images/{$art_image}' class='img-fluid' alt='{$art_title}' style='max-height: 200px; object-fit: cover;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$art_title</h5>
                                    <p class='card-text'>$art_description</p>
                                    <p class='card-text text-primary'>Price: $$art_price</p>
                                    <a href='index.php?add_to_cart=$art_id' class='btn btn-info'>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                } else {
                    echo "<p class='text-center'>No artworks found.</p>";
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

