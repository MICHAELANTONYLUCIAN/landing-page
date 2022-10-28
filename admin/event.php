<?php
require '../config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Event</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <style>
        span{
            color: red;
        }
    </style>
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="event.html">Add Event</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li>
                      <hr class="dropdown-div">
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <div class="container">
<form action="save.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label><span>*</span>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Mobile Number</label><span>*</span>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="MobileNumber" name="MobileNo" required>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label><span>*</span>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="password" required>
    </div>
    <!-- <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Event Name </label><span>*</span>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Event Name" name="eventName" required>
    </div> -->
    <div class="mb-3">
    <select class="form-select" aria-label="Default select example" name="eventName">
      <option selected >Open this select menu</option>
      <option value="Marriage"  >Marriage</option>
      <option value="Party" >Party</option>
      <option value="Reception" >Reception</option>
      <option value="College Event">College Event</option>
      <optionc value="Other">Other</option>
    </select>
    </div>
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple required><br>
    <input type="submit" name="submit" value="UPLOAD">
    </div>
</form>
</body>
</html>