<?php
session_start();
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
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top ">
        <div class="container-fluid">
            <a style="margin-left: 2rem;" class="navbar-brand" href="homee.php">
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
            $stmt =$db->prepare("SELECT books.*, users.name, categories.name, subcategories.name, writers.name, publishers.name, images.image
                                      FROM books
                                      JOIN users ON books.user_id = users.id
                                      JOIN categories ON books.category_id = categories.id
                                      JOIN subcategories ON books.subcategory_id = subcategories.id
                                      JOIN writers ON books.writer_id = writers.id
                                      JOIN publishers ON books.publisher_id = publishers.id
                                      JOIN images ON books.id = images.book_id
                                      WHERE books.id = :book_id");
            $stmt->bindParam(':book_id', $book_id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                echo '<div class="card">
                        <img src="' . $row['image'] . '" class="card-img-top" alt="Book Cover">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['name'] . '</h5>
                            <p class="card-text"><strong>Description:</strong> ' . $row['description'] . '</p>
                            <p class="card-text"><strong>Price:</strong> ' . $row['price'] . '</p>
                            <p class="card-text"><strong>Selling Price:</strong> ' . $row['sellprice'] . '</p>
                            <p class="card-text"><strong>User ID:</strong> ' . $row['user_id'] . '</p>
                            <p class="card-text"><strong>Category:</strong> ' . $row['category_id'] . '</p>
                            <p class="card-text"><strong>Subcategory:</strong> ' . $row['subcategory_id'] . '</p>
                            <p class="card-text"><strong>Writer:</strong> ' . $row['writer_id'] . '</p>
                            <p class="card-text"><strong>Publisher:</strong> ' . $row['publisher_id'] . '</p>
                            <p class="card-text"><strong>Edition:</strong> ' . $row['edition'] . '</p>
                            <p class="card-text"><strong>Location:</strong> ' . $row['location'] . '</p>
                            <p class="card-text"><strong>Created At:</strong> ' . $row['created_at'] . '</p>
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