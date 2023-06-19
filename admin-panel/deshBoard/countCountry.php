<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Count</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header bg-success text-white">All Countries</div>
            <div class="card-body bg-info">
                <p class="card-text" id="countryCount"></p>
            </div>
        </div>
    </div>
</body>

</html>
