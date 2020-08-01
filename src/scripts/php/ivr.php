<?php
if (!isset($_SESSION['user'])) {
    session_start();
}
function formatData($string)
{

    return trim(stripslashes(htmlspecialchars($string)));
}

//Check data
if (isset($_POST['submit'])) {
    require('./connect.php');
    $option = formatData($_POST['ivr-options']);
    $filter = NULL;
    if ($option === 'specific-date') {
        $date = formatData($_POST['s-date']);
        $filter = "Options Selected : Specific Date - $date";
        $date = date_create($date);
        $query = "SELECT * FROM patientrecruitment";
        $result = $conn->query($query);
        $content = '<table class="table table-bordered"><thead class="thead-dark"><tr><th>Name</th><th>Number</th></tr></thead><tbody>';
        while ($row = $result->fetch_array()) {
            $surveyDate = $row['SurveyDate'];
            $surveyDate = date_create($surveyDate);
            $diff = date_diff($surveyDate, $date);
            $diff = intval($diff->format("%R%a"));
            $mod = fmod($diff, 15);
            if ($mod == 0) {
                $pid = $row['patientId'];
                $query = "SELECT * from patient where id = $pid";
                $r1 = $conn->query($query);
                $row = $r1->fetch_assoc();
                $content .= '<tbody><tr><td>' . $row['PatName'] . '</td><td>' . $row['MobileNo'] . '</td></tr></tbody>';
            }
        }
        $content .= '</table>';
    } else if ($option === 'date-range') {
        $from = formatData($_POST['from-date']);
        $to = formatData($_POST['to-date']);
    }

    $conn->close();
} else {
    echo '
            <script language="javascript">
            alert("Please submit the form data to view this page")
            window.location.href="/cvd/src/"
            </script>
        ';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVR Options</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <script src="/cvd/src/scripts/javascript/ivr.js"></script>
    <link rel="stylesheet" href="/cvd/src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/cvd/src/css/common.css" />
    <style>
        .header-image {
            float: left;
        }

        .top-header {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        nav {
            background-color: #8b0000;
        }

        .nav-link {
            color: #ffff;
            background-color: #8b0000;
            margin-left: 30px;
        }

        .nav-link:hover {
            color: black;
        }

        #ivr-table {
            margin-top: 2%;
        }
    </style>
</head>

<body>

</body>
<?php
include_once('../../components/navbar.php');
?>
<section id="ivr-table" class="container">
    <article class="row">
        <div class="col">
            <div align="center">
                <h4><?php echo $filter ?></h4>
            </div>
            <div>
                <?php
                echo $content;
                ?>
            </div>
        </div>
    </article>
</section>

</html>