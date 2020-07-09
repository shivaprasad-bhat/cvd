$(document).ready(function () {
    $('.level-1').hide();
    $('.level-2').hide();
    $('#submit-btn').hide();
    $('#pids').change(function () {
        $('#submit-btn').show();
    });
    $('#to-date').change(function () {
        $('#submit-btn').show();
    });
    $('#specific-date').change(function () {
        $('#submit-btn').show();
    });
    $('#e-list').change(function () {
        $('#submit-btn').show();
    });
});
const typeSelected = (val) => {
    if (val === 'patient') {
        $('.level-1').hide();
        $('.level-2').hide();
        $('#submit-btn').hide();
        $('#patient').show();
    } else if (val === 'date') {
        $('.level-1').hide();
        $('#submit-btn').hide();
        $('.level-2').hide();
        $('#date').show();
    } else if (val === 'event') {
        $('.level-1').hide();
        $('#submit-btn').hide();
        $('.level-2').hide();
        $('#event').show();
    } else if (val === '') {
        $('.level-1').hide();
        $('#submit-btn').hide();
        $('.level-2').hide();
    }
};

const patientSelected = (val) => {
    if (val == 'all') {
        $('.level-2').hide();
        $('#submit-btn').show();
    } else if (val === 'pid') {
        $('.level-2').hide();
        $('#submit-btn').hide();
        $('#p-ids').show();
    }
};

const dateSelected = (val) => {
    if (val === 'd-range') {
        $('.level-2').hide();
        $('#submit-btn').hide();
        $('#date-range').show();
    } else if (val === 's-date') {
        $('.level-2').hide();
        $('#submit-btn').hide();
        $('#specific-date').show();
    }
};

const eventSelected = (val) => {
    if (val == 'all') {
        $('.level-2').hide();
        $('#submit-btn').show();
    } else if (val === 's-event') {
        $('.level-2').hide();
        $('#submit-btn').hide();
        $('#events-list').show();
    }
};

const validateTable = () => {
    let selection = document.getElementById('type').value;
    if (selection === 'patient') {
        let patientSelection = document.getElementById('p-select').value;
        if (patientSelection === 'pid') {
            if (document.getElementById('pids').value === '') {
                alert('Select all required value');
                return false;
            }
        } else if (patientSelection === '') {
            alert('Select all required value');
            return false;
        }
    } else if (selection === 'date') {
        let dateSelected = document.getElementById('').value;
        if (dateSelected === 'd-range') {
            if (document.getElementById('').value === '') {
                alert('Select all required value');
                return false;
            }
        } else if (dateSelected === 's-date') {
            if (document.getElementById('').value === '') {
                alert('Select all required value');
                return false;
            }
        } else {
            if (document.getElementById('').value === '') {
                alert('Select all required value');
                return false;
            }
        }
    } else if (selection === 'event') {
    }
    return true;
};
