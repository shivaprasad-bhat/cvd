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
    $id = formatData($_POST["pat-id"], FALSE);
    //Recruitment Table
    $LastDVisitDate = formatData($_POST["last-visit-date"], TRUE);
    $PhyDiagnosis = formatData($_POST["phy-diagnosis"], TRUE);
    $PhyComplianceAdvice = formatData($_POST["comp-advice"], TRUE);
    $PhyMedicationAdvice = formatData($_POST["med-advice"], TRUE);
    $DVisitFrequency = formatData($_POST["doctor-visit-frequency"], TRUE);
    $Weight = formatData($_POST["weight"], FALSE);
    $WUnitId = formatData($_POST["w-unit-id"], TRUE);
    $Height = formatData($_POST["height"], FALSE);
    $HUnitId = formatData($_POST["h-unit-id"], TRUE);
    $WaistCircum = formatData($_POST["weist-circum"], FALSE);
    $WCUnitId = formatData($_POST["wc-unit-id"], FALSE);
    $WaistHipRatio = formatData($_POST["w-hip-ratio"], TRUE);
    $HeartRate = formatData($_POST["heart-rate"], FALSE);
    $RespiratoryRate = formatData($_POST["resp-rate"], FALSE);
    $BPSystolic = formatData($_POST["bp-systolic"], FALSE);
    $BPDiastolic = formatData($_POST["bp-diastolic"], FALSE);
    $PhysicalActivity = formatData($_POST["phy-activity"], TRUE);
    $MenstrualStatus = formatData($_POST["mensural-status"], TRUE);
    $SurgicalHistory = formatData($_POST["sur-history"], TRUE);
    $SurgeryDate = formatData($_POST["sur-date"], TRUE);
    $doctorId = formatData($_POST["doctor-id"], FALSE);
    $dietId = formatData($_POST["diet-id"], FALSE);
    $exerciseId = formatData($_POST["excersise-id"], FALSE);

    $conn->autoCommit(FALSE);
    $conn->begin_transaction();

    $query1 = "UPDATE patientrecruitment SET LastDVisitDate = $LastDVisitDate,
    PhyDiagnosis = $PhyDiagnosis, PhyComplianceAdvice = $PhyComplianceAdvice, PhyMedicationAdvice = $PhyMedicationAdvice, 
    DVisitFrequency = $DVisitFrequency, Weight = $Weight, WUnitId = $WUnitId, Height = $Height, HUnitId = $HUnitId,
    WaistCircum = $WaistCircum, WCUnitId = $WCUnitId, WaistHipRatio = $WaistHipRatio, HeartRate = $HeartRate, 
    RespiratoryRate = $RespiratoryRate, BPSystolic = $BPSystolic, BPDiastolic = $BPDiastolic, PhysicalActivity = $PhysicalActivity,
    MenstrualStatus = $MenstrualStatus, SurgicalHistory = $SurgicalHistory, SurgeryDate = $SurgeryDate, doctorId = $doctorId, 
    dietId = $dietId, exerciseId = $exerciseId WHERE patientId = $id";

    $query2 = "UPDATE patientdoctor SET DId = $doctorId WHERE patientId = $id";

    $result1 = $conn->query($query1);
    $result2 = $conn->query($query2);

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
