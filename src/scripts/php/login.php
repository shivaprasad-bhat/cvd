<?php
session_start();
$loginName = $loginPassword = null;
define('HOST', 'localhost');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty(trim($_POST['username']))) {
        echo "<script type='text/javascript'>alert('User Name is Empty');</script>";
    } else {
        $loginName = trim(htmlspecialchars(stripslashes($_POST['username'])));
        $loginPassword = trim(htmlspecialchars(stripslashes($_POST['password'])));
        $connection = new mysqli(HOST, $loginName, $loginPassword);
        if ($connection->connect_error) {
            echo '
                <h2>Invalid User Name or Password</h2>
                <h3>Please retry login . <a href="/cvd/src/">Click Here</a></h3>
            ';
        } else {
            $_SESSION['user'] = $loginName;
            $_SESSION['password'] = $loginPassword;
            header('Location: ../../index.php');
        }
        $connection->close();
    }
}
