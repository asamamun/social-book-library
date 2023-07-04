$(document).ready(function() {
    $.ajax({
        url: 'add.category.php',
        type: 'GET',
        success: function(response) {
            $('#categoryId').html(response);
        }
    });
    $.ajax({
        url: 'add.subcategory.php',
        type: 'GET',
        success: function(subcat) {
            $('#subcategoryId').html(subcat);
        }
    });
    $.ajax({
        url: 'add.writer.php',
        type: 'GET',
        success: function(Writer) {
            $('#Writer').html(Writer);
        }
    });
    $.ajax({
        url: 'add.publisher.php',
        type: 'GET',
        success: function(Writer) {
            $('#publisher').html(Writer);
        }
    });
})