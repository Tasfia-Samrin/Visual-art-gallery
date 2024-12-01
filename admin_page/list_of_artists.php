<?php
// Include database connection
include('../include/connect.php');

// Fetch artists data from the database
$query = "SELECT name, email, phone, bio FROM artist";
$result = $conn->query($query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #000;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Artists Details</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Bio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any records
                if ($result->num_rows > 0) {
                    // Fetch each record
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . htmlspecialchars($row['phone']) . "</td>
                                <td>" . htmlspecialchars($row['bio']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='4' class='text-center'>No artist found</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
