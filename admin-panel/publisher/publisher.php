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
    <body>
    <div class="container mt-5">
    
        <!-- Publisher Form -->
        <div class="card mb-3">
            <div class="card-header">Add Publisher</div>
            <div class="card-body">
                <form id="addPublisherForm">
                    <div class="mb-3">
                        <label for="publisherName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="publisherName" name="publisherName" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisherAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="publisherAddress" name="publisherAddress" required>
                    </div>
                    <div class="mb-3">
                        <label for="publisherPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="publisherPhone" name="publisherPhone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Publisher</button>
                </form>
            </div>
        </div>

        <!-- Publisher Table -->
        <div class="card">
            <div class="card-header">Manage Publishers</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="publisherTable"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Publisher Modal -->
    <div class="modal fade" id="editPublisherModal" tabindex="-1" aria-labelledby="editPublisherModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPublisherModalLabel">Edit Publisher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPublisherForm">
                        <input type="hidden" id="editPublisherId" name="editPublisherId">
                        <div class="mb-3">
                            <label for="editPublisherName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editPublisherName" name="editPublisherName"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editPublisherAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="editPublisherAddress"
                                name="editPublisherAddress" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPublisherPhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="editPublisherPhone" name="editPublisherPhone"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Publisher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Publisher Modal -->
    <div class="modal fade" id="deletePublisherModal" tabindex="-1" aria-labelledby="deletePublisherModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePublisherModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this publisher?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="deletePublisherBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>



<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.7.0.min.js"></script>
<script src="script.js"></script>
</body>
</html>