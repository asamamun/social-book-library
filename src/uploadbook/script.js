$(document).ready(function() {
    $.ajax({
        url: 'add.category.php',
        type: 'GET',
        success: function(response) {
            $('#categoryId').html(response);
        }
    });
})