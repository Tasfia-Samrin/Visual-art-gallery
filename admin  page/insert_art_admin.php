
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Arts-Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
  rel="stylesheet">
  <!--<link rel="stylesheet" href="../style.css"> -->

  
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h2 class="text-center">Insert Arts</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="art_title" class="form-label">Art title</label>
            <input type="text" name="art_title" id="art_title" 
            class="form-control" placeholder="Enter The Art Title" autocomplete="off"
            required="required">
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="description" class="form-label mt-4">Art Description</label>
            <input type="text" name="description" id="description" 
            class="form-control mb-4" placeholder="Enter The Description" autocomplete="off"
            required="required">
            </div>

             <!-- Types -->
             <div class="form-outline mb-4 w-50 m-auto ">
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


        </form> <!-- enctype for images-->
    </div>
    
</body>
</html>
