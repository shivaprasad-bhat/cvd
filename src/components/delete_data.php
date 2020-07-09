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
            <div id="data-delete-form">
                <form action="../scripts/php/delete_data.php" method="POST">
                    <div class="form-group">
                        <h4>
                            Data Deletion Form
                        </h4>
                        <div class="select-id">
                            <label for="delete-id">Choose patient id to be deleted from the list:</label>
                            <input class="form-control" list="delete-ids" name="delete-id" id="delete-id" required>

                            <datalist id="delete-ids">
                                <?php
                                foreach ($pId as $p) {
                                    echo '<option value="' . $p . '">';
                                }
                                ?>
                            </datalist>
                        </div>
                        <div>
                            <input type="submit" name="submit" value="Delete Patient Details">
                        </div>
                        <div align="center">
                            <a href="./collect_data.php">Go Back To Collect Data Form</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>
</section>