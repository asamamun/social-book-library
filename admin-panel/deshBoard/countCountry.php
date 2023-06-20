<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Count</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-success text-white">Total Countries</div>
            <div class="card-body bg-info">
                <p class="card-text" id="countryCount"></p>
            </div>
        </div>
    </div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/jquery-3.7.0.min.js"></script>
<script>
        $(document).ready(function () {
            // Fetch and display country count
            function fetchCountryCount() {
                $.ajax({
                    url: 'fetch_country_count.php',
                    type: 'GET',
                    success: function (response) {
                        $('#countryCount').text(response);
                    }
                });
            }

            // Fetch country count on page load
            fetchCountryCount();
        });
</script>
</body>

</html>
