<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .carousel-item {
            height: 400px;
            /* Adjust the height as per your needs */
        }

        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            max-width: initial !important;
            max-height: initial !important;
        }

        .card img {
            max-width: 200px;
            max-height: 120px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <header>
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-dark bg-success fixed-top pt-3 pb-4 ">
                    <div class="container-fluid">
                        <!-- responsive nav button  -->
                        <button class="navbar-toggler d-lg-none " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- site title  -->
                        <a class="navbar-brand ms-5" href="#"><img src="assets/images/logo.png" alt="logo"></a>
                        <div class="d-none d-lg-block">
                            <a class="nav-link active text-light" href="all_books.php">All books</a>
                        </div>

                        <!-- navbar for large screen  -->
                        <div class="offcanvas-body d-none d-lg-block ">
                            <ul class="navbar-nav justify-content-end flex-row  ">
                                <li class="nav-item px-4 ">
                                    <a class="nav-link active" aria-current="page" href="../../chat/chat.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                                            <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                                        </svg>&nbsp; Chat</a>
                                </li>
                                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
                                    <!-- User is logged in, show profile anchor link -->
                                    <li class="nav-item px-4">
                                        <a class="nav-link active" href="profile.php">
                                            <?php
                                            // Check if session variable is set for the profile picture
                                            if (isset($_SESSION['profilepic'])) {
                                                $profilePic = $_SESSION['profilepic'];
                                                echo '<img src="' . $profilePic . '" style="width: 40px; height: 40px; margin-top: -7px;" class="img-fluid rounded-circle" alt="Profile Picture">';
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
                                        <a class="nav-link active" href="login.php">Login</a>
                                    </li>
                                    <li class="nav-item px-4 ">
                                        <a class="nav-link active" href="register.php">Registration</a>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item px-4 me-5">
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registrationModal">
                                        POST YOUR BOOK
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <!-- offset navbar for small screen  -->
                        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><a class="bg-image bg-cover bg-light" href="#"><img src="assets/images/logo.png" alt="logo"></a></h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                                    <li class="nav-item mb-3">
                                        <a class="nav-link active" aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                                                <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                                            </svg>&nbsp; Chat</a>
                                    </li>
                                    <li class="nav-item mb-3">
                                        <a class="nav-link active text-light" href="all_books.php">All books</a>
                                    </li>
                                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
                                        <!-- User is logged in, show profile anchor link -->
                                        <li class="nav-item px-4">
                                            <a class="nav-link active" href="profile.php">
                                                <?php
                                                // Check if session variable is set for the profile picture
                                                if (isset($_SESSION['profilepic'])) {
                                                    $profilePic = $_SESSION['profilepic'];
                                                    echo '<img src="' . $profilePic . '" style="width: 30px; height: 30px;" class="img-fluid rounded-circle" alt="Profile Picture">';
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
                                        <li class="nav-item py-3 ">
                                            <a class="nav-link active" href="login.php">Login</a>
                                        </li>
                                        <li class="nav-item py-3 ">
                                            <a class="nav-link active" href="register.php">Registration</a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item mb-3">
                                        <!-- Button to trigger the modal -->
                                        <button type="button" class="btn btn-warning mt-4" data-bs-toggle="modal" data-bs-target="#registrationModal">
                                            POST YOUR BOOK
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#scrollModal">
                        All of Bangladesh
                    </button>

                    <form class="d-flex mt-3 w-100 " role="search">
                        <div class=" d-flex px-5 px-lg-3 mx-auto w-100 search_wrap ">
                            <input class="form-control p-2 ps-3 p-lg-3 ps-lg-4 rounded-pill " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-light search_btn" type="submit">
                                <img src="./assets/images/search.png" alt="search icon">
                            </button>
                        </div>
                    </form>
                </nav>
            </div>
        </div>
    </header>
    <!-- main content -->
    <div style="margin-top: 250px;">
        <main class="container">
            <!-- carousel -->

            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Carousel slides go here -->
                    <div class="carousel-item active">
                        <img src="assets/images/book-1.jpg" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/book-2.jpg" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/book-12.webp" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>


            <div class="text-center m-2 p-2">
                <h3>Browse Books By Category</h3>
            </div>
            <?php
            require 'connDB.php';

            $query = "SELECT * FROM categories";
            $result = $conn->query($query);

            $cards = '';

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cards .= '<div class="col-lg-6">';
                    $cards .= '<div class="card mb-5">';
                    $cards .= '  <div class="card-header text-white bg-success">' . $row['name'] . '</div>';
                    $cards .= '  <div class="card-body">';
                    $cards .= '    <img src="' . $row['image'] . '" class="card-img-top" alt="Category Image">';
                    $cards .= '<div class="text-end">';
                    $cards .= '    <a href="view_category.php?id=' . $row['id'] . '" class="btn btn-primary">View</a>';
                    $cards .= '  </div>';
                    $cards .= '  </div>';
                    $cards .= '</div>';
                    $cards .= '</div>';
                }
            }

            // Close the database connection
            $conn->close();
            ?>

            <!-- Display the cards -->
            <div class="row">
                <?php echo $cards; ?>
            </div>

    </div>
    <!-- sub card -->

    </main>

    </div>
   <!-- Book post Modal -->
  <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card">
          <div class="card-header">Post your book now</div>
          <div class="card-body">
            <form id="bookForm" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
              </div>
              <div class="mb-3">
                <label for="sellprice" class="form-label">Sell Price</label>
                <input type="number" class="form-control" id="sellprice" name="sellprice" required>
              </div>
              <div class="mb-3">
                <label for="edition" class="form-label">Edition</label>
                <input type="text" class="form-control" id="edition" name="edition" required>
              </div>
              <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
              </div>
              <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                  <option value="">Select Category</option>
                  <?php
                  // Connect to the database
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "publiclibrary";
                  $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                  // Retrieve categories from the database
                  $stmt = $db->query("SELECT * FROM categories");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="subcategory_id" class="form-label">Subcategory</label>
                <select class="form-control" id="subcategory_id" name="subcategory_id" required>
                  <option value="">Select Subcategory</option>
                  <!-- Populate options using jQuery Ajax after category selection -->
                </select>
              </div>
              <div class="mb-3">
                <label for="writer_id" class="form-label">Writer</label>
                <select class="form-control" id="writer_id" name="writer_id" required>
                  <option value="">Select Writer</option>
                  <?php
                  // Retrieve writers from the database
                  $stmt = $db->query("SELECT * FROM writers");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="publisher_id" class="form-label">Publisher</label>
                <select class="form-control" id="publisher_id" name="publisher_id" required>
                  <option value="">Select Publisher</option>
                  <?php
                  // Retrieve publishers from the database
                  $stmt = $db->query("SELECT * FROM publishers");
                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
              </div>
              <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
              <button type="submit" class="btn btn-primary">Post Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Scrollable Modal -->
    <div class="modal fade" id="scrollModal" tabindex="-1" aria-labelledby="scrollModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollModalLabel">Scrollable Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-scroll-content">
                        <!-- Add your scrollable content here -->
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <!-- ...more content... -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="footer text-white py-5" style="background-color: darkgray;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget justo sit amet ligula ullamcorper volutpat. Sed euismod leo in mi pharetra, a fermentum justo pellentesque.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt-fill"></i> 123 Street, City, Country</li>
                        <li><i class="bi bi-telephone-fill"></i> +1 234 567 890</li>
                        <li><i class="bi bi-envelope-fill"></i> info@example.com</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Follow Us</h5>
                    <ul class="list-inline">
                        <li style="font-size: 2rem;" class="list-inline-item"><a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a></li>
                        <li style="font-size: 2rem;" class="list-inline-item"><a href="https://twitter.com/"><i class="bi bi-twitter"></i></a></li>
                        <li style="font-size: 2rem;" class="list-inline-item"><a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a></li>
                        <li style="font-size: 2rem;" class="list-inline-item"><a href="https://www.linkedin.com/"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <p class="text-center">Subscribe to our newsletter for the latest book releases and exclusive offers.</p>
                    <form>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email address" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <p class="text-center">&copy; 2023 Our Bookshop. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize the carousel
            $('.carousel').carousel();

            // Populate subcategories based on selected category
            $('#category_id').change(function() {
                var categoryId = $(this).val();

                // Make Ajax request
                $.ajax({
                    url: 'get_subcategories.php',
                    type: 'POST',
                    data: {
                        category_id: categoryId
                    },
                    success: function(response) {
                        $('#subcategory_id').html(response);
                    },
                    error: function(xhr, status, error) {
                        alert('Error retrieving subcategories: ' + error);
                    }
                });
            });

            // Submit the form using Ajax
            $('#bookForm').submit(function(event) {
                event.preventDefault();

                // Serialize form data
                var formData = new FormData(this);

                // Make Ajax request
                $.ajax({
                    url: 'save_book.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert('Book saved successfully!');
                        window.location.href = 'homee.php';
                    },
                    error: function(xhr, status, error) {
                        alert('Error saving book: ' + error);
                    }
                });
            });
        });
    </script>
</body>

</html>