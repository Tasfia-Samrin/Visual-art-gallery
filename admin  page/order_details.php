<?php
include('../include/connect.php');

// Fetch orders data from the database
$query = "select o.orderID,o.customerID,c.name,od.artworkID,od.quantity,o.orderDate,o.price,o.status
          from orders as o join order_details od join customer as c
          on o.orderID=od.orderID and o.customerID=c.id";

$result = $conn->query($query);
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
        background-color: #f2f2f2; 
        font-weight: bold;         
        color: #000;             
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
        <h2>Order Details</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Artwork Id</th>
                    <th>Quantity</th>
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any records
                if ($result->num_rows > 0) {
                    // Fetch each record 
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['orderID']}</td>
                                <td>{$row['customerID']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['artworkID']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['orderDate']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' class='text-center'>No order placed yet!</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>