<?php
include('../include/connect.php');



if(isset($_POST['insert_arttype'])){

  $arttype_title=$_POST['art_type'];//accesing input value

  //select data from database
  $select_query="select * from arttype where arttype_title= '$arttype_title'";
  $result_select=mysqli_query($conn,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<p style='color: red;'>This art type is already present in the database.</p>";
  }
  else{
  $insert_query="insert into arttype (arttype_title) values('$arttype_title')";
  $result=mysqli_query($conn,$insert_query);
  if($result){
  echo "<p style='color: green;'>Art type added successfully!</p>";
  }
}
}
?>
<form action="" method="post" class ="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-dark" id="basic-addon1">
  <i class="fa-solid fa-plus"></i>
</span>
  <input type="text" class="form-control" name="art_type"
   placeholder="Insert Art Type" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">
  
  <input type="submit" class=" bg-dark border-0" name="insert_arttype"
   value="Insert" aria-label="Username" aria-describedby="basic-addon1 "
   style="color: #fff;" class ="bg-dark">

</div>


     
</form>