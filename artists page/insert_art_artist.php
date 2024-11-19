<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Arts-Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
  rel="stylesheet">
  <!--<link rel="stylesheet" href="../style.css"> -->
<!--
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center">Insert Arts</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="art_title" class="form-label">Art title</label>
            <input type="text" name="art_title" id="art_title" 
            class="form-control" placeholder="Enter The Art Title" autocomplete="off"
            required="required">
            </div>

            <!-- Description -->
            <!--<div class="form-outline mb-4 w-50 m-auto ">
            <label for="description" class="form-label mt-4">Art Description</label>
            <input type="text" name="description" id="description" 
            class="form-control mb-4" placeholder="Enter The Description" autocomplete="off"
            required="required">
            </div>

             <!-- Types -->
           <!--  <div class="form-outline mb-4 w-50 m-auto ">
             <label for="art_types" class="form-label">Select Art Type</label>
            <select name="art_types" id="" class="form-control">
                <option value="">Select Type</option>
                <option value="">Type 1</option>
                <option value="">Type 2</option>
                <option value="">Type 3</option>
                <option value="">Type 4</option>
                <option value="">Type 5</option>
                <option value="">Type 6</option>
            </select>
            </div>

             <!-- Art 1 -->
             <!--<div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image1" class="form-label mt-4">Art 1</label>
            <input type="file" name="Art_image1" id="Art_image1" 
            class="form-control" required="required">
            </div>

               <!-- Art 2 -->
             <!--<div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image2" class="form-label mt-4">Art 2</label>
            <input type="file" name="Art_image2" id="Art_image2" 
            class="form-control" required="required">
            </div>

             <!-- Art 3 
             <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image3" class="form-label mt-4">Art 3</label>
            <input type="file" name="Art_image3" id="Art_image3" 
            class="form-control" required="required">
            </div>-->

             <!-- Art 4 
             <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image4" class="form-label mt-4">Art 4</label>
            <input type="file" name="Art_image4" id="Art_image4" 
            class="form-control" required="required">
            </div>
-->
            
             <!-- Button -
             <div class="form-outline mb-4 w-50 m-auto ">
              <input type="submit" name="insert_art" class="btn btn-dark mb-3 px-3 mt-4"
              value="Insert Arts">
            </div>
-->


    <!--    </form> 
    </div>
    
</body>
</html>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profile Editing Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: darkslategray;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: whitesmoke;
            color:black;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Insert Art</h2>
        <form action="update_artist_profile.php" method="POST">
           
            <!-- Art Title -->
            <label for="art_title">Art Title</label>
            <input type="text" id="art_title" name="art_title" placeholder="Enter the title" required>

            <!--Description-->
            <label for="description">Art Description</label>
            <textarea id="description" name="description" rows="4"
             placeholder="Enter Description..."></textarea>
            <!--<input type="text" id="description" name="description"
             placeholder="Enter Description" required> -->

            <!-- Art Type -->
             
            <label for="art_types" class="form-label">Select Art Type</label>
            <select name="art_types" id="" class="form-control">
                <option value="">Select Type</option>
                <option value="">Type 1</option>
                <option value="">Type 2</option>
                <option value="">Type 3</option>
                <option value="">Type 4</option>
                <option value="">Type 5</option>
                <option value="">Type 6</option>
            </select>

          <!-- Art 1 -->
          <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image1" class="form-label mt-4">Art 1</label>
            <input type="file" name="Art_image1" id="Art_image1" 
            class="form-control" required="required">
            </div>

               <!-- Art 2 -->
             <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image2" class="form-label mt-4">Art 2</label>
            <input type="file" name="Art_image2" id="Art_image2" 
            class="form-control" required="required">
            </div>

             <!-- Art 3 -->
             <!--<div class="form-outline mb-4 w-50 m-auto ">-->
            <label for="Art_image3" class="form-label mt-4">Art 3</label>
            <input type="file" name="Art_image3" id="Art_image3" 
            class="form-control" required="required">
            <!--</div> -->

             <!-- Art 4 -->
             <!--<div class="form-outline mb-4 w-50 m-auto "> -->
            <label for="Art_image4" class="form-label mt-4">Art 4</label>
            <input type="file" name="Art_image4" id="Art_image4" 
            class="form-control" required="required">
            <!--</div>-->

            <!-- Submit Button -->
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>