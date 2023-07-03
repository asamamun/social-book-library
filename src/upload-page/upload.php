<!DOCTYPE html>
<html>

<head>
  <title>Upload Form</title>
  <!-- <link rel="stylesheet" href="../../assets/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">Add Category</div>
      <div class="card-body">
        <form id="addCategoryForm" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="categoryName" class="form-label">Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
          </div>
          <div class="mb-3">
            <label for="categoryDescription" class="form-label">Description</label>
            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="categoryId" class="form-label">Category</label>
            <select class="form-control" id="categoryId" name="categoryId" required>
              <option value="">Select Category</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input class="form-control" id="price" name="price" rows="3" required></input>
          </div>
          <div class="mb-3">
            <label for="sellprice" class="form-label">Sell Price</label>
            <input class="form-control" id="sellprice" name="sellprice" rows="3" required></input>
          </div>
          <div class="mb-3">
            <label for="writer" class="form-label">Writer</label>
            <input class="form-control" id="writer" name="writer" rows="3" required></input>
          </div>
          <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input class="form-control" id="publisher" name="publisher" rows="3" required></input>
          </div>
          <div class="mb-3">
            <label for="edition" class="form-label">Edition</label>
            <input class="form-control" id="edition" name="edition" rows="3" required></input>
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
      </div>
    </div>

  </div>

  <script src="jquery-3.7.0.min.js"></script>
  <!-- <script src="../../assets/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>