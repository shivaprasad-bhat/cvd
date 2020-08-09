<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    if (isset($_POST['submit'])) {
        require_once('./connect.php');
        //Get symptoms
        $query = "SELECT id, CondName FROM medcondmaster";
        $result = $conn->query($query);
        $condName = array();
        $condName[] = "";
        while ($row = $result->fetch_assoc()) {
            $condName[] = $row['CondName'];
        }
        $option = $_POST['opt'];
        $table = '<table id="track-table" class="table table-bordered table-light table-striped">';
        if ($option === "symptopms") {
            $table .= '<thead><tr><th>Patient Id</th><th>Surrvey Date</th></tr></thead><tbody>';
            $sid = $_POST['symptoms-list'];
            $filter = "Patient Details with Symptom : $condName[$sid]";
            $query = "SELECT * from patientmedsymptrack WHERE medicationConditionId = $sid";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) {
                $table .= '<tr><td>' . $row['patientId'] . '</td><td>' . $row['STDate'] . '</td></tr>';
            }
            $table .= '</tbody>';
        } else if ($option === "patient") {
            $table .= '<thead><tr><th>Symptom</th><th>Surrvey Date</th></tr></thead><tbody>';
            $pid = $_POST['pat-list'];
            $filter = "Symptoms of patient $pid";
            $query = "SELECT * from patientmedsymptrack WHERE patientId = $pid AND medicationConditionId IS NOT NULL";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) {
                $mid = $row['medicationConditionId'];
                $table .= '<tr><td>' . $condName[$mid] . '</td><td>' . $row['STDate'] . '</td></tr>';
            }
            $table .= '</tbody>';
        }
        $table .= '</table>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/common.css" />
    <link rel="stylesheet" href="../../css/patient_symptoms.css">

</head>

<body>
    <?php
    include_once("../../components/navbar.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 align="center" style="margin-top:1%">
                    <?php echo $filter; ?>
                </h3>
                <?php
                echo $table;
                ?>
            </div>
        </div>
        <div align="center">
            <a href="/cvd/src/views/patient_symptoms.php">Go Back to Patient Symptom Track Page</a>
        </div>
    </div>
</body>

</html>