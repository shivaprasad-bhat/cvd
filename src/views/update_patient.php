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
    <?php
    include_once('../components/navbar.php');
    if (isset($_SESSION['user'])) {
        include_once('../components/edit_menu.php');
        include_once('../components/footer.php');
    } else {
        header('Location: /cvd/src/');
    }

    ?>
</body>

</html>