<?php
$genders = ['Male', 'Female', 'Other', 'null'];
$shortGenders = ['M', 'F', 'T', 'null'];
$maritalStatus = ['Married', 'Unmarried', 'Widow', 'Seperated', 'Divorced', 'Null'];
$religions = ['Hindu', 'Muslim', 'Christian', 'Other', 'null'];
$edu = ['Professional', 'Graduate', 'Intermediate', 'High School', 'Middle School', 'Primary', 'Illiterate', 'null'];
$occ = ['Homemaker', 'Employed', 'Unemployed', 'Business', 'Farmer', 'null'];
$community = ['Urban', 'Rural', 'Semi Urban', 'Semi Rural', 'null'];
$diet = ['Vegetarian', 'Mixed', 'null'];
$family = ['Joint', 'Nuclear', 'Extended', 'Other', 'null'];
$lang = ['English Only', 'Kannada Only', 'English & Kannada', 'null'];
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
                <form action="../scripts/php/update_demographics.php" method="post" id="selection-form">
                    <div id="patient-demographics-table">
                        <input class="form-control" name="pat-id" type="hidden" value="<?php echo $id; ?>">
                        <div>
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <?php
                                for ($i = 0; $i < count($genders); $i++) {
                                    if ($shortGenders[$i] === $Gender) {
                                        echo '<option value="' . $shortGenders[$i] . '" selected>' . $genders[$i] . '</option>';
                                    } else {
                                        echo '<option value="' . $shortGenders[$i] . '">' . $genders[$i] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="dob"></label>
                            <input class="form-control" type="date" name="dob" id="dob" value="<?php echo $DOB; ?>">
                        </div>
                        <div>
                            <label>Age</label>
                            <input class="form-control" type="text" name="age" id="age" placeholder="Age" value="<?php echo $Age; ?>">
                        </div>
                        <div>
                            <label for="m-status">Marital Status</label>
                            <select class="form-control" name="m-status" id="m-status">
                                <?php
                                foreach ($maritalStatus as $m) {
                                    if ($m === $MaritialStatus) {
                                        echo '<option value="' . $m . '" selected>' . $m . '</option>';
                                    } else {
                                        echo '<option value="' . $m . '">' . $m . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div>
                            <label for="no-of-children">No of Children</label>
                            <input class="form-control" id="no-of-children" type="text" name="no-of-children" value="Number of Children" value="<?php echo $NoOfLivChildren; ?>">
                        </div>
                        <div>
                            <label for="religion">Religion</label>
                            <select class="form-control" name="religion" id="religion">
                                <?php
                                foreach ($religions as $r) {
                                    if ($r === $Religion) {
                                        echo '<option value="' . $r . '" selected>' . $r . '</option>';
                                    } else {
                                        echo '<option value="' . $r . '">' . $r . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="edu">Education Status</label>
                            <select class="form-control" name="edu" id="edu">
                                <?php
                                foreach ($edu as $e) {
                                    if ($e === $EducationStatus) {
                                        echo '<option value="' . $e . '" selected>' . $e . '</option>';
                                    } else {
                                        echo '<option value="' . $e . '">' . $e . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="occupation">Occupation</label>
                            <select class="form-control" name="occupation" id="occupation">
                                <?php
                                foreach ($occ as $o) {
                                    if ($o === $Occupation) {
                                        echo '<option value="' . $o . '" selected>' . $o . '</option>';
                                    } else {
                                        echo '<option value="' . $o . '">' . $o . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label>Monthly Income</label>
                            <input class="form-control" type="text" name="m-income" placeholder="Monthly Income" value="<?php echo $MonthlyIncome; ?>">
                        </div>
                        <div>
                            <label for="community">Type of Community</label>
                            <select class="form-control" name="community" id="community">
                                <?php
                                foreach ($community as $c) {
                                    if ($c === $TypeOfCommunity) {
                                        echo '<option value="' . $c . '" selected>' . $c . '</option>';
                                    } else {
                                        echo '<option value="' . $c . '">' . $c . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="diet">Type of Diet</label>
                            <select class="form-control" name="diet" id="diet">
                                <?php
                                foreach ($diet as $d) {
                                    if ($d === $TypeOfDiet) {
                                        echo '<option value="' . $d . '" selected>' . $d . '</option>';
                                    } else {
                                        echo '<option value="' . $d . '">' . $d . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="diet">Type of Family</label>
                            <select class="form-control" name="family" id="family">
                                <?php
                                foreach ($family as $f) {
                                    if ($f === $TypeOfFamily) {
                                        echo '<option value="' . $f . '" selected>' . $f . '</option>';
                                    } else {
                                        echo '<option value="' . $f . '">' . $f . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="app-lang">App Language</label>
                            <select class="form-control" name="app-lang" id="app-lang">
                                <?php
                                foreach ($lang as $l) {
                                    if ($l === $LanguageApp) {
                                        echo '<option value="' . $l . '" selected>' . $l . '</option>';
                                    } else {
                                        echo '<option value="' . $l . '">' . $l . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label>Professional Language</label>
                            <input class="form-control" type="text" name="lang-prof" placeholder="Professional Language" value="<?php echo $LanguageProf; ?>">
                        </div>
                        <div>
                            <label>STDescription</label>
                            <input class="form-control" type="text" name="st-desc" placeholder="STDescription" value="<?php echo $STDescription; ?>">
                        </div>
                        <br>
                        <div align="center">
                            <input class="btn btn-success" type="submit" name="submit" value="Update"> <br><br>
                        </div>
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