$(document).ready(function() {
    // Add category form submission
    $('#addCategoryForm').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
  
      $.ajax({
        type: 'POST',
        url: 'add_category.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#addCategoryForm')[0].reset();
          loadCategories();
        }
      });
    });
  
    // Edit category button click
    $(document).on('click', '.edit-category', function() {
      var categoryId = $(this).data('id');
      var categoryName = $(this).data('name');
      var categoryDescription = $(this).data('description');
  
      $('#editCategoryName').val(categoryName);
      $('#editCategoryDescription').val(categoryDescription);
      $('#editCategoryId').val(categoryId);
      $('#editCategoryModal').modal('show');
    });
  
    // Edit category form submission
    $('#editCategoryForm').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
  
      $.ajax({
        type: 'POST',
        url: 'edit_category.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#editCategoryModal').modal('hide');
          loadCategories();
        }
      });
    });
  
    // Delete category
    $(document).on('click', '.delete-category', function() {
      var categoryId = $(this).data('id');
      
      if (confirm("Are you sure you want to delete this category?")) {
        $.ajax({
          type: 'POST',
          url: 'delete_category.php',
          data: { categoryId: categoryId },
          success: function(response) {
            loadCategories();
          }
        });
      }
    });
  
    // Load categories
    function loadCategories() {
      $.ajax({
        url: 'get_categories.php',
        success: function(response) {
          $('#categoryTable tbody').html(response);
        }
      });
    }
  
    // Initial category load
    loadCategories();
  });
  