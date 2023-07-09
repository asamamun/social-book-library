<?php
session_start();

require 'connDB.php';

$query = "SELECT * FROM categories";
$result = $conn->query($query);

$cards = '';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $cards .= '<a href="view_category.php?id=' . $row['id'] . '" class="btn">' . $row['name'] . '</a><br>';
        
    }
}

// Close the database connection
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        #navbrand {
            max-width: 200px;
            max-height: 120px;
            object-fit: cover;
        }

        .card-container {
            display: flex;
        }

        .card-container .book-cover {
            width: 200px;
            height: 200px;
            margin-top: 20px;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top ">
        <div class="container-fluid">
            <a style="margin-left: 2rem;" class="navbar-brand" href="home.php">
                <img id="navbrand" src="assets/images/logo.png" alt="Logo">
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                </li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
                    <!-- User is logged in, show profile anchor link -->
                    <li class="nav-item px-4">
                        <a class="nav-link active" href="profile.php">
                            <?php
                            // Check if session variable is set for the profile picture
                            if (isset($_SESSION['profilepic'])) {
                                $profilePic = $_SESSION['profilepic'];
                                echo '<img src="' . $profilePic . '" style="width: 40px; height: 40px;" class="img-fluid rounded-circle" alt="Profile Picture">';
                            } else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            </svg>';
                            }
                            ?>
                        </a>
                    </li>
                <?php else : ?>
                    <!-- User is not logged in, show login anchor link -->
                    <li class="nav-item px-4 ">
                        <a class="nav-link active text-white" href="login.php">Login</a>
                    </li>
                    <li class="nav-item px-4 ">
                        <a class="nav-link active text-white" href="register.php">Registration</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>
    <div class="container">
      <div class="row g-0 my-5">
        <div class="col-3 mt-5">
            <div class="card mt-5 ">
              <div class="card-body vh-100">
              <h3 class="m-1">All Categories</h3> <hr>
              <?php echo $cards; ?>

              </div>
            </div>
        </div>
        <div class="col-9 mt-5">
          <div class="col-12 d-flex justify-content-center mt-4">
            <div class="col-md-10">
                <?php
                // Connect to the database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "publiclibrary";
                $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // Retrieve book details and cover image for the logged-in user from the books and images tables
                $stmt = $db->prepare("SELECT books.*, images.image 
                       FROM books 
                       JOIN images ON books.id = images.book_id");
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '
             <div class="card my-4">
             <div class="card-container">
                 <img src="' . $row['image'] . '" class="book-cover" alt="Book Cover">
                 <div class="card-body">
                     <h5 class="card-title">' . $row['name'] . '</h5>
                     <p class="card-text">Location: ' . $row['location'] . '</p>
                     <p class="card-text">Price: ' . $row['price'] . ' Tk</p>
                     <p class="card-text">Selling Price: ' . $row['sellprice'] . ' Tk</p>
                     <p class="card-text">Time: ' . $row['created_at'] . '</p>
                     <div class="text-end">
                     <a href="view_book.php?book_id=' . $row['id'] . '" class="btn btn-primary">View</a>
                     </div>
                 </div>
             </div>
         </div>';
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>