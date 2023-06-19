$(document).ready(function () {
    // Load countries on page load
    loadCountries();

    // Load writers on page load
    loadWriters();

    // Add writer form submission
    $('#addWriterForm').submit(function (e) {
        e.preventDefault();

        var name = $('#name').val();
        var bio = $('#bio').val();
        var countryId = $('#countryId').val();
        var image = $('#image').prop('files')[0];

        var formData = new FormData();
        formData.append('name', name);
        formData.append('bio', bio);
        formData.append('countryId', countryId);
        formData.append('image', image);

        $.ajax({
            url: 'add_writer.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                $('#addWriterForm')[0].reset();
                loadWriters();
            }
        });
    });

    // Edit writer form submission
    $('#editWriterForm').submit(function (e) {
        e.preventDefault();

        var writerId = $('#editWriterId').val();
        var name = $('#editName').val();
        var bio = $('#editBio').val();
        var countryId = $('#editCountryId').val();
        var image = $('#editImage').prop('files')[0];

        var formData = new FormData();
        formData.append('writerId', writerId);
        formData.append('name', name);
        formData.append('bio', bio);
        formData.append('countryId', countryId);
        formData.append('image', image);

        $.ajax({
            url: 'edit_writer.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response);
                $('#editWriterModal').modal('hide');
                loadWriters();
            }
        });
    });

    // Delete writer confirmation
    $('#deleteWriterModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var writerId = button.data('writerid');
        $('#deleteWriterBtn').data('writerid', writerId);
    });

    // Delete writer
    $('#deleteWriterBtn').click(function () {
        var writerId = $(this).data('writerid');

        $.ajax({
            url: 'delete_writer.php',
            type: 'POST',
            data: { writerId: writerId },
            success: function (response) {
                alert(response);
                $('#deleteWriterModal').modal('hide');
                loadWriters();
            }
        });
    });
});

function loadCountries() {
    $.ajax({
        url: 'fetch_countries.php',
        type: 'GET',
        success: function (response) {
            $('#countryId, #editCountryId').html(response);
        }
    });
}

function loadWriters() {
    $.ajax({
        url: 'fetch_writers.php',
        type: 'GET',
        success: function (response) {
            $('#writersTableBody').html(response);
        }
    });
}
