<?php
if (!isset($_SESSION['user'])) {
    session_start();
}
require('../scripts/php/connect.php');
$query = "SELECT * FROM `patient`";
$result = $conn->query($query);
$pId = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $pId[] = $row['id'];
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient Details</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <script src="/cvd/src/scripts/javascript/edit.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/edit.css" />
    <style>
        #data-edit-form,
        div>h4,
        label,
        #edit-id {
            margin: 10px;
            padding: 10px;
            width: 95%;
        }

        footer {
            position: absolute;
        }
    </style>
</head>

<body>
    <?php include_once('../components/navbar.php'); ?>
    <section class="container">
        <article class="row">
            <div class="col">
                <div id="data-edit-form">
                    <form action="./edit_options.php" method="POST">
                        <div class="form-group">
                            <h4>
                                Update Patient Details
                            </h4>
                            <div class="select-id">
                                <label for="edit-id">Choose patient id to be updated from the list:</label>
                                <input class="form-control" list="edit-ids" name="edit-id" id="edit-id" required>

                                <datalist id="edit-ids">
                                    <?php
                                    foreach ($pId as $p) {
                                        echo '<option value="' . $p . '">';
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="select-id">
                                <label for="table-name">Select what details to be updated</label>
                                <select class="form-control" name="table-name" id="table-name" required>
                                    <option value="patient">Patient Details</option>
                                    <option value="recruitment">Patient Recruitment Detils</option>
                                    <option value="demographics">Patient Demographics Detils</option>
                                </select>
                            </div>
                            <br>
                            <div align="center">
                                <input type="submit" class="btn btn-primary" name="submit" value="Edit Patient Details">
                            </div> <br>
                            <div align="center">
                                <a href="./collect_data.php">Go Back To Collect Data Form</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>
    <?php include_once('../components/footer.php'); ?>
</body>

</html>