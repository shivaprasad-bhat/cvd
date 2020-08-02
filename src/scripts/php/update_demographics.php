<?php

if (session_status() == PHP_SESSION_NONE) {
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
    // Patient table
    $id = formatData($_POST["pat-id"], FALSE);
    $Gender = formatData($_POST['gender'], TRUE);
    $DOB = formatData($_POST['dob'], TRUE);
    $Age = formatData($_POST['age'], FALSE);
    $MaritialStatus = formatData($_POST['m-status'], TRUE);
    $NoOfLivChildren = formatData($_POST['no-of-children'], FALSE);
    $Religion = formatData($_POST['religion'], TRUE);
    $EducationStatus = formatData($_POST['edu'], TRUE);
    $Occupation = formatData($_POST['occupation'], TRUE);
    $MonthlyIncome = formatData($_POST['m-income'], FALSE);
    $TypeOfCommunity = formatData($_POST['community'], TRUE);
    $TypeOfDiet = formatData($_POST['diet'], TRUE);
    $TypeOfFamily = formatData($_POST['family'], TRUE);
    $LanguageApp = formatData($_POST['app-lang'], TRUE);
    $LanguageProf = formatData($_POST['lang-prof'], TRUE);
    $STDescription = formatData($_POST['st-desc'], TRUE);

    $query = "UPDATE patientdemographics SET Gender = $Gender,
    DOB = $DOB, Age = $Age, MaritialStatus = $MaritialStatus,
    NoOfLivChildren = $NoOfLivChildren, Religion = $Religion,
    EducationStatus = $EducationStatus, Occupation = $Occupation,
    MonthlyIncome = $MonthlyIncome, TypeOfCommunity = $TypeOfCommunity,
    TypeOfDiet = $TypeOfDiet, TypeOfFamily = $TypeOfFamily,
    LanguageApp = $LanguageApp, LanguageProf = $LanguageProf,
    STDescription = $STDescription WHERE patientID = $id";

    $conn->autoCommit(FALSE);
    $conn->begin_transaction();

    $result1 = $conn->query($query);

    if ($result1 === TRUE) {
        $conn->commit();
        $conn->autoCommit(TRUE);
        //Close Connection established
        $conn->close();
        echo '
            <script language="javascript">
            alert("Updated the patient info.")
            window.location.href="/cvd/src/views/update_patient.php"
            </script>
        ';
    } else {
        $conn->rollback();
        $conn->autoCommit(TRUE);
        //Close Connection established
        $conn->close();
        echo '
            <script language="javascript">
            alert("Something went wrong. Can\'t update the information now. Please try again")
            window.location.href="/cvd/src/views/update_patient.php"
            </script>
        ';
    }
}
