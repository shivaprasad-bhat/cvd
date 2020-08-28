<!-- Php page to edit the patient details -->
<?php
if (!isset($_SESSION['user'])) {
    session_start();
}
if (isset($_SESSION['user'])) {
    if (isset($_POST['submit'])) {
        require('../scripts/php/connect.php');
        $id = intval($_POST['edit-id']);
        //Get Doctor details
        $query = "SELECT * FROM doctor";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $did = array();
            $dname = array();
            while ($row = $result->fetch_assoc()) {
                $did[] = $row['id'];
                $dname[] = $row['DName'];
            }
        }
        //Diet details
        $query = "SELECT * FROM `dietsupmaster`";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $dietid = array();
            $dietname = array();
            while ($row = $result->fetch_assoc()) {
                $dietid[] = $row['id'];
                $dietname[] = $row['DSPlanName'];
            }
        }
        //Excersise Details 
        $query = "SELECT * FROM `exlsmmaster`";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $eid = array();
            $ename = array();
            while ($row = $result->fetch_assoc()) {
                $eid[] = $row['id'];
                $ename[] = $row['ELPlanName'];
            }
        }
    } else {
        echo '
            <script language="javascript">
            alert("Something Went Wrong. Please submit the id to be deleted and try again")
            window.location.href="/cvd/src/views/collect_data.php"
            </script>
        ';
    }
} else {
    echo '
            <script language="javascript">
            alert("Login first to see this page")
            window.location.href="/cvd/src/"
            </script>
        ';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Details</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <script src="/cvd/src/scripts/javascript/edit.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/edit.css" />
    <style>
        ::placeholder {
            color: gray !important;
            opacity: 0.5 !important;
            /* Firefox */
        }
    </style>
    <script>
        $(document).ready(() => {
            $('.delete').click((e) => {
                debugger;
                e.preventDefault();
                $('table tbody')
                    .find('input[name="record"]')
                    .each(function() {
                        if ($(this).is(':checked')) {
                            $(this).parents('tr').remove();
                        }
                    });
            });
            $('#add').click(function(e) {
                e.preventDefault();
                debugger;
                let investigation = document.getElementById('investigation-name');
                let frequency = document.getElementById('investigation-frequency');
                let text = investigation.options[investigation.selectedIndex].text;
                frequency = frequency.value;
                const table = document.getElementById('inv-table');
                row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                var x = document.createElement('INPUT');
                x.setAttribute('type', 'hidden');
                x.setAttribute('name', 'inv[]');
                x.setAttribute('value', investigation.value);

                var y = document.createElement('INPUT');
                y.setAttribute('type', 'hidden');
                y.setAttribute('name', 'freq[]');
                y.setAttribute('value', frequency);

                var checkbox = document.createElement('INPUT');
                checkbox.setAttribute('type', 'checkbox');
                checkbox.setAttribute('name', 'record');

                cell1.innerHTML = text;
                cell2.innerHTML = frequency;
                cell3.appendChild(checkbox)
                cell3.appendChild(x);
                cell3.appendChild(y);
            })
        });
    </script>
</head>

<body onload="loadForm();">
    <?php
    include_once('../components/navbar.php');
    if (isset($_SESSION['user'])) {
        if (isset($_POST['submit'])) {
            if ($_POST['table-name'] === "patient") {
                $query = "SELECT * FROM `patient` WHERE id = $id";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $conn->close();
                if ($row) {
                    $PatName = $row["PatName"];
                    $MobileNo = $row["MobileNo"];
                    $AltMobileNo = $row["AltMobileNo"];
                    $Email = $row["Email"];
                    $Address = $row["Address"];
                    $KAddress = $row["KAddress"];
                    $City = $row["City"];
                    $KCity = $row["KCity"];
                    $Pincode = $row["Pincode"];
                    $Location = $row["Location"];
                    $KLocation = $row["KLocation"];
                    $FCGName = $row["FCGName"];
                    $KFCGName = $row["KFCGName"];
                    $FCGEmail = $row["FCGEmail"];
                    $FCGMNO1 = $row["FCGMNO1"];
                    $FCGMNO2 = $row["FCGMNO2"];
                    $Relationship = $row["Relationship"];
                    $PatDesc = $row["PatDesc"];
                    $caregiverId = $row["caregiverId"];
                    include_once('../components/edit_patient.php');
                } else {
                    echo '
                        <script language="javascript">
                        alert("User with id specified not found in patient table. Please enter a valid user")
                        window.location.href="/cvd/src/views/update_patient.php"
                        </script>
                    ';
                }
            } else if ($_POST['table-name'] === "recruitment") {
                $query = "SELECT * FROM `patientrecruitment` WHERE patientId = $id";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $conn->close();
                if ($row) {
                    $LastDVisitDate = $row["LastDVisitDate"];
                    $PhyDiagnosis = $row["PhyDiagnosis"];
                    $PhyComplianceAdvice = $row["PhyComplianceAdvice"];
                    $PhyMedicationAdvice = $row["PhyMedicationAdvice"];
                    $DVisitFrequency = $row["DVisitFrequency"];
                    $Weight = $row["Weight"];
                    $WUnitId = $row["WUnitID"];
                    $Height = $row["Height"];
                    $HUnitId = $row["HUnitID"];
                    $WaistCircum = $row["WaistCircum"];
                    $WCUnitId = $row["WCUnitID"];
                    $WaistHipRatio = $row["WaistHipRatio"];
                    $HeartRate = $row["HeartRate"];
                    $RespiratoryRate = $row["RespiratoryRate"];
                    $BPSystolic = $row["BPSystolic"];
                    $BPDiastolic = $row["BPDiastolic"];
                    $PhysicalActivity = $row["PhysicalActivity"];
                    $MenstrualStatus = $row["MenstrualStatus"];
                    $SurgicalHistory = $row["SurgicalHistory"];
                    $SurgeryDate = $row["SurgeryDate"];
                    $doctorId = $row["doctorId"];
                    $dietId = $row["dietId"];
                    $exerciseId = $row["exerciseId"];
                    include_once('../components/edit_recruitment.php');
                } else {
                    echo '
                        <script language="javascript">
                        alert("User with id specified not found in patient recruitment table. Please enter a valid user")
                        window.location.href="/cvd/src/views/update_patient.php"
                        </script>
                    ';
                }
            } else if ($_POST['table-name'] === "demographics") {
                $query = "SELECT * FROM `patientdemographics` WHERE patientId = $id";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $conn->close();
                if ($row) {
                    $Gender = $row["Gender"];
                    $DOB = $row["DOB"];
                    $Age = $row["Age"];
                    $MaritialStatus = $row["MaritialStatus"];
                    $NoOfLivChildren = $row["NoOfLivChildren"];
                    $Religion = $row["Religion"];
                    $EducationStatus = $row["EducationStatus"];
                    $Occupation = $row["Occupation"];
                    $MonthlyIncome = $row["MonthlyIncome"];
                    $TypeOfCommunity = $row["TypeOfCommunity"];
                    $TypeOfDiet = $row["TypeOfDiet"];
                    $TypeOfFamily = $row["TypeOfFamily"];
                    $LanguageApp = $row["LanguageApp"];
                    $LanguageProf = $row["LanguageProf"];
                    $STDescription = $row["STDescription"];
                    include_once('../components/edit_demographics.php');
                } else {
                    echo '
                        <script language="javascript">
                        alert("User with id specified not found in patient demographics table. Please enter a valid user")
                        window.location.href="/cvd/src/views/update_patient.php"
                        </script>
                    ';
                }
            }
        }
    } else {
        header('Location: /cvd/src/');
    }
    ?>



</body>

</html>