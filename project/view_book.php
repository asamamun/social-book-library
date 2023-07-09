<?php
session_start();
require 'connDB.php';
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
        img{
            max-width: 750px;
            max-height: 750px;
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
        <h1>Book Details</h1>

        <?php
        // Retrieve the book_id from the URL parameter
        if (isset($_GET['book_id'])) {
            $book_id = $_GET['book_id'];

            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "publiclibrary";
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Retrieve book details from the database
            $stmt = $db->prepare("SELECT books.*, users.name as users_name, categories.name as category_name, subcategories.name as subcategories_name, writers.name as writers_name, publishers.name as publishers_name, images.image
                                      FROM books
                                      JOIN users ON books.user_id = users.id
                                      JOIN categories ON books.category_id = categories.id
                                      JOIN subcategories ON books.subcategory_id = subcategories.id
                                      JOIN writers ON books.writer_id = writers.id
                                      JOIN publishers ON books.publisher_id = publishers.id
                                      JOIN images ON books.id = images.book_id
                                      WHERE books.id = :book_id ORDER BY books.id DESC");
            $stmt->bindParam(':book_id', $book_id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $userId = $row['user_id'];

 
     $sql = "SELECT * FROM profiles WHERE user_id = '$userId'";
    // Execute the query
    $resultf = mysqli_query($conn, $sql);

    // Check if the query was successful and a row was returned
    if ($resultf && mysqli_num_rows($resultf) > 0) {
      // Fetch the row and retrieve the user's profile photo URL
      $rowf = mysqli_fetch_assoc($resultf);
      $profilePhoto = $rowf['image'];
      $_SESSION['profilepic'] = $profilePhoto;
      $about = $rowf['bio'];
      $phone = $rowf['phone'];
    }

            if ($row) {
                echo '<div class="card mt-5">
                <div class="row">
                <div class="col-md-8">
                    <h3 class="card-title ms-3 p-2">' . $row['name'] . '</h3>
                    <p class="card-text ms-4"><strong>Posted on:</strong> ' . $row['created_at'] ."  location: ". $row['location'] . '</p>
                    <img src="' . $row['image'] . '" class="card-img-top" alt="Book Cover">
                    <div class="card-body">
                        <p class="card-text"><strong>Description:</strong> ' . $row['description'] . '</p>
                        <p class="card-text"><strong>Price:</strong> ' . $row['price'] . ' Tk</p>
                        <p class="card-text"><strong>Selling Price:</strong> ' . $row['sellprice'] . ' Tk</p>
                        <p class="card-text"><strong>Category:</strong> ' . $row['category_name'] . '</p>
                        <p class="card-text"><strong>Subcategory:</strong> ' . $row['subcategories_name'] . '</p>
                        <p class="card-text"><strong>Writer:</strong> ' . $row['writers_name'] . '</p>
                        <p class="card-text"><strong>Publisher:</strong> ' . $row['publishers_name'] . '</p>
                        <p class="card-text"><strong>Edition:</strong> ' . $row['edition'] . '</p>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                <div class="card me-4">
                        <h3 class="card-text"><strong>For sale by:</strong> ' . $row['users_name'] . '</h3>
                        <h5 class="card-text"><strong>Price:</strong> ' . $row['price'] . ' Tk</h5>
                        <h5 class="card-text"><strong>Selling Price:</strong> ' . $row['sellprice'] . ' Tk</h5>
                        <h4 class="card-text"><strong>Phone:</strong> ' .$phone .'</h4>
                </div>
                </div>
            </div>
            </div>';
            
            } else {
                echo '<p>Book not found.</p>';
            }
        } else {
            echo '<p>Invalid book ID.</p>';
        }
        ?>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>