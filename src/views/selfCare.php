<?php
$_SESSION['page'] = 'self-care';
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
    <title>Self Care</title>
    <style>
        body {
            color: #873d37;
            font-size: 11pt;
        }

        .top-header {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        #header-content {
            text-align: center;
            font-size: larger;
            font-weight: bolder;
            margin-top: 2%;
            text-decoration: underline;
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

        .l-changes {
            margin-bottom: 3%;
            padding-left: 2%;
        }

        .c-title {
            text-align: center;
            font: larger bolder;
            padding-top: 2%;
        }

        aside img {
            margin: 5%;
            padding: 3%;
        }

        .container {
            margin-top: 1%;
            padding: 1%;
        }

        .img-content {
            height: 90%;
            margin: 5%;
            padding: 5%;
            width: 80%;
            box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.4);

        }

        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 16px 28px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <?php
    include_once('../components/navbar.php');

if (isset($_COOKIE["lang"])) {
        if ($_COOKIE["lang"] === "eng") {
            include_once('../components/selfcare_EN.php');
        } else if ($_COOKIE["lang"] === "kan") {
            include_once('../components/selfcare_KAN.php');
        }
    } else {
        //Refresh and set cookie
        header("Location: /cvd/src/");
    }

    include_once('../components/footer.php');
    $_SESSION["page"] = "selfcare";
    ?>
</body>

</html>