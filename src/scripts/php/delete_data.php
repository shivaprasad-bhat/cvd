<?php
if (!isset($_SESSION['user'])) {
    session_start();
}
require('./connect.php');
if (isset($_POST['submit'])) {
    $patientId = trim(htmlspecialchars(stripslashes($_POST['delete-id'])));
    $d1 = "DELETE FROM patientmedsymptrack WHERE patientId = $patientId";
    #patientinvordered
    $d2 = "DELETE FROM patientinvordered WHERE patientId = $patientId";
    $d3 = "DELETE FROM patientdoctor WHERE patientId = $patientId";
    $d4 = "DELETE FROM patientrecruitment WHERE patientId = $patientId";
    $d5 = "DELETE FROM treatmentschedule WHERE patientId = $patientId";
    $d6 = "DELETE FROM patient WHERE id = $patientId";

    $r1 = $conn->query($d1);
    $r2 = $conn->query($d2);
    $r3 = $conn->query($d3);
    $r4 = $conn->query($d4);
    $r5 = $conn->query($d5);
    $r6 = $conn->query($d6);
    if ($r1 === TRUE && $r1 === TRUE && $r3 === TRUE && $r4 === TRUE && $r5 == TRUE && $r6 === TRUE) {
        $conn->commit();
        echo '
            <script language="javascript">
            alert("Record Deleted Successfully")
            window.location.href="/cvd/src/views/collect_data.php"
            </script>
        ';
    } else {
        echo '
            <script language="javascript">
            alert("Something Went Wrong")
            window.location.href="/cvd/src/views/collect_data.php"
            </script>
        ';
    }
}
$conn->close();
// echo "Inside Delete";
