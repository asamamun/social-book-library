<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $file = $_FILES['file'];
  $filearr = explode(".",$file['name']);
  $ext = end($filearr);
  $file_name = time(). "." . $name . "." . $ext;
  echo $file_name;

  

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S M Pilot Model High School</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="jumbotron">
<div class="container">
    <br>
    <!-- <a href="#" class="btn btn-primary pull-right">Register</a> -->
    <a href="Login.php" class="btn btn-primary pull-right">Login</a>
    <a href="index.php" class="btn btn-primary">Home</a>
    <br>
    <br>
    <br>
    <h2 class="text-center">Student Registration Form</h2>
    <br>
    <div class="row">
        <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter your name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">
      </div>
      <div class="mb-3">
        <label for="confirm-password" class="form-label">Retype Password</label>
        <input name="confirm_password" type="password" class="form-control" id="confirm-password" placeholder="Retype your password">
      </div>
      <div class="mb-3">
        <label for="file" class="form-label">Upload Image</label>
        <input name="file" type="file" class="form-control" id="file">
      </div>
      <div class="text-center">
      <input name="submit" type="submit" class="btn btn-primary" value="Registration">
      </div>
            </form>
        </div>
    </div>
    <footer>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p class="text-center">Copyright 2023 Project &copy; Develop by <a href="#">Shakil Miah</a></p>
    </footer>
</div>
    

    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>