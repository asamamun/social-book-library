$(document).ready(function() {
    $.ajax({
            URL:'categories.php',
            type:'GET',
            success: function(response){
                $('#categoryId').html(response);
            }
    })
})