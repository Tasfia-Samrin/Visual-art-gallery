<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Art Gallery - Exhibitions</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        section h2 {
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .exhibition-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .exhibition-item h3 {
            margin: 0 0 10px;
        }
        .exhibition-item p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Visual Art Gallery</h1>
            <nav>
                <a href="index.php" class="text-white mx-2">Home</a>
                <a href="gallery.php" class="text-white mx-2">Gallery</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="user/user_type.php" class="text-white mx-2">Login</a>
            </nav>
        </div>
    </header>

    <!-- Connection with database -->
    <?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "online_art_gallery";

    $con = mysqli_connect($host, $user, $password, $database);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Ongoing Exhibitions Query
    $OngoingExhibition_query = "SELECT name, start_date, end_date, location, description
                                FROM exhibition 
                                WHERE CURRENT_DATE() BETWEEN start_date AND end_date;";
    $OngoingExhibition_result = mysqli_query($con, $OngoingExhibition_query);

    // Upcoming Exhibitions Query
    $UpcomingExhibition_query = "SELECT name, start_date, end_date, location, description
                                FROM exhibition 
                                WHERE CURRENT_DATE() < start_date;";
    $UpcomingExhibition_result = mysqli_query($con, $UpcomingExhibition_query);
    ?>

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- Ongoing Exhibitions -->
        <section>
            <h2>Ongoing Exhibitions</h2>

            <?php
            if ($OngoingExhibition_result && mysqli_num_rows($OngoingExhibition_result) > 0):
                while ($row = mysqli_fetch_assoc($OngoingExhibition_result)): ?>
                    <div class="exhibition-item">
                        <h3><?= htmlspecialchars($row['name']); ?></h3>
                        <p><strong>Description:</strong> <?= htmlspecialchars($row['description']); ?></p>
                        <p><strong>Start Date:</strong> <?= htmlspecialchars($row['start_date']); ?></p>
                        <p><strong>End Date:</strong> <?= htmlspecialchars($row['end_date']); ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($row['location']); ?></p>
                    </div>
                <?php endwhile;
            else: ?>
                <p>No ongoing exhibitions at the moment.</p>
            <?php endif; ?>
        </section>

        <!-- Upcoming Exhibitions -->
        <section class="mt-5">
            <h2>Upcoming Exhibitions</h2>

            <?php
            if ($UpcomingExhibition_result && mysqli_num_rows($UpcomingExhibition_result) > 0):
                while ($row = mysqli_fetch_assoc($UpcomingExhibition_result)): ?>
                    <div class="exhibition-item">
                        <h3><?= htmlspecialchars($row['name']); ?></h3>
                        <p><strong>Description:</strong> <?= htmlspecialchars($row['description']); ?></p>
                        <p><strong>Start Date:</strong> <?= htmlspecialchars($row['start_date']); ?></p>
                        <p><strong>End Date:</strong> <?= htmlspecialchars($row['end_date']); ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($row['location']); ?></p>
                    </div>
                <?php endwhile;
            else: ?>
                <p>No upcoming exhibitions found.</p>
            <?php endif; ?>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark text-center p-3 mt-5">
        <p>&copy; 2024 Visual Art Gallery. All rights reserved.</p>
    </footer>

    <?php
    // Close database connection
    mysqli_close($con);
    ?>
</body>
</html>