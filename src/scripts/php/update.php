<?php

if (!isset($_SESSION['user'])) {
    session_start();
}

/**
 * Method that gives the data to update the table.
 * if $isString is true, return NULL or given String enclosed with single quotation
 * else return NULL or integer value of the given data
 * @author Shivaprasad Bhat
 * @param string $string, bool $isString
 */
function formatData($string, $isString)
{
    if ($isString === TRUE) {
        $string = ($string == '') ? 'NULL' : "'$string'";
    } else {
        $string = ($string == '') ? 'NULL' : intval($string);
    }
    return $string;
}

if (isset($_POST['submit'])) {
    require('./connect.php');
    $update = array();
    $id = formatData($_POST["pat-id"], FALSE);
    $PatName = formatData($_POST["patient-name"], TRUE);
    $MobileNo = formatData($_POST["mobile-num"], FALSE);
    $AltMobileNo = formatData($_POST["alt-mobile-num"], FALSE);
    $Email = formatData($_POST["email"], TRUE);
    $Address = formatData($_POST["address"], TRUE);
    $KAddress = formatData($_POST["k-address"], TRUE);
    $City = formatData($_POST["city"], TRUE);
    $KCity = formatData($_POST["k-city"], TRUE);
    $Pincode = formatData($_POST["pincode"], FALSE);
    $Location = formatData($_POST["location"], TRUE);
    $KLocation = formatData($_POST["k-location"], TRUE);
    $FCGName = formatData($_POST["f-caregiver-name"], TRUE);
    $KFCGName = formatData($_POST["f-caregiver-k-name"], TRUE);
    $FCGEmail = formatData($_POST["f-caregiver-email"], TRUE);
    $FCGMNO1 = formatData($_POST["f-caregiver-mob-1"], FALSE);
    $FCGMNO2 = formatData($_POST["f-caregiver-mob-2"], FALSE);
    $Relationship = formatData($_POST["relationship"], TRUE);
    $IsOwnPhone = formatData($_POST["phone"], FALSE);
    $IsSmartPhone = formatData($_POST["smartphone"], FALSE);
    $Registered = formatData($_POST["registered"], FALSE);
    $PatDesc = formatData($_POST["pat-desc"], TRUE);

    $conn->autoCommit(FALSE);
    $conn->begin_transaction();

    //Set Query
    $query = "UPDATE patient SET PatName = $PatName,
    MobileNo = $MobileNo, AltMobileNo = $AltMobileNo,
    Email = $Email, Address = $Address, KAddress = $KAddress,
    City = $City, KCity = $KCity, Pincode = $Pincode, 
    Location = $Location, FCGName = $FCGName, KFCGName = $KFCGName,
    FCGEmail = $FCGEmail, FCGMNO1 = $FCGMNO1, FCGMNO2 = $FCGMNO2,
    Relationship = $Relationship, IsOwnPhone = $IsOwnPhone,
    IsSmartPhone = $IsSmartPhone, PatDesc = $PatDesc, Registered = $Registered WHERE id = $id";

    //Execute
    $result = $conn->query($query);
    //Close Connection established
    $conn->close();

    if ($result === TRUE) {
        $conn->commit();
        $conn->autoCommit(TRUE);

        echo '
            <script language="javascript">
            alert("Updated the patient info.")
            window.location.href="/cvd/src/views/update_patient.php"
            </script>
        ';
    } else {
        $conn->rollback();
        $conn->autoCommit(TRUE);

        echo '
            <script language="javascript">
            alert("Something went wrong. Can\'t update the information now. Please try again")
            window.location.href="/cvd/src/views/update_patient.php"
            </script>
        ';
    }
}
