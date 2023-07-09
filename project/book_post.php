<!DOCTYPE html>
<html>
<head>
    <title>Book Post Form</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.7.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Book Post Form</h1>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Populate subcategories based on selected category
            $('#category_id').change(function() {
                var categoryId = $(this).val();

                // Make Ajax request
                $.ajax({
                    url: 'get_subcategories.php',
                    type: 'POST',
                    data: { category_id: categoryId },
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
                        window.location.href = 'index.php';
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
