<!-- Php page to edit the patient details -->
<?php
if (!isset($_SESSION['user'])) {
    session_start();
}
if (isset($_POST['submit'])) {
    require('../scripts/php/connect.php');
    $id = intval($_POST['edit-id']);
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
    }
} else {
    echo '
            <script language="javascript">
            alert("Something Went Wrong. Please submit the id to be deleted and try again")
            window.location.href="/cvd/src/views/collect_data.php"
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

</head>

<body>
    <?php
    include_once('../components/navbar.php');
    if (isset($_SESSION['user'])) {
        include_once('../components/edit.php');
        include_once('../components/footer.php');
    } else {
        header('Location: /cvd/src/');
    }
    ?>



</body>

</html>