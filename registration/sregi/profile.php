<?php
// Start the session
session_start();

// Check if the user is logged in and the user ID is set in the session
if (isset($_SESSION['user_id'])) {
  // Retrieve the user ID from the session
  $userId = $_SESSION['user_id'];

  // Connect to the MySQL database
  require 'connDB.php';

  // Check if the connection was successful
  if ($conn) {
    // Query to retrieve the user's name from the database
    $query = "SELECT name FROM users WHERE id = '$userId'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful and a row was returned
    if ($result && mysqli_num_rows($result) > 0) {
      // Fetch the row and retrieve the user's name
      $row = mysqli_fetch_assoc($result);
      $name = $row['name'];
    }
    $sql = "SELECT * FROM profiles WHERE user_id = '$userId'";

    // Execute the query
    $resultf = mysqli_query($conn, $sql);

    // Check if the query was successful and a row was returned
    if ($resultf && mysqli_num_rows($resultf) > 0) {
      // Fetch the row and retrieve the user's profile photo URL
      $row = mysqli_fetch_assoc($resultf);
      $profilePhoto = $row['image'];
      $_SESSION['profilepic'] = $profilePhoto;
      $about = $row['bio'];
    }

    // Close the database connection
    mysqli_close($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0.min.js"></script>
  <script src="assets/js/jquery-3.7.0.min.js"></script>
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
      margin-top: 40px;
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

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card mt-5">
          <img src="assets/images/cover.jpeg" class="card-img-top" alt="Cover Photo">
          <div class="card-body text-center">
            <?php if (isset($profilePhoto)) : ?>
              <img src="<?php echo $profilePhoto; ?>" class="rounded-circle mb-3" width="150" height="150" alt="Profile Photo">
            <?php else : ?>
              <img src="assets/images/book-1.jpg" class="rounded-circle mb-3" width="150" height="150" alt="Default Profile Photo">
            <?php endif; ?>
            <?php if (isset($name)) : ?>
              <h3 class="card-title"><?php echo $name; ?></h3>
            <?php endif; ?>

            <div class="card-text">
              <?php if (isset($about)) : ?>
                <h5>About Me</h5>
                <p><?php echo $about; ?></p>
              <?php endif; ?>
            </div>

            <a href="#editProfileModal" class="btn btn-primary text-end" data-bs-toggle="modal">Edit Profile</a>
            <!-- Button to trigger the modal -->
            <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#registrationModal">
              POST YOUR BOOK
            </button>
            <a class="nav-link mt-5 btn btn-danger" href="#" id="logoutBtn">Logout</a>
          </div>
        </div>
      </div>


      <div class="mt-3" id="bookCardContainer">

        <?php

        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
          $user_id = $_SESSION['user_id'];

          // Connect to the database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "publiclibrary";
          $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

          // Retrieve book details and cover image for the logged-in user from the books and images tables
          $stmt = $db->prepare("SELECT books.*, images.image 
                                      FROM books 
                                      JOIN images ON books.id = images.book_id 
                                      WHERE books.user_id = :user_id");
          $stmt->bindParam(':user_id', $user_id);
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="col-md-6 offset-md-3 mt-3">
                            <div class="card">
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
                            </div>
                        </div>';
          }
        } else {
          echo '<p>Please log in to view your books.</p>';
        }
        ?>


      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card">
          <div class="card-header">Update your profile</div>
          <div class="card-body">
            <form id="profileForm" enctype="multipart/form-data">
              <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['user_id']; ?>">
              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="mb-3">
                <label for="division" class="form-label">Division</label>
                <select class="form-select" id="division" name="division" required>
                  <option value="">Select Division</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="district" class="form-label">District</label>
                <select class="form-select" id="district" name="district" required>
                  <option value="">Select District</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="area" class="form-label">Area</label>
                <select class="form-control" id="area" name="area" required>
                  <option value="">Select Area</option>
                  <!-- Area options will be populated dynamically -->
                </select>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
              </div>
              <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea class="form-control" id="bio" name="bio" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="excerpt" class="form-label">Excerpt</label>
                <textarea class="form-control" id="excerpt" name="excerpt" rows="2" required></textarea>
              </div>
              <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
              </div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Post Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
  <script>
    $(document).ready(function() {
      // Populate divisions dropdown
      $.ajax({
        url: "get_divisions.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
          if (data.success) {
            var options = "";
            $.each(data.divisions, function(index, division) {
              options += "<option value='" + division.divid + "'>" + division.divname + "</option>";
            });
            $("#division").html(options);
          }
        }
      });

      // Populate districts dropdown based on selected division
      $("#division").change(function() {
        var divisionId = $(this).val();
        $.ajax({
          url: "get_districts.php",
          type: "POST",
          data: {
            divid: divisionId
          },
          dataType: "json",
          success: function(data) {
            if (data.success) {
              var options = "";
              $.each(data.districts, function(index, district) {
                options += "<option value='" + district.distid + "'>" + district.distname + "</option>";
              });
              $("#district").html(options);
            }
          }
        });
      });

      // Populate area dropdown based on selected district
      $('#district').change(function() {
        var districtId = $(this).val();

        // Send AJAX request to get areas
        $.ajax({
          url: 'get_areas.php',
          type: 'POST',
          data: {
            districtId: districtId
          },
          success: function(response) {
            // Populate area dropdown with options
            $('#area').html(response);
          }
        });
      });

      // Submit profile form
      $('#profileForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
          url: 'save_profile.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(response) {
            // Handle success or error response
            alert(response);
            window.location.href = 'profile.php';
          }
        });
      });
      $('#logoutBtn').on('click', function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Display SweetAlert confirmation dialog
        Swal.fire({
          title: 'Logout',
          text: 'Are you sure you want to logout?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Logout',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.isConfirmed) {
            // Redirect to the logout page
            window.location.href = 'logout.php';
          }
        });
      });
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
            window.location.href = 'profile.php';
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