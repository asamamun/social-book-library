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
        img{
            max-width: 750px;
            max-height: 750px;
        }
    </style>
</head>
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
        <?php
        // Retrieve the book name from the query parameter
        $bookName = $_GET['bookName'];

      require 'connDB.php';

        // Perform the search based on the book name
        $sql = "SELECT * FROM books WHERE name = '$bookName'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $book_id = $row['id'];  
            }
        } else {
            echo '<script>alert("No search results found.");</script>';
            exit;
        }

        // Close the database connection
        ?>
    <div class="container">
        <h1>Book Details</h1>

        <?php
        // Retrieve the book_id from the URL parameter
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
            $bookId = $row['id'];
            $userId = $row['user_id'];
            

 
     $sql = "SELECT * FROM profiles WHERE user_id = '$userId'";
    // Execute the query
    $resultf = mysqli_query($conn, $sql);

    // Check if the query was successful and a row was returned
    if ($resultf && mysqli_num_rows($resultf) > 0) {
      // Fetch the row and retrieve the user's profile photo URL
      $rowf = mysqli_fetch_assoc($resultf);
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
        ?>

         <?php
        // Database connection settings
       require 'connDB.php';

        // Fetch comments from the database for a specific book
        
        $sql = "SELECT comments.id, comments.comment, comments.user_id, comments.reply_id, comments.created_at, users.name
                FROM comments
                INNER JOIN users ON comments.user_id = users.id
                WHERE comments.book_id = $bookId
                ORDER BY comments.created_at DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $commentId = $row['id'];
                $comment = $row['comment'];
                $userId = $row['user_id'];
                $replyId = $row['reply_id'];
                $createdAt = $row['created_at'];
                $username = $row['name'];

                echo '<div class="card mb-2">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $username . '</h5>';
                echo '<p class="card-text">' . $comment . '</p>';
                echo '<p class="card-text">Posted on: ' . $createdAt . '</p>';
                echo '<a href="#" class="btn btn-sm btn-primary edit-comment" data-comment-id="' . $commentId . '">Edit</a>';
                echo '<a href="#" class="btn btn-sm btn-danger delete-comment" data-comment-id="' . $commentId . '">Delete</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No comments found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Add/Edit Comment Form -->
        <form id="comment-form">
            <div class="form-group">
                <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Write your comment"></textarea>
            </div>
            <input type="hidden" name="book_id" value="<?php echo $bookId; ?>">
            <input type="hidden" name="comment_id" id="comment-id" value="">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    
    <script>
    $(document).ready(function() {
        // Edit comment button click event
        $(document).on('click', '.edit-comment', function(e) {
            e.preventDefault();
            var commentId = $(this).data('comment-id');
            var commentText = $(this).parent().siblings('.card-text').text().trim();
            $('#comment').val(commentText);
            $('#comment-id').val(commentId);
        });

        // Delete comment button click event
        $(document).on('click', '.delete-comment', function(e) {
            e.preventDefault();
            var commentId = $(this).data('comment-id');
            if (confirm('Are you sure you want to delete this comment?')) {
                // Perform delete operation using AJAX or submit a form to delete the comment
                $.ajax({
                    url: 'delete-comment.php',
                    method: 'POST',
                    data: { comment_id: commentId },
                    success: function(response) {
                        // Handle the response after deleting the comment
                        if (response === 'success') {
                            alert('Comment deleted successfully!');
                            location.reload(); // Refresh the page to reflect the changes
                        } else {
                            alert('An error occurred while deleting the comment. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error if deleting the comment fails
                        console.error(xhr.responseText);
                        alert('An error occurred while deleting the comment. Please try again.');
                    }
                });
            }
        });

        // Comment form submission
        $('#comment-form').submit(function(e) {
            e.preventDefault();
            var commentId = $('#comment-id').val();
            var commentText = $('#comment').val();
            var bookId = <?=json_encode($bookId)?>;

            console.log(commentId);
            console.log(commentText);
            console.log(bookId);

            // Perform add/edit operation using AJAX or submit a form to add/edit the comment
            $.ajax({
                url: 'add-edit-comment.php',
                method: 'POST',
                data: {
                    comment_id: commentId,
                    book_id: bookId,
                    comment: commentText
                },
                success: function(response) {
                    // Handle the response after adding/editing the comment
                    if (response === 'success') {
                        alert('Commentadded successfully!');
                        location.reload(); // Refresh the page to reflect the changes
                    } else {
                        alert('An error occurred while saving the comment. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error if adding/editing the comment fails
                    console.error(xhr.responseText);
                    alert('An error occurred while saving the comment. Please try again.');
                }
            });
        });
    });
    </script>
</body>
</html>
