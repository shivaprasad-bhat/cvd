<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Schedule</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <script src="/cvd/src/scripts/javascript/download_schedule.js"></script>

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

        #page-header {
            margin: 1%;
            padding: 1%;
            text-align: center;
        }

        form {
            border: 1px solid black;
            border-radius: 10px;
        }

        form>div {
            padding: 15px;
        }
    </style>
</head>

<body>

    <?php
    include_once('../components/navbar.php');
    ?>

    <head class="container">
        <div class="row">
            <div class="col">
                <div id="page-header">
                    <h1>Download Schedule</h1>
                    <a href="./treatment_schedule.php"><u>Back to Treatment Schedule</u></a>
                </div>
            </div>
        </div>
    </head>
    <section class="container">
        <article class="row">
            <div class="col">
                <form action="../scripts/php/schedule_download.php" method="post">
                    <div class="form-group">
                        <label for="option">Select Option</label>
                        <select class="form-control" name="option" id="option">
                            <option value="">-- Select Value --</option>
                            <option value="s-date">Specific Date</option>
                            <option value="date-range">Date Range</option>
                        </select>
                    </div>
                    <div class="form-group" id="date">
                        <label for="download-date">Download Date</label>
                        <input class="form-control" type="date" name="download-date" id="download-date">
                    </div>
                    <div class="form-group" id="date-range">
                        <label for="download-date">From Date</label>
                        <input class="form-control" type="date" name="from-date" id="download-from-date">
                        <label for="download-date">To Date</label>
                        <input class="form-control" type="date" name="to-date" id="download-to-date">
                    </div>
                    <div class="form-group submit-group">
                        <input class="btn btn-success" type="submit" name="submit" value="Download Schedule">
                    </div>
                </form>
            </div>
        </article>
    </section>


</body>

</html>