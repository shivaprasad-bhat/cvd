<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <?php
    include_once('../components/navbar.php');
    ?>
    <div class="container" align="center" style="margin-top:5%; ">
        <div class="row">
            <div class="col">
                <h1>Treatment Schedule</h1>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <p>Select Button below to</p>
                <a class="btn btn-success" href="./treatment_schedule.php">View Treatment Schedule</a>
                <br>
                <hr>
                <p>Select Button below to</p>
                <a class="btn btn-success" href="./download_schedule.php">Download Treatment Schedule</a>
            </div>
        </div>
    </div>
</body>

</html>