const validateUpdate = () => {
    const pin = $('#pincode').val();
    const altMob = $('#alt-mobile-num').val();
    const fcgmobile1 = $('#f-caregiver-mob-1').val();
    const fcgmobile2 = $('#f-caregiver-mob-2').val();

    const pinRegex = /^[0-9]{6}$/;
    const mobileRegex = /^[0-9]{10}$/;
    let error = 'Error input validation. Please see the sugestions and update';
    let pinMatch = true;
    if (pin !== '') {
        pinMatch = pinRegex.test(pin);
    }
    let altMobMatch = true;
    if (altMob !== '') {
        altMobMatch = mobileRegex.test(altMob);
    }
    let fcgmobile1Match = true;
    if (fcgmobile1 !== '') {
        fcgmobile1Match = mobileRegex.test(fcgmobile1);
    }
    let fcgmobile2Match = true;
    if (fcgmobile2 !== '') {
        fcgmobile2Match = mobileRegex.test(fcgmobile2);
    }
    if (pinMatch && altMobMatch && fcgmobile1Match && fcgmobile2Match) {
        return true;
    } else {
        alert(
            'Enter all the details in valid format. Please recheck Mobile and PIN code'
        );
        return false;
    }
};
