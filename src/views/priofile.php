<!DOCTYPE html>
<?php
if (!isset($_SESSION['user'])) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $gender = ['Male', 'Female', 'Others'];
    $sGender = ['M', 'F', 'T'];
    require('../scripts/php/connect.php');
    $query = "SELECT * FROM `caregiver` WHERE CGName = '$user'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    $conn->close();
} else {
    echo '
            <script language="javascript">
            alert("Something Went Wrong. Can\'t commit. Please retry")
            window.location.href="/cvd/src/views/collect_data.php"
            </script>
        ';
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="icon" href="/cvd/src/resources/logo.png" type="image/ico">
    <script src="/cvd/src/jquery/jquery.js"></script>
    <script src="/cvd/src/scripts/javascript/popper.js"></script>
    <script src="/cvd/src/scripts/javascript/bootstrap.min.js"></script>
    <script src="/cvd/src/scripts/javascript/profile.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/profile.css" />
    <style>
        ::placeholder {
            color: gray !important;
            opacity: 0.5 !important;
            /* Firefox */
        }
    </style>
</head>

<body>
    <?php
    include_once('../components/navbar.php');
    ?>
    <header class="container">
        <div class="row">
            <div class="col">
                <div id="header-text">
                    <h1>Profile</h1>
                    <h4 align="center">Caregiver: <?php echo $user; ?></h4>
                    <a class="btn btn-info" target="_blank" href="https://outlook.com/login">Click here to Connect your email server</a>
                </div>
            </div>
        </div>
    </header>
    <section id="profile-block" class="container">
        <article class="row">
            <div class="col">
                <div id="profile-form">
                    <h3>Update your profile details</h3>
                    <form action="../scripts/php/update_profile.php" method="post">
                        <input type="hidden" name="cg-id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                            <label for="cg-name">Caregiver Name</label>
                            <input class="form-control" type="text" id="cg-name" name="cg-name" placeholder="Ex. John Cena" value="<?php echo $row['CGName']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="kcg-name">ಶುಶ್ರೂಷಕರ ಹೆಸರು</label>
                            <input class="form-control" type="text" name="kcg-name" id="kcg-name" placeholder="ಜಾನ್ ಸೀನಾ" value="<?php echo $row['KCGName']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile number</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Ex. 9090807060" value="<?php echo $row['MobileNo']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alt-mobile">Alternate Mobile Number</label>
                            <input class="form-control" type="text" name="alt-mobile" id="alt-mobile" placeholder="Ex. 9090807060" value="<?php echo $row['AltMobileNo']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Id</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="abc@sukhihrudaya.in" value="<?php echo $row['Email']; ?>">
                        </div class="form-group">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <?php
                                for ($i = 0; $i < count($gender); $i++) {
                                    if ($sGender[$i] === $row['Gender']) {
                                        echo '<option value="' . $sGender[$i] . '" selected>' . $gender[$i] . '</option>';
                                    } else {
                                        echo '<option value="' . $sGender[$i] . '">' . $gender[$i] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dept">Department</label>
                            <input class="form-control" type="text" name="dept" id="dept" placeholder="Dept. of Computer Applications" value="<?php echo $row['Department']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="k-dept">Department in Kannada</label>
                            <input class="form-control" type="text" name="k-dept" id="k-dept" placeholder="ಕಂಪ್ಯೂಟರ್ ಅಪ್ಪ್ಲಿಕೇಶನ್ ವಿಭಾಗ" value="<?php echo $row['KDepartment']; ?>">
                        </div>
                        <div class="form-group" id="submit-group">
                            <div>
                                <input type="submit" class="btn btn-success" name="submit" value="Save">
                            </div>
                            <div>
                                <button name="btn-reset" id="btn-change-password" class="btn btn-link">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>
    <br><br>
    <section id="reset-block" class="container">
        <article class="row">
            <div class="col">
                <div id="change-pass-form">
                    <h3>Change your password</h3>
                    <form action="../scripts/php/reset_password.php" method="post" onsubmit="return validatePassword()">
                        <div class="form-group">
                            <input class="form-control" type="password" name="pass" id="pass" placeholder="Password" required> <br>
                            <input class="form-control" type="password" name="cpass" id="cpass" placeholder="Confirm Password" required>
                        </div>
                        <div id="reset-group">
                            <div>
                                <input type="submit" value="Save" name="reset" class="btn btn-warning">
                            </div>
                            <div>
                                <button class="btn btn-link" id="btn-backto-profile">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>
    <br><br>
</body>

</html>