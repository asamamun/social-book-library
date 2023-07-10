<!DOCTYPE html>
<html>

<head>
  <title>Category Form</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">Add Category</div>
      <div class="card-body">
        <form id="addCategoryForm" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="categoryName" class="form-label">Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
          </div>
          
          <div class="mb-3">
            <label for="categoryDescription" class="form-label">Description</label>
            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="categoryImage" class="form-label">Image</label>
            <input type="file" class="form-control" id="categoryImage" name="categoryImage" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
      </div>
    </div>

    <div class="card mt-4">
      <div class="card-header">Manage Categories</div>
      <div class="card-body">
        <table id="categoryTable" class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- Categories will be dynamically added here -->
          </tbody>
        </table>
      </div>
    </div>

    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editCategoryForm" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="editCategoryName" class="form-label">Name</label>
                <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" required>
              </div>
              <div class="mb-3">
                <label for="editCategoryDescription" class="form-label">Description</label>
                <textarea class="form-control" id="editCategoryDescription" name="editCategoryDescription" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="editCategoryImage" class="form-label">Image</label>
                <input type="file" class="form-control" id="editCategoryImage" name="editCategoryImage">
                <input type="hidden" id="editCategoryId" name="editCategoryId">
              </div>
              <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/jquery-3.7.0.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
    // Add category form submission
    $('#addCategoryForm').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
  
      $.ajax({
        type: 'POST',
        url: 'add_category.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#addCategoryForm')[0].reset();
          loadCategories();
        }
      });
    });
  
    // Edit category button click
    $(document).on('click', '.edit-category', function() {
      var categoryId = $(this).data('id');
      var categoryName = $(this).data('name');
      var categoryDescription = $(this).data('description');
  
      $('#editCategoryName').val(categoryName);
      $('#editCategoryDescription').val(categoryDescription);
      $('#editCategoryId').val(categoryId);
      $('#editCategoryModal').modal('show');
    });
  
    // Edit category form submission
    $('#editCategoryForm').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
  
      $.ajax({
        type: 'POST',
        url: 'edit_category.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#editCategoryModal').modal('hide');
          loadCategories();
        }
      });
    });
  
    // Delete category
    $(document).on('click', '.delete-category', function() {
      var categoryId = $(this).data('id');
      
      if (confirm("Are you sure you want to delete this category?")) {
        $.ajax({
          type: 'POST',
          url: 'delete_category.php',
          data: { categoryId: categoryId },
          success: function(response) {
            loadCategories();
          }
        });
      }
    });
  
    // Load categories
    function loadCategories() {
      $.ajax({
        url: 'get_categoriesFc.php',
        success: function(response) {
          $('#categoryTable tbody').html(response);
        }
      });
    }
  
    // Initial category load
    loadCategories();
  });
  
  </script>
</body>

</html>