<?php
include('../include/connect.php');
if(isset($_POST['insert_art'])){
    $art_title=$_POST['art_title'];
    $description=$_POST['description']; 
    $art_type=$_Post['art_types']; 
    $price=$_Post['price']; 
    $status='true';
    //accessing images
    $art_image1=$_FILES['Art_image1']['name'];
    $art_image2=$_FILES['Art_image2']['name']; 
    $art_image3=$_FILES['Art_image3']['name']; 
    $art_image4=$_FILES['Art_image4']['name']; 

    $temp_image1=$_FILES['Art_image1']['tmp_name'];
    $temp_image2=$_FILES['Art_image2']['tmp_name'];
    $temp_image3=$_FILES['Art_image3']['tmp_name'];
    $temp_image4=$_FILES['Art_image4']['tmp_name']; 


          //checking conditions
     if($art_title='' || $description='' ||  $description='' || $art_type='' ||
        $price='' || $art_image1='' || $art_image2='' || $art_image3='' || $art_image4=''){
          echo "<p style='color: black;'>Fill All The Fields.</p>";
              
        }

     else{
           move_uploaded_file($temp_image1,"./art images/$art_image1");
           move_uploaded_file($temp_image2,"./art images/$art_image2");
           move_uploaded_file($temp_image3,"./art images/$art_image3");
           move_uploaded_file($temp_image4,"./art images/$art_image4");

           //insert art
           $insert_arts="insert into ``() values ('')";
           $result_query=mysqli_query($conn,$insert_arts);
           if($result_query){
            echo "<p style='color: black;'>Successfully Inserted</p>";
           }

     }
     
    }
?>

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
                <?php

                    $select_query="Select * from arttype";
                    $result_query=mysqli_query($conn,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $art_type=$row['arttype_title'];
                        $art_id=$row['arttype_id'];
                        echo "<option value='$art_id'> $art_type</option>";
                    }
                 ?>   
            </select>
            </div>

             <!-- Art 1 -->
             <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image1" class="form-label mt-4">Art 1</label>
            <input type="file" name="Art_image1" id="Art_image1" 
            class="form-control" required="required">
            </div>

               <!-- Art 2 -->
             <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image2" class="form-label">Art 2</label>
            <input type="file" name="Art_image2" id="Art_image2" 
            class="form-control" required="required">
            </div>

             <!-- Art 3 -->
             <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image3" class="form-label">Art 3</label>
            <input type="file" name="Art_image3" id="Art_image3" 
            class="form-control" required="required">
            </div>

             <!-- Art 4 -->
             <div class="form-outline mb-4 w-50 m-auto ">
            <label for="Art_image4" class="form-label">Art 4</label>
            <input type="file" name="Art_image4" id="Art_image4" 
            class="form-control" required="required">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto ">
            <label for="price" class="form-label mt-4">Art Price</label>
            <input type="text" name="price" id="price" 
            class="form-control mb-4" placeholder="Enter The Price" autocomplete="off"
            required="required">
            </div>
            
             <!-- Button -->
             <div class="form-outline mb-4 w-50 m-auto ">
              <input type="submit" name="insert_art" class="btn btn-dark mb-3 px-3"
              value="Insert Arts">
            </div>


        </form> <!-- enctype for images-->
    </div>
    
</body>
</html>
