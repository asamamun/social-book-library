$(document).ready(function() {
    // $.ajax({
    //     url: 'add.category.php',
    //     type: 'GET',
    //     success: function(response) {
    //         $('#categoryId').html(response);
    //     }
    // });
    // $.ajax({
    //     url: 'add.subcategory.php',
    //     type: 'GET',
    //     success: function(subcat) {
    //         $('#subcategoryId').html(subcat);
    //     }
    // });
    // $.ajax({
    //     url: 'add.writer.php',
    //     type: 'GET',
    //     success: function(Writer) {
    //         $('#Writer').html(Writer);
    //     }
    // });
    // $.ajax({
    //     url: 'add.publisher.php',
    //     type: 'GET',
    //     success: function(Writer) {
    //         $('#publisher').html(Writer);
    //     }
    // });

    // add-upload-book 

    $('#upload_book').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'insart.info.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response);
                $('#upload_book')[0].reset();
                loadSubcategories();
            }
        });
    });

    // dropdown get

    $.ajax({
        url: "add.category.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            if (data.success) {
                var options = "";
                $.each(data.categories, function(index, categories) {
                    options += "<option value='" + categories.id + "'>" + categories.name + "</option>";
                });
                $("#categoryId").html(options);
            }
        }
    });

    $.ajax({
        url: "add.publisher.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            if (data.success) {
                var options = "";
                $.each(data.publishers, function(index, publishers) {
                    options += "<option value='" + publishers.id + "'>" + publishers.name + "</option>";
                });
                $("#publisher").html(options);
            }
        }
    });
    $.ajax({
        url: "add.subcategory.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            if (data.success) {
                var options = "";
                $.each(data.subcategories, function(index, subcategories) {
                    options += "<option value='" + subcategories.id + "'>" + subcategories.name + "</option>";
                });
                $("#subcategoryId").html(options);
            }
        }
    });
    $.ajax({
        url: "add.writer.php",
        type: "POST",
        dataType: "json",
        success: function(data) {
            if (data.success) {
                var options = "";
                $.each(data.writers, function(index, writers) {
                    options += "<option value='" + writers.id + "'>" + writers.name + "</option>";
                });
                $("#Writer").html(options);
            }
        }
    });
})