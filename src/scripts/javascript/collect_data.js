$(document).ready(() => {
    $('#family').hide();
    $('#delete-section').hide();
    $('#own-phone-yes').click(() => {
        $('#family').hide();
    });
    $('#own-phone-no').click(() => {
        $('#family').show();
    });

    $('#collection-date').val(new Date().toISOString().slice(0, 10));
    $('#reset').click(() => {
        $('#inv-table > tbody > tr:not(:first)').remove();
        $('#hidden').empty();
    });
});

const clearFields = () => {
    document.getElementById('patient-id').value = '';
    document.getElementById('mobile-number').value = '';
    document.getElementById('family-caregiver-name').value = '';
    document.getElementById('doctor-input').value = '';
    return false;
};

const validateSubmit = () => {
    const patientId = document.getElementById('patient-id').value;
    const mobile = document.getElementById('mobile-number').value;
    const mobRegEx = /^[0-9]{10}$/;
    const patientRegEx = /^[0-9]{4}$/;
    const r2 = patientRegEx.test(patientId);
    const r1 = mobRegEx.test(mobile);

    if (r1 === false) {
        alert('Invalid Mobile Number Entered');
        return false;
    } else if (r2 === false) {
        alert('Invalid Patient Id Entered');
        return false;
    }
    return true;
};

const addInvestigation = () => {
    let investigation = document.getElementById('investigation-name');
    let frequency = document.getElementById('investigation-frequency');
    let text = investigation.options[investigation.selectedIndex].text;
    frequency = frequency.value;

    const table = document.getElementById('inv-table');
    row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = text;
    cell2.innerHTML = frequency;

    var x = document.createElement('INPUT');
    x.setAttribute('type', 'hidden');
    x.setAttribute('name', 'invest[]');
    x.setAttribute('value', investigation.value);

    var y = document.createElement('INPUT');
    y.setAttribute('type', 'hidden');
    y.setAttribute('name', 'freq[]');
    y.setAttribute('value', frequency);

    let hidden = document.getElementById('hidden');
    hidden.appendChild(x);
    hidden.appendChild(y);

    return false;
};
