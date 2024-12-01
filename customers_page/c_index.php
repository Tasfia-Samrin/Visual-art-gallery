
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
                <a href="#" class="text-white mx-2">Artists</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="cart.php" class="text-white mx-2">Cart</a>
                <a href="../index.php" class="text-white mx-2">Logout</a>
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
     
    <div class="row px-3">
      
      <div class="col-md-10">
        <div class="row">
          


          <?php

            if(!isset($_GET['arttype'])){
                 
            $select_query="Select * from `art_work` order by rand() limit 0,5";
            $result_query=mysqli_query($con,$select_query);

           // $row=mysqli_fetch_assoc($result_query);
            //echo $row['title'];
            while($row=mysqli_fetch_assoc($result_query)){
                   $art_id=$row['id'];
                   $art_title=$row['title'];
                   $art_arttype_id=$row['arttype_id'];
                   $art_description=$row['description'];
                   $art_price=$row['price'];
                   $art_image=$row['image'];
               echo "<div class='col-md-4 mb-2'>
            <div class='card'>
             <img src='./admin_page\arts_images/$art_image' class='card-img-top' alt='...'>
           
              <div class='card-body'>
                <h5 class='card-title'>$art_title</h5>
                <p class='card-text'>$art_description</p>
                <a href='c_index.php?add_to_cart=<?php echo $art_id; ?>' class='btn btn-info'>Add to cart</a>
               
              </div>
            </div>
          </div>";
            }
          }
  ?>

  <!--get specific art type-->
  <?php
          if(isset($_GET['arttype'])){
               $arttype_id=  $_GET['arttype'];
            $select_query="Select * from `art_work` where arttype_id=$arttype_id";
            $result_query=mysqli_query($conn,$select_query);
            $num_of_rows=mysqli_num_rows( $result_query);
           if($num_of_rows==0){
            echo"<h2 class='text-center'> There is no art for this art type</h2>";
           }
            while($row=mysqli_fetch_assoc($result_query)){
                   $art_id=$row['id'];
                   $art_title=$row['title'];
                   $art_arttype_id=$row['arttype_id'];
                   $art_description=$row['description'];
                   $art_price=$row['price'];
                   $art_image=$row['image'];
               echo "<div class='col-md-4 mb-2'>
            <div class='card'>
             <img src='./admin_page\arts_images/$art_image' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>$art_title</h5>
                <p class='card-text'>$art_description</p>
                <a href='c_index.php?add_to_cart=$art_id' class='btn btn-info'>Add to cart</a>
                
              </div>
            </div>
          </div>";
            }
          }
          ?>
          
          

          
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
           $result_type=mysqli_query($con,$select_type);
            // $row_data=mysqli_fetch_assoc($result_type);
            // echo $row_data['arttype_title']
            while($row_data=mysqli_fetch_assoc($result_type)){
              $arttype_title=$row_data['arttype_title'];
              $arttype_id=$row_data['arttype_id'];
              echo "<li class='nav-item bg-bg-primary text-white'>
              <a href='c_index.php?arttype=$arttype_id' class='nav-link text-light'>$arttype_title</a>
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
