$(document).ready(function () {
    $('#reset-block').hide();
    $('#btn-change-password').click(function (e) {
        e.preventDefault();
        $('#profile-block').hide();
        $('#reset-block').show();
    });
    $('#btn-backto-profile').click(function (e) {
        e.preventDefault();
        $('#profile-block').show();
        $('#reset-block').hide();
    });
});
