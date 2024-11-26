<?php
include('include/connect.php');
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
                <a href="#" class="text-white mx-2">Gallery</a>
                <a href="#" class="text-white mx-2">Artists</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="#" class="text-white mx-2">Login</a>
            </nav>
            <form class="form-inline ml-3">
              <input class="form-control mr-sm-2" type="search" placeholder="Search artworks..."
               aria-label="Search" name="search_data">
              <!--<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
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
     
    <div class="row">
      
      <div class="col-md-10">
        <div class="row">
          <!-- First three images -->
          <div class="col-md-4 mb-2">
            <div class="card">
              <img src="./images/a.jfif" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View More</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2">
            <div class="card">
              <img src="./images/history1.jfif" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View More</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2">
            <div class="card">
              <img src="./images/3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View More</a>
              </div>
            </div>
          </div>
          <!-- Fourth and fifth images side by side in the same row -->
          <div class="col-md-4 mb-2">
            <div class="card">
              <img src="./images/nature1.jfif" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View More</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2">
            <div class="card">
              <img src="./images/river1.jfif" class="card-img-top" alt="..."> <!-- Updated image source -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View More</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2">
            <div class="card">
              <img src="./images/history2.jpg" class="card-img-top" alt="..."> <!-- Updated image source -->
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--art type -->
      <div  class="col-md-2 bg-dark">
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-bg-primary text-white">
            <a href="#" class="nav-link text-light 
            font-weight-bold"><h4>Art Type</a></h4>
          </li>  

          <?php
           $select_type="Select * from `arttype`";
           $result_type=mysqli_query($conn,$select_type);
            // $row_data=mysqli_fetch_assoc($result_type);
            // echo $row_data['arttype_title']
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