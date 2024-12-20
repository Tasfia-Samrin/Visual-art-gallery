<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['customerID'])) {
    // If the user is not logged in, redirect to the login page
    if (isset($_GET['add_to_cart'])) {
        header("Location: customers_page/customer_login.php");  // Redirect to login page
        exit();
    }
}


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
    <title>Visual Art Gallery</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    rel="stylesheet">
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
        // Check if arttype filter is set
        if (!isset($_GET['arttype'])) {
            // Select query to join art_work and artwork_images
            $select_query = "SELECT aw.id, aw.title, aw.arttype_id, aw.description, aw.price, ai.imageURL
                             FROM art_work aw
                             JOIN artwork_images ai ON aw.id = ai.artworkID
                             ORDER BY RAND() LIMIT 0,5";
            $result_query = mysqli_query($conn, $select_query);

            // Loop through the results
            while ($row = mysqli_fetch_assoc($result_query)) {
                $art_id = $row['id'];
                $art_title = $row['title'];
                $art_arttype_id = $row['arttype_id'];
                $art_description = $row['description'];
                $art_price = $row['price'];
                $art_image = $row['imageURL'];  // Corrected column name here

                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                             <img src='./artists page/arts_images/{$row['imageURL']}' class='img-fluid' style='max-width: 300px;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$art_title</h5>
                                <p class='card-text'>$art_description</p>
                                <a href='index.php?add_to_cart=$art_id' class='btn btn-info'>Add to cart</a>
                            </div>
                        </div>
                    </div>";
            }
        }
        ?>

        <!-- Get specific art type -->
        <?php
        if (isset($_GET['arttype'])) {
            $arttype_id = $_GET['arttype'];
            
            // Select query to join art_work and artwork_images based on arttype_id
            $select_query = "SELECT aw.id, aw.title, aw.arttype_id, aw.description, aw.price, ai.imageURL
                             FROM art_work aw
                             JOIN artwork_images ai ON aw.id = ai.artworkID";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);

            // Check if any artwork is found
            if ($num_of_rows == 0) {
                echo  "<div class='col-12 text-center'>
                <h2>There is no art for this art type</h2>
            </div>";
      
            }

            // Loop through the results
            while ($row = mysqli_fetch_assoc($result_query)) {
                $art_id = $row['id'];
                $art_title = $row['title'];
                $art_arttype_id = $row['arttype_id'];
                $art_description = $row['description'];
                $art_price = $row['price'];
                $art_image = $row['imageURL'];  

        
                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                        <img src='./artists page/arts_images/{$row['imageURL']}'class='img-fluid' style='max-width: 300px;'>
                            <div class='card-body'>
                                <h5 class='card-title'>$art_title</h5>
                                <p class='card-text'>$art_description</p>
                                <a href='index.php?add_to_cart=$art_id' class='btn btn-info'>Add to cart</a>
                            </div>
                        </div>
                    </div>";
            }
        }
        ?>
        </div>
      </div>

      <!-- Art Type Sidebar -->
      <div  class="col-md-2 bg-dark">
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-bg-primary text-white">
            <a href="#" class="nav-link text-light font-weight-bold"><h4>Art Type</h4></a>
          </li>  

          <?php
           $select_type="Select * from `arttype`";
           $result_type=mysqli_query($conn,$select_type);
            while($row_data=mysqli_fetch_assoc($result_type)){
                $arttype_title=$row_data['arttype_title'];
                $arttype_id=$row_data['arttype_id'];
                echo "<li class='nav-item bg-bg-primary text-white'>
                <a href='index.php?arttype=$arttype_id' class='nav-link text-light'>$arttype_title</a>
                </li>  ";
            }
          ?>
        </ul>
      </div>
    </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark text-center p-3">
        <p>&copy; 2024 Visual Art Gallery. All rights reserved.</p>
    </footer>

</body>
</html>
