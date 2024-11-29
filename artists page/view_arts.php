<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Art</title>
    <style>
        h2 {
            text-align: center; 
            margin-top: 10px;  
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 30px;
            text-align: center;
        }
        .btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            margin: 2px;
            border: none;
            cursor: pointer;
        }
        .btn-edit {
            background-color: #4CAF50;
        }
        .btn-delete {
            background-color: #f44336;
        }
        .btn-approve {
            background-color: #007BFF;
        }
    </style>
</head>
<body>
    <h2>View Art Details</h2>

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

    // Query to fetch art details
    $viewArt_query = "SELECT a.id, a.title,a.description,t.arttype_title, a.arttype_id, a.year_created, a.medium, a.dimension, a.price, a.is_available,ar.imageURL,a.image
                      FROM art_work as a,arttype as t,artwork_images as ar
                      where t.arttype_id=a.arttype_id and a.id=ar.artworkID;";
    $viewArt_result = mysqli_query($con, $viewArt_query);

    if (!$viewArt_result) {
        echo "<p>Error fetching art details: " . mysqli_error($con) . "</p>";
    } else {
    ?>
        <table>
            <thead>
                <tr>
                    <th>Art ID</th>
                    <th>Artwork</th>
                    <th>Title</th>
                    <th>Art Type</th>
                    <th>Description</th>
                    <th>Year Created</th>
                    <th>Medium</th>
                    <th>Dimension</th>
                    <th>Price</th>
                    <th>Available</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($viewArt_result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td> <img src="arts_images/<?php echo $row['imageURL']; ?>"></td>
                        <td><?= htmlspecialchars($row['title']); ?></td>
                        <td><?= htmlspecialchars($row['arttype_title']); ?></td>
                        <td><?= htmlspecialchars($row['description']); ?></td>
                        <td><?= htmlspecialchars($row['year_created']); ?></td>
                        <td><?= htmlspecialchars($row['medium']); ?></td>
                        <td><?= htmlspecialchars($row['dimension']); ?></td>
                        <td><?= htmlspecialchars($row['price']); ?></td>
                        <td><?= $row['is_available'] ? 'Yes' : 'No'; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </body>
</html>
    <?php
    } // Close the else block
    mysqli_close($con);
    ?>

