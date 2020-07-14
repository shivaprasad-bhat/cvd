<?php
if (!isset($_SESSION['user'])) session_start();
if (isset($_POST['reset'])) {
    $pass = trim($_POST['pass']);
    $cpass = trim($_POST['cpass']);
    if ($pass === $cpass) {
        $uname = $_SESSION['user'];
        require('./connect.php');
        $query = "SET PASSWORD FOR '$uname'@'localhost' = PASSWORD('$pass')";
        $result = $conn->query($query);

        $conn->close();
        if ($result === TRUE) {
            $conn->close();
            echo '
                <script language="javascript">
                alert("Password Updated. Please re-login")
                window.location.href="/cvd/src/script/php/logout.php"
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
