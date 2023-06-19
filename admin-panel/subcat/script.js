$(document).ready(function() {
    // Populate categories dropdown
    $.ajax({
        url: 'get_categories.php',
        type: 'GET',
        success: function(response) {
            $('#categoryId').html(response);
        }
    });

    // Add subcategory form submission
    $('#addSubcategoryForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'add_subcategory.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // alert(response);
                $('#addSubcategoryForm')[0].reset();
                loadSubcategories();
            }
        });
    });

    // Load subcategories on page load
    loadSubcategories();

    // Load subcategories function
    function loadSubcategories() {
        $.ajax({
            url: 'get_subcategories.php',
            type: 'GET',
            success: function(response) {
                $('#subcategoryTable').html(response);
            }
        });
    }

    // Edit subcategory button click
    $(document).on('click', '.edit-subcategory', function() {
        var subcategoryId = $(this).data('id');
        var subcategoryName = $(this).data('name');
        var subcategoryDescription = $(this).data('description');

        $('#editSubcategoryId').val(subcategoryId);
        $('#editSubcategoryName').val(subcategoryName);
        $('#editSubcategoryDescription').val(subcategoryDescription);
        $('#editSubcategoryModal').modal('show');
    });

    // Edit subcategory form submission
    $('#editSubcategoryForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'edit_subcategory.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // alert(response);
                $('#editSubcategoryModal').modal('hide');
                loadSubcategories();
            }
        });
    });

    // Delete subcategory button click
    $(document).on('click', '.delete-subcategory', function() {
        var subcategoryId = $(this).data('id');
        var confirmation = confirm('Are you sure you want to delete this subcategory?');

        if (confirmation) {
            $.ajax({
                type: 'POST',
                url: 'delete_subcategory.php',
                data: { subcategoryId: subcategoryId },
                success: function(response) {
                    // alert(response);
                    loadSubcategories();
                }
            });
        }
    });
});
