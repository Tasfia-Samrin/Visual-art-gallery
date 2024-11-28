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
        <h1 class="text-center mb-5">Manage Exhibitions</h1>

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
                    <label for="date">Start Date</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="date">End Date</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control" placeholder="Enter exhibition location" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Exhibition</button>
            </form>
        </div>

        <!-- Delete Exhibition Form -->
        <div class="form-section">
            <h2>Delete Exhibition</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="exhibition_id">Exhibition ID</label>
                    <input type="number" id="exhibition_id" name="exhibition_id" class="form-control" placeholder="Enter ID of exhibition to delete" required>
                </div>
                <button type="submit" class="btn btn-danger">Delete Exhibition</button>
            </form>
        </div>
    </div>
</body>
</html>

