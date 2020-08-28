<!DOCTYPE html>
<html lang="en">
<?php
require_once("../scripts/php/form_selection_queries.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Collect Form</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/collect_data.css" />
    <script src="../scripts/javascript/collect_data.js"></script>
    <style>
        ::placeholder {
            color: gray !important;
            opacity: 0.5 !important;
            /* Firefox */
        }
    </style>

</head>

<body>
    <?php
    include_once("../components/navbar.php");
    if (isset($_SESSION['user'])) {
        include('../components/collect_data.php');
    } else {
        header("Location: /cvd/src");
    }
    include_once('../components/footer.php');
    ?>

</body>

</html>