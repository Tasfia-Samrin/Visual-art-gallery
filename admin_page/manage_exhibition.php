<?php
include('../include/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_exhibition'])) {
        // Collect input values for adding an exhibition
        $exhibition_title = $_POST['title'];
        $exhibition_description = $_POST['description'] ;
        $exhibition_StartDate = $_POST['start_date'] ;
        $exhibition_EndDate = $_POST['end_date'] ;
        $exhibition_location = $_POST['location'] ;
        $artwork1_id = $_POST['artwork1'] ;
        $artwork2_id = $_POST['artwork2'] ;
        $artwork3_id = $_POST['artwork3'] ;
        $artwork4_id = $_POST['artwork4'] ;
        $artwork5_id = $_POST['artwork5'] ;

        // Check if title already exists

        $check_query = "SELECT * from exhibition WHERE name ='$exhibition_title'";
        $check_result = mysqli_query($conn, $check_query);

        $check_query1 = "SELECT * from art_work WHERE id ='$artwork1_id'";
        $check_result1 = mysqli_query($conn, $check_query1);

        $check_query2 = "SELECT * from art_work WHERE id ='$artwork2_id'";
        $check_result2 = mysqli_query($conn, $check_query2);

        $check_query3 = "SELECT * from art_work WHERE id ='$artwork3_id'";
        $check_result3 = mysqli_query($conn, $check_query3);

        $check_query4 = "SELECT * from art_work WHERE id ='$artwork4_id'";
        $check_result4 = mysqli_query($conn, $check_query4);

        $check_query5 = "SELECT * from art_work WHERE id ='$artwork5_id'";
        $check_result5 = mysqli_query($conn, $check_query5);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<p style='color: red; text-align: center;'>This exhibition title is already present in the database.</p>";
        }
         else if(mysqli_num_rows($check_result1)==0){
            echo "<p style='color: red; text-align: center;'>artworkID1 is not present in the database.</p>";
         }
         else if(mysqli_num_rows($check_result2)==0){
            echo "<p style='color: red; text-align: center;'>artworkID2 is not present in the database.</p>";
         }
         else if(mysqli_num_rows($check_result3)==0){
            echo "<p style='color: red; text-align: center;'>artworkID3 is not present in the database.</p>";
         }
         else if(mysqli_num_rows($check_result4)==0){
            echo "<p style='color: red; text-align: center;'>artworkID4 is not present in the database.</p>";
         }
         else if(mysqli_num_rows($check_result5)==0){
            echo "<p style='color: red; text-align: center;'>artworkID5 is not present in the database.</p>";
         }
        
        else{
            // Insert into database
            $insert_query1 = "INSERT INTO exhibition (name, description, start_date, end_date, location)
                             VALUES ('$exhibition_title','$exhibition_description','$exhibition_StartDate', '$exhibition_EndDate','$exhibition_location')";

           $result1=mysqli_query($conn,$insert_query1);
           
           $insert_query2 = "insert into displays_artwork_exhibition
                             values('$artwork1_id','$artwork2_id','$artwork3_id','$artwork4_id','$artwork5_id','$exhibition_title')";

           $result2=mysqli_query($conn,$insert_query2);

           if($result1 && $result2){
           echo "<p style='color: green;'>Exhibition added successfully!</p>";
           }
           else {
                echo "<p style='color: red;'>Failed to add exhibition.</p>";
           }
        }
    }
    else if (isset($_POST['delete_exhibition'])) {
    // Collect input values for deleting an exhibition
    $exhibition_title = $_POST['exhibition_title'];

    // Check if the ID exists
    $select_query = "SELECT * FROM exhibition WHERE name = '$exhibition_title'";
    $result=mysqli_query($conn,$select_query);

    if ($result->num_rows === 0) {
        echo "<p style='color: red;text-align: center;'>No exhibition found with this title.</p>";
    } 
    else {
        // Delete from database
        $delete_query   =   "DELETE d, e
                            FROM displays_artwork_exhibition AS d
                            JOIN exhibition AS e ON d.exhibition_title = e.name
                            WHERE e.name = '$exhibition_title'";
        $result=mysqli_query($conn,$delete_query);


        if ($result) {
            echo "<p style='color: green;'>Exhibition deleted successfully!</p>";
        } else {
            echo "<p style='color: red;'>Failed to delete exhibition.</p>";
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
    <title>Manage Exhibitions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .form-section {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
       

        <!-- Add Exhibition Form -->
        <div class="form-section">
            <h2 class="text-center">Add Exhibition</h2>
            <form method="POST">
    <div class="form-group">
        <label for="title">Exhibition Title</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="Enter exhibition title" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter exhibition description" required></textarea>
    </div>
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" id="start_date" name="start_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" id="end_date" name="end_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" class="form-control" placeholder="Enter exhibition location" required>
    </div>
    <!-- Enter artworks id to be shown in exhibition -->
     <!-- Artwork1-->
    <div class="form-group">
        <label for="artwork1">Artwork ID-1</label>
        <input type="text" id="artwork1" name="artwork1" class="form-control" placeholder="Enter artwork1" required>
    </div>

     <!-- Artwork2-->
     <div class="form-group">
        <label for="artwork2">Artwork ID-2</label>
        <input type="text" id="artwork2" name="artwork2" class="form-control" placeholder="Enter artwork2" required>
    </div>

    <!-- Artwork3-->
    <div class="form-group">
        <label for="artwork3">Artwork ID-3</label>
        <input type="text" id="artwork3" name="artwork3" class="form-control" placeholder="Enter artwork3" required>
    </div>

    <!-- Artwork4-->
    <div class="form-group">
        <label for="artwork4">Artwork ID-4</label>
        <input type="text" id="artwork4" name="artwork4" class="form-control" placeholder="Enter artwork4" required>
    </div>

    <!-- Artwork5-->
    <div class="form-group">
        <label for="artwork5">Artwork ID-5</label>
        <input type="text" id="artwork5" name="artwork5" class="form-control" placeholder="Enter artwork5" required>
    </div>
    
   <!-- Submit button-->
    <button type="submit" class="btn btn-primary" name="add_exhibition">Add Exhibition</button>
</form>
<!-- Delete Exhibition Form -->
<div class="form-section">
            <h2>Delete Exhibition</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="exhibition_title">Exhibition Title</label>
                    <input type="text"  id="exhibition_title" name="exhibition_title" class="form-control" placeholder="Enter title of exhibition to delete" required>
                </div>
                <button type="submit" class="btn btn-danger"  name="delete_exhibition">Delete Exhibition</button>
            </form>
        </div>
    </div>
    </body>
    </html>