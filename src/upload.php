<?php  
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql ="INSERT INTO `users`VALUES('{$name}', '{$email}', '{$password}')";
        $conn->query($sql) ;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Book Upload Form</h1>
        <div class="card">
            <div class="card-header">Book Upload Now</div>
            <div class="card-body">
                <form id="registrationForm" action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <small id="emailError" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small id="passwordError" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="retypePassword" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" id="retypePassword" name="retypePassword">
                        <small id="retypePasswordError" class="form-text text-danger"></small>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </form>
                <div id="registrationMessage" class="mt-3"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="../assets/js/jquery-3.7.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Email validation using regex pattern
            function validateEmail(email) {
                var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return pattern.test(email);
            }

            // Password validation using regex pattern
            function validatePassword(password) {
                var pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
                return pattern.test(password);
            }

            // Password and retype password match validation
            function validatePasswordMatch(password, retypePassword) {
                return password === retypePassword;
            }

            // Registration form submission
            $('#registrationForm').submit(function(event) {
                event.preventDefault();

                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var retypePassword = $('#retypePassword').val();

                // Check email format
                if (!validateEmail(email)) {
                    $('#emailError').text("Invalid email format");
                    return;
                }

                // Check password strength
                if (!validatePassword(password)) {
                    $('#passwordError').text("Password should contain at least one letter and one digit");
                    return;
                }

                // Check if passwords match
                if (!validatePasswordMatch(password, retypePassword)) {
                    $('#retypePasswordError').text("Passwords do not match");
                    return;
                }

                // Submit the form using AJAX
                $.ajax({
                    url: 'store_regi.php',
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        // Display the registration message
                        $('#registrationMessage').text(response);
                    },
                    error: function(xhr, status, error) {
                        // Display an error message if AJAX request fails
                        $('#registrationMessage').text("An error occurred during registration");
                    }
                });
            });
        });
    </script>
</body>

</html>