<?php
if (!isset($_SESSION['user'])) {
    session_start();
}

if (isset($_SESSION['user'])) {
    require('./connect.php');
    if (isset($_POST["submit"])) {
        global $message;
        $investigations = array();
        $investigations[] = "";
        $query = "SELECT * FROM `investmaster`";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $investigations[] = $row["KInvMName"];
            }
        }

        $date = trim(htmlspecialchars(stripslashes($_POST["download-date"])));
        $query = "SELECT * FROM treatmentschedule WHERE eventDate ='$date'";
        $file_name = "Sheet1.xls";
        $result = $conn->query($query);
        $contents = "<section><table class=\"table table-bordered\"><thead><tr><th>Name</th><th>Number</th><th>Message</th></tr></thead><tbody>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $eType = intval($row["eventType"]);
                if ($eType === 1 || $eType === 2 || $eType === 3) {
                    $contents .= "<tr><td>" . $row["patientID"] . "</td><td>" . $row["MobileNo"] . "</td>";
                    if ($eType === 1) {
                        $message = "ಆತ್ಮೀಯ,\n ನಿಮ್ಮ ಮಾತ್ರೆ/ಔಷಧಿಯನ್ನು ನಿಯಮಿತವಾಗಿ ತೆಗೆದುಕೊಳ್ಳಲು ಇದು ಒಂದು ಜ್ಞಾಪನೆಯಾಗಿದೆ. ಹೆಚ್ಚಿನ ಮಾಹಿತಿ/ಸಹಾಯಕ್ಕಾಗಿ ಅಥವಾ ನೀವು ಯಾವುದೇ ಪ್ರಶ್ನೆಗಳನ್ನು ಹೊಂದಿದ್ದರೆ, ‌‍‍ದಯವಿಟ್ಟು ನಮ್ಮನ್ನು ಸಂಪರ್ಕಿಸಿ.
                        -ಸುಖಿ ಹೃದಯ ತಂಡ  
                        ";
                    } else if ($eType === 2) {
                        $message = "ಆತ್ಮೀಯ ,\n ನಿಮ್ಮ ಚಿಕಿತ್ಸೆಯ ವೈದ್ಯರನ್ನು ಭೇಟಿಯಾಗಲು ಇದು ಒಂದು ಜ್ಞಾಪನೆಯಾಗಿದೆ. ಹೆಚ್ಚಿನ ಮಾಹಿತಿ/ಸಹಾಯಕ್ಕಾಗಿ ಅಥವಾ ನೀವು ಯಾವುದೇ ಪ್ರಶ್ನೆಗಳನ್ನು ಹೊಂದಿದ್ದರೆ, ‌‍‍ದಯವಿಟ್ಟು ನಮ್ಮನ್ನು ಸಂಪರ್ಕಿಸಿ.
                        -ಸುಖಿ ಹೃದಯ ತಂಡ 
                        ";
                    } else if ($eType === 3) {
                        $inv = $row["InvMId"];
                        $message = "ಆತ್ಮೀಯ ,\n ನಿಮ್ಮ $investigations[$inv] ಅನ್ನು ಪರಿಶೀಲಿಸಲು ಇದು ಒಂದು ಜ್ಞಾಪನೆಯಾಗಿದೆ. ಹೆಚ್ಚಿನ ಮಾಹಿತಿ/ಸಹಾಯಕ್ಕಾಗಿ ಅಥವಾ ನೀವು ಯಾವುದೇ ಪ್ರಶ್ನೆಗಳನ್ನು ಹೊಂದಿದ್ದರೆ, ‌‍‍ದಯವಿಟ್ಟು ನಮ್ಮನ್ನು ಸಂಪರ್ಕಿಸಿ.
                        -ಸುಖಿ ಹೃದಯ ತಂಡ
                        ";
                    }
                    $contents .= "<td>" . $message . "</td></tr>";
                }
            }
        }
        $contents .= "</tbody></table></section>";
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/vnd.ms-excel; name='excel'; charset=UNICODE");

        echo $contents;
        $conn->close();
    }
}
