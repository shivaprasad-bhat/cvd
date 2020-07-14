<?php
if (!isset($_SESSION['user'])) {
    session_start();
}

/**
 * Method that gives the data to update the table.
 * if $isString is true, return NULL or given String enclosed with single quotation
 * else return NULL or integer value of the given data
 * @author Shivaprasad Bhat
 * @param string $string, bool $isString
 */
function formatData($string, $isString)
{
    if ($isString === TRUE) {
        $string = ($string == '') ? 'NULL' : "'$string'";
    } else {
        $string = ($string == '') ? 'NULL' : intval($string);
    }
    return $string;
}
if (isset($_SESSION['user'])) {
    if (isset($_POST['submit'])) {
        require('./connect.php');
        $id = formatData($_POST["cg-id"], FALSE);
        $KCGName = formatData($_POST['kcg-name'], TRUE);
        $MobileNo = formatData($_POST['mobile'], FALSE);
        $AltMobileNo = formatData($_POST['alt-mobile'], FALSE);
        $Email = formatData($_POST['email'], TRUE);
        $Gender = formatData($_POST['gender'], TRUE);
        $Department = formatData($_POST['dept'], TRUE);
        $KDepartment = formatData($_POST['k-dept'], TRUE);

        $query = "UPDATE caregiver SET KCGName = $KCGName, MobileNo = $MobileNo, 
        AltMobileNo = $AltMobileNo, Email = $Email, Gender = $Gender, 
        Department = $Department, 
        KDepartment = $KDepartment WHERE id = $id ";

        $conn->autoCommit(FALSE);
        $conn->begin_transaction();

        $result = $conn->query($query);
        if ($result === TRUE) {
            $conn->commit();
            $conn->autoCommit(TRUE);
            $conn->close();
            echo '
            <script language="javascript">
            alert("Caregiver Details Updated")
            window.location.href="/cvd/src/views/priofile.php"
            </script>
        ';
        } else {
            $conn->rollback();
            $conn->autoCommit(TRUE);
            $conn->close();
            echo '
            <script language="javascript">
            alert("Something Went Wrong. Can\'t update Caregiver Details. Please retry")
            window.location.href="/cvd/src/views/priofile.php"
            </script>
        ';
        }
    }
}
