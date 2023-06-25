<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mt-5">User Profile</h2>
        <div class="card mt-3">
            <div class="card-header">Update your profile</div>
            <div class="card-body">
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
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </form>
            </div>
            <div class="col-md-6">
                <div id="profileCardContainer"></div>
            </div>
        </div>
    </div>

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

            // Fetch and display profile cards
            function fetchProfiles() {
                $.ajax({
                    url: 'get_profiles.php',
                    type: 'GET',
                    success: function(response) {
                        $('#profileCardContainer').html(response);
                    }
                });
            }

            // Fetch profiles on page load
            fetchProfiles();
        });
    </script>
</body>

</html>