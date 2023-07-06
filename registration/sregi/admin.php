<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">


    <style>
        .sidebar {
            background-color: #F8F9FA;
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            transition: transform 0.3s ease-in-out;
            z-index: 1021;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar .nav-link {
            color: #333;
            text-decoration: none;
            padding: 10px 0;
        }

        .content {
            padding: 20px;
            margin-left: 15rem;
            transition: margin-left 0.3s ease-in-out;
        }

        .toggle-btn {
            display: none;
        }

        .toggle-icon {
            margin-right: 5px;
        }

        .hidden {
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .content {
                margin-left: 0;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content.active {
                margin-left: 0px;
            }

            .toggle-btn {
                display: block;
                position: fixed;
                top: 12px;
                left: 10px;
                z-index: 9999;
            }
        }

        img {
            max-width: 200px;
            max-height: 120px;
            object-fit: cover;
        }
        li:hover{
            background-color: #00FFFF;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- Toggle Button -->
    <button class="toggle-btn btn btn-primary" type="button">
        <span class="toggle-icon">&#9776;</span>
    </button>

    <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top ">
        <div class="container-fluid">
            <a style="margin-left: 4rem;" class="navbar-brand" href="#">
                <img src="assets/images/logo.png" alt="Logo">
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white ms-5" aria-current="page" href="homee.php">Home</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column">
            <li style="margin-top: 5rem;" class="nav-item text-center">
                <a class="nav-link" href="../dashboard/dashboard.php" data-page="../dashboard/dashboard.php"><b style="font-size:larger;">Dashboard</b></a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="" data-page="">Admin</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="../cat/category.php" data-page="../cat/category.php">Category</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="../subcat/sub_category.php" data-page="../subcat/sub_category.php">SubCategory</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="../writer/writer.php" data-page="../writer/writer.php">Writer</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="../country/country.php" data-page="../country/country.php">Country</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="../district/district.php" data-page="../district/district.php">district</a>
            </li>
            <li class="nav-item text-center">
                <a class="nav-link" href="../publisher/publisher.php" data-page="../publisher/publisher.php">Publisher</a>
            </li>
            <li class="nav-item border bg-info text-center mt-4 rounded-3">
            <a class="nav-link" href="#" id="logoutBtn">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content mt-5">
        <div id="page-content"></div>
    </div>

    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".toggle-btn").click(function() {
                $(".sidebar, .content").toggleClass("active");
            });

            loadDashboardContent();

            $(".nav-link").click(function(e) {
                e.preventDefault();
                var page = $(this).data("page");
                loadPage(page);
            });

            function loadDashboardContent() {
                $('#page-content').load('../dashboard/dashboard.php');
            }

            function loadPage(page) {
                $.ajax({
                    url: page,
                    method: "GET",
                    success: function(response) {
                        $("#page-content").html(response);
                        $(".sidebar, .content").removeClass("active");
                    },
                    error: function() {
                        $("#page-content").html("<p>Error loading page.</p>");
                        $(".sidebar, .content").removeClass("active");
                    }
                });
            }
            // Handle logout button click event
            $('#logoutBtn').on('click', function(e) {
                e.preventDefault(); // Prevent default link behavior

                // Display SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Logout',
                    text: 'Are you sure you want to logout?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Logout',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirect to the logout page
                        window.location.href = 'logout.php';
                    }
                });
            });

        });
    </script>
</body>

</html>