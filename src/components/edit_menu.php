<?php
if (!isset($_SESSION['user'])) {
    session_start();
}
require('../scripts/php/connect.php');
$query = "SELECT * FROM `patient`";
$result = $conn->query($query);
$pId = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $pId[] = $row['id'];
    }
}
$conn->close();
?>
<section class="container">
    <article class="row">
        <div class="col">
            <div id="data-edit-form">
                <form action="./edit.php" method="POST">
                    <div class="form-group">
                        <h4>
                            Update Patient Details
                        </h4>
                        <div class="select-id">
                            <label for="edit-id">Choose patient id to be updated from the list:</label>
                            <input class="form-control" list="edit-ids" name="edit-id" id="edit-id" required>

                            <datalist id="edit-ids">
                                <?php
                                foreach ($pId as $p) {
                                    echo '<option value="' . $p . '">';
                                }
                                ?>
                            </datalist>
                        </div>
                        <div align="center">
                            <input type="submit" class="btn btn-primary" name="submit" value="Edit Patient Details">
                        </div> <br>
                        <div align="center">
                            <a href="./collect_data.php">Go Back To Collect Data Form</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
</section>