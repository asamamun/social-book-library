<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">User Registration</h1>
        <div class="card">
            <div class="card-header bg-success text-white">Registration Now</div>
            <div class="card-body">
                <form id="register-form" method="POST" action="register_user.php">
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
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Password and Confirm Password validation using jQuery
        $(document).ready(function() {
            $('#register-form').submit(function(e) {
                e.preventDefault();

                var password = $('#password').val();
                var confirm_password = $('#confirm_password').val();

                if (password !== confirm_password) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Password Mismatch',
                        text: 'The passwords you entered do not match.',
                        confirmButtonText: 'OK'
                    });
                } else {
                    var email = $('#email').val();
                    var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    if (!emailPattern.test(email)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Email',
                            text: 'Please enter a valid email address.',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        this.submit();
                    }
                }
            });
        });

        // Display SweetAlert success message on successful registration
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: 'You have been registered successfully!',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    </script>
</body>

</html>