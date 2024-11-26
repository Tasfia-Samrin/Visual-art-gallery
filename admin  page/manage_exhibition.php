<?php
// Start the session and verify admin login
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// Connect to the database
$con = mysqli_connect("localhost", "username", "password", "database_name");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle exhibition deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM exhibitions WHERE id = $delete_id";
    if (mysqli_query($con, $delete_query)) {
        echo "Exhibition deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// Fetch all exhibitions
$fetch_query = "SELECT * FROM exhibitions";
$result = mysqli_query($con, $fetch_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Exhibitions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Manage Exhibitions</h1>
        <a href="add_exhibition.php" class="btn btn-success mb-3">Add New Exhibition</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['description']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['location']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <a href="edit_exhibition.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="admin_exhibitions.php?delete_id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
