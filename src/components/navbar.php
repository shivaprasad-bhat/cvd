<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_COOKIE["lang"])) {
    $cookie_name = "lang";
    $cookie_value = "eng";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 days
}
$userName = isset($_SESSION['user']) ? $_SESSION['user'] : 'Guest';
$_SESSION["page"] = isset($_SESSION["page"]) ? $_SESSION["page"] : "index";

?>
<section class="container-fluid">
    <article class="row" style="background-image: linear-gradient(to right, #ffe6cc, #ffff99, #ccffff);">
        <div class="col-md-2 mt-2">
            <a href="/cvd/src/" class="navbar-brand">
                <img src="/cvd/src/resources/image.png" alt="Logo" style="width:80px;background:white;border-radius:48%;">
            </a>
        </div>
        <div class="col-md-8 mt-2 top-header" align="center">
            <h2>Sukhi Hrudaya | ಸುಖಿ ಹೃದಯ</h2>
            <h5>A Cardio Vascular Care Project</h5>
        </div>
    </article>
</section>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark" style="z-index: 1;">

    <!-- Toggler/collapsibe Button -->
    <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="border: 1px solid white;">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div style="color: white !important;" class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
        <div class="navbar-nav" style="text-align: center;">

            <?php
            if (isset($_SESSION['user'])) {
                echo '<a style="color:white;" class="nav-item nav-link link-text" href="/cvd/src/views/survey.php">Patient Recruitment Form</a>';
                echo '<a style="color:white;" class="nav-item nav-link link-text" href="/cvd/src/views/collect_data.php">Data for App Install</a>';
                echo '<a style="color:white;" class="nav-item nav-link link-text" href="/cvd/src/views/treatment_schedule.php">Treatment Schedule</a>';
                echo '<a style="color:white;" class="nav-item nav-link link-text" href="/cvd/src/views/ivr.php">IVR Schedule</a>';
                echo '<a style="color:white;" class="nav-item nav-link link-text" href="/cvd/src/views/update_patient.php">Update Patient Details</a>';
                echo '<a style="color:white;" class="nav-item nav-link link-text" href="#">Patient Symptom Alert</a>';
            } else {
                echo '<a style="color:white;" href="/cvd/src/" class="nav-item nav-link">About the Project</a>
                    <a style="color:white;" href="/cvd/src/views/selfCare.php" class="nav-item nav-link">Self Care</a>
                    <a style="color:white;" href="/cvd/src/views/diet.php" class="nav-item nav-link">Diet & Supplements</a>
                     <a style="color:white;" href="/cvd/src/views/lifestyle.php" class="nav-item nav-link">Exercise & Life Style Changes</a>
                    <a style="color:white;" href="/cvd/src/views/contactUs.php" class="nav-item nav-link">Contact Us</a>';
            }
            ?>
        </div>

        <!-- Left nav items -->
        <div class="navbar-nav ml-auto" style="text-align: center;">
            <!-- Login button, disabling -->
            <?php
            if (!isset($_SESSION['user'])) {
                echo '<a style="color:white;" class="nav-item nav-link link-text" href="/cvd/src/views/login.php"><u>Login</u></a>';
                if ($_COOKIE["lang"] === "eng") {
                    echo '<a style="color:white;" href="/cvd/src/scripts/php/switchLang.php?lang=kan" class="nav-item nav-link"><u>[Switch to Kannada]</u></a>';
                } else if ($_COOKIE["lang"] === "kan") {
                    echo '<a style="color:white;" href="/cvd/src/scripts/php/switchLang.php?lang=eng" class="nav-item nav-link"><u>[ಇಂಗ್ಲೀಷ್ ಭಾಷೆ ಬಳಸಿ]</u></a>';
                }
            } else {
                echo "<a style=\"color:white;\" class=\"nav-item nav-link link-text\" href=\"/cvd/src/views/priofile.php\">Profile</a>";
                echo "<a style=\"color:white;\" class=\"nav-item nav-link link-text\" href=\"/cvd/src/scripts/php/logout.php\">Logout</a>";
            }
            ?>
        </div>
    </div>
</nav>