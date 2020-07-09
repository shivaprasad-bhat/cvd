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
            padding-left: 2%;
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
    ?>

    <head>
        <p id="header-content">
            LIFESTYLE MODIFICATION
        </p>
    </head>
    <section class="container">
        <article class="card l-changes">
            • Manage stress & anger. <br>
            • Maintain a healthy weight.<br>
            • Be physically active every day.<br>
            • Quit smoking & alcohol.<br>
            • Avoid other tobacco products.<br>
            • Improve cholesterol levels & control blood pressure, blood sugar levels & other diseases as well.<br>
            • Be social & friendly.<br>
            • Get enough sleep.<br>
            • Don’t sit for very long at one time.<br>
        </article>
    </section>
    <section class="container">
        <div class="card">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-content" src="/cvd/src/resources/lifestyle-img/img1.png" alt="Image">
                </div>
                <div class="col-md-8 m-1">
                    <div>
                        EXERCISES
                    </div>
                    <div>
                        Consult your doctor before starting your exercise programme, in case you are above 40 years and have multiple comorbidities like diabetes & hypertension. <br>
                        • Brisk walking daily for 30 min is good to burn the calories & has benefits in improving health. <br>
                        • Do regular household work. <br>
                        • Wear a loose, cotton clothing & comfortable footwear while walking. <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <?php
    include_once('../components/footer.php');
    ?>
</body>

</html>