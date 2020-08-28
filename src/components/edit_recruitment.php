<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$dvisitFrequency = ['Monthly', 'Weekly', 'Daily', 'Fortnightly', '2 Months', '3 Months', '6 Months', 'Yearly'];
include_once('../scripts/php/form_selection_queries.php');
$conn = new mysqli('localhost', $_SESSION['user'], $_SESSION['password'], 'CVDCareDB') or die("Connection failed: " . $conn->connect_error);

$query = "SELECT * FROM investmaster";
$invest = array();
$invest[] = "";        //Assign index 0 null
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $invest[] = $row['InvMName'];
    }
}
$query = "SELECT * FROM `patientinvordered` WHERE patientId = $id";

$result = $conn->query($query);
$table = '<tbody>';
$hInv = "";
$hFreq = "";
$del = "<input type='checkbox' name='record'>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $iid = intval($row['investigationId']);
        $ifreq = $row['Frequency'];
        $hInv = "<input type=\"hidden\" name=\"inv[]\" value=\"$iid\">";
        $hFreq = "<input type=\"hidden\" name=\"freq[]\" value=\"$ifreq\">";
        $table .= '<tr><td>' . $invest[$iid] . '</td><td>' . $row['Frequency'] . '</td><td>' . $del . $hInv . $hFreq . '</td></tr>';
    }
}
$table .= '</tbody>';
?>

<head class="container">
    <div class="row">
        <div class="col">
            <div id="page-header">
                <h3>Edit Patient info</h3>
                <h5>Patient Id : <?php echo $id; ?></h5>
            </div>
        </div>
    </div>
</head>

