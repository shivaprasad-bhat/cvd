$(document).ready(() => {
    $('.pat-ids').hide();
    $('.sympt-list').hide();
    $('.submit-group').hide();
    $('#opt').change(() => {
        debugger;
        let selection = document.getElementById('opt').value;
        if (selection === 'symptopms') {
            $('.pat-ids').hide();
            $('.sympt-list').show();
            $('.submit-group').hide();
        } else if (selection === 'patient') {
            $('.pat-ids').show();
            $('.sympt-list').hide();
            $('.submit-group').hide();
        } else {
            $('.pat-ids').hide();
            $('.sympt-list').hide();
            $('.submit-group').hide();
        }
    });
    $('#pat-list').change(() => {
        $('.submit-group').show();
    });
    $('#symptoms-list').change(() => {
        $('.submit-group').show();
    });
});
