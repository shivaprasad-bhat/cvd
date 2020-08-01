<?php
$_SESSION['page'] = 'diet';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <link rel="stylesheet" href="/cvd/src/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/cvd/src/css/common.css" />
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <title>Diet</title>
    <style>
        body {
            color: #873d37;
            font-size: 11pt;
        }

        .top-header {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        .head-content {
            margin-top: 2%;
            text-align: center;
            font-size: large;
            font-weight: bolder;
        }

        th {
            background-color: #873d37;
            color: white;
        }

        td {
            background-color: #ffe6e6;
        }

        td {
            background-color: white !important;
            box-shadow: 10px #8888;
        }

        nav {
            background-color: #8B0000;
        }

        .nav-link {
            background-color: #8B0000;
            color: #ffff;
            margin-left: 30px;
        }

        .nav-link:hover {
            color: black;
        }

        ul {
            list-style: square;
        }

        li {
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <?php
    include_once('../components/navbar.php');



    if (isset($_COOKIE["lang"])) {
        if ($_COOKIE["lang"] === "eng") {
            include_once('../components/diet_EN.php');
        } else if ($_COOKIE["lang"] === "kan") {
            include_once('../components/diet_KAN.php');
        }
    } else {
        //Refresh and set cookie
        header("Location: /cvd/src/");
    }

    include_once('../components/footer.php');
    $_SESSION["page"] = "diet";
    ?>
</body>



</html>