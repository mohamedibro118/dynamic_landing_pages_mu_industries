$(document).ready(function() {
    $('#submit-button').on('click', function(e) {
        // show the loading image
        var form = $(this).closest('form');

        // show the loading image
        $('#loading').show();

        // disable the submit button to prevent multiple clicks
        $(this).prop('disabled', true);

        // submit the form normally
        // NOTE: You can replace this with any regular HTTP request
        form.submit();
    });

    // hide the loading image once the page has finished loading
    $(window).on('load', function() {
        $('#loading').hide();
    });
});
