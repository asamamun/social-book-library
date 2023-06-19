<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

        <!-- Add Writer Form -->
        <div class="card">
            <div class="card-header">Add Writer</div>
            <div class="card-body">
                <form id="addWriterForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="countryId" class="form-label">Country</label>
                        <select class="form-control" id="countryId" name="countryId" required>
                            <option value="">Select Country</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Writer</button>
                </form>
            </div>
        </div>

        <!-- Writers Table -->
        <div class="card mt-4">
            <div class="card-header">Manage Writers</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Bio</th>
                            <th>Country</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="writersTableBody">
                        <!-- Writers will be dynamically loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Writer Modal -->
    <div class="modal fade" id="editWriterModal" tabindex="-1" aria-labelledby="editWriterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editWriterModalLabel">Edit Writer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editWriterForm">
                        <input type="hidden" id="editWriterId" name="editWriterId">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" name="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editBio" class="form-label">Bio</label>
                            <textarea class="form-control" id="editBio" name="editBio" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editCountryId" class="form-label">Country</label>
                            <select class="form-control" id="editCountryId" name="editCountryId" required>
                                <option value="">Select Country</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="editImage" name="editImage" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Writer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Writer Modal -->
    <div class="modal fade" id="deleteWriterModal" tabindex="-1" aria-labelledby="deleteWriterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteWriterModalLabel">Delete Writer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this writer?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deleteWriterBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery-3.7.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>