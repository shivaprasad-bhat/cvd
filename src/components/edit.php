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
                    <p class="nav-link"> ... </p>
                </li>
                <li class="nav-item">
                    <p class="nav-link"> ... </p>
                </li>
            </ul>
            <div style="margin:10px;padding:10px;">
                <h6>NULL values from database will be shown with placeholder in input fields, editable fields will be shown with value from databse*</h6>
            </div>
            <div id="data-form">
                <form action="../scripts/php/update.php" method="post" id="selection-form" onsubmit="return validateUpdate()">
                    <div id="patient-table">
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
                        <input class="form-control" type="text" name="caregiver-name" id="caregiver-name" disabled value="<?php echo  isset($_SESSION['user']) ?  "(Caregiver Id  " . $caregiverId . ")" : 'Guest, not able to insert data' ?>">
                        <input class="form-control" type="text" name="pat-desc" id="pat-desc" placeholder="Patient Description" value="<?php echo $PatDesc; ?>">
                        <div class="radio-group">
                            <label for="own-phone">Registered?</label>
                            <input class="radio-inline" id="registered-yes" name="registered" type="radio" value="1" checked> Yes
                            <input class="radio-inline" id="registered-no" name="registered" value="2" type="radio"> No
                        </div>
                        <div align="center">
                            <button id="step-2" class="btn btn-warning">Next</button>
                        </div>
                    </div>
                    <hr>
                    <div id="patient-recruitment-table">
                        <label for="last-visit-date">Last Visit Date</label>
                        <input class="form-control" type="date" name="last-visit-date" value="<?php echo $LastDVisitDate; ?>">
                        <input class="form-control" type="text" name="phy-diagnosis" placeholder="Diagnosis" value="<?php echo $PhyDiagnosis; ?>">
                        <input class="form-control" type="text" name="comp-advice" placeholder="Physical Compiance Advice" value="<?php echo $PhyComplianceAdvice; ?>">
                        <input class="form-control" type="text" name="med-advice" placeholder="Physical Medication Advice" value="<?php echo $PhyMedicationAdvice; ?>">
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
                        <input class="form-control" type="date" name="sur-date" placeholder="Surgical Date" value="<?php echo $SurgeryDate; ?>">
                        <input class="form-control" type="text" name="doctor-id" placeholder="Doctor Id" value="<?php echo $doctorId; ?>">
                        <input class="form-control" type="text" name="diet-id" placeholder="Diet Id" value="<?php echo $dietId; ?>">
                        <input class="form-control" type="text" name="excersise-id" placeholder="Excerise Id" value="<?php echo $exerciseId; ?>">
                        <div align="center" class="form-group">
                            <input type="submit" value="submit" name="submit" class="btn btn-success">
                        </div>
                    </div>

                    <div align="center">
                        <a href="./collect_data.php">Go Back To Collect Data Form</a>
                    </div> <br>
                </form>
            </div>
        </div>
    </article>
</section>