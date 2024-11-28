
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artist's Page</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
  rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
</head>
<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark border border-dark border-3"> 
         <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link text-white">Welcome</a> 
        </li>
        </ul>
       
      </div>
    </nav>

    <div class="bg-light">
        <h3 class="text-center p-2">Manage</h3>
    </div>
     
    <div class="row bg-light">
        <div class="col-md-12-bg-secondary p-1 d-flex align-items-center">
            <div>
               <a href="#"><img src="../images/admin.jfif" alt="" class="admin_image"> </a>
               <p class="text-dark text-center">Artist's name</p>
            </div>

            <div class="button text-center text-dark p-4">
                <button class="my-3"><a href="insert_art_artist.php" class="nav-link text-dark bg-bg-primary mg-1">Insert Art</a></button>
                <button><a href="view_arts.php" class="nav-link text-dark bg-bg-primary mg-1">View Art</a></button>
                <button><a href="update_profile.php" class="nav-link text-dark bg-bg-primary mg-1">Update Profile</a></button>
                <button><a href="" class="nav-link text-dark bg-bg-primary mg-1">Logout</a></button>
               
               <!--<br> <button><a href="" class="nav-link text-dark bg-bg-primary mg-1">Logout</a></button> -->
                <!--<button><a href="" class="nav-link text-dark bg-bg-primary mg-1"></a></button>
                <button><a href="" class="nav-link text-dark bg-bg-primary mg-1"></a></button>-->

            </div>
        </div>
    </div>
  </div>
  
  </body>
</html>
