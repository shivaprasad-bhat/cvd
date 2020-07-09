<?php
if (!isset($_SESSION['user']))
    session_start();
if (isset($_POST["submit"])) {
    $investigationName = $_POST['one'];
    $investigationFrequency = $_POST['two'];
    for ($i = 0; $i < count($investigationName); $i++) {
        echo "$investigationName[$i] : $investigationFrequency[$i] ";
    }
}
