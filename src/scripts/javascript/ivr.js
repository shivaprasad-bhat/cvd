$(document).ready(() => {
    $('.date').hide();
    $('.date-range').hide();
    $('.submit-group').hide();
    $('#ivr-options').change(() => {
        const val = $('#ivr-options').val();
        if (val === 'specific-date') {
            $('.date-range').hide();
            $('.date').show();
        } else if (val === 'date-range') {
            $('.date').hide();
            $('.date-range').show();
        } else {
            $('.date').hide();
            $('.date-range').hide();
            $('.submit-group').hide();
        }
    });
    $('#s-date').change(() => {
        $('.submit-group').show();
    });
    $('#to-date').change(() => {
        $('.submit-group').show();
    });
});
