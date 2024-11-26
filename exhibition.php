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

// Fetch Ongoing Exhibitions
$ongoing_query = "SELECT title, date, location FROM exhibitions WHERE status = 'ongoing'";
$ongoing_result = mysqli_query($con, $ongoing_query);

// Fetch Upcoming Exhibitions
$upcoming_query = "SELECT title, date, location FROM exhibitions WHERE status = 'upcoming'";
$upcoming_result = mysqli_query($con, $upcoming_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Art Gallery</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Visual Art Gallery</h1>
            <nav>
                <a href="index.php" class="text-white mx-2">Home</a>
                <a href="#" class="text-white mx-2">Gallery</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="#" class="text-white mx-2">Login</a>
            </nav>
         </div>
     </header>

    <!-- Ongoing Exhibition Section -->
    <section class="banner text-center text-black">
        <div class="container">
            <h2 class="display-4">Ongoing Exhibition</h2>
            <?php if (mysqli_num_rows($ongoing_result) > 0): ?>
                <ul class="list-unstyled">
                    <?php while ($row = mysqli_fetch_assoc($ongoing_result)): ?>
                        <li>
                            <h4><?php echo $row['title']; ?></h4>
                            <p>Date: <?php echo $row['date']; ?></p>
                            <p>Location: <?php echo $row['location']; ?></p>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No ongoing exhibitions at the moment.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Upcoming Exhibition Section -->
    <section class="banner text-center text-black">
        <div class="container">
            <h2 class="display-4">Upcoming Exhibition</h2>
            <?php if (mysqli_num_rows($upcoming_result) > 0): ?>
                <ul class="list-unstyled">
                    <?php while ($row = mysqli_fetch_assoc($upcoming_result)): ?>
                        <li>
                            <h4><?php echo $row['title']; ?></h4>
                            <p>Date: <?php echo $row['date']; ?></p>
                            <p>Location: <?php echo $row['location']; ?></p>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No upcoming exhibitions at the moment.</p>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>



    