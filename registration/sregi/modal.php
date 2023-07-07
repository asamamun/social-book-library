<?php
session_start();

// Set session value
$_SESSION['loggedin'] = true;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Post Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <h1>Welcome to the Post Page</h1>

  <!-- Button to trigger the action -->
  <button type="button" class="btn btn-primary" id="postButton">Create a Post</button>

  <!-- Modal -->
  <!-- <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="postModalLabel">Create a Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="postTitle" class="form-label">Title</label>
              <input type="text" class="form-control" id="postTitle" placeholder="Enter post title">
            </div>
            <div class="mb-3">
              <label for="postContent" class="form-label">Content</label>
              <textarea class="form-control" id="postContent" rows="3" placeholder="Enter post content"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Create</button>
        </div>
      </div>
    </div>
  </div> -->

  <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
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

  <!-- JavaScript dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.14/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.14/dist/sweetalert2.min.css">

  <!-- JavaScript to handle button click event -->
  <script>
    // Get session value from PHP and assign it to a JavaScript variable
    var loggedIn = <?php echo json_encode($_SESSION['loggedin']); ?>;

    document.addEventListener('DOMContentLoaded', function() {
      // Handle post button click event
      document.getElementById('postButton').addEventListener('click', function() {
        // Check if the user is logged in
        if (loggedIn) {
          // Show the post modal
          var postModal = new bootstrap.Modal(document.getElementById('postModal'));
          postModal.show();
        } else {
          // Show SweetAlert message for unregistered users
          Swal.fire({
            icon: 'error',
            title: 'Not a registered user',
            text: 'You need to be a registered user to create a post.',
            confirmButtonText: 'OK'
          });
        }
      });
    });
  </script>
</body>
</html>
