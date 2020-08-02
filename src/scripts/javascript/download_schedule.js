$(document).ready(() => {
    $('#date').hide();
    $('#date-range').hide();
    $('.submit-group').hide();
    $('#option').change(() => {
        const val = $('#option').val();
        if (val === 's-date') {
            $('#date-range').hide();
            $('#date').show();
        } else if (val === 'date-range') {
            $('#date').hide();
            $('#date-range').show();
        } else {
            $('#date').hide();
            $('#date-range').hide();
            $('.submit-group').hide();
        }
    });
    $('#download-date').change(() => {
        $('.submit-group').show();
    });
    $('#download-to-date').change(() => {
        $('.submit-group').show();
    });
});
