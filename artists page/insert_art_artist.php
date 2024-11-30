<?php
// Include the database connection
include('../include/connect.php');

// Backend Logic
if (isset($_POST['insert_art'])) {
    // Fetching form data using $_POST
    $artist_email = $_POST['email'];
    $artist_password = $_POST['password'];
    $art_id = $_POST['art_id'];
    $art_title = $_POST['art_title'];
    $art_type = $_POST['art_types'];
    $date = $_POST['creation_date'];
    $medium = $_POST['medium'];
    $dimension = $_POST['dimension'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $art_image = $_FILES['Art_image']['name'];
    $temp_image = $_FILES['Art_image']['tmp_name'];

    if ($artist_email == '' || $artist_password == '' || $art_id == '' || $art_title == '' || $date == '' || $medium == '' || $dimension == '' || $description == '' || $art_type == '' || $price == '' || $art_image == '') {
        echo "<p style='color: red; text-align: center;'>Please fill all the fields.</p>";
    } else {
        // Check if artist email and password matches
        $verify_match = "SELECT * FROM `artist` WHERE TRIM(email)='$artist_email' and password='$artist_password'";
        $check_match = mysqli_query($conn, $verify_match);

        if (mysqli_num_rows($check_match) == 0) {
            echo "<p style='color: red; text-align: center;'>Wrong credentials!</p>";
        } else {
            // Check if the artist exists and get the artist's ID
            $get_id = "SELECT id FROM artist WHERE TRIM(email)='$artist_email' and password='$artist_password'";
            $artist_data = mysqli_query($conn, $get_id);

            if (mysqli_num_rows($artist_data) > 0) {
                $artist_data_value = mysqli_fetch_assoc($artist_data);
                $artist_id = $artist_data_value['id']; 

                // Check for duplicate art ID
                $check_query = "SELECT * FROM art_work WHERE id = '$art_id'";
                $check_result = mysqli_query($conn, $check_query);
                if (mysqli_num_rows($check_result) > 0) {
                    echo "<p style='color: red; text-align: center;'>Art ID already exists. Please use a unique ID.</p>";
                }
                // Check for duplicate art title
                $check_query = "SELECT * FROM art_work WHERE title = '$art_title'";
                $check_result = mysqli_query($conn, $check_query);
                if (mysqli_num_rows($check_result) > 0) {
                    echo "<p style='color: red; text-align: center;'>Art title already exists. Please use a unique title.</p>";
                } else {
                    move_uploaded_file($temp_image, "./arts_images/$art_image");

                    // Insert data into the art_work table
                    $insert_arts = "INSERT INTO `art_work` (id, title, artist_id, arttype_id, year_created, medium, dimension, description, price, image) 
                                    VALUES ('$art_id', '$art_title', '$artist_id', '$art_type', '$date', '$medium', '$dimension', '$description', '$price', '$art_image')";

                    $insert_artImg = "INSERT INTO `artwork_images` (artworkID, imageURL) 
                                      VALUES ('$art_id', '$art_image')";
                    $result_query1 = mysqli_query($conn, $insert_arts);
                    $result_query2 = mysqli_query($conn, $insert_artImg);

                    // Check if the query was successful
                    if ($result_query1 && $result_query2) {
                        echo "<p style='color: green; text-align: center;'>Art successfully inserted!</p>";
                    } else {
                        echo "<p style='color: red; text-align: center;'>Error: " . mysqli_error($conn) . "</p>";
                    }
                }
            } else {
                echo "<p style='color: red; text-align: center;'>Artist not found. Please check your credentials.</p>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Arts - Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center">Insert Arts</h2>
        <form action="" method="post" enctype="multipart/form-data">

         <!--Artist Email Field -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control"  placeholder="Enter your email" autocomplete="off"
            required>
         </div>

          <!--Artist Password Field -->
          <div class="form-outline mb-4 w-50 m-auto">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off"
            required>
          </div>

            <!-- ID -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="id" class="form-label">Art ID</label>
                <input type="number" name="art_id" id="id" 
                class="form-control" placeholder="Enter the ID" autocomplete="off" required>
            </div>

            <!-- Art Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="art_title" class="form-label mt-4">Art Title</label>
                <input type="text" name="art_title" id="art_title" 
                class="form-control" placeholder="Enter the art title" autocomplete="off" required>
            </div>

            <!-- Art Type -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="art_types" class="form-label mt-4">Select Art Type</label>
                <select name="art_types" id="art_types" class="form-control" required>
                    <option value="">Select Type</option>

                    <?php
                        // Fetching available art types from the database
                        $select_query = "SELECT * FROM arttype";
                        $result_query = mysqli_query($conn, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $art_type_title = $row['arttype_title'];
                            $art_type_id = $row['arttype_id'];
                            echo "<option value='$art_type_id'>$art_type_title</option>";
                        }
                    ?>   
                </select>
            </div>

            <!-- Date of creation -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="creation_date">Date of Creation</label>
                <input type="date" name="creation_date" id="creation_date"  
                class="form-control" placeholder="Enter the date of creation" autocomplete="off" required>
            </div>
                        

            <!-- Medium -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="medium" class="form-label mt-4">Art Medium</label>
                <input type="text" name="medium" id="medium" 
                class="form-control" placeholder="Enter the medium of your artwork" autocomplete="off" required>
            </div>

            <!-- Dimension -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="dimension" class="form-label mt-4">Art Dimension</label>
                <input type="text" name="dimension" id="dimension" 
                class="form-control" placeholder="Enter the dimension" autocomplete="off" required>
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label mt-4">Art Description</label>
                <input type="text" name="description" id="description" 
                class="form-control" placeholder="Enter the description" autocomplete="off" required>
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="price" class="form-label mt-4">Art Price</label>
                <input type="text" name="price" id="price" 
                class="form-control" placeholder="Enter the price" autocomplete="off" required>
            </div>

            <!-- Art Image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Art_image" class="form-label mt-4">Art Image</label>
                <input type="file" name="Art_image" id="Art_image" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_art" class="btn btn-dark mb-3 px-3 mt-4" value="Insert Art">
            </div>
        </form>
    </div>
</body>
</html>
