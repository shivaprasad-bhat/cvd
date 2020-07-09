<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/common.css">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <title>Survey</title>
    <style>
        body {
            color: #873d37;
            font-size: 11pt;
        }

        .top-header {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        nav {
            background-color: #8B0000;
        }

        p {
            padding: 10px;
        }

        .nav-link {
            background-color: #8B0000;
            color: #ffff;
            margin-left: 30px;
        }

        .nav-link:hover {
            color: black;
        }

        .col-md-3 {
            margin-top: 20px;
        }

        #survey-page-header {
            margin-top: 10px;
            text-align: center;
        }

        #survey-page-header h2 {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <?php
    include_once('../components/navbar.php');
    if (isset($_SESSION["user"]))
        include_once('../components/survey.php');
    else {
        header("Location: /cvd/src");
    }
    echo '<br><br><br>';
    include_once('../components/footer.php');
    ?>


</body>

</html>