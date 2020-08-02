<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user']))
    header('Location: /cvd/src/');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVR Schedule</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <script src="/cvd/src/scripts/javascript/ivr.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
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

        .header {
            text-align: center;
            margin-top: 10px;
        }

        form {
            margin-top: 30px;
            border: 1px solid black;
            border-radius: 10px;
        }

        form>div {
            padding: 10px;
        }

        footer {
            position: absolute;
        }
    </style>
</head>

<body>
    <?php
    include_once('../components/navbar.php');
    ?>
    <section class="container">
        <article class="row">
            <div class="col">
                <form action="/cvd/src/scripts/php/ivr.php" method="post">
                    <div class="header form-group">
                        <h1>IVR Schedule</h1>
                    </div>
                    <div class="options form-group">
                        <select class="form-control" name="ivr-options" id="ivr-options" onchange="optionsSelected(this.val)">
                            <option value="">-- Select --</option>
                            <option value="specific-date">Specific Date</option>
                            <option value="date-range">Date Range</option>
                        </select>
                    </div>
                    <div class="date form-group">
                        <label for="date">Select Date</label>
                        <input class="form-control" type="date" name="s-date" id="s-date">
                    </div>
                    <div class="date-range form-group">
                        <label for="from-date">Select Dates</label>
                        <input class="form-control" type="date" name="from-date" id="from-date">
                        <input class="form-control" type="date" name="to-date" id="to-date">
                    </div>
                    <div class="submit-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Get IVR">
                    </div>
                </form>
            </div>
        </article>
    </section>
    <?php
    include_once('../components/footer.php');
    ?>
</body>

</html>