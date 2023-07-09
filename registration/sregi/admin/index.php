<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
     #navbrand {
      max-width: 200px;
      max-height: 120px;
      object-fit: cover;
    }
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
  </style>
</head>

<body>
  <!-- Toggle Button -->
  <button class="toggle-btn btn btn-primary" type="button">
    <span class="toggle-icon">&#9776;</span>
  </button>

  <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top ">
    <div class="container-fluid">
      <a style="margin-left: 2rem;" class="navbar-brand" href="../home.php">
        <img id="navbrand" src="../assets/images/logo.png" alt="Logo">
      </a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        </li>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
          <!-- User is logged in, show profile anchor link -->
          <li class="nav-item px-4">
            <a class="nav-link active" href="profile.php">
              <?php
              // Check if session variable is set for the profile picture
              if (isset($_SESSION['profilepic'])) {
                $profilePic = $_SESSION['profilepic'];
                echo '<img src="' . $profilePic . '" style="width: 40px; height: 40px;" class="img-fluid rounded-circle" alt="Profile Picture">';
              } else {
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            </svg>';
              }
              ?>
            </a>
          </li>
        <?php else : ?>
          <!-- User is not logged in, show login anchor link -->
          <li class="nav-item px-4 ">
            <a class="nav-link active text-white" href="login.php">Login</a>
          </li>
          <li class="nav-item px-4 ">
            <a class="nav-link active text-white" href="register.php">Registration</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </nav>


  <!-- Sidebar -->
  <div class="sidebar">
    <ul class="nav flex-column">
      <li style="margin-top: 5rem;" class="nav-item">
        <a class="nav-link" href="dashboard.php" data-page="dashboard.php"><b style="font-size:larger;">Dashboard</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="category.php" data-page="category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sub_category.php" data-page="sub_category.php">SubCategory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="writer.php" data-page="writer.php">Writer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="country.php" data-page="country.php">Country</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="district.php" data-page="district.php">district</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="area.php" data-page="area.php">Area</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publisher.php" data-page="publisher.php">Publisher</a>
      </li>
    </ul>
  </div>

  <!-- Content -->
  <div class="content mt-5">
    <div id="page-content"></div>
  </div>

  <script src="../assets/js/jquery-3.7.0.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
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
            $('#page-content').load('dashboard.php');
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
    });
  </script>
</body>

</html>
