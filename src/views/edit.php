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
            alert("Something Went Wrong. Please submit the form and try again")
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
    ?>

    <head class="container">
        <div class="row">
            <div class="col">
                <div id="page-header">
                    <h3>Edit Patient info</h3>
                </div>
            </div>
        </div>
    </head>

    <section class="container">
        <article class="row">
            <div class="col">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <p class="nav-link active">Patient Details</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Item 2</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link">Item 3</p>
                    </li>
                </ul>
                <div style="margin:10px;padding:10px;">
                    <h6>NULL values from database will be shown with placeholder in input fields, editable fields will be shown with value from databse*</h6>
                </div>
                <div id="data-form">
                    <form action="../scripts/php/update.php" method="post" id="selection-form" onsubmit="return validateUpdate()">
                        <input class="form-control" type="text" name="id" id="patient-id" placeholder="Patient Id" disabled value="<?php echo $id; ?>">
                        <input class="form-control" type="hidden" name="pat-id" value="<?php echo $id; ?>">
                        <input class="form-control" type="text" name="patient-name" id="patient-name" placeholder="Patient Name" value="<?php echo $PatName; ?>">
                        <input class="form-control" type="text" name="mobile-num" id="mobile-num" placeholder="Mobile Number" value="<?php echo $MobileNo; ?>">
                        <input class="form-control" type="text" name="alt-mobile-num" id="alt-mobile-num" placeholder="Alternate Mobile Number" value="<?php echo $AltMobileNo; ?>">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?php echo $Email; ?>">
                        <input class="form-control" type="text" name="address" id="address" placeholder="Address" value="<?php echo $Address; ?>">
                        <input class="form-control" type="text" name="k-address" id="k-address" placeholder="ವಿಳಾಸ" value="<?php echo $KAddress; ?>">
                        <input class="form-control" type="text" name="city" id="city" placeholder="City" value="<?php echo $City ?>">
                        <input class="form-control" type="text" name="k-city" id="k-city" placeholder="ಪಟ್ಟಣ" value="<?php echo $KCity; ?>">
                        <input class="form-control" type="text" name="pincode" id="pincode" placeholder="Pincode" value="<?php echo $Pincode; ?>">
                        <input class="form-control" type="text" name="location" id="location" placeholder="Location" value="<?php echo $Location; ?>">
                        <input class="form-control" type="text" name="k-location" id="k-location" placeholder="ಸ್ಥಳ" value="<?php echo $KLocation ?>">
                        <input class="form-control" type="text" name="f-caregiver-name" id="f-caregiver-name" placeholder="Family Caregiver Name" value="<?php echo $FCGName ?>">
                        <input class="form-control" type="text" name="f-caregiver-k-name" id="f-caregiver-k-name" placeholder="Family Caregiver Name in Kannada" value="<?php echo $KFCGName; ?>">
                        <input class="form-control" type="email" name="f-caregiver-email" id="f-caregiver-email" placeholder="Email of Family Caregiver" value="<?php echo $FCGEmail; ?>">
                        <input class="form-control" type="text" name="f-caregiver-mob-1" id="f-caregiver-mob-1" placeholder="Family Caregivers Mobile 1" value="<?php echo $FCGMNO1; ?>">
                        <input class="form-control" type="text" name="f-caregiver-mob-2" id="f-caregiver-mob-2" placeholder="Family Caregivers Mobile 2" value="<?php echo $FCGMNO2; ?>">
                        <label for="relationship" class="label-rel">Relationship</label>
                        <select class="form-control" name="relationship" id="relationship">
                            <option value="father">Father</option>
                            <option value="son">Son</option>
                            <option value="daugther">Daughter</option>
                            <option value="husbabd">Husband</option>
                            <option value="others">Others</option>
                        </select>
                        <div class="radio-group">
                            <label for="own-phone">Own Phone? *</label>
                            <input class="radio-inline" id="own-phone-yes" name="phone" type="radio" value="1" checked> Yes
                            <input class="radio-inline" id="own-phone-no" name="phone" value="2" type="radio"> No
                        </div>
                        <div class="radio-group">
                            <label for="smart-phone">Is Smart Phone? *</label>
                            <input class="radio-inline" id="smart-phone-yes" name="smartphone" type="radio" value="1" checked> Yes
                            <input class="radio-inline " id="smart-phone-no" name="smartphone" value="2" type="radio"> No
                        </div>
                        <input class="form-control" type="text" name="caregiver-name" id="caregiver-name" disabled value="<?php echo  isset($_SESSION['user']) ?  "(Caregiver Id  " . $row['caregiverId'] . ")" : 'Guest, not able to insert data' ?>">
                        <input class="form-control" type="text" name="pat-desc" id="pat-desc" placeholder="Patient Description" value="<?php echo $PatDesc; ?>">
                        <div class="radio-group">
                            <label for="own-phone">Registered?</label>
                            <input class="radio-inline" id="registered-yes" name="registered" type="radio" value="1" checked> Yes
                            <input class="radio-inline" id="registered-no" name="registered" value="2" type="radio"> No
                        </div>
                        <div align="center" class="form-group">
                            <input type="submit" value="submit" name="submit" class="btn btn-success">
                        </div>
                        <div align="center">
                            <a href="./collect_data.php">Go Back To Collect Data Form</a>
                        </div> <br>
                    </form>
                </div>
            </div>
        </article>
    </section>

</body>

</html>