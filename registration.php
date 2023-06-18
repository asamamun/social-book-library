<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Registration Form</h1>
        <form id="registrationForm" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="retypePassword" class="form-label">Retype Password</label>
                <input type="password" class="form-control" id="retypePassword" name="retypePassword" required>
                <small id="passwordError" class="form-text text-danger"></small>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Password validation on form submit
            $('#registrationForm').submit(function (event) {
                event.preventDefault();

                var password = $('#password').val();
                var retypePassword = $('#retypePassword').val();

                // Check if password and retype password match
                if (password !== retypePassword) {
                    $('#passwordError').text("Passwords do not match");
                    return;
                }

                // Check password strength
                if (!checkPasswordStrength(password)) {
                    $('#passwordError').text("Password should contain at least one letter and one digit");
                    return;
                }

                // Submit the form if validation passes
                this.submit();
            });

            // Function to check password strength
            function checkPasswordStrength(password) {
                var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
                return pattern.test(password);
            }
        });
    </script>
</body>

</html>
