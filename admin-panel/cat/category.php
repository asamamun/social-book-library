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
  <script src="script.js"></script>
</body>

</html>