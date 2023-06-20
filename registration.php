<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    .sidebar {
      background-color: #343a40;
      color: #fff;
      position: relative;
      top: 56px; /* Height of the fixed navbar */
    }

    .sidebar .nav-link {
      color: #fff;
    }

    .content {
      padding: 20px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="your-logo.png" alt="Logo">
      </a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-lg-2 sidebar">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
          </li>
          <!-- Add more sidebar navigation items here -->
        </ul>
      </div>
      <!-- Content -->
      <div class="col-lg-10 offset-lg-2">
        <div class="content">
          <!-- Add your content for each page here -->
          <h1>Welcome to the Admin Panel</h1>
          <p>This is the main content area.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
