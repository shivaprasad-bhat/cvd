<?php
session_start();
setcookie("lang", trim(htmlspecialchars(stripslashes($_GET["lang"]))), time() + (86400 * 30), "/");
if ($_SESSION["page"] === "index") {
    header("Location: /cvd/src/");
} 

else if ($_SESSION["page"] === "contactus") {
    header("Location: /cvd/src/views/contactUs.php");
} else if ($_SESSION["page"] === "diet") {
    header("Location: /cvd/src/views/diet.php");
}else if ($_SESSION["page"] === "lifestyle") {
    header("Location: /cvd/src/views/lifestyle.php");
}else if ($_SESSION["page"] === "selfcare") {
    header("Location: /cvd/src/views/selfCare.php");
}
