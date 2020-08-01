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
    <title>Lifestyle Changes</title>
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
            margin-top: 2%;
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

        .l-changes {
            margin-bottom: 3%;
            padding: 2% !important;
        }

        .img-content {
            box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.4);
            height: 90%;
            margin: 5%;
            padding: 5%;
            width: 80%;
        }
    </style>
</head>

<body>
    <?php
    include_once('../components/navbar.php');
    

if (isset($_COOKIE["lang"])) {
        if ($_COOKIE["lang"] === "eng") {
            include_once('../components/lifestyle_EN.php');
        } else if ($_COOKIE["lang"] === "kan") {
            include_once('../components/lifestyle_KAN.php');
        }
    } else {
        //Refresh and set cookie
        header("Location: /cvd/src/");
    }
    
    include_once('../components/footer.php');
    $_SESSION["page"] = "lifestyle";
    ?>
</body>

</html>