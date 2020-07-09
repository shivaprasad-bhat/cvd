const validateLoginInput = () => {
    let errors = new Array();
    let radioSelection = document.forms['login-form']['login-type'].value;
    if (radioSelection !== 'caregiver') {
        window.alert(
            'Login option for Doctors and Patients is not enabled in the application yet.'
        );
        window.location.replace('/cvd/src');
        return false;
    }
    let userName = document.forms['login-form']['username'].value;
    console.log(userName);
    if (userName == null || userName == '') {
        errors.push('Please enter User Name');
    }
    let password = document.forms['login-form']['password'].value;
    console.log(password);
    if (password == null || password == '') {
        errors.push('Password field cannot be empty.');
    }

    if (errors.length != 0) {
        alert(
            'Form submission error. Please follow below details..\n\n' +
                errors.join('\n')
        );
        return false;
    }
    return true;
};
