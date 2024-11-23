<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-View Art</title>
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
        th, td {
            padding: 10px;
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
    <table>
        <thead>
            <tr>
                <th>Art ID</th>
                <th>Title</th>
                <th>Art</th>
                <th>Price</th>
                <th>Total Sold</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="art-table">
            <!-- Dynamic rows will be added here using PHP -->
        </tbody>
    </table>
</body>
</html>
