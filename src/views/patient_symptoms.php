<!DOCTYPE html>
<html lang="en">
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once('../scripts/php/connect.php');
$query = "SELECT id from patient";
$result = $conn->query($query);
$ids = array();
while ($row = $result->fetch_assoc())
    $ids[] = intval($row['id']);
$query = "SELECT id, CondName FROM medcondmaster WHERE Type = 'Symptom'";
$result = $conn->query($query);
$condId = array();
$condName = array();
while ($row = $result->fetch_assoc()) {
    $condId[] = $row['id'];
    $condName[] = $row['CondName'];
}
$conn->close();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Symtoms Alert</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <script src="/cvd/src/scripts/javascript/patient_symp_track.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/patient_symptoms.css">
</head>

<body>
    <?php include_once('../components/navbar.php'); ?>
    <section class="container" id="main">
        <article class="row">
            <div class="col">
                <form action="../scripts/php/patient_symptoms.php" method="post">
                    <br>
                    <h4 align="center">Patient Symptom Track</h4>
                    <div class="options form-group">
                        <label for="types">
                            Select Options
                        </label>
                        <select class="form-control" name="opt" id="opt">
                            <option value="">-- Select Options --</option>
                            <option value="symptopms">List Patients with Symptoms</option>
                            <option value="patient">List Patient's Symptoms</option>
                        </select>
                    </div>
                    <div class="pat-ids form-group">
                        <label for="pat-list">Select Patient Id</label>
                        <select class="form-control" name="pat-list" id="pat-list">
                            <?php
                            foreach ($ids as $id) {
                                echo '<option value="' . intval($id) . '">' . $id . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="sympt-list form-group">
                        <label for="symptoms-list">Select Symptoms</label>
                        <select class="form-control" name="symptoms-list" id="symptoms-list">
                            <?php
                            $i = 0;
                            for ($i = 0; $i < count($condId); $i++) {
                                echo '<option value="' . $condId[$i] . '">' . $condName[$i] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="submit-group" align="center">
                        <input type="submit" value="Search" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </article>
    </section>
</body>

</html>