<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <!-- Add District Form -->
        <div class="card mt-5">
            <div class="card-header">Add District</div>
            <div class="card-body">
                <form id="districtForm">
                    <div class="mb-3">
                        <label for="distName" class="form-label">District Name</label>
                        <input type="text" class="form-control" id="distName" required>
                    </div>
                    <div class="mb-3">
                        <label for="distDesc" class="form-label">District Description</label>
                        <textarea class="form-control" id="distDesc" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="divisionSelect" class="form-label">Division</label>
                        <select class="form-control" id="divisionSelect" required></select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add District</button>
                </form>
            </div>
        </div>

        <!-- District List -->
        <div class="card mt-4">
            <div class="card-header">Menege Districts</div>
            <div class="card-body">
                <div id="districtList"></div>
            </div>
        </div>

        <!-- Edit District Modal -->
        <div class="modal fade" id="editDistrictModal" tabindex="-1" aria-labelledby="editDistrictModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDistrictModalLabel">Edit District</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editDistrictForm">
                        <div class="modal-body">
                            <input type="hidden" id="editDistrictId">
                            <div class="mb-3">
                                <label for="editDistName" class="form-label">District Name</label>
                                <input type="text" class="form-control" id="editDistName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDistDesc" class="form-label">District Description</label>
                                <textarea class="form-control" id="editDistDesc" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editDivisionSelect" class="form-label">Division</label>
                                <select class="form-control" id="editDivisionSelect" required></select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="../assets/js/jquery-3.7.0.min.js"></script>
  
    <script>
        $(document).ready(function() {
            // Populate division dropdown
            loadDivisions();

            // Load districts on page load
            loadDistricts();

            // Submit Add District form
            $('#districtForm').submit(function(e) {
                e.preventDefault();
                addDistrict();
            });

            // Submit Edit District form
            $('#editDistrictForm').submit(function(e) {
                e.preventDefault();
                updateDistrict();
            });
        });

        // Function to populate division dropdown
        function loadDivisions() {
            $.ajax({
                url: 'get_divisionsFd.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var divisions = response.divisions;
                        var divisionSelect = $('#divisionSelect');
                        var editDivisionSelect = $('#editDivisionSelect');

                        divisions.forEach(function(division) {
                            divisionSelect.append('<option value="' + division.divid + '">' + division.divname + '</option>');
                            editDivisionSelect.append('<option value="' + division.divid + '">' + division.divname + '</option>');
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        }

        // Function to load districts
        function loadDistricts() {
            $.ajax({
                url: 'get_districtsFd.php',
                type: 'GET',
                dataType: 'html',
                success: function(response) {
                    $('#districtList').html(response);
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        }

        // Function to add district
        function addDistrict() {
            var distName = $('#distName').val();
            var distDesc = $('#distDesc').val();
            var divisionId = $('#divisionSelect').val();

            $.ajax({
                url: 'add_districtFd.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    distName: distName,
                    distDesc: distDesc,
                    divisionId: divisionId
                },
                success: function(response) {
                    if (response.success) {
                        $('#districtForm')[0].reset();
                        loadDistricts();
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        }

        // Function to edit district
        function editDistrict(districtId) {
            // Fetch district details
            $.ajax({
                url: 'get_district.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    districtId: districtId
                },
                success: function(response) {
                    if (response) {
                        var editDistrictModal = $('#editDistrictModal');
                        var editDistrictForm = $('#editDistrictForm');

                        // Populate edit form fields with district details
                        $('#editDistrictId').val(response.distid);
                        $('#editDistName').val(response.distname);
                        $('#editDistDesc').val(response.distdesc);
                        $('#editDivisionSelect').val(response.divid);

                        // Show the edit district modal
                        editDistrictModal.modal('show');

                        // Submit Edit District form
                        editDistrictForm.submit(function(e) {
                            e.preventDefault();
                            updateDistrict();
                            editDistrictModal.modal('hide');
                        });
                    }
                },
                
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        }

        // Function to update district
        function updateDistrict() {
            var editDistrictId = $('#editDistrictId').val();
            var editDistName = $('#editDistName').val();
            var editDistDesc = $('#editDistDesc').val();
            var editDivisionId = $('#editDivisionSelect').val();

            $.ajax({
                url: 'update_district.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    editDistrictId: editDistrictId,
                    editDistName: editDistName,
                    editDistDesc: editDistDesc,
                    editDivisionId: editDivisionId
                },
                success: function(response) {
                    if (response.success) {
                        loadDistricts();
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                }
            });
        }

        // Function to delete district
        function deleteDistrict(districtId) {
            if (confirm('Are you sure you want to delete this district?')) {
                $.ajax({
                    url: 'delete_district.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        districtId: districtId
                    },
                    success: function(response) {
                        if (response.success) {
                            loadDistricts();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX Error:', error);
                    }
                });
            }
        }
    </script>
</body>

</html>