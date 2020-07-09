<?php
if (!isset($_SESSION['user'])) {
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
<nav class="navbar navbar-expand-md" style="z-index: 1;">

    <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon">=</span>
    </button>

    <!-- Rights side nav items -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav" style="text-align: center;">

            <?php
            if (isset($_SESSION['user'])) {
                echo '<a class="nav-item nav-link link-text" href="/cvd/src/views/survey.php">Patient Recruitment Form</a>';
                echo '<a class="nav-item nav-link link-text" href="/cvd/src/views/collect_data.php">Collect Data</a>';
                echo '<a class="nav-item nav-link link-text" href="/cvd/src/views/treatment_schedule.php">Treatment Schedule</a>';
            } else {
                echo '<a href="/cvd/src/" class="nav-item nav-link">About the Project</a>
                    <a href="/cvd/src/views/selfCare.php" class="nav-item nav-link">Self Care</a>
                    <a href="/cvd/src/views/diet.php" class="nav-item nav-link">Diet & Supplements</a>
                     <a href="/cvd/src/views/lifestyle.php" class="nav-item nav-link">Exercise & Life Style Changes</a>
                    <a href="/cvd/src/views/contactUs.php" class="nav-item nav-link">Contact Us</a>';
            }
            ?>
        </div>

        <!-- Left nav items -->
        <div class="navbar-nav ml-auto" style="text-align: center;">
            <!-- Login button, disabling -->
            <?php
            if (!isset($_SESSION['user'])) {
                echo '<a class="nav-item nav-link link-text" href="/cvd/src/views/login.php">Hello Guest(Login)</a>';
            } else {
                echo "<a class=\"nav-item nav-link link-text\" href=\"/cvd/src/scripts/php/logout.php\">Hello $userName(Logout)</a>";
            }
            ?>

            <!-- Language switch content based on Cookie -->
            <!-- <?php
                    if ($_COOKIE["lang"] === "eng") {
                        echo '<a href="/cvd/src/scripts/php/switchLang.php?lang=kan" class="nav-item nav-link"><u>[Switch to Kannada]</u></a>';
                    } else if ($_COOKIE["lang"] === "kan") {
                        echo '<a href="/cvd/src/scripts/php/switchLang.php?lang=eng" class="nav-item nav-link"><u>[ಇಂಗ್ಲೀಷ್ ಭಾಷೆ ಬಳಸಿ]</u></a>';
                    }
                    ?> -->
        </div>
    </div>
</nav>