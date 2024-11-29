<?php
include('../include/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_exhibition'])) {
        // Collect input values for adding an exhibition
        $exhibition_title = $_POST['title'] ?? '';
        $exhibition_description = $_POST['description'] ?? '';
        $exhibition_StartDate = $_POST['start_date'] ?? '';
        $exhibition_EndDate = $_POST['end_date'] ?? '';
        $exhibition_location = $_POST['location'] ?? '';

        // Check if title already exists
        $select_query = "SELECT * FROM exhibition WHERE name = ?";
        $stmt = $conn->prepare($select_query);
        $stmt->bind_param("s", $exhibition_title);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<p style='color: red;'>This exhibition title is already present in the database.</p>";
        } else {
            // Insert into database
            $insert_query = "INSERT INTO exhibition (name, description, start_date, end_date, location) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("sssss", $exhibition_title, $exhibition_description, $exhibition_StartDate, $exhibition_EndDate, $exhibition_location);
            if ($stmt->execute()) {
                echo "<p style='color: green;'>Exhibition added successfully!</p>";
            } else {
                echo "<p style='color: red;'>Failed to add exhibition.</p>";
            }
        }
    }
    else if (isset($_POST['delete_exhibition'])) {
    // Collect input values for deleting an exhibition
    $exhibition_id = $_POST['exhibition_id'] ?? '';

    // Check if the ID exists
    $select_query = "SELECT * FROM exhibition WHERE id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("i", $exhibition_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<p style='color: red;'>No exhibition found with this ID.</p>";
    } else {
        // Delete from database
        $delete_query = "DELETE FROM exhibition WHERE id = ?";
        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param("i", $exhibition_id);
        if ($stmt->execute()) {
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
    <button type="submit" class="btn btn-primary" name="add_exhibition">Add Exhibition</button>
</form>
<!-- Delete Exhibition Form -->
<div class="form-section">
            <h2>Delete Exhibition</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="exhibition_id">Exhibition ID</label>
                    <input type="number" id="exhibition_id" name="exhibition_id" class="form-control" placeholder="Enter ID of exhibition to delete" required>
                </div>
                <button type="submit" class="btn btn-danger"  name="delete_exhibition">Delete Exhibition</button>
            </form>
        </div>
    </div>
    </body>
    </html>