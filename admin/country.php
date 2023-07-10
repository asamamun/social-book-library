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
            <div class="card">
                <div class="card-header">Add Country</div>
                <div class="card-body">
                    <form id="addCountryForm">
                        <div class="mb-3">
                            <label for="iso" class="form-label">ISO</label>
                            <input type="text" class="form-control" id="iso" name="iso" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="nicename" class="form-label">Nice Name</label>
                            <input type="text" class="form-control" id="nicename" name="nicename" required>
                        </div>
                        <div class="mb-3">
                            <label for="iso3" class="form-label">ISO3</label>
                            <input type="text" class="form-control" id="iso3" name="iso3" required>
                        </div>
                        <div class="mb-3">
                            <label for="numcode" class="form-label">Num Code</label>
                            <input type="text" class="form-control" id="numcode" name="numcode" required>
                        </div>
                        <div class="mb-3">
                            <label for="phonecode" class="form-label">Phone Code</label>
                            <input type="text" class="form-control" id="phonecode" name="phonecode" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Country</button>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">Manage Countries</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ISO</th>
                                <th>Name</th>
                                <th>Nice Name</th>
                                <th>ISO3</th>
                                <th>Num Code</th>
                                <th>Phone Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="countryTable">
                            <!-- Country data will be inserted here dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Edit Country Modal -->
        <div class="modal fade" id="editCountryModal" tabindex="-1" aria-labelledby="editCountryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCountryModalLabel">Edit Country</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCountryForm">
                            <input type="hidden" id="editCountryId" name="editCountryId">
                            <div class="mb-3">
                                <label for="editIso" class="form-label">ISO</label>
                                <input type="text" class="form-control" id="editIso" name="editIso" required>
                            </div>
                            <div class="mb-3">
                                <label for="editName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editName" name="editName" required>
                            </div>
                            <div class="mb-3">
                                <label for="editNicename" class="form-label">Nice Name</label>
                                <input type="text" class="form-control" id="editNicename" name="editNicename" required>
                            </div>
                            <div class="mb-3">
                                <label for="editIso3" class="form-label">ISO3</label>
                                <input type="text" class="form-control" id="editIso3" name="editIso3" required>
                            </div>
                            <div class="mb-3">
                                <label for="editNumcode" class="form-label">Num Code</label>
                                <input type="text" class="form-control" id="editNumcode" name="editNumcode" required>
                            </div>
                            <div class="mb-3">
                                <label for="editPhonecode" class="form-label">Phone Code</label>
                                <input type="text" class="form-control" id="editPhonecode" name="editPhonecode" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Country Modal -->
        <div class="modal fade" id="deleteCountryModal" tabindex="-1" aria-labelledby="deleteCountryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCountryModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this country?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="deleteCountryBtn">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery-3.7.0.min.js"></script>
        <script>
            $(document).ready(function () {
    // Load countries on page load
    loadCountries();

    // Add country form submission
    $('#addCountryForm').submit(function (e) {
        e.preventDefault();

        var iso = $('#iso').val();
        var name = $('#name').val();
        var nicename = $('#nicename').val();
        var iso3 = $('#iso3').val();
        var numcode = $('#numcode').val();
        var phonecode = $('#phonecode').val();

        $.ajax({
            url: 'add_country.php',
            type: 'POST',
            data: {
                iso: iso,
                name: name,
                nicename: nicename,
                iso3: iso3,
                numcode: numcode,
                phonecode: phonecode
            },
            success: function (response) {
                alert(response);
                $('#addCountryForm')[0].reset();
                loadCountries();
            }
        });
    });

    // Edit country form submission
    $('#editCountryForm').submit(function (e) {
        e.preventDefault();

        var countryId = $('#editCountryId').val();
        var iso = $('#editIso').val();
        var name = $('#editName').val();
        var nicename = $('#editNicename').val();
        var iso3 = $('#editIso3').val();
        var numcode = $('#editNumcode').val();
        var phonecode = $('#editPhonecode').val();

        $.ajax({
            url: 'edit_country.php',
            type: 'POST',
            data: {
                countryId: countryId,
                iso: iso,
                name: name,
                nicename: nicename,
                iso3: iso3,
                numcode: numcode,
                phonecode: phonecode
            },
            success: function (response) {
                alert(response);
                $('#editCountryModal').modal('hide');
                loadCountries();
            }
        });
    });

    // Delete country confirmation
    $('#deleteCountryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var countryId = button.data('countryid');

        $('#deleteCountryBtn').click(function () {
            $.ajax({
                url: 'delete_country.php',
                type: 'POST',
                data: { countryId: countryId },
                success: function (response) {
                    alert(response);
                    $('#deleteCountryModal').modal('hide');
                    loadCountries();
                }
            });
        });
    });

    // Load countries into the table
    function loadCountries() {
        $.ajax({
            url: 'fetch_countries.php',
            type: 'GET',
            success: function (response) {
                $('#countryTable').html(response);
            }
        });
    }
});

        </script>
    </body>

</html>