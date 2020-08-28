<!DOCTYPE html>

<html lang="en">
<!-- Files Required
../components/navbar.php
./download_schedule.php
./viewTable.php
./../scripts/php/form_selection_queries.php
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatment Schedule</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/treatment.css" />
    <script src="/cvd/src/scripts/javascript/treatment.js"></script>
    <style>
        form>div {
            margin: 10px;
            padding: 10px;
        }

        form {
            background: 0 !important;
            border: 1px solid black !important;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php
    include_once('../components/navbar.php');
    ?>

    <head class="container">
        <div class="row">
            <div class="col">
                <div id="page-header">
                    <h1>View Treatment Schedule</h1>
                    <a href="./schedule_options.php"><u>Back to Schedule</u></a>
                </div>
            </div>
        </div>
    </head>

    <section class="container">
        <div class="row">
            <div class="col">
                <div id="schedule-form">
                    <form action="./viewTable.php" method="post">
                        <div class="form-group">
                            <label for="type">Select type to view </label>
                            <select class="form-control" name="type" id="type" onchange="typeSelected(this.value)">
                                <option value="" default>-- Select --</option>
                                <option value="patient">Patient</option>
                                <option value="date">Date</option>
                                <option value="event">Event</option>
                            </select>
                        </div>
                        <div class="level-1 form-group" id="patient">
                            <label for="p-select">Select Patient Details </label>
                            <select class="form-control" name="patient" id="p-select" onchange="patientSelected(this.value)">
                                <option value="" default>-- Select --</option>
                                <option value="all">All Patient</option>
                                <option value="pid">Specific patient id</option>
                            </select>
                        </div>
                        <div class="level-1 form-group" id="date">
                            <label for="date-option">Select Date Types</label>
                            <select class="form-control" name="date-option" id="date-option" onchange="dateSelected(this.value)">
                                <option value="" default>-- Select --</option>
                                <option value="d-range">Date Range</option>
                                <option value="s-date">Specific Date</option>
                            </select>
                        </div>
                        <div class="level-1 form-group" id="event">
                            <label for="event">Select Event Types</label>
                            <select class="form-control" name="event" id="event" onchange="eventSelected(this.value)">
                                <option value="" default>-- Select --</option>
                                <option value="all">All events</option>
                                <option value="s-event">Specific Event</option>
                            </select>
                        </div>
                        <div class="level-2 form-group" id="p-ids">
                            <label for="pids">Select Specific Patient ID </label>
                            <select class="form-control" name="pids" id="pids">
                                <option value="" default>-- Select --</option>
                                <?php
                                require_once("../scripts/php/form_selection_queries.php");
                                foreach ($patIds as $p) {
                                    echo '<option value="' . $p . '">' . $p . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="level-2 form-group" id="date-range">
                            <label for="">Select Date Range </label>
                            From: <input class="form-control" type="date" name="from-date">
                            To: <input class="form-control" type="date" name="to-date" id="to-date">
                        </div>
                        <div class="level-2 form-group" id="specific-date">
                            <label for="specific-date">Select The speific Date</label>
                            Pick Date : <input class="form-control" type="date" name="specific-date" id="specific-date">
                        </div>
                        <div class="level-2 form-group" id="events-list">
                            <label for="e-list">Select the event type </label>
                            <select class="form-control" name="events" id="e-list">
                                <option value="" default>-- Select --</option>
                                <option value="1">Medication</option>
                                <option value="2">Doctor Visit</option>
                                <option value="3">Investigation</option>
                                <option value="4">Symptoms</option>
                            </select>
                        </div>
                        <div id="submit-btn" class="form-group">
                            <input class="form-control" type="submit" value="View Schedule" name="submit" onclick="viewTable()">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>