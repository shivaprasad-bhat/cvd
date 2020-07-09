<!-- Header -->
<section class="container">
    <article class="row">
        <div class="col">
            <div id="header-text">
                <h1 class="text-center">DATA FOR APP INSTALL</h1>
            </div>
        </div>
    </article>
</section>
<!-- Form to collect the data -->
<section class="container">
    <article class="row">
        <div class="col">
            <div id="data-collect-form">
                <form action="../scripts/php/store_data.php" class="form-control" onsubmit="return validateSubmit()" method="POST">
                    <div id="step-1">

                        <div>
                            <h4 class="text-center">Section 1 : Patient Details</h4>
                        </div>
                        <div class="form-group">
                            <label for="collection-date">Data Collection Date *</label>
                            <input type="date" id="collection-date" class="form-control" name="collection-date">
                        </div>
                        <div class="form-group">
                            <label for="caregiver-name">Caregiver Name</label>
                            <input class="form-control" type="text" name="caregiver-name" id="caregiver-name" disabled value="<?php echo  isset($_SESSION['user']) ? ucfirst($userName) . " (Caregiver Id  " . $CGId . ")" : 'Guest, not able to insert data' ?>">
                        </div>
                        <div class="form-group">
                            <label for="doctor-name">Doctor Name *</label>
                            <select class="form-control" name="doctor-name" id="doctor-name" required>
                                <?php
                                $i = 0;
                                foreach ($doctors as $doctor) {
                                    echo '<option value="' . trim($did[$i]) . '">' . $doctor . "   (Doctor Id: " . $did[$i] . ')</option>';
                                    $i++;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="patient-id">Patient ID *</label>
                            <input class="form-control" type="text" name="patient-id" id="patient-id" placeholder="Ex. 1234" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile-number">Mobile Number *</label>
                            <input class="form-control" type="text" id="mobile-number" name="mobile-number" placeholder="Ex. 9988776655" required>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="own-phone">Own Phone? *</label>
                                <input class="radio-inline" id="own-phone-yes" name="phone" type="radio" value="1" checked> Yes
                                <input class="radio-inline" id="own-phone-no" name="phone" value="2" type="radio"> No
                            </div>
                            <div id="family">
                                <div>
                                    <label for="family-caregiver-name">
                                        Family Caregiver Name
                                    </label>
                                    <input class="form-control" type="text" id="family-caregiver-name" name="family-caregiver-name">
                                </div>
                                <div>
                                    <label for="relationship">Relationship</label>
                                    <select class="form-control" name="relationship" id="relationship">
                                        <option value="father">Father</option>
                                        <option value="son">Son</option>
                                        <option value="daugther">Daughter</option>
                                        <option value="husbabd">Husband</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="dashed">
                    <div id="step-2">
                        <div>
                            <h4 class="text-center">Section 2 : Medical Conditions</h4>
                        </div>
                        <div class="form-group">
                            <label for="disease ">Medical Condition *</label>
                            <select class="form-control" name="disease[]" id="disease" multiple required>
                                <?php
                                $i = 0;
                                foreach ($conditions as $condition) {
                                    echo '<option value="' . trim($mcmid[$i]) . '">' . $condition . '</option>';
                                    $i++;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr class="dashed">
                    <div id="step-3">
                        <div>
                            <h4 class="text-center">Section 3 : Doctor visits</h4>
                        </div>
                        <div class="form-group">
                            <label for="doctor-visit-frequency">Doctor Visit Frequency *</label>
                            <select class="form-control" name="doctor-visit-frequency" id="doctor-visit-frequency" required>
                                <option value="daily">Daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="fortnightly">Fortnightly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="2 Months">2 Months</option>
                                <option value="3 Months">3 Months</option>
                                <option value="6 Months" selected>6 Months</option>
                                <option value="Yearly">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <hr class="dashed">
                    <div id="step-4">
                        <div>
                            <h4 class="text-center">Section 4 : Investigations Ordered</h4>
                        </div>
                        <div>
                            <table id="inv-table" name="inv-table" class="table table-bordered table-light table-striped">
                                <tbody>
                                    <tr>
                                        <th>Investigation</th>
                                        <th>Frequency</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
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
                        </div>
                        <div class="form-group">
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
                        </div>
                        <div align="center">
                            <button type="button" class="button btn" id="add" onclick="addInvestigation()">Add</button>
                            <button type="button" class="button btn" id="reset">Reset</button>
                        </div>
                    </div>
                    <hr class=" dashed">
                    <div id="step-5">
                        <div>
                            <h4 class="text-center">Section 5 : Symptoms Felt *</h4>
                        </div>
                        <div class="form-group">
                            <label for="symptoms">Symptoms Felt</label>
                            <select class="form-control" name="symptoms[]" id="symptoms" multiple>
                                <?php
                                $i = 0;
                                foreach ($symptoms as $symptom) {
                                    echo '<option value="' . trim($sid[$i]) . '">' . $symptom . '</option>';
                                    $i++;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctor-input">Doctor's Prescriptions</label>
                            <textarea name="doctor-input" id="doctor-input" class="form-control" rows="10" placeholder="Doctor's input goes here"></textarea>
                        </div>
                    </div>
                    <div class="submit">
                        <input type="submit" value="Save" name="submit">
                    </div>
                    <div class="clear">
                        <button id="clear-btn" style="width: 65% !important; height: 40px; border-radius: 10px;margin-left: 16%; margin: 0 20px 20px 16%;" onclick="return clearFields()">Clear</button>
                    </div>
                    <div align="center">
                        <a href="./delete_data.php">Delete patient Details ?</a>
                    </div>
                    <div id="hidden">
                    </div>
                </form>
            </div>
        </div>
    </article>
</section>