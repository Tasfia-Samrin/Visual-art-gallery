<?php
include('../include/connect.php');

// Fetch customer data from the database
$query = "select id, name, email, phone, address FROM customer";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    th {
        background-color: #f2f2f2; /* Consistent header background */
        font-weight: bold;         /* Ensure bold text */
        color: #000;               /* Set text color to black */
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
    <div class="container">
        <h2>Customer Details</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any records
                if ($result->num_rows > 0) {
                    // Fetch each record 
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['address']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='5' class='text-center'>No customers found</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>