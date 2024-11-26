<?php

include('./include/connect.php');

//getting arts index.php
function getArts(){
    global $con;
$select_query="Select * from arts order by rand() limit 0,9";
$result_query=mysqli_query($con, $select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $art_id=$row['column name'];
$art_title=$row['column name'];
$art_description=$row['column name'];
$art_image1=$row['column name'];
$art_price=$row['column name'];
$type_id=$row['column name'];

echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin page/art_images/$art_image1' class='card-img-top' alt='$art_title'>
              <div class='card-body'>
                <h5 class='card-title'>$art_title</h5>
                <p class='card-text'>$art_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View More</a>
              </div>
            </div>
          </div>";
}
}

//displaying types
 function getTypes(){
    global $con;
    $select_type="Select * from arttype";
                    $result_type=mysqli_query($con,$select_type);
                    while($row=mysqli_fetch_assoc($result_type)){
                        $art_type=$row['name of the art type column of 
                        the arttype table'];//check
                        $art_id=$row['name of the art id column of the 
                        arttype table'];
                        echo "<li class='nav-item'>
                        <a href='index.php?arttype=$art_id' class 'nav-link
                        text-light'> $art_type</a>
                        </li>";
                    }
 }
?>