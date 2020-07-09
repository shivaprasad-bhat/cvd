<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST[''];
    $username = $_POST[''];
    $email = $_POST[''];
    $password = $_POST[''];
    $mobileNum = $_POST[''];
    $gender = $_POST[''];
    $dept = $_POST[''];
}
