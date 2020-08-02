<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
/**
 * Function to format the data given 
 * @param string $data
 * @return string $data formatted
 * Using stripslashes()  htmlspecialchars() to avoid injections from DOM
 * @author Shivaprasad Bhat
 * @date 2020-06-30
 */
function formatData($data)
{
    return trim(stripslashes(htmlspecialchars($data)));
}

# allow to hit the script only if user session is set in the server with unique id


if (isset($_SESSION['user'])) {
    define("HOST", "localhost");
    $dbname = "CVDCareDB";
    $caregiver = $_SESSION['user'];
    $password = $_SESSION['password'];
    $conn = new mysqli(HOST, $caregiver, $password, $dbname) or die("Connection failed: " . $conn->connect_error);

    $caregiver = ucfirst($caregiver);
    $query = "SELECT * FROM `caregiver` WHERE CGName like '$caregiver%'";
    $result = $conn->query($query);
    global $CGId;
    $userName = $_SESSION['user'];
    if ($result->num_rows == 1) {
        $row = $result->fetch_array();
        $CGId = $row['id'];
    }

    //Get the values via POST from input form
    if (isset($_POST["submit"])) {
        $surveyDate = formatData($_POST["collection-date"]);
        $doctorid = formatData($_POST["doctor-name"]);
        $patientId = formatData($_POST["patient-id"]);
        $mobileNumber = formatData($_POST["mobile-number"]);
        $isOwnPhone = intval(formatData($_POST["phone"]));
        $familyCaregiverName = formatData($_POST["phone"]) === "no" ? formatData($_POST["family-caregiver-name"]) : "NULL";
        $relationship = formatData($_POST["phone"]) === "no" ? formatData($_POST["relationship"]) : "NULL";
        $diseases = $_POST["disease"];
        $doctorVisitFrequency = formatData($_POST["doctor-visit-frequency"]);
        $investigationName = $_POST['invest'];
        $investigationFrequency = $_POST['freq'];
        $symptoms = $_POST["symptoms"];
        $advice = formatData($_POST['doctor-input']);

        $var = checkUserIdExists($conn, $patientId, $mobileNumber);

        if ($var === TRUE) {
            runTransaction($conn, $patientId, $mobileNumber, $familyCaregiverName, $relationship, $CGId, $isOwnPhone, $surveyDate, $doctorid, $advice, $doctorVisitFrequency, $diseases, $investigationName, $investigationFrequency, $symptoms);
        }
        #call function to run transaction
        else {
            $conn->close();
            echo '
            <script language="javascript">
            alert("User Id or Mobile Number already present. Please add unique number and id")
            window.location.href="/cvd/src/views/collect_data.php"
            </script>
        ';
        }
    } else {
        echo '
            <script language="javascript">
            alert("Can\'t process your request. Please submit the data before processing")
            window.location.href="/cvd/src/"
            </script>
        ';
    }
}
function runTransaction($conn, $patientId, $mobileNumber, $familyCaregiverName, $relationship, $CGId, $isOwnPhone, $surveyDate, $doctorid, $advice, $doctorVisitFrequency, $diseases, $investigationName, $investigationFrequency, $symptoms)
{
    $conn->autoCommit(FALSE);
    $conn->begin_transaction();
    $patientQuery = "INSERT INTO patient(id, MobileNo, isOwnPhone, FCGName, Relationship, caregiverId) VALUES($patientId,  $mobileNumber , $isOwnPhone, $familyCaregiverName, $relationship, $CGId)";
    $patientRecruitmentQuery = "INSERT INTO patientrecruitment(patientId, SurveyDate, LastDVisitDate, doctorId, PhyComplianceAdvice, DVisitFrequency, dietId, exerciseId) VALUES($patientId , '$surveyDate' , '$surveyDate', $doctorid, '$advice', '$doctorVisitFrequency', 1, 1)";
    $patientDoctorQuery = "INSERT INTO patientdoctor (patientId,DId,AssignDate,PhyComplianceAdvice) VALUES($patientId, $doctorid, '$surveyDate', '$advice')";

    $result1 = $conn->query($patientQuery);
    $result2 = $conn->query($patientRecruitmentQuery);
    $result3 = $conn->query($patientDoctorQuery);


    $qQueryError = FALSE;
    foreach ($diseases as $d) {

        $dQuery = "INSERT INTO patientmedsymptrack(patientId,medicationConditionId,STDate) VALUES($patientId, $d, '$surveyDate')";
        $res = $conn->query($dQuery);
        if ($res === FALSE) {
            $qQueryError = TRUE;
        }
    }

    $iQueryError = FALSE;
    for ($i = 0; $i < count($investigationName); $i++) {

        $iQuery = "INSERT INTO patientinvordered(patientID,STDate,investigationId,Frequency) VALUES($patientId, '$surveyDate', $investigationName[$i], '$investigationFrequency[$i]')";
        $res = $conn->query($iQuery);
        if ($res === FALSE) {
            $iQueryError = TRUE;
        }
    }



    $sQueryError = FALSE;
    foreach ($symptoms as $symptom) {

        $sQuery = "INSERT INTO patientmedsymptrack(patientId,medicationConditionId,STDate) VALUES($patientId, $symptom, '$surveyDate')";
        $res = $conn->query($sQuery);
        if ($res === FALSE) {
            $sQueryError = TRUE;
        }
    }

    $d = strtotime("$surveyDate + 1 year");
    $future = strval(date('Y-m-d', $d));
    $proc1 = "CALL proctreatSched1($patientId,'$surveyDate', '$future')";
    $proc2 = "CALL proctreatSched2($patientId,'$surveyDate', '$future')";
    $proc3 = "CALL proctreatSched3($patientId,'$surveyDate', '$future')";

    $procRes1 = $conn->query($proc1);
    $procRes2 = $conn->query($proc2);
    $procRes3 = $conn->query($proc3);


    if ($result1 === TRUE && $result2 === TRUE && $result3 === TRUE && $qQueryError === FALSE && $iQueryError === FALSE && $sQueryError === FALSE && $procRes1 === TRUE && $procRes2 === TRUE && $procRes3 === TRUE) {
        $conn->commit();
        $conn->autoCommit(TRUE);
        $conn->close();
        echo '
            <script language="javascript">
            alert("Record Added Successfully")
            window.location.href="/cvd/src/views/collect_data.php"
            </script>
        ';
    } else {

        $conn->rollback();
        $conn->autoCommit(TRUE);
        $conn->close();
        echo '
            <script language="javascript">
            alert("Something Went Wrong. Can\'t commit. Please retry")
            window.location.href="/cvd/src/views/collect_data.php"
            </script>
        ';
    }
}

function checkUserIdExists($conn, $patientId, $mobileNumber)
{
    $check1 = "SELECT * FROM `patient` WHERE id = $patientId";
    $check2 = "SELECT * FROM `patient` WHERE MobileNo = $mobileNumber";
    $r1 = $conn->query($check1);
    $r2 = $conn->query($check2);
    if ($r1->num_rows > 0 || $r2->num_rows > 0) {
        return FALSE;
    } else {
        return TRUE;
    }
}
