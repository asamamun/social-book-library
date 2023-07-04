$(document).ready(function() {
    $.ajax({
            url:'categories.php',
            type:'GET',
            success: function(response){
                $('#categoryId').html(response);
            }
    })
})