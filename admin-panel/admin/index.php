
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <style>
    .sidebar {
      background-color: #e5ebf0;
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
        top: 10px;
        left: 10px;
        z-index: 9999;
      }
    }
  </style>
</head>

<body>
  <!-- Toggle Button -->
  <button class="toggle-btn btn btn-primary" type="button">
    <span class="toggle-icon">&#9776;</span>
  </button>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item mt-5">
        <a class="nav-link" href="../dashboard/dashboard.php" data-page="../dashboard/dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" data-page="">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../cat/category.php" data-page="../cat/category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../subcat/sub_category.php" data-page="../subcat/sub_category.php">SubCategory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../writer/writer.php" data-page="../writer/writer.php">Writer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../country/country.php" data-page="../country/country.php">Country</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../district/district.php" data-page="../district/district.php">district</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../publisher/publisher.php" data-page="../publisher/publisher.php">Publisher</a>
      </li>
    </ul>
  </div>

  <!-- Content -->
  <div class="content">
    <div id="page-content"></div>
  </div>

  <script src="../assets/js/jquery-3.7.0.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".toggle-btn").click(function() {
        $(".sidebar, .content").toggleClass("active");
      });

      $(".nav-link").click(function(e) {
        e.preventDefault();
        var page = $(this).data("page");
        loadPage(page);
      });

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
