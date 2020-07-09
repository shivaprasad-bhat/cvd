<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sukhi Hrudaya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sukhi Hrudaya App">
    <meta name="keywords" content="CVD, sukhi hrudaya, cvd-care, cvdcare, sukhihrudaya, cvdcareapp">
    <meta name="author" content="Shivaprasad Bhat">
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/common.css"/>
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <style>
        #body-text {
            text-align: justify;
        }

        body {
            color: #873d37;
            font-size: 11pt;
        }

        #body-home {
            margin: 3%;
        }

        .header-image {
            float: left;
        }

        .top-header {
            font-family: "Comic Sans MS",
            cursive,
            sans-serif;
        }

        nav {
            background-color: #8B0000;
        }

        .nav-link {
            color: #ffff;
            background-color: #8B0000;
            margin-left: 30px;

        }

        .nav-link:hover {
            color: black;
        }
    </style>
</head>

<body>
<?php
include_once('./components/navbar.php');
?>
<div class="container-fluid">
    <div class="row" id="body-home">
        <div class="col-md-7">
            <?php
            if (isset($_COOKIE["lang"])) {
                if ($_COOKIE["lang"] === "eng") {
                    include_once('./components/body_EN.php');
                } else if ($_COOKIE["lang"] === "kan") {
                    include_once('./components/body_KAN.php');
                }
            } else {
                //Refresh and set cookie
                header("Location: /cvd/src/");
            }

            ?>
        </div>
        <div class="col-md-5 header-image">
            <?php include_once('./components/head.php'); ?>
        </div>
    </div>
</div>
<?php
include_once('./components/footer.php');
$_SESSION["page"] = "index";
?>

</body>

</html>