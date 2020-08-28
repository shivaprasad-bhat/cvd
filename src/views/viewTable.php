<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/treatment.css" />
    <style>
        #page-header {
            margin: 1%;
            padding: 1%;
            text-align: center;
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
                    <h1>Treatment Schedule</h1>
                    <a href="./treatment_schedule.php">Back to Treatment Schedule</a>
                </div>
            </div>
        </div>
    </head>

    <?php
    $contents = "";
    $filter = "";
    if (isset($_POST["submit"])) {
        $query = "SELECT * FROM treatmentschedule";
        $type = trim(htmlspecialchars(stripslashes($_POST["type"])));
        if ($type === "patient") {
            $option = htmlspecialchars(stripslashes($_POST["patient"]));
            if ($option === "all") {
                $query .= " WHERE 1";
                $filter = "All Patient Details";
            } else if ($option === "pid") {
                $selected = $_POST["pids"];
                $query .= " WHERE patientID = '" . $selected . "'";
                $filter = "Specific Patient Details with id $selected";
            }
        } else if ($type === "date") {
            $option = $_POST["date-option"];
            if ($option === "d-range") {
                $from = $_POST["from-date"];
                $to = $_POST["to-date"];
                $query .= " WHERE eventDate BETWEEN '" . $from . "' AND '" . $to . "'";
                $filter = "Date Range from $from to $to";
            } else if ($option === "s-date") {
                $d = $_POST["specific-date"];
                $query .= " WHERE eventDate = '" . $d . "'";
                $filter = "Date $d";
            }
        } else if ($type === "event") {
            $option = htmlspecialchars(stripslashes($_POST["event"]));
            if ($option === "all") {
                $query .= " ORDER BY eventType";
                $filter = "All Event Details";
            } else  if ($option === "s-event") {
                $selected = $_POST["events"];
                $query .= "WHERE eventType = $selected";
                $filter = "Specific Event with id $selected";
            }
        }
        $query .= " ORDER BY eventDate";
        require('../scripts/php/connect.php');
        $events = array("", "Medication", "Doctor Visit", "Investigations", "Symptoms");
        $result = $conn->query($query);
        $description = "NA";
        $c = 0;
        if ($result->num_rows > 0) {
            $contents = '<section class="container" style="border: 1px solid black; padding: 10px; border-radius: 10px"><div class="row"><div class="col"><div class="table-responsive"><table class="table table-bordered table-light table-striped"><thead><tr><th>Patient Id</th><th>Mobile Num</th><th>Date</th><th>Event</th><th>Description</th></tr></thead><tbody>';
            while ($row = $result->fetch_array()) {
                $c++;
                $eType = intval($row["eventType"]);
                if ($eType === 3) {
                    if ($row["InvMName"] == NULL) {
                        $description = "NA";
                    } else {
                        $description = strval($row["InvMName"]);
                    }
                } else if ($eType === 4) {
                    if ($row["CondName"] == NULL) {
                        $description = "NA";
                    } else {
                        $description = strval($row["CondName"]);
                    }
                } else {
                    $description = "NA";
                }
                $timestamp = $row["eventDate"];
                $timestamp = strtotime($timestamp);
                $timestamp = date('d-M-Y', $timestamp);
                $contents .= "<tr><td>" . $row["patientID"] . "</td><td>" . $row["MobileNo"] . "</td><td>" . $timestamp . "</td><td>" . $events[$eType] . "</td><td>" . $description . "</td></tr>";
            }
            $contents .= "</tbody></table></div></div></div></section>";
        }
        $conn->close();

        echo '
        <head class="container" style="margin-top:0px;">
            <div class="row">
                <div class="col">
                    <div style="text-align: center;">
                        <h3>Filter : ' . $filter . '</h3>
                        <p>Total Number of schedules selected: ' . $c . '</p>
                    </div>
                </div>
            </div>
        </head>
        ';
        echo $contents;
    }
    ?>
</body>

</html>