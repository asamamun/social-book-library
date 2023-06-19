<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
   .carousel-item {
      height: 400px; /* Adjust the height as per your needs */
    }
    .carousel-item img {
      object-fit: cover;
      height: 100%;
      width: 100%;
      max-width: initial!important;
      max-height: initial!important;
    }
    .card img {
      max-width: 200px;
      max-height: 120px;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <header>
    <div class="row">
      <div class="col-lg-12">
        <nav class="navbar navbar-dark bg-success fixed-top pt-3 pb-4 ">
          <div class="container-fluid">
            <!-- responsive nav button  -->
            <button class="navbar-toggler d-lg-none " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- site title  -->
            <a class="navbar-brand ms-5" href="#"><img src="assets/images/logo.png" alt="logo"></a>
            <div class="d-none d-lg-block">
              <a class="nav-link active text-light" href="#">All books</a>
            </div>

            <!-- navbar for large screen  -->
            <div class="offcanvas-body d-none d-lg-block ">
              <ul class="navbar-nav justify-content-end flex-row  ">
                <li class="nav-item px-4 ">
                  <a class="nav-link active" aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                      <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                    </svg>&nbsp; Chat</a>
                </li>
                <li class="nav-item px-4 ">
                  <a class="nav-link active" href="Register.php">Registration</a>
                </li>
                <li class="nav-item px-4 me-5">
                  <!-- Button to trigger the modal -->
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registrationModal">
                    POST YOUR BOOK
                  </button>
                </li>
              </ul>
            </div>
            <!-- offset navbar for small screen  -->
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><a class="bg-image bg-cover bg-light" href="#"><img src="assets/images/logo.png" alt="logo"></a></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                  <li class="nav-item mb-3">
                    <a class="nav-link active" aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-right-text-fill" viewBox="0 0 16 16">
                        <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353V2zM3.5 3h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1 0-1zm0 2.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z" />
                      </svg>&nbsp; Chat</a>
                  </li>
                  <li class="nav-item mb-3">
                    <a class="nav-link active text-light" href="#">All books</a>
                  </li>
                  <li class="nav-item mb-3">
                    <a class="nav-link active" href="Register.php">Registration</a>
                  </li>
                  <li class="nav-item mb-3">
                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#registrationModal">
                      POST YOUR BOOK
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- Button to trigger the modal -->
          <button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#scrollModal">
            All of Bangladesh
          </button>

          <form class="d-flex mt-3 w-100 " role="search">
            <div class=" d-flex px-5 px-lg-3 mx-auto w-100 search_wrap ">
              <input class="form-control p-2 ps-3 p-lg-3 ps-lg-4 rounded-pill " type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-light search_btn" type="submit">
                <img src="./assets/images/search.png" alt="search icon">
              </button>
            </div>
          </form>
        </nav>
      </div>
    </div>
  </header>
  <!-- main content -->
  <div style="margin-top: 250px;">
    <main class="container">
      <!-- carousel -->

      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Carousel slides go here -->
      <div class="carousel-item active">
        <img src="assets/images/book-1.jpg" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="assets/images/book-2.jpg" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="assets/images/book-12.webp" class="d-block w-100" alt="Slide 3">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>
      

      <div class="text-center m-2 p-2">
        <h3>Browse books by category</h3>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="card mb-5">
            <div class="card-body">
              <h5 class="card-title bg-success p-2 rounded text-light">Fiction books</h5>
              <img src="assets/images/book-4.webp" alt="">
              <img src="assets/images/book-5.jpg" alt="">
              <img src="assets/images/book-6.avif" alt="">
              <img src="assets/images/book-7.jpeg" alt="">
              <div class="mt-auto text-end">
                <a href="#" class="btn btn-primary">View</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-5">
            <div class="card-body">
              <h5 class="card-title bg-success p-2 rounded text-light">Non fiction books</h5>
              <img src="assets/images/book-4.webp" alt="">
              <img src="assets/images/book-6.avif" alt="">
              <img src="assets/images/book-7.jpeg" alt="">
              <img src="assets/images/book-8.webp" alt="">
              <div class="mt-auto text-end">
                <a href="#" class="btn btn-primary">View</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-5">
            <div class="card-body">
              <h5 class="card-title bg-success p-2 rounded text-light">Religion books</h5>
              <img src="assets/images/book-4.webp" alt="">
              <img src="assets/images/book-5.jpg" alt="">
              <img src="assets/images/book-6.avif" alt="">
              <img src="assets/images/book-8.webp" alt="">
              <div class="mt-auto text-end">
                <a href="#" class="btn btn-primary">View</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-5">
            <div class="card-body">
              <h5 class="card-title bg-success p-2 rounded text-light">Academic books</h5>
              <img src="assets/images/book-4.webp" alt="">
              <img src="assets/images/book-5.jpg" alt="">
              <img src="assets/images/book-7.jpeg" alt="">
              <img src="assets/images/book-8.webp" alt="">
              <div class="mt-auto text-end">
                <a href="#" class="btn btn-primary">View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- sub card -->

    </main>

  </div>
  <!-- Book post Modal -->
  <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registrationModalLabel">User Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Scrollable Modal -->
  <div class="modal fade" id="scrollModal" tabindex="-1" aria-labelledby="scrollModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="scrollModalLabel">Scrollable Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-scroll-content">
            <!-- Add your scrollable content here -->
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <!-- ...more content... -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <footer class="footer text-white py-5" style="background-color: darkgray;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <h5>About Us</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget justo sit amet ligula ullamcorper volutpat. Sed euismod leo in mi pharetra, a fermentum justo pellentesque.</p>
        </div>
        <div class="col-lg-4 col-md-6">
          <h5>Contact Us</h5>
          <ul class="list-unstyled">
            <li><i class="bi bi-geo-alt-fill"></i> 123 Street, City, Country</li>
            <li><i class="bi bi-telephone-fill"></i> +1 234 567 890</li>
            <li><i class="bi bi-envelope-fill"></i> info@example.com</li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h5>Follow Us</h5>
          <ul class="list-inline">
            <li style="font-size: 2rem;" class="list-inline-item"><a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a></li>
            <li style="font-size: 2rem;" class="list-inline-item"><a href="https://twitter.com/"><i class="bi bi-twitter"></i></a></li>
            <li style="font-size: 2rem;" class="list-inline-item"><a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a></li>
            <li style="font-size: 2rem;" class="list-inline-item"><a href="https://www.linkedin.com/"><i class="bi bi-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <p class="text-center">Subscribe to our newsletter for the latest book releases and exclusive offers.</p>
          <form>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Enter your email address" required>
              <button class="btn btn-primary" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <p class="text-center">&copy; 2023 Our Bookshop. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery-3.7.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Initialize the carousel
      $('.carousel').carousel();
    });
  </script>
</body>

</html>