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
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top ">
    <div class="container-fluid">
      <a style="margin-left: 4rem;" class="navbar-brand" href="#">
        <img id="navbrand" src="assets/images/logo.png" alt="Logo">
      </a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white ms-5" aria-current="page" href="homee.php">Home</a>
        </li>
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
            <a href="#postModal" class="btn btn-primary text-end" data-bs-toggle="modal">Post</a>
            <a class="nav-link mt-5" href="#" id="logoutBtn">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

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

  <!-- Post Modal -->
  <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="postModalLabel">New Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Post form goes here -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Post</button>
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
    });
  </script>
</body>

</html>