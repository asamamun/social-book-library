<!DOCTYPE html>
<html>
<head>
    <title>Subcategory</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Subcategory Form -->
        <div class="card">
            <div class="card-header">Add Subcategory</div>
            <div class="card-body">
                <form id="addSubcategoryForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="categoryId" class="form-label">Category</label>
                        <select class="form-control" id="categoryId" name="categoryId" required>
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subcategoryName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="subcategoryName" name="subcategoryName" required>
                    </div>
                    <div class="mb-3">
                        <label for="subcategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="subcategoryDescription" name="subcategoryDescription" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="subcategoryImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="subcategoryImage" name="subcategoryImage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Subcategory</button>
                </form>
            </div>
        </div>

        <!-- Subcategory List -->
        <div class="card mt-4">
            <div class="card-header">Manage Subcategories</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="subcategoryTable">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Subcategory Modal -->
    <div class="modal fade" id="editSubcategoryModal" tabindex="-1" aria-labelledby="editSubcategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubcategoryModalLabel">Edit Subcategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSubcategoryForm" enctype="multipart/form-data">
                        <input type="hidden" id="editSubcategoryId" name="editSubcategoryId">
                        <div class="mb-3">
                            <label for="editSubcategoryName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editSubcategoryName" name="editSubcategoryName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editSubcategoryDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editSubcategoryDescription" name="editSubcategoryDescription" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editSubcategoryImage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="editSubcategoryImage" name="editSubcategoryImage">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Subcategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.7.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
