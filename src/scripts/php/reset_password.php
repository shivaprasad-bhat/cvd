<?php
if (!isset($_SESSION['user'])) session_start();
if (isset($_POST['reset'])) {
    $password = trim($_POST['pass']);
    $cpassword = trim($_POST['cpass']);
    if ($password === $cpassword) {
        $username = $_SESSION['user'];
        require('./connect.php');
        $conn->select_db("mysql");
        $query = "ALTER USER '$username'@'localhost' IDENTIFIED BY '$password'";
        $result = $conn->query($query);

        if ($result === TRUE) {
            $conn->close();
            echo '
                <script language="javascript">
                alert("Password Updated")
                window.location.href="/cvd/src/views/priofile.php"
                </script>';
        } else {
            $conn->close();
            echo '
                <script language="javascript">
                alert("Something Went Wrong")
                window.location.href="/cvd/src/views/priofile.php"
                </script>';
        }
    } else {
        echo '
                <script language="javascript">
                alert("Passwords must match")
                window.location.href="/cvd/src/views/priofile.php"
                </script>';
    }
}
