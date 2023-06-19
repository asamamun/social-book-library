$(document).ready(function () {
    // Load publishers on page load
    loadPublishers();

    // Submit add publisher form
    $('#addPublisherForm').submit(function (e) {
        e.preventDefault();

        var publisherName = $('#publisherName').val();
        var publisherAddress = $('#publisherAddress').val();
        var publisherPhone = $('#publisherPhone').val();

        $.ajax({
            url: 'add_publisher.php',
            type: 'POST',
            data: {
                publisherName: publisherName,
                publisherAddress: publisherAddress,
                publisherPhone: publisherPhone
            },
            success: function (response) {
                $('#addPublisherForm')[0].reset();
                loadPublishers();
            }
        });
    });

    // when Edit publisher button click 
    $(document).on('click', '.edit-publisher', function () {
        var publisherId = $(this).data('id');
        var publisherName = $(this).data('name');
        var publisherAddress = $(this).data('address');
        var publisherPhone = $(this).data('phone');

        $('#editPublisherId').val(publisherId);
        $('#editPublisherName').val(publisherName);
        $('#editPublisherAddress').val(publisherAddress);
        $('#editPublisherPhone').val(publisherPhone);
        
        $('#editPublisherModal').modal('show');
    });

    // Submit edit publisher form
    $('#editPublisherForm').submit(function (e) {
        e.preventDefault();

        var publisherId = $('#editPublisherId').val();
        var publisherName = $('#editPublisherName').val();
        var publisherAddress = $('#editPublisherAddress').val();
        var publisherPhone = $('#editPublisherPhone').val();

        $.ajax({
            url: 'edit_publisher.php',
            type: 'POST',
            data: {
                publisherId: publisherId,
                publisherName: publisherName,
                publisherAddress: publisherAddress,
                publisherPhone: publisherPhone
            },
            success: function (response) {
                $('#editPublisherModal').modal('hide');
                loadPublishers();
            }
        });
    });

    // Delete publisher button click
    $(document).on('click', '.delete-publisher', function () {
        var publisherId = $(this).data('id');

        $('#deletePublisherBtn').data('id', publisherId);
        $('#deletePublisherModal').modal('show');
    });

    // Confirm delete publisher
    $('#deletePublisherBtn').click(function () {
        var publisherId = $(this).data('id');

        $.ajax({
            url: 'delete_publisher.php',
            type: 'POST',
            data: {
                publisherId: publisherId
            },
            success: function (response) {
                $('#deletePublisherModal').modal('hide');
                loadPublishers();
            }
        });
    });

    // Load publishers into the table
    function loadPublishers() {
        $.ajax({
            url: 'get_publishers.php',
            type: 'GET',
            success: function (response) {
                $('#publisherTable').html(response);
            }
        });
    }
});
