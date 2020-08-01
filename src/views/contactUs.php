<!DOCTYPE html>
<html lang="en">
<?php
$_SESSION["page"] = "contact-us";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <title>Contact Us</title>
    <style>
        .card-img {
            margin-left: 30%;
        }

        body {
            color: #873d37;
            font-size: 11pt;
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

        .card {
            height: auto;
        }

        #project-title {
            font-size: 12pt;
        }

        .top-header {
            font-family: "Comic Sans MS",
                cursive,
                sans-serif;
        }

        span {
            font-size: 11pt;
        }

        a {
            text-decoration: none;
            color: #8B0000;
        }
    </style>
</head>

<body>
    <?php
    $_SESSION['page'] = "contactus";
    include_once('../components/navbar.php');
    if ($_COOKIE["lang"] === "eng") {
        include_once('../components/contact_EN.php');
    } else if ($_COOKIE["lang"] === "kan") {
        include_once('../components/contact_KAN.php');
    }
    include_once('../components/footer.php');
    $_SESSION["page"] = "contactus";
    ?>

</body>

</html>