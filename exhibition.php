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
                <a href="#" class="text-white mx-2">Gallery</a>
                <a href="exhibition.php" class="text-white mx-2">Exhibitions</a>
                <a href="#" class="text-white mx-2">Login</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mt-5">
        <!-- Ongoing Exhibitions -->
        <section>
            <h2>Ongoing Exhibitions</h2>
            <div class="exhibition-item">
                <h3>Nature's Wonders</h3>
                <p><strong>Description:</strong> Explore the beauty of nature through breathtaking artworks.</p>
                <p><strong>Date:</strong> 2024-11-25</p>
                <p><strong>Location:</strong> Downtown Art Center</p>
            </div>
            <div class="exhibition-item">
                <h3>Abstract Horizons</h3>
                <p><strong>Description:</strong> Dive into the world of abstract art and discover new perspectives.</p>
                <p><strong>Date:</strong> 2024-11-28</p>
                <p><strong>Location:</strong> City Art Hall</p>
            </div>
        </section>

        <!-- Upcoming Exhibitions -->
        <section class="mt-5">
            <h2>Upcoming Exhibitions</h2>
            <div class="exhibition-item">
                <h3>Colors of Life</h3>
                <p><strong>Description:</strong> An exhibition showcasing the vibrant hues of life.</p>
                <p><strong>Date:</strong> 2024-12-05</p>
                <p><strong>Location:</strong> Modern Art Gallery</p>
            </div>
            <div class="exhibition-item">
                <h3>Historic Impressions</h3>
                <p><strong>Description:</strong> Artworks inspired by history and cultural heritage.</p>
                <p><strong>Date:</strong> 2024-12-12</p>
                <p><strong>Location:</strong> Heritage Art Museum</p>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark text-center p-3 mt-5">
        <p>&copy; 2024 Visual Art Gallery. All rights reserved.</p>
    </footer>
</body>
</html>
