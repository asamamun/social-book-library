<?php require 'connDB.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Insert Area Form</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery-3.7.0.min.js"></script>
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

            // Edit area
            $(".edit-area").click(function() {
                var areaId = $(this).data("areaid");
                var areaName = $(this).data("areaname");
                var areaDesc = $(this).data("areadesc");
                var divisionId = $(this).data("divisionid");
                var districtId = $(this).data("districtid");

                $("#areaId").val(areaId);
                $("#areaname").val(areaName);
                $("#areadesc").val(areaDesc);
                $("#division").val(divisionId).trigger("change");
                $("#district").val(districtId);

                $("#areaModalLabel").text("Edit Area");
                $("#submitBtn").text("Update");
                $("#areaForm").attr("action", "update_area.php");
                $("#areaModal").modal("show");
            });

            // Delete area
            $(".delete-area").click(function() {
                var areaId = $(this).data("areaid");
                var confirmation = confirm("Are you sure you want to delete this area?");

                if (confirmation) {
                    $.ajax({
                        url: "delete_area.php",
                        type: "POST",
                        data: {
                            areaid: areaId
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data.success) {
                                // Refresh the area list
                                location.reload();
                            } else {
                                alert("Failed to delete area.");
                            }
                        }
                    });
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">Add Area</div>
            <div class="card-body">
                <form id="areaForm" method="post" action="insert_area.php">
                    <div class="mb-3">
                        <label for="areaname" class="form-label">Area Name</label>
                        <input type="text" class="form-control" id="areaname" name="areaname" required>
                    </div>
                    <div class="mb-3">
                        <label for="areadesc" class="form-label">Area Description</label>
                        <textarea class="form-control" id="areadesc" name="areadesc" required></textarea>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">Menage Areas</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Area Name</th>
                            <th>Area Description</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch area records from the database and populate the table rows
                        // Your database connection code here
                        $query = "SELECT a.*, d.divname, dt.distname FROM area a
                          INNER JOIN division d ON a.divid = d.divid
                          INNER JOIN district dt ON a.distid = dt.distid";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['areaname'] . "</td>";
                                echo "<td>" . $row['areadesc'] . "</td>";
                                echo "<td>" . $row['divname'] . "</td>";
                                echo "<td>" . $row['distname'] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-sm btn-primary edit-area' 
                              data-areaid='" . $row['areaid'] . "' 
                              data-areaname='" . $row['areaname'] . "' 
                              data-areadesc='" . $row['areadesc'] . "' 
                              data-divisionid='" . $row['divid'] . "' 
                              data-districtid='" . $row['distid'] . "'>Edit</button>";
                                echo "<button class='btn btn-sm btn-danger delete-area' data-areaid='" . $row['areaid'] . "'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>