<section class="container">
    <article class="row">
        <div class="col">
            <div style="margin:10px;padding:10px;">
                <h6>NULL values from database will be shown with placeholder in input fields, editable fields will be shown with value from databse*</h6>
            </div>
            <div id="data-form">
                <form action="../scripts/php/update_recruitment.php" method="post" id="selection-form">
                    <div id="patient-recruitment-table">
                        <input class="form-control" type="hidden" name="pat-id" value="<?php echo $id; ?>">
                        <label for="last-visit-date">Last Visit Date</label>
                        <input class="form-control" type="date" name="last-visit-date" value="<?php echo $LastDVisitDate; ?>">
                        <input class="form-control" type="text" name="phy-diagnosis" placeholder="Diagnosis" value="<?php echo $PhyDiagnosis; ?>">
                        <input class="form-control" type="text" name="comp-advice" placeholder="Physical Compiance Advice" value="<?php echo $PhyComplianceAdvice; ?>">
                        <input class="form-control" type="text" name="med-advice" placeholder="Physical Medication Advice" value="<?php echo $PhyMedicationAdvice; ?>">
                        <label for="doctor-visit-frequency">Doctor Visit Frequency *</label>
                        <select class="form-control" name="doctor-visit-frequency" id="doctor-visit-frequency" required>
                            <?php
                            foreach ($dvisitFrequency as $d) {
                                if ($d === $DVisitFrequency) {
                                    echo '<option value="' . $d . '" selected>' . $d . '</option>';
                                } else {
                                    echo '<option value="' . $d . '">' . $d . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <input class="form-control" type="text" name="weight" placeholder="Weight" value="<?php echo $Weight; ?>">
                        <label for="w-unit-id">Weight Unit Id</label>
                        <select class="form-control" name="w-unit-id" id="w-unit-id">
                            <option value="null">-- Select --</option>
                            <option value="kgs">KGs</option>
                            <option value="pds">Pounds</option>
                        </select>
                        <input class="form-control" class="form-control" type="text" name="height" placeholder="Height" value="<?php echo $Height; ?>">
                        <label for="h-unit-id">Height Unit Id</label>
                        <select class="form-control" name="h-unit-id" id="h-unit-id">
                            <option value="null">-- Select --</option>
                            <option value="cms">CMs</option>
                            <option value="ft">Fts</option>
                        </select>
                        <input class="form-control" type="text" name="weist-circum" id="weist-circum" placeholder="Weist Cirum" value="<?php echo $WaistCircum ?>">
                        <input class="form-control" type="text" name="wc-unit-id" placeholder="Weist Circum Unit Id" value="<?php echo $WCUnitId; ?>">
                        <label for="w-hip-ratio">Weist Hip Ratio</label>
                        <select class="form-control" name="w-hip-ratio" id="w-hip-ratio" value="<?php ?>">
                            <option value="null">-- Select --</option>
                            <option value="cms">CMs</option>
                            <option value="inc">Inches</option>
                        </select>
                        <input class="form-control" type="text" name="heart-rate" placeholder="Heart Rate" value="<?php echo $HeartRate; ?>">
                        <input class="form-control" type="text" name="resp-rate" placeholder="Respiratory Rate" value="<?php echo $RespiratoryRate; ?>">
                        <input class="form-control" type="text" name="bp-systolic" placeholder="BP Systolic" value="<?php echo $BPSystolic; ?>">
                        <input class="form-control" type="text" name="bp-diastolic" placeholder="BP Diastolic" value="<?php echo $BPDiastolic; ?>">
                        <label for="physical-activity">Physical Actiity</label>
                        <select class="form-control" name="phy-activity" id="physical-activity">
                            <option value="Very Active">Very Active</option>
                            <option value="Active">Active</option>
                            <option value="Sedentry">Sedentry</option>
                            <option value="In Active">In Active</option>
                        </select>
                        <label for="mensural-status">Mensural Status</label>
                        <select class="form-control" name="mensural-status" id="mensural-status">
                            <option value="Regular">Regular</option>
                            <option value="Irregular">Irregular</option>
                        </select>
                        <input class="form-control" type="text" name="sur-history" placeholder="Surgical History" value="<?php echo $SurgicalHistory; ?>">
                        <label for="sur-date">Surgery Date</label>
                        <input class="form-control" type="date" name="sur-date" placeholder="Surgical Date" value="<?php echo $SurgeryDate; ?>">

                        <div>
                            <label for="doctor-id">Doctor Details</label>
                            <select class="form-control" name="doctor-id" id="doctor-id">
                                <?php
                                for ($i = 0; $i < count($did); $i++) {
                                    if ($did[$i] === $doctorId) {
                                        echo '<option value="' . $did[$i] . '" selected>' . $dname[$i] . '</option>';
                                    } else {
                                        echo '<option value="' . $did[$i] . '">' . $dname[$i] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="diet-id">Diet Plan</label>
                            <select class="form-control" name="diet-id" id="diet-id">
                                <?php
                                for ($i = 0; $i < count($dietid); $i++) {
                                    if ($dietid[$i] === $dietId) {
                                        echo '<option value="' . $dietid[$i] . '" selected>' . $dietname[$i] . '</option>';
                                    } else {
                                        echo '<option value="' . $dietid[$i] . '">' . $dietname[$i] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="excersise-id">Excersise Plan</label>
                            <select class="form-control" name="excersise-id" id="excersise-id">
                                <?php
                                for ($i = 0; $i < count($eid); $i++) {
                                    if ($eid[$i] === $exerciseId) {
                                        echo '<option value="' . $eid[$i] . '" selected>' . $ename[$i] . '</option>';
                                    } else {
                                        echo '<option value="' . $eid[$i] . '">' . $ename[$i] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <label for="inv-table">Investigations</label>
                        <p> (Please select appropriate checkbox to delete perticular row*)</p>
                        <div id="invests">

                            <table class="table table-bordered table-light table-striped" id="inv-table">
                                <thead>
                                    <tr>
                                        <th>Investigation</th>
                                        <th>Frequency</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                echo $table;
                                ?>
                            </table>
                            <label for="investigation-name">Investigation Name</label>
                            <select name="investigation-name" id="investigation-name" class="form-control" required>
                                <?php
                                $i = 0;
                                foreach ($invName as $inv) {
                                    echo '<option value="' . trim($invId[$i]) . '">' . $inv . '</option>';
                                    $i++;
                                }
                                ?>
                            </select>
                            <label for="investigation-frequency">Frequency</label>
                            <select class="form-control" name="investigation-frequency" id="investigation-frequency" required>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="fortnightly">Fortnightly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="2 Months">2 Months</option>
                                <option value="3 Months">3 Months</option>
                                <option value="6 Months" selected>6 Months</option>
                                <option value="Yearly">Yearly</option>
                            </select>
                            <br>
                            <div align="center">
                                <button type="button" class="button btn" id="add">Add</button>
                                <button type="button" class="button btn delete" id="delete">Delete Selected</button>
                            </div>
                        </div>
                        <hr>
                        <div align="center" class="form-group">
                            <br>
                            <input type="submit" value="Save" name="submit" class="btn btn-success">
                            <br> <br>
                            <div align="center">
                                <a href="./collect_data.php">Cancel</a>
                            </div> <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
</section>