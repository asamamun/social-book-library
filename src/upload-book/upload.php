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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Book Upload Form</h1>
        <div class="card">
            <div class="card-header">Book Upload Now</div>
            <div class="card-body">
                <form id="upload_book" action="" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="description" class="form-control" id="description" name="description">
                        <small id="emailError" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="price" class="form-control" id="price" name="price">
                        <small id="priceError" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="sellprice" class="form-label">SellPrice</label>
                        <input type="sellprice" class="form-control" id="sellprice" name="sellprice">
                        <small id="sellpriceError" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="categoryId" class="form-label">Category</label>
                        <select class="form-control" id="categoryId" name="categoryId" required>
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subcategoryId" class="form-label">SubCategory</label>
                        <select class="form-control" id="subcategoryId" name="subcategoryId" required>
                            <option value="">Select SUbCategory</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Writer" class="form-label">Writer</label>
                        <select class="form-control" id="Writer" name="Writer" required>
                            <option value="">Select Writer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <select class="form-control" id="publisher" name="publisher" required>
                            <option value="">Select publisher</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user" class="form-label">User ID</label>
                        <input type="text" class="form-control" id="user" name="user">
                        <small id="sellpriceError" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="edition" class="form-label">Edition</label>
                        <input type="text" class="form-control" id="edition" name="edition">
                        <small id="sellpriceError" class="form-text text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location">
                        <small id="sellpriceError" class="form-text text-danger"></small>
                    </div>
                    <input type="submit" name="submit" value="register" class="btn btn-primary">

                </form>
                <div id="registrationMessage" class="mt-3"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../assets/css/bootstrap.min.css"></script>
    <!-- jQuery -->
    <script src="./../../assets/js/jquery-3.7.0.min.js"></script>

    <!-- <script>
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
    </script> -->
    <script src="./script.js"></script>
</body>

</html>