$(document).ready(function () {
    // Load countries on page load
    loadCountries();

    // Add country form submission
    $('#addCountryForm').submit(function (e) {
        e.preventDefault();

        var iso = $('#iso').val();
        var name = $('#name').val();
        var nicename = $('#nicename').val();
        var iso3 = $('#iso3').val();
        var numcode = $('#numcode').val();
        var phonecode = $('#phonecode').val();

        $.ajax({
            url: 'add_country.php',
            type: 'POST',
            data: {
                iso: iso,
                name: name,
                nicename: nicename,
                iso3: iso3,
                numcode: numcode,
                phonecode: phonecode
            },
            success: function (response) {
                alert(response);
                $('#addCountryForm')[0].reset();
                loadCountries();
            }
        });
    });

    // Edit country form submission
    $('#editCountryForm').submit(function (e) {
        e.preventDefault();

        var countryId = $('#editCountryId').val();
        var iso = $('#editIso').val();
        var name = $('#editName').val();
        var nicename = $('#editNicename').val();
        var iso3 = $('#editIso3').val();
        var numcode = $('#editNumcode').val();
        var phonecode = $('#editPhonecode').val();

        $.ajax({
            url: 'edit_country.php',
            type: 'POST',
            data: {
                countryId: countryId,
                iso: iso,
                name: name,
                nicename: nicename,
                iso3: iso3,
                numcode: numcode,
                phonecode: phonecode
            },
            success: function (response) {
                alert(response);
                $('#editCountryModal').modal('hide');
                loadCountries();
            }
        });
    });

    // Delete country confirmation
    $('#deleteCountryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var countryId = button.data('countryid');

        $('#deleteCountryBtn').click(function () {
            $.ajax({
                url: 'delete_country.php',
                type: 'POST',
                data: { countryId: countryId },
                success: function (response) {
                    alert(response);
                    $('#deleteCountryModal').modal('hide');
                    loadCountries();
                }
            });
        });
    });

    // Load countries into the table
    function loadCountries() {
        $.ajax({
            url: 'fetch_countries.php',
            type: 'GET',
            success: function (response) {
                $('#countryTable').html(response);
            }
        });
    }
});
