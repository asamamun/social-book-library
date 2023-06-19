<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Login Form</h1>
        <div class="card">
            <div class="card-header">Login Now</div>
            <div class="card-body">
                <form id="loginForm" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div id="loginMessage" class="mt-3"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="../assets/js/jquery-3.7.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Login form submission
            $('#loginForm').submit(function(event) {
                event.preventDefault();

                var email = $('#email').val();
                var password = $('#password').val();

                // Submit the form using AJAX
                $.ajax({
                    url: 'check-login.php',
                    type: 'POST',
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        // Display the login message
                        $('#loginMessage').text(response);
                    },
                    error: function(xhr, status, error) {
                        // Display an error message if AJAX request fails
                        $('#loginMessage').text("An error occurred during login");
                    }
                });
            });
        });
    </script>
</body>

</html